<?php
session_start();

// if (!isset($_SESSION['email'])) {
//     echo "<script>alert('You currently not logged in')";
//     header("Location: ./login.php");
// }
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
    <title>MyTutor Account</title>
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
                        <a href="./register.php">Register</a>
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
        <?php
        if (isset($_SESSION['email'])) {
            echo '
            <div class="card">
                <form action="../php/logout.php">
                    <center>
                        <img src="" alt="profile">
                    </center>

                    <table>
                        <tr>
                            <td>Name:</td>
                            <td>' . $_SESSION["name"] . '</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>' . $_SESSION["email"] . '</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>' . $_SESSION["address"] . '</td>
                        </tr>
                    </table>
    
                    <center>
                        <button class="form-button" type="submit">LOGOUT</button>
                    </center>
                </form>
            </div>
            ';
        } else {
        }
        ?>
    </main>


    <?php include '../layout/footer.php' ?>
</body>

</html>