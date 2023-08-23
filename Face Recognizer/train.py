import os
import cv2 as cv
import numpy as np


# Creating a list of persons to train Model with
people = []
DIR = "Resources/Faces/train"

for folder in os.listdir(DIR):
    people.append(folder)

print(people)

# Creating a list to save the faces of the persons and another to save their names as indexes
features = []
labels = []

# Creating a function to loop through all the folders in DIR and
# add the faces in each image in each folder to features[]
# and their corresponding labels/names as indexes to labels[]

# HaarCascade Classifier
haar_cascade = cv.CascadeClassifier("haar_face.xml")

def train_model():

    # Looping through all folders in DIR
    for person in people:
        path = os.path.join(DIR, person)
        label = people.index(person)

        # Looping through all images in each folder
        for img in os.listdir(path):
            img_path = os.path.join(path, img)

            # Detecting faces in each image
            img_array = cv.imread(img_path)
            gray = cv.cvtColor(img_array, cv.COLOR_BGR2GRAY)

            faces_rect = haar_cascade.detectMultiScale(gray, 1.1, 4)

            for (x, y, w, h) in faces_rect:
                face_roi = gray[y:y+h, x:x+w]   # cropping detected face
                features.append(face_roi)       # adding the cropped face to features[]
                labels.append(label)            # adding label of image to labels[]


# Running the train_model function
train_model()

print(f"Length of features = {len(features)}")
print(f"Length of labels = {len(labels)}")

# Converting features[] and labels[] to Numpy Arrays
features = np.array(features, dtype="object")
labels = np.array(labels)

# Creating Face Recognizer Instance
face_recognizer = cv.face.LBPHFaceRecognizer_create()

# Training the Recognizer instance/model with features[] and labels[]
face_recognizer.train(features, labels)

print("Model Training done successfully!")

# Saving the Trained Recognizer Model as (yml file) to enable use in another file/compuetr etc
face_recognizer.save("face_recognizer_trained_model.yml")

print("Model saved successfully")
