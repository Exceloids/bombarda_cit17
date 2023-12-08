<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM Student WHERE StudentID='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: Student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: Student.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE Student SET FirstName='$fname', LastName='$lname', Email='$email', Phone='$phone', Course='$course' WHERE StudentID='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: Student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: Student.php");
        exit(0);
    }
}

if(isset($_POST['save_student']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO Student (FirstName, LastName, DateOfBirth, Email, Phone, Course) VALUES ('$firstname', '$lastname', '$dob', '$email', '$phone', '$course')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: Student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: Student.php");
        exit(0);
    }
}

if(isset($_POST['save_instructor']))
{
    $instructor_name = mysqli_real_escape_string($con, $_POST['instructor_name']);
    $expertise = mysqli_real_escape_string($con, $_POST['expertise']);

    $query = "INSERT INTO Instructor (instructor_name, expertise) VALUES ('$instructor_name', '$expertise')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Instructor Created Successfully";
        header("Location: Instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Instructor Not Created";
        header("Location: Instructor.php");
        exit(0);
    }
}
?>
