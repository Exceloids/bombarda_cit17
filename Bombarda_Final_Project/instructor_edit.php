<?php
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Information System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ms-3">
        <a class="navbar-brand" href="#">School Information System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Enrollment.php">Enrollment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Student.php">Student Record</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Course.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Instructor.php">Instructors</a>
                </li>
            </ul>
        </div>
    </nav>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Instructor Edit 
                            <a href="Instructor.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $instructor_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM Instructor WHERE instructor_id ='$instructor_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $instructor = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="instructor_id" value="<?= $instructor['instructor_id']; ?>">

                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="<?= $instructor['FirstName']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="<?= $instructor['LastName']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?= $instructor['Email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?= $instructor['Phone']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="expertiseSelect" class="form-label">Expertise</label>
                                        <select name="course_index" onchange="ReloadCourseIndex();">
                                        <option value="<?= $instructor['degree']; ?>">Select Expertise</option>
                                        <?php
                                            $degree_map = array(
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
                                            );

                                            foreach ($degree_map as $value => $degree) {
                                                $selected = ($instructor['degree'] == $degree) ? 'selected' : '';
                                                echo "<option value=\"$value\" $selected>$degree</option>";
                                            }                                            
                                                                                        
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_instructor" class="btn btn-primary">
                                            Update Instructor
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
