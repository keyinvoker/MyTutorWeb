<?php
session_start();
if (isset($_SESSION['email'])) {
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
    <title>MyTutor Register</title>
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
                        <a href="./login.php">Login</a>
                    </li>
                    <li>
                        <a href="./register.php" class="button-active">Register</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Schedule</a>
            </li>
            <li>
                <a href="#">Order</a>
            </li>
        </ul>
    </nav>


    <main>
        <h3>Register your new <span class="myTutor"><b><i>MyTutor</i></b></span> account</h3>
        <div class="card">
            <form action="../php/new_user.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label for="">Name:</label>
                        </td>
                        <td>
                            <input type="text" name="name" id="name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Phone:</label>
                        </td>
                        <td>
                            <input type="text" name="phone" id="phone">
                        </td>
                    </tr>
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
                            <input type="password" name="password" id="password" placeholder="min. 8 characters">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Confirm Password:</label>
                        </td>
                        <td>
                            <input type="password" name="password2" id="password2">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Address:</label>
                        </td>
                        <td>
                            <textarea name="address" id="address" cols="20" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Image:</label>
                        </td>
                        <td>
                            <input type="file" name="image" id="image">
                        </td>
                    </tr>
                </table>
                <center>
                    <button class="form-button" type="submit">REGISTER</button>
                </center>
                <div clas="text-attention">
                    Already have an account? <a href="./login.php">Login</a>
                </div>

                <div>

                    <?php
                    if (isset($GET['errorMsg'])) {
                        $error = $_GET['errorMsg'];
                        echo 'alert("ERROR: ' . $error . '")';
                    }
                    ?>

                </div>

            </form>
        </div>

    </main>


    <?php include '../layout/footer.php' ?>
</body>

</html>