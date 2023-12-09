<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Course Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Course 
                            <a href="Course.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Course Name</label>
                                <input type="text" name="course_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Course Description</label>
                                <input type="text" name="course_desc" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Total Units</label>
                                <input type="number" name="course_units" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor ID</label>
                                <input type="number" name="instructor_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_course" class="btn btn-primary">Save Student</button>
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
