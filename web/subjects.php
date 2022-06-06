<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/database.css">
    <link rel="icon" href="../assets/images/sleepy-office-worker.png">
    <title>MyTutor Subjects</title>
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
                <a href="./tutors.php">Tutors</a>
            </li>
            <li>
                <a href="./subjects.php" class="button-active">Subjects</a>
            </li>
        </ul>
    </nav>


    <main>
        <h1 class="table-title">Subjects</h1>
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Image
                </th>
                <th>
                    Subject
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price
                </th>
                <th>
                    Tutor
                </th>
            </tr>

            <?php
            include_once('../php/dbconnect.php');
            $query = "SELECT *
                      FROM tbl_subjects ts
                      JOIN tbl_tutors tt
                      ON tt.tutor_id = ts.tutor_id
                      ";
            $queryResult = $conn->query($query);

            while ($rows = mysqli_fetch_assoc($queryResult)) {
                echo '
                <tr>
                    <td>'
                    . $rows['subject_id'] . '
                    </td>
                    <td>
                        <img class="img-db" src="../assets/courses/' . $rows['subject_id'] . '.png"></img>
                    </td>
                    <td>'
                    . $rows['subject_name'] .
                    '</td>
                    <td>'
                    . $rows['subject_description'] .
                    '</td>
                    <td>'
                    . $rows['subject_price'] .
                    '</td>
                    <td class="cell-tutor">
                        <img class="img-db" src="../assets/tutors/' . $rows['tutor_id'] . '.jpg" alt="">
                    '
                    . $rows['tutor_name'] .
                    '</td>
                </tr>';
            }
            ?>
        </table>
    </main>


    <?php include('../layout/footer.php'); ?>

</body>

</html>