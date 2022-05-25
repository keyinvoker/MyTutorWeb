<?php
if (isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);


    include_once("dbconnect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $phone = $_POST['phone'];
    $name = addslashes($_POST['name']);
    $address = addslashes($_POST['address']);
    $image = $_FILES['image']['name'];
    $msg;


    // validation
    if (empty($email) || empty($password) || empty($password2) || empty($phone) || empty($name) || empty($address) || empty($image)) {
        $msg = 'Fill in all the fields!';
    } else if (strlen($password) < 8) {
        $msg = 'Password needs to be 8 characters long!';
    } else if ($password != $password2) {
        $msg = 'Password does not match the confirmation!';
    } else if (is_numeric($phone) < 8) {
        $msg = 'Please enter a valid mobile phone number!';
    } else {

        // validation: succesful!

        $password = hash('sha256', $password);

        $sqlinsert = "INSERT INTO `users`(`email`, `password`, `name`, `phone`, `address`, `image`) VALUES ('$email','$password','$name','$phone', '$address', '$image')";

        if ($conn->query($sqlinsert) === TRUE) {
            $response = array('status' => 'success', 'data' => null);
            $filename = mysqli_insert_id($conn);
            // $decoded_string = base64_decode($base64image);
            $path = '../assets/images/' . $filename . '.png';
            $is_written = file_put_contents($path, $_FILES['image']);
            header('Location: ../web/home.html');
        } else {
            $response = array('status' => 'failed', 'data' => null);
            header('Location: ../web/register.php');
        }
    }
    echo "<script>window.location.replace('../web/register.php?errorMsg=$msg')</script>";
}
