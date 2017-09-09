<?php 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$ col1 = $_POST["college1"]; 
$ col2 = $_POST["college2"];
$ course_name = $_POST["course_name"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["college1"])) {
    $colErr = "College is required";
  } else {
    $college1 = test_input($_POST["college1"]);
  }

  if (empty($_POST["college2"])) {
    $colErr = "College is required";
  } else {
    $college2 = test_input($_POST["college2"]);
  }

  if (empty($_POST["course_name"])) {
    $colErr = "Course name is required";
  } else {
    $course_name = test_input($_POST["course1_name"]);
  }



$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE hack";
$sql = "CREATE TABLE College (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name TEXT
)";

$sql = "CREATE TABLE Course (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
col_num INTEGER,
name TEXT,
des TEXT,
sameness INTEGER
)";

$sql = "INSERT INTO College (name)
VALUES ('Carnegie Mellon')";
$sql = "INSERT INTO College (name)
VALUES ('Columbia Uni')";

$sql = "INSERT INTO Course (col_num,name,des,sameness)
VALUES (1,'18-240','System Verilog',1)";
$sql = "INSERT INTO Course (col_num,name,des,sameness)
VALUES (1,'18-213','Computer Systems',3)";
$sql = "INSERT INTO Course (col_num,name,des,sameness)
VALUES (1,'18-220','Logic design',2)";
$sql = "INSERT INTO Course (col_num,name,des,sameness)
VALUES (2,'COL-13C','System Verilog',1)";
$sql = "INSERT INTO Course (col_num,name,des,sameness)
VALUES (2,'COL-12E','Logic design',2)";

mysqli_multi_query($conn,$sql);

$sql = "SELECT id FROM College WHERE name = $college1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$college1_id = data["id"];

$sql = "SELECT (des,sameness) FROM College WHERE col_num == $college1_id AND name = $course1_name";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($resut);
$course1_des = data["des"];
$course1_col_num = data["sameness"]

$sql = "SELECT (name,des,col_num) FROM College WHERE sameness = $course_num";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$course2_des = data["des"];
$course2_name = data["name"];
$course2_col_num = data["col_num"];

mysqli_close($conn);

//return the course2_name and course2_des with college2
?>
