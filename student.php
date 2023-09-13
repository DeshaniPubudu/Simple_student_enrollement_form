<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentName = $_POST['studentname'];
$studentRegister = $_POST['registernumber'];
$studentContact = $_POST['contactnumber'];
$year = $_POST['year'];
$selectedStream = $_POST['selectedstream'];
$selectedSubjects = $_POST['selectedSubjects']; 
$valueadded=false;

$studentInsertQuery = "INSERT INTO details (id, name, reg_num, con_num, year) VALUES ('','$studentName', '$studentRegister', '$studentContact','$year')";
$conn->query($studentInsertQuery);

$studentId = $conn->insert_id;
foreach ($selectedSubjects as $subject) {
    $subjects=intval($subject);
    $subjectInsertQuery = "INSERT INTO Student_subject (S_id, b_id) VALUES ('$studentId', '$subjects')";
    $conn->query($subjectInsertQuery);
    $valueadded=true;
}
if ($valueadded) {
    echo"DATA ADDED SUCCESSFULLY";
}
else{
    echo"DATA ADDED UNSUCCESSFULLY";
}
$conn->close();

?>
