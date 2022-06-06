<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/database.css">
    <link rel="icon" href="../assets/images/sleepy-office-worker.png">
    <title>MyTutor Tutors</title>
</head>

<body>

    <?php include('../layout/header.php'); ?>
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
                <a href="./tutors.php" class="button-active">Tutors</a>
            </li>
            <li>
                <a href="./subjects.php">Subjects</a>
            </li>
        </ul>
    </nav>


    <main>
        <h1 class="table-title">Tutors</h1>
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Image
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Description
                </th>
            </tr>
            <?php
            include_once('../php/dbconnect.php');
            $query = "SELECT * FROM tbl_tutors";
            $queryResult = $conn->query($query);

            while ($rows = mysqli_fetch_assoc($queryResult)) {
                echo '
                <tr>
                    <td>'
                    . $rows['tutor_id'] . '
                    </td>
                    <td>
                        <img class="img-db" src="../assets/tutors/' . $rows['tutor_id'] . '.jpg" alt="">
                    </td>
                    <td>
                    '
                    . $rows['tutor_name'] .
                    '</td>
                    <td>'
                    . $rows['tutor_email'] .
                    '</td>
                    <td>'
                    . $rows['tutor_phone'] .
                    '</td>
                    <td>'
                    . $rows['tutor_description'] .
                    '</td>
                </tr>';
            }
            ?>
        </table>
    </main>


    <?php include('../layout/footer.php'); ?>

</body>

</html>