# Create the database using free sql hosting service (freesqldatabase.com) [used only for testing mySQL]
USE sql5660472;
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    FName VARCHAR(50) NOT NULL,
    LName VARCHAR(50) NOT NULL,
    Birth DATE NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Weight DECIMAL(5, 2),
    Height DECIMAL(5, 2),
    WeightGoal DECIMAL(5, 2)
);

CREATE TABLE Trainer (
    TrainerID INT PRIMARY KEY AUTO_INCREMENT,
    FName VARCHAR(50) NOT NULL,
    LName VARCHAR(50) NOT NULL,
    Type VARCHAR(20) NOT NULL
);

CREATE TABLE Equipment (
    EquipmentID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(50) NOT NULL,
    Type VARCHAR(20) NOT NULL
);

CREATE TABLE Workout (
    WorkoutID INT PRIMARY KEY AUTO_INCREMENT,
    EquipmentID INT,
    Name VARCHAR(50) NOT NULL,
    Type VARCHAR(20) NOT NULL,
    FOREIGN KEY (EquipmentID) REFERENCES Equipment(EquipmentID) ON DELETE SET NULL
);

CREATE TABLE ActivityLog (
    LogID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT NOT NULL,
    WorkoutID INT NOT NULL,
    TrainerID INT,
    Date DATE NOT NULL,
    newWeight DECIMAL(5, 2) NOT NULL,
    Duration INT NOT NULL,
    Notes TEXT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE,
    FOREIGN KEY (WorkoutID) REFERENCES Workout(WorkoutID),
    FOREIGN KEY (TrainerID) REFERENCES Trainer(TrainerID) ON DELETE SET NULL
);
# Inserting Tuples

# User: UserID(PK), Email, Password, FName, LName,
# Birth(YYYY-MM-DD), Gender, Weight(kg), Height(cm), WeightGoal(kg)
INSERT INTO Users VALUES (23635935, "johnsmith@gmail.com", "Passw0rd", "John", "Smith", "1989-02-14", "M", 70, 165, 65);
INSERT INTO Users VALUES (48576382, "emjohnson@gmail.com", "Journ33y",  "Emily", "Johnson", "1999-04-04", "F", 77, 178, 72);
INSERT INTO Users VALUES (98765432, "mikebrown94@gmail.com", "BrownBear94",  "Michael", "Brown", "1994-07-29", "M", 66, 155, 64);
INSERT INTO Users VALUES (12345678, "sarahdavis05@gmail.com", "Qwerty123",  "Sarah", "Davis", "2004-05-22", "F", 68, 170, 64);
INSERT INTO Users VALUES (56789012, "wilsondave57@gmail.com", "F0rg0t10",  "David", "Wilson", "1997-11-30", "M", 63, 162, 58);
INSERT INTO Users VALUES (34567890, "jesslee@gmail.com", "Jessica1",  "Jessica", "Lee", "2002-03-10", "F", 67, 185, 58);
INSERT INTO Users VALUES (87654321, "chriswhite@gmail.com", "White1991",  "Christopher", "White", "1991-03-09", "M", 80, 160, 76);
INSERT INTO Users VALUES (23454747, "jenclark12@gmail.com", "Lakers789",  "Jennifer", "Clark", "1988-12-05", "F", 92, 175, 88);
INSERT INTO Users VALUES (34762345, "robmartinez74@gmail.com", "Martin3z", "Robert", "Martinez", "174-09-16", "M", 60, 168, 57);
INSERT INTO Users VALUES (65432109, "rogriquezalicia@gmail.com", "F1tnesss", "Alicia", "Rodriguez", "1995-10-31", "F", 85, 180, 78);

