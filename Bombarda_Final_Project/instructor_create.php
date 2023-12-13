<?php
    session_start();
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
                        <h4>Instructor Add 
                            <a href="Instructor.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="instructor_fname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="instructor_lname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="instructor_dob" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="instructor_email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="instructor_phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="expertiseSelect" class="form-label">Expertise</label>
                                <select name="course_index" onchange="ReloadCourseIndex();">
                                <option value="">Select Expertise</option>
                    
                                    <option value="162">BACHELOR  OF PHYSICAL EDUCATION</option>
                                    <option value="163">BACHELOR  OF SCIENCE IN COMPUTER SCIENCE</option>
                                    <option value="148">BACHELOR  OF SCIENCE IN TOURISM MANAGEMENT</option>
                                    <option value="146">BACHELOR OF  SCIENCE IN HOSPITALITY MANAGEMENT</option>
                                    <option value="105">BACHELOR OF ARTS</option>
                                    <option value="144">BACHELOR OF ARTS IN BEHAVIORAL SCIENCE</option>
                                    <option value="95">BACHELOR OF ARTS IN COMMUNICATION</option>
                                    <option value="55">BACHELOR OF ARTS IN ENGLISH</option>
                                    <option value="145">BACHELOR OF ARTS IN ENGLISH LANGUAGE STUDIES</option>
                                    <option value="49">BACHELOR OF ARTS IN MASS COMMUNICATION</option>
                                    <option value="50">BACHELOR OF ARTS IN POLITICAL SCIENCE</option>
                                    <option value="155">BACHELOR OF CULTURE AND ARTS EDUCATION</option>
                                    <option value="156">BACHELOR OF EARLY CHILDHOOD EDUCATION</option>
                                    <option value="79">BACHELOR OF ELEMENTARY EDUCATION</option>
                                    <option value="249">BACHELOR OF FINE ARTS</option>
                                    <option value="151">BACHELOR OF FORENSIC SCIENCE</option>
                                    <option value="81">BACHELOR OF LAWS</option>
                                    <option value="340">BACHELOR OF LIBRARY AND INFORMATION SCIENCE</option>
                                    <option value="353">BACHELOR OF MULTIMEDIA ARTS</option>
                                    <option value="115">BACHELOR OF PHYSICAL EDUCATION</option>
                                    <option value="114">BACHELOR OF PUBLIC ADMINISTRATION</option>
                                    <option value="57">BACHELOR OF SCIENCE IN ACCOUNTANCY</option>
                                    <option value="165">BACHELOR OF SCIENCE IN ACCOUNTING INFORMATION SYSTEM</option>
                                    <option value="75">BACHELOR OF SCIENCE IN ACCOUNTING TECHNOLOGY</option>
                                    <option value="108">BACHELOR OF SCIENCE IN AGRICULTURAL ENGINEERING</option>
                                    <option value="63">BACHELOR OF SCIENCE IN ARCHITECTURE</option>
                                    <option value="336">BACHELOR OF SCIENCE IN BIOLOGY</option>
                                    <option value="56">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION</option>
                                    <option value="61">BACHELOR OF SCIENCE IN CIVIL ENGINEERING</option>
                                    <option value="354">BACHELOR OF SCIENCE IN CIVIL ENGINEERING-</option>
                                    <option value="104">BACHELOR OF SCIENCE IN COMMERCE</option>
                                    <option value="65">BACHELOR OF SCIENCE IN COMPUTER ENGINEERING</option>
                                    <option value="69">BACHELOR OF SCIENCE IN COMPUTER SCIENCE</option>
                                    <option value="60">BACHELOR OF SCIENCE IN CRIMINOLOGY</option>
                                    <option value="153">BACHELOR OF SCIENCE IN DATA ANALYTICS</option>
                                    <option value="64">BACHELOR OF SCIENCE IN ELECTRONIC AND COMMUNICATIONS ENGINEERING</option>
                                    <option value="101">BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING</option>
                                    <option value="59">BACHELOR OF SCIENCE IN ENTREPRENEURSHIP</option>
                                    <option value="62">BACHELOR OF SCIENCE IN ENVIRONMENTAL AND SANITARY ENGINEERING</option>
                                    <option value="248">BACHELOR OF SCIENCE IN ENVIRONMENTAL PLANNING</option>
                                    <option value="164">BACHELOR OF SCIENCE IN EXERCISE &amp; SPORTS SCIENCE</option>
                                    <option value="100">BACHELOR OF SCIENCE IN FINANCIAL AND MANAGEMENT ACCOUNTING</option>
                                    <option value="73">BACHELOR OF SCIENCE IN FINANCIAL MANAGEMENT</option>
                                    <option value="116">BACHELOR OF SCIENCE IN FORENSIC ACCOUNTING</option>
                                    <option value="106">BACHELOR OF SCIENCE IN GEODETIC ENGINEERING</option>
                                    <option value="68">BACHELOR OF SCIENCE IN HOSPITALITY MANAGEMENT</option>
                                    <option value="66">BACHELOR OF SCIENCE IN HOTEL &amp; RESTAURANT MANAGEMENT</option>
                                    <option value="247">BACHELOR OF SCIENCE IN INDUSTRIAL SECURITY MANAGEMENT</option>
                                    <option value="122">BACHELOR OF SCIENCE IN INFORMATION &amp; COMPUTER SCIENCE</option>
                                    <option value="123">BACHELOR OF SCIENCE IN INFORMATION MANAGEMENT</option>
                                    <option value="72">BACHELOR OF SCIENCE IN INFORMATION SYSTEMS</option>
                                    <option value="70">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</option>
                                    <option value="338">BACHELOR OF SCIENCE IN INTERNAL AUDITING</option>
                                    <option value="53">BACHELOR OF SCIENCE IN LEGAL MANAGEMENT</option>
                                    <option value="117">BACHELOR OF SCIENCE IN MANAGEMENT ACCOUNTING</option>
                                    <option value="107">BACHELOR OF SCIENCE IN MECHANICAL ENGINEERING</option>
                                    <option value="337">BACHELOR OF SCIENCE IN MECHATRONICS ENGINEERING</option>
                                    <option value="77">BACHELOR OF SCIENCE IN MIDWIFERY</option>
                                    <option value="76">BACHELOR OF SCIENCE IN NURSING</option>
                                    <option value="96">BACHELOR OF SCIENCE IN OFFICE ADMINISTRATION</option>
                                    <option value="51">BACHELOR OF SCIENCE IN PSYCHOLOGY</option>
                                    <option value="118">BACHELOR OF SCIENCE IN REAL ESTATE MANAGEMENT</option>
                                    <option value="67">BACHELOR OF SCIENCE IN TOURISM</option>
                                    <option value="119">BACHELOR OF SCIENCE IN TOURISM MANAGEMENT</option>
                                    <option value="78">BACHELOR OF SECONDARY EDUCATION</option>
                                    <option value="245">BACHELOR OF SECONDARY EDUCATION</option>
                                    <option value="154">BACHELOR OF SPECIAL NEEDS EDUCATION</option>
                                    <option value="141">JURIS DOCTOR</option>
                                    <option value="239">JURIS DOCTOR - NON-THESIS</option>
                                    <option value="272">BACHELOR OF ARTS</option>
                                    <option value="277">BACHELOR OF ELEMENTARY EDUCATION</option>
                                    <option value="278">BACHELOR OF ELEMENTARY EDUCATION </option>
                                    <option value="286">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION</option>
                                    <option value="287">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION </option>
                                    <option value="290">BACHELOR OF SCIENCE IN COMMERCE</option>
                                    <option value="296">BACHELOR OF SCIENCE IN COMMERCIAL EDUCATION</option>
                                    <option value="268">BACHELOR OF SCIENCE IN COMPUTER SCIENCE</option>
                                    <option value="269">BACHELOR OF SCIENCE IN COMPUTER SCIENCE </option>
                                    <option value="298">BACHELOR OF SCIENCE IN EDUCATION</option>
                                    <option value="299">BACHELOR OF SCIENCE IN EDUCATION </option>
                                    <option value="300">BACHELOR OF SCIENCE IN ELEMENTARY EDUCATION</option>
                                    <option value="301">BACHELOR OF SCIENCE IN ELEMENTARY EDUCATION </option>
                                    <option value="302">BACHELOR OF SCIENCE IN FOREIGN SERVICE</option>
                                    <option value="303">BACHELOR OF SCIENCE IN INDUSTRIAL EDUCATION</option>
                                    <option value="270">BACHELOR OF SCIENCE IN INFORMATION &amp; COMPUTER SCIENCE</option>
                                    <option value="304">BACHELOR OF SCIENCE IN INFORMATION SYSTEMS</option>
                                    <option value="305">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</option>
                                    <option value="306">BACHELOR OF SCIENCE IN MATHEMATICS</option>
                                    <option value="307">BACHELOR OF SCIENCE IN MEDICAL TECHNOLOGY</option>
                                    <option value="308">BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION</option>
                                    <option value="309">BACHELOR OF SCIENCE IN SECONDARY EDUCATION</option>
                                    <option value="310">BACHELOR OF SCIENCE IN SECRETARIAL ADMINISTRATION</option>
                                    <option value="311">BACHELOR OF SECONDARY EDUCATION</option>
                                    <option value="312">BACHELOR OF SECONDARY EDUCATION </option> 
                                            
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_instructor" class="btn btn-primary">Save Instructor</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
