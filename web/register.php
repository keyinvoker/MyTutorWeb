<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="icon" href="../assets/images/sleepy-office-worker.png">
    <title>MyTutor</title>
</head>

<body>

    <header>
        <div class="header-text">
            <h2><i>Welcome to</i></h2>
            <img class="header-logo" src="../assets/images/sleepy-office-worker.png" alt="">
            <a href="./home.html">
                <h2><span><i>MyTutor</i></span></h2>
            </a>
        </div>
    </header>

    <nav>
        <ul>
            <li>
                <a href="./home.html">Home</a>
            </li>
            <li class="dropdown" class="button-active">
                <a href="#">Account</a>
                <ul class="dropdown-items">
                    <li>
                        <a href="./login.html">Login</a>
                    </li>
                    <li>
                        <a href="./register.php" class="button-active">Register</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" disabled="disabled">Schedule</a>
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
                            <input type="password" name="password" id="password" placeholder="Min. 8 characters">
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

                <div>

                    <?php
                    if (isset($GET['errorMsg'])) {
                        $error = $_GET['errorMsg'];
                        echo '<p class="error"> ERROR: ', $error, '</p>';
                    }
                    ?>

                </div>

            </form>
        </div>

    </main>


    <footer>
        <div class="footer-info">
            <div class="joerio">
                <img src="../assets/images/joerio.jpg" alt="">
            </div>

            <div class="socmed-card">
                <div class="socmed">
                    <a href="https://instagram.com/joer.io" target="_blank">
                        <img src="../assets/images/instagram.png" alt="INSTAGRAM">
                    </a>
                    <a href="https://linkedin.com/in/joerio-christo-chandra-707a051b9/" target="_blank">
                        <img src="../assets/images/linkedin.png" alt="LinkedIn">
                    </a>
                    <a href="https://github.com/keyinvoker" target="_blank">
                        <img src="../assets/images/github.png" alt="GitHub">
                    </a>
                </div>
            </div>
        </div>

        <div class="copyright">
            Copyright &copy; 2022 Joerio Christo Chandra (702302)
        </div>
    </footer>
</body>

</html>