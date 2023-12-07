<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating Tables</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PHPScriptDemo"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Create Students table
$sql_students = "CREATE TABLE Students (
    StudentID INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    DateOfBirth DATE,
    Email VARCHAR(255),
    Phone VARCHAR(20),
    PRIMARY KEY (StudentID)
)";

if ($conn->query($sql_students) === TRUE) {
    echo "Table Students created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Create Course table
$sql_course = "CREATE TABLE Course (
    CourseID INT NOT NULL AUTO_INCREMENT,
    CourseName VARCHAR(255) NOT NULL,
    Credits INT,
    PRIMARY KEY (CourseID)
)";

if ($conn->query($sql_course) === TRUE) {
    echo "Table Course created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Create Instructor table
$sql_instructor = "CREATE TABLE Instructor (
    InstructorID INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    Email VARCHAR(255),
    Phone VARCHAR(20),
    PRIMARY KEY (InstructorID)
)";

if ($conn->query($sql_instructor) === TRUE) {
    echo "Table Instructor created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Create Enrollment table
$sql_enrollment = "CREATE TABLE Enrollment (
    EnrollmentID INT NOT NULL AUTO_INCREMENT,
    StudentID INT NOT NULL,
    CourseID INT NOT NULL,
    EnrollmentDate DATE,
    Grade VARCHAR(2),
    PRIMARY KEY (EnrollmentID),
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
)";

if ($conn->query($sql_enrollment) === TRUE) {
    echo "Table Enrollment created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
?>
</body>
</html>
