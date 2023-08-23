from datetime import time
import time


class Traffic:
    def __init__(self, tf_name):
        self.__traffic_light_name = tf_name
        self.__RED = True
        self.__YELLOW = False
        self.__GREEN = False

    def get_lane_name(self):
        return self.__traffic_light_name

    def set_traffic(self, red, yellow, green):
        self.__RED = red
        self.__YELLOW = yellow
        self.__GREEN = green

    def traffic_state(self):
        if self.__RED:
            return 'Red'
        if self.__YELLOW:
            return 'Yellow'
        if self.__GREEN:
            return 'Green'


def set_lane1_traffic(color='G'):
    if color == 'G':
        lane1.set_traffic(False, False, True)
    else:
        lane1.set_traffic(False, True, False)

    lane2.set_traffic(True, False, False)
    lane3.set_traffic(True, False, False)
    lane4.set_traffic(True, False, False)


def set_lane2_traffic(color='G'):
    if color == 'G':
        lane2.set_traffic(False, False, True)
    else:
        lane2.set_traffic(False, True, False)

    lane1.set_traffic(True, False, False)
    lane3.set_traffic(True, False, False)
    lane4.set_traffic(True, False, False)


def set_lane3_traffic(color='G'):
    if color == 'G':
        lane3.set_traffic(False, False, True)
    else:
        lane3.set_traffic(False, True, False)

    lane1.set_traffic(True, False, False)
    lane2.set_traffic(True, False, False)
    lane4.set_traffic(True, False, False)


def set_lane4_traffic(color='G'):
    if color == 'G':
        lane4.set_traffic(False, False, True)
    else:
        lane4.set_traffic(False, True, False)

    lane1.set_traffic(True, False, False)
    lane2.set_traffic(True, False, False)
    lane3.set_traffic(True, False, False)


lane1 = Traffic('Lane 1')
lane2 = Traffic('Lane 2')
lane3 = Traffic('Lane 3')
lane4 = Traffic('Lane 4')



def run_timer(key, value):
    if key == 0:
        set_lane1_traffic()
        print('\nLANE 1 ACTIVE')
        print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
              f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')

        while value >= 0:
            mins, secs = divmod(value, 60)
            timeformat = '{:02d}:{:02d}'.format(mins, secs)
            print(timeformat)
            if value == 5:
                set_lane1_traffic(color='Y')
                print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
                      f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')
            time.sleep(1)
            value -= 1

    elif key == 1:
        set_lane2_traffic()
        print('\nLANE 2 ACTIVE')
        print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
              f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')

        while value >= 0:
            mins, secs = divmod(value, 60)
            timeformat = '{:02d}:{:02d}'.format(mins, secs)
            print(timeformat)
            if value == 5:
                set_lane2_traffic(color='Y')
                print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
                      f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')
            time.sleep(1)
            value -= 1

    elif key == 2:
        set_lane3_traffic()
        print('\nLANE 3 ACTIVE')
        print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
              f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')

        while value >= 0:
            mins, secs = divmod(value, 60)
            timeformat = '{:02d}:{:02d}'.format(mins, secs)
            print(timeformat)
            if value == 5:
                set_lane3_traffic(color='Y')
                print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
                      f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')
            time.sleep(1)
            value -= 1

    elif key == 3:
        set_lane4_traffic()
        print('\nLANE 4 ACTIVE')
        print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
              f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')

        while value >= 0:
            mins, secs = divmod(value, 60)
            timeformat = '{:02d}:{:02d}'.format(mins, secs)
            print(timeformat)
            if value == 5:
                set_lane4_traffic(color='Y')
                print(f'Lane 1: {lane1.traffic_state()}\t Lane 2: {lane2.traffic_state()}\t '
                      f'Lane 3: {lane3.traffic_state()}\t Lane 4: {lane4.traffic_state()}')
            time.sleep(1)
            value -= 1


def start_traffic_lights(times):
    for id, time in enumerate(times):
        run_timer(id, time)

