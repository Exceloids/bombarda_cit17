<?php
session_start();
require 'dbcon.php';

// Define a map of option values to corresponding degree names
$degree_map = [
    '162' => 'Bachelor of Physical Education',
    '163' => 'Bachelor of Science in Computer Science',
    '148' => 'Bachelor of Science in Tourism Management',
    '146' => 'Bachelor of Science in Hospitality Management',
    '105' => 'Bachelor of Arts',
    '144' => 'Bachelor of Arts in Behavioral Science',
    '95' => 'Bachelor of Arts in Communication',
    '55' => 'Bachelor of Arts in English',
    '145' => 'Bachelor of Arts in English Language Studies',
    '49' => 'Bachelor of Arts in Mass Communication',
    '50' => 'Bachelor of Arts in Political Science',
    '155' => 'Bachelor of Culture and Arts Education',
    '156' => 'Bachelor of Early Childhood Education',
    '79' => 'Bachelor of Elementary Education',
    '249' => 'Bachelor of Fine Arts',
    '151' => 'Bachelor of Forensic Science',
    '81' => 'Bachelor of Laws',
    '340' => 'Bachelor of Library and Information Science',
    '353' => 'Bachelor of Multimedia Arts',
    '115' => 'Bachelor of Physical Education',
    '114' => 'Bachelor of Public Administration',
    '57' => 'Bachelor of Science in Accountancy',
    '165' => 'Bachelor of Science in Accounting Information System',
    '75' => 'Bachelor of Science in Accounting Technology',
    '108' => 'Bachelor of Science in Agricultural Engineering',
    '63' => 'Bachelor of Science in Architecture',
    '336' => 'Bachelor of Science in Biology',
    '56' => 'Bachelor of Science in Business Administration',
    '61' => 'Bachelor of Science in Civil Engineering',
    '354' => 'Bachelor of Science in Civil Engineering-',
    '104' => 'Bachelor of Science in Commerce',
    '65' => 'Bachelor of Science in Computer Engineering',
    '69' => 'Bachelor of Science in Computer Science',
    '60' => 'Bachelor of Science in Criminology',
    '153' => 'Bachelor of Science in Data Analytics',
    '64' => 'Bachelor of Science in Electronic and Communications Engineering',
    '101' => 'Bachelor of Science in Electronics Engineering',
    '59' => 'Bachelor of Science in Entrepreneurship',
    '62' => 'Bachelor of Science in Environmental and Sanitary Engineering',
    '248' => 'Bachelor of Science in Environmental Planning',
    '164' => 'Bachelor of Science in Exercise & Sports Science',
    '100' => 'Bachelor of Science in Financial and Management Accounting',
    '73' => 'Bachelor of Science in Financial Management',
    '116' => 'Bachelor of Science in Forensic Accounting',
    '106' => 'Bachelor of Science in Geodetic Engineering',
    '68' => 'Bachelor of Science in Hospitality Management',
    '66' => 'Bachelor of Science in Hotel & Restaurant Management',
    '247' => 'Bachelor of Science in Industrial Security Management',
    '122' => 'Bachelor of Science in Information & Computer Science',
    '123' => 'Bachelor of Science in Information Management',
    '72' => 'Bachelor of Science in Information Systems',
    '70' => 'Bachelor of Science in Information Technology',
    '338' => 'Bachelor of Science in Internal Auditing',
    '53' => 'Bachelor of Science in Legal Management',
    '117' => 'Bachelor of Science in Management Accounting',
    '107' => 'Bachelor of Science in Mechanical Engineering',
    '337' => 'Bachelor of Science in Mechatronics Engineering',
    '77' => 'Bachelor of Science in Midwifery',
    '76' => 'Bachelor of Science in Nursing',
    '96' => 'Bachelor of Science in Office Administration',
    '51' => 'Bachelor of Science in Psychology',
    '118' => 'Bachelor of Science in Real Estate Management',
    '67' => 'Bachelor of Science in Tourism',
    '119' => 'Bachelor of Science in Tourism Management',
    '78' => 'Bachelor of Secondary Education',
    '245' => 'Bachelor of Secondary Education',
    '154' => 'Bachelor of Special Needs Education',
    '342' => 'CPA Refresher',
    '110' => 'Default Course',
    '131' => 'Default Course CAS',
    '129' => 'Default Course CBA',
    '133' => 'Default Course CCJE',
    '130' => 'Default Course CEA',
    '134' => 'Default Course CHTM',
    '127' => 'Default Course CITCS',
    '136' => 'Default Course CLAW',
    '128' => 'Default Course COA',
    '135' => 'Default Course CON',
    '132' => 'Default Course CTE',
    '138' => 'Default Course TECH',
    '141' => 'Juris Doctor',
    '239' => 'Juris Doctor - Non-Thesis',
    '272' => 'Bachelor of Arts',
    '277' => 'Bachelor of Elementary Education',
    '278' => 'Bachelor of Elementary Education',
    '286' => 'Bachelor of Science in Business Administration',
    '287' => 'Bachelor of Science in Business Administration',
    '290' => 'Bachelor of Science in Commerce',
    '296' => 'Bachelor of Science in Commercial Education',
    '268' => 'Bachelor of Science in Computer Science',
    '269' => 'Bachelor of Science in Computer Science',
    '298' => 'Bachelor of Science in Education',
    '299' => 'Bachelor of Science in Education',
    '300' => 'Bachelor of Science in Elementary Education',
    '301' => 'Bachelor of Science in Elementary Education',
    '302' => 'Bachelor of Science in Foreign Service',
    '303' => 'Bachelor of Science in Industrial Education',
    '270' => 'Bachelor of Science in Information & Computer Science',
    '304' => 'Bachelor of Science in Information Systems',
    '305' => 'Bachelor of Science in Information Technology',
    '306' => 'Bachelor of Science in Mathematics',
    '307' => 'Bachelor of Science in Medical Technology',
    '308' => 'Bachelor of Science in Public Administration',
    '309' => 'Bachelor of Science in Secondary Education',
    '310' => 'Bachelor of Science in Secretarial Administration',
    '311' => 'Bachelor of Secondary Education',
    '312' => 'Bachelor of Secondary Education'
];

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
    $expertise = mysqli_real_escape_string($con, $_POST['expertise']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

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
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "INSERT INTO Student (FirstName, LastName, DateOfBirth, Email, Phone, Course) VALUES ('$firstname', '$lastname', '$dob', '$email', '$phone', '$degree_value')";

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
    $instructor_fname = mysqli_real_escape_string($con, $_POST['instructor_fname']);
    $instructor_lname = mysqli_real_escape_string($con, $_POST['instructor_lname']);
    $instructor_dob = mysqli_real_escape_string($con, $_POST['instructor_dob']);
    $instructor_email = mysqli_real_escape_string($con, $_POST['instructor_email']);
    $instructor_phone = mysqli_real_escape_string($con, $_POST['instructor_phone']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "INSERT INTO Instructor (FirstName, LastName, DateOfBirth, Email, Phone, degree) VALUES ('$instructor_fname', '$instructor_lname', '$instructor_dob', '$instructor_email', '$instructor_phone', '$degree_value')";

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

if(isset($_POST['save_course']))
{
    $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
    $course_desc = mysqli_real_escape_string($con, $_POST['course_desc']);
    $course_units = mysqli_real_escape_string($con, $_POST['course_units']);
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $query = "INSERT INTO Course (course_name, course_desc, course_units, instructor_id) VALUES ('$course_name', '$course_desc', '$course_units', $instructor_id)";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Course Created Successfully";
        header("Location: Course.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Created";
        header("Location: Course.php");
        exit(0);
    }
}
if(isset($_POST['delete_instructor']))
{
    $instructor_id = mysqli_real_escape_string($con, $_POST['delete_instructor']);

    $query = "DELETE FROM Instructor WHERE instructor_id='$instructor_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Instructor Deleted Successfully";
        header("Location: Instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Instructor Not Deleted";
        header("Location: Instructor.php");
        exit(0);
    }
}
if(isset($_POST['update_instructor']))
{
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $expertise = mysqli_real_escape_string($con, $_POST['expertise']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "UPDATE Instructor SET FirstName='$fname', LastName='$lname', Email='$email', Phone='$phone', degree= '$degree_value' WHERE instructor_id='$instructor_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Instructor Updated Successfully";
        header("Location: Instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Instructor Not Updated";
        header("Location: Instructor.php");
        exit(0);
    }
}

if(isset($_POST['delete_course']))
{
    $courseID = mysqli_real_escape_string($con, $_POST['delete_course']);

    $query = "DELETE FROM Course WHERE course_id='$courseID'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Course Deleted Successfully";
        header("Location: Course.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Deleted";
        header("Location: Course.php");
        exit(0);
    }
}

if(isset($_POST['update_course']))
{
    $course_id = mysqli_real_escape_string($con, $_POST['course_id']);

    $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
    $course_desc = mysqli_real_escape_string($con, $_POST['course_desc']);
    $course_units = mysqli_real_escape_string($con, $_POST['course_units']);
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $query = "INSERT INTO Course (course_name, course_desc, course_units, instructor_id) VALUES ('$course_name', '$course_desc', '$course_units', $instructor_id)";
    $query = "UPDATE Course SET course_name='$course_name', course_desc='$course_desc', course_units='$course_units', instructor_id='$instructor_id' WHERE course_id='$course_id'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Course Created Successfully";
        header("Location: Course.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Created";
        header("Location: Course.php");
        exit(0);
    }
}

?>
