<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>
   <?php
   /*
   //DROPPING TABLE
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         printf('Connected successfully.<br />');

         if ($mysqli->query("Drop DATABASE Bombarda_Database")) {
            printf("Database Bombarda_Database dropped successfully.<br />");
         }
         if ($mysqli->errno) {
            printf("Could not drop database: %s<br />", $mysqli->error);
         }
         $mysqli->close();
         */
      ?>

      
    <?php
        /*
        //CREATING TABLE  
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'Bombarda_Database';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         printf('Connected successfully.<br />');
   
         $sql = "CREATE TABLE Students( ".
            "studId INT NOT NULL AUTO_INCREMENT, ".
            "lastName VARCHAR(255) NOT NULL, ".
            "middleName VARCHAR(255) NOT NULL, ".
            "firstName VARCHAR(255) NOT NULL, ".
            "PRIMARY KEY ( studId )); ";
         if ($mysqli->query($sql)) {
            printf("Table Students created successfully.<br />");
         }
         if ($mysqli->errno) {
            printf("Could not create table: %s<br />", $mysqli->error);
         }

         $mysqli->close();
         */
      ?>


      <?php
      /*
      //SELECTING TABLE
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

      if(! $conn ) {
         die('Could not connect: ' . mysqli_error($conn));
      }
      echo 'Connected successfully<br />';
      $retval = mysqli_select_db( $conn, 'Bombarda_Database' );
      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
      echo "Database Bombarda_Database selected successfully\n";
      mysqli_close($conn);
    */
      ?>

      <?php
      //Add New Record in MySQL Database
         if(isset($_POST['add'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'Bombarda_Database';
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
         
            if($mysqli->connect_errno ) {
               printf("Connect failed: %s<br />", $mysqli->connect_error);
               exit();
            }
            printf('Connected successfully.<br />');

            if(! get_magic_quotes_gpc() ) {
               $tutorial_title = addslashes ($_POST['Students']);
               $tutorial_author = addslashes ($_POST['By:Lhorexcel Bombarda']);
            } else {
               $tutorial_title = $_POST['Students'];
               $tutorial_author = $_POST['By:Lhorexcel Bombarda'];
            }

            $submission_date = $_POST['submission_date'];
            $sql = "INSERT INTO Students ".
               "(tutorial_title,tutorial_author, submission_date) "."VALUES ".
               "('$tutorial_title','$tutorial_author','$submission_date')";
           
            if ($mysqli->query($sql)) {
               printf("Record inserted successfully.<br />");
            }
            if ($mysqli->errno) {
               printf("Could not insert record into table: %s<br />", $mysqli->error);
            }
            $mysqli->close();
         } else {
      ?>  
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Tutorial Title</td>
               <td><input name = "tutorial_title" type = "text" id = "tutorial_title"></td>
            </tr>         
            <tr>
               <td width = "250">Tutorial Author</td>
               <td><input name = "tutorial_author" type = "text" id = "tutorial_author"></td>
            </tr>         
            <tr>
               <td width = "250">Submission Date [   yyyy-mm-dd ]</td>
               <td><input name = "submission_date" type = "text" id = "submission_date"></td>
            </tr>      
            <tr>
               <td width = "250"> </td>
               <td></td>
            </tr>         
            <tr>
               <td width = "250"> </td>
               <td><input name = "add" type = "submit" id = "add"  value = "Add Tutorial"></td>
            </tr>
         </table>
      </form>
   <?php
      }
   ?>
      
</body>
</html>