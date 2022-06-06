<?php
session_start();

if (isset($_SESSION['email'])) {
    echo "<script>alert('You are already logged in.')</script>";
    header('Location: ./home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="icon" href="../assets/images/sleepy-office-worker.png">
    <title>MyTutor Forgot</title>
</head>

<body>

    <?php include '../layout/header.php' ?>
    <nav>
        <ul>
            <li>
                <a href="./home.php">Home</a>
            </li>
            <li class="dropdown">
                <a href="./account.php">Account</a>
                <ul class="dropdown-items">
                    <li>
                        <a href="./login.php">Login</a>
                    </li>
                    <li>
                        <a href="./register.php">Register</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./tutors.php">Tutors</a>
            </li>
            <li>
                <a href="./subjects.php">Subjects</a>
            </li>
        </ul>
    </nav>

    <?php include '../layout/footer.php' ?>
</body>

</html>