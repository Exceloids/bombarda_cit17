<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bombarda_cit17_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
?>
<?php
    //CREATING TABLE  
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'bombarda_cit17_database';
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
?>
</body>
</html>