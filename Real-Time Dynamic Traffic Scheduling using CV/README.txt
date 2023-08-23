# REQUIREMENTS:
- YOLOv8
  Install with command: pip install ultralytics


# DESCRIPTION:
- Aim is to reduce traffic congestions at a four-lane road intersection by dynamically adjusting the green durations according to real-time traffic data (vehicular counts). Lanes with high level of congestions are prioritized and given more time.


# NOTE:
- This project is still in progress
- It considers a standard four-lane road intersection
- Lane time allocation was not implemented using a standard/recognized optimization algorithm
- Amount of time allocated depends on level of congestion (vehicular count) only; i.e. high congestion = more time
- Vehicular count for lane 1 is demonstrated in the video titled "Lane 1"
- Vehicular counts for other lanes are generated randomly


# HOW TO USE
- Open and run main.py

