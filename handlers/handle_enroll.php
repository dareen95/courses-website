<?php
session_start();
$errors = [];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursegator";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $spec = $_POST['spec'];
    $course_id = $_POST['course_id'];
    //validation

    // $errors=[];
    //name: required  max255 string
    if (empty($name)) {
        $errors[] = "name is required";
    } elseif (!is_string($name) or is_numeric($name)) {
        $errors[] = "name  muust be  string";
    } elseif (strlen($name) > 255) {
        $errors[] = "name  muust be  maximun 255";
    }
    //email: required  max255 string
    if (empty($email)) {
        $errors[] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email is not validate";
    } elseif (strlen($email) > 255) {
        $errors[] = "email length  muust be  maximun 255";
    }
    //phone: required  max255 string
    if (empty($phone)) {
        $errors[] = "name is required";
    } elseif (!is_string($phone)) {
        $errors[] = "phone muust be  string";
    } elseif (strlen($phone) > 255) {
        $errors[] = "phone length  muust be  maximun 255";
    }
    //spec: required  max255 string
    if (empty($spec)) {
        $errors[] = "spect name is required";
    } elseif (!is_string($spec)) {
        $errors[] = "spect  must be  string";
    } elseif (strlen($spec) > 255) {
        $errors[] = "spect  must be  maximun 255";
    }
    //course_id: required  in
    if (empty($course_id)) {
        $errors[] = " course_id is required";
    }
    if (empty($errors)) {
        // insert data to reservation erors
        $sql = "INSERT INTO reservations (name, email, phone, spec, course_id) VALUES ('$name', '$email', '$phone', '$spec' , $course_id)";
        mysqli_query($conn, $sql);
        header("location: ../enroll.php");

        if (mysqli_query($conn, $sql) == true) {
            //redirct  back with success massage
            $_SESSION['success'] = "you enrolled to the  course  successfully";
        } else {
            $_SESSION['queryERROR'] = "error happened will storing please try again";
        }



        mysqli_close($conn);
    } else {
        $_SESSION['errors'] = $errors;
         //redirct  back with success massage
       
    }
    header("location: ../enroll.php");
}
var_dump($errors);
die();
