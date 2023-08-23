import os
import cv2 as cv


""" A list to hold the names of people that are recognizable to the model """
people = []
DIR = "Resources/Faces/train"
for folder in os.listdir(DIR):
    people.append(folder)


def run_recognizer(name, image_name):
    """ Loading Face Recognizer model """
    face_recognizer = cv.face.LBPHFaceRecognizer_create()
    face_recognizer.read("face_recognizer_trained_model.yml")  # Reading trained recognizer model

    """ Converting the passed image to grayscale """
    img = cv.imread(os.path.join(name, image_name))
    gray = cv.cvtColor(img, cv.COLOR_BGR2GRAY)

    """ Loading face detector classifier and passing grayscale image to it """
    haar_cascade = cv.CascadeClassifier("haar_face.xml")
    faces_rect = haar_cascade.detectMultiScale(gray, 1.1, 4)

    """ Predicting the detected faces """
    for (x, y, w, h) in faces_rect:
        face_roi = gray[y:y + h, x:x + w]

        label, confidence = face_recognizer.predict(face_roi)
        print(f"Label = {people[label]} with Confidence of {confidence}")

        cv.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 2)
        cv.putText(img, people[label], (10, y - 10), cv.FONT_HERSHEY_COMPLEX, 1, (0, 255, 0), 1)

    cv.imshow("Detected Face", img)

    cv.waitKey(0)


""" Reading Image """
ben_afflek = "Resources/Faces/val/ben_afflek"
elton_john = "Resources/Faces/val/elton_john"
jerry_seinfeld = "Resources/Faces/val/jerry_seinfeld"
madonna = "Resources/Faces/val/madonna"
mindy_kaling = "Resources/Faces/val/mindy_kaling"

img_number = "2.jpg"


""" RUN RECOGNIZER """
run_recognizer(name=ben_afflek, image_name=img_number)