# Trainer - TrainerID, FName, LName, Type
INSERT INTO Trainer VALUES (1, "No", "Trainer", "Default");
INSERT INTO Trainer VALUES (2, "Viviana", "Hayes", "Strength");
INSERT INTO Trainer VALUES (3, "Miles", "Morales", "Flexibility");
INSERT INTO Trainer VALUES (4, "Titus", "Fitzwilliam", "Strength");
INSERT INTO Trainer VALUES (5, "Peter", "Parker", "Cardio");
INSERT INTO Trainer VALUES (6, "Leon", "Blanchard", "Strength");
INSERT INTO Trainer VALUES (7, "Joel", "Radcliff", "Flexibility");
INSERT INTO Trainer VALUES (8, "Topher", "Jones", "Cardio");
INSERT INTO Trainer VALUES (9, "Miguel", "O'Hara", "Strength");
INSERT INTO Trainer VALUES (10, "Gwen", "Stacy", "Strength");

# Equipment - EquipmentID(PK), Name, Type
INSERT INTO Equipment VALUES (1, "None", "Default");
INSERT INTO Equipment VALUES (2, "Treadmill", "Cardio");
INSERT INTO Equipment VALUES (3, "Weight Bench", "Strength");
INSERT INTO Equipment VALUES (4, "Dumbbells", "Strength");
INSERT INTO Equipment VALUES (5, "Elliptical", "Flexibility");
INSERT INTO Equipment VALUES (6, "Barbells", "Strength");
INSERT INTO Equipment VALUES (7, "Pull-Up Bar", "Strength");
INSERT INTO Equipment VALUES (8, "Jump Rope", "Cardio");
INSERT INTO Equipment VALUES (9, "Floor Mat", "Strength");
INSERT INTO Equipment VALUES (10, "Exercise Bike", "Cardio");

# Workout - WorkoutID(PK), EquipmentID(FK), Name, Type
INSERT INTO Workout VALUES (18, 4, "Curl-Ups", "Strength");
INSERT INTO Workout VALUES (27, 3, "Bench Press", "Strength");
INSERT INTO Workout VALUES (36, 2, "Sprinting", "Cardio");
INSERT INTO Workout VALUES (45, 7, "Pull-ups", "Strength");
INSERT INTO Workout VALUES (54, 4, "Hammer Curls", "Strength");
INSERT INTO Workout VALUES (63, 6, "Deadlifts", "Strength");
INSERT INTO Workout VALUES (72, 5, "Full Body Elliptical", "Flexibility");
INSERT INTO Workout VALUES (81, 9, "Push-ups", "Strength");
INSERT INTO Workout VALUES (90, 8, "Jumping Rope", "Cardio");
INSERT INTO Workout VALUES (12, 2, "Jogging", "Cardio");

# ActivityLog - LogID(PK), UserID(FK), WorkoutID(FK), TrainerID(FK), Date(YYYY-MM-DD), CurrentWeight,Duration(minutes), Notes
INSERT INTO ActivityLog VALUES (84, 23635935, 18, 4, "2023-10-19",65 ,30, "I lifted 30 pounds today");
INSERT INTO ActivityLog VALUES (16, 65432109, 36, 8, "2023-04-18", 78, 60, "I ran on the Treadmill for an hour" );
INSERT INTO ActivityLog VALUES (24, 34762345, 27, 4, "2023-05-02", 55, 40, "I did 6 sets of 10 Bench Presses");
INSERT INTO ActivityLog VALUES (32, 48576382, 45, 9, "2023-05-18", 72, 30, "I did 20 sets of Pull-ups");
INSERT INTO ActivityLog VALUES (64, 34567890, 72, 3, "2023-07-27", 58, 45, "I worked out on the elliptical for 45 minutes");
INSERT INTO ActivityLog VALUES (48, 23454747, 54, 2, "2023-06-16", 84, 35, "I did 4 sets of 10 Hammer Curls");
INSERT INTO ActivityLog VALUES (56, 56789012, 81, 6, "2023-07-12", 50, 55, "I did 5 sets of 10 Push-ups");
INSERT INTO ActivityLog VALUES (40, 12345678, 12, 8, "2023-06-01", 62, 60, "I jogged for an hour");
INSERT INTO ActivityLog VALUES (72, 87654321, 90, 1, "2023-08-30", 75, 60, "I did 3 sets of Jumping Rope");
INSERT INTO ActivityLog VALUES (80, 98765432, 63, 10, "2023-10-10", 66, 50, "I did Deadlift training with a 40kg Barbell");