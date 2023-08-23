import multiprocessing
import time
import random
from datetime import datetime, timedelta
import Traffic
import cv2
from ultralytics import YOLO


def get_id_and_center(results):
    Boxes = results[0].boxes

    output = {}
    for box in Boxes:
        cls = int(box.cls[0].item())
        if cls in [2, 5, 7]:
            _id = int(box.id[0].item())
            xywh = box.xywh[0].tolist()
            x, y, w, h = xywh
            center = (round(x), round(y))
            output[_id] = center
    return output


def share_time(vcount):
    time_l1 = 0
    time_l2 = 0
    time_l3 = 0
    time_l4 = 0
    for lane, lane_count in vcount.items():
        time_to_allocate = 0
        if lane_count<=30:
            time_to_allocate = 20
        elif 31<=lane_count<=60:
            time_to_allocate = 45
        elif 61<=lane_count<80:
            time_to_allocate = 75
        elif lane_count >= 80:
            time_to_allocate = 90

        if lane == 'Lane 1':
            time_l1 = time_to_allocate
        elif lane == 'Lane 2':
            time_l2 = time_to_allocate
        elif lane == 'Lane 3':
            time_l3 = time_to_allocate
        elif lane == 'Lane 4':
            time_l4 = time_to_allocate

    cycle_time = time_l1 + time_l2 + time_l3 + time_l4

    print(f'\nTime allocated to Lane 1: {time_l1} sec\nTime allocated to Lane 2: {time_l2} sec\n'
          f'Time allocated to Lane 3: {time_l3} sec\nTime allocated to Lane 4: {time_l4} sec\n'
          f'Total time: {cycle_time} sec')

    return [cycle_time, [time_l1, time_l2, time_l3, time_l4]]


def initialize_system(shared_c5end, lock):
    print('INITIALIZING SYSTEM...')
    time.sleep(7)
    print(f'\n{datetime.now()}')

    cycles = 5
    while cycles:
        with lock:
            print(f'\nCYCLE {6 - cycles}:')

            Traffic.start_traffic_lights([3 for i in range(4)])

            if cycles == 1:
                shared_c5end.value = True
                print('cycle 5 ended')

            cycles -= 1


def begin_scheduling_computation(shared_vc, shared_wt, shared_c5end, lock):
    time.sleep(2)
    print("Sheduler started in the background")
    time.sleep(5)
    while True:
        with lock:
            if shared_vc.value:
                cycle_time, lane_times = share_time(shared_vc.value)
                shared_wt.value = cycle_time * 5
                for i in range(5):
                    print(f'\nCYCLE {i+1}:')
                    Traffic.start_traffic_lights(lane_times)
                shared_c5end.value = True
        time.sleep(0)


def run_camera(shared_c5end, shared_vc, shared_wt):
    model = YOLO('yolov8m.pt')

    counted_ids = []        # Keeps list of counted vehicle's ids
    counter = 0
    counter_history = []

    initial_time = datetime.now()
    time_interval = timedelta(seconds=0)

    cap = cv2.VideoCapture('Lane 1.mp4')
    while cap.isOpened():
        success, frame = cap.read()

        if success:
            # frame = cv2.resize(frame, None, fx=0.5, fy=0.5)     # Resize the frame
            Results = model.track(frame, persist=True, verbose=False)      # Predict/Track on the frame

            annotated_frame = Results[0].plot()     # Save predictions and tracking data in var to be shown using CV
            cv2.line(annotated_frame, (30, 150), (300, 150), (52, 235, 216), 2)      # Draw counting line

            """Counting the vehicles"""
            id_center = get_id_and_center(results=Results)      # Get the ids and box centers of all vehicles
            for _id in id_center:        # Loop through id_center and count the vehicles in the frame
                if _id in counted_ids:
                    pass
                else:
                    x, y = id_center[_id]
                    if y > 200:
                        counter = len(counted_ids) + 1
                        counted_ids.append(_id)

            """Checking if 30 seconds has passed to perform the next scheduling"""

            current_time = datetime.now()
            if current_time >= initial_time + time_interval:  # After 1 minute:
                if shared_c5end.value:
                    counter_history.append(counter)  # Append current vehicle count to counter history
                    counter = 0  # Set vehicle counter to zero to begin counting for next 1 minute

                    """Getting the vehicle count on all lanes"""
                    shared_vc.value = {'Lane 1': counter_history.pop(), 'Lane 2': random.randint(30, 41),
                                       'Lane 3': random.randint(15, 30), 'Lane 4': random.randint(60, 79)}
                    counted_ids.clear()
                    print(f'\n{current_time}\nCounted Vehicles: {shared_vc.value}')

                    shared_c5end.value = False
                    time.sleep(0.1)

                initial_time = current_time
                time_interval = timedelta(seconds=shared_wt.value)

            cv2.putText(annotated_frame, f'Counted: {counter}', (annotated_frame.shape[1] - 150, annotated_frame.shape[0] - 50),
                        cv2.FONT_HERSHEY_SIMPLEX, 0.6, (52, 235, 216), 2)  # Display vehicle counter
            cv2.putText(annotated_frame, f'{datetime.now().strftime("%Y-%m-%d %H:%M:%S")}', (50, annotated_frame.shape[0] - 50),
                        cv2.FONT_HERSHEY_SIMPLEX, 0.5, (255, 255, 255), 2)  # Display current time

            cv2.imshow('Lane 1', annotated_frame)

            if cv2.waitKey(1) & 0xFF == ord('q'):
                break
                cap.release()

        else:
            break



if __name__ == "__main__":

    vehicle_count_on_lanes = multiprocessing.Manager().Value("i", {})
    wait_time = multiprocessing.Value('i', 0)
    cycle_5_ended = multiprocessing.Value('b', False)
    lock = multiprocessing.Lock()

    # Create the processes
    p1 = multiprocessing.Process(target=initialize_system, args=(cycle_5_ended, lock))
    p2 = multiprocessing.Process(target=run_camera, args=(cycle_5_ended, vehicle_count_on_lanes, wait_time))
    p3 = multiprocessing.Process(target=begin_scheduling_computation, args=(vehicle_count_on_lanes, wait_time, cycle_5_ended, lock))

    # Start the processes
    p1.start()
    p2.start()
    p3.start()

    # Wait for both processes to finish
    p1.join()
    p2.join()
    p3.join()

    print("SYSTEM SHUTDOWN")