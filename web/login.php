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
    <script src="../script/rememberMe.js"></script>
    <link rel="icon" href="../assets/images/sleepy-office-worker.png">
    <title>MyTutor Login</title>
</head>

<body>

    <?php include '../layout/header.php' ?>
    <nav>
        <ul>
            <li>
                <a href="./home.php">Home</a>
            </li>
            <li class="dropdown">
                <a href="./account.php" class="button-active">Account</a>
                <ul class="dropdown-items">
                    <li>
                        <a href="./login.php" class="button-active">Login</a>
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


    <main>
        <p>Login to your <span class="myTutor"><b><i>MyTutor</i></b></span> account</p>
        <div class="card">
            <form action="../php/login_user.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label for="">Email:</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Password:</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <input type="checkbox" value="lsRememberMe" id="rememberMe">
                        </td>
                        <td>
                            <label for="rememberMe">Remember me</label>
                        </td>
                    </tr>

                </table>
                <center>
                    <button class="form-button" type="submit" onclick="lsRememberMe()">LOGIN</button>
                    <div class="text-attention">
                        <!-- Forgot password? <a href="#">Get help</a>
                        <br> -->
                        <br>
                        Do not have an account? <a href="./register.php">Register</a>
                    </div>
                </center>
            </form>
        </div>
    </main>


    <?php include '../layout/footer.php' ?>
</body>

</html>