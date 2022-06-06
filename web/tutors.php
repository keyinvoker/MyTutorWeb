<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
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
                    Profile
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
            include('../php/dbconnect.php');

            $limit = 10;
            $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
            $pageStart = ($page - 1) * $limit;
            $query = "SELECT * FROM tbl_tutors LIMIT $pageStart, $limit";
            $result = $conn->query($query);
            $sql = $conn->query("SELECT count(subject_id) AS id FROM tbl_subjects")->fetch_assoc();
            $allRecords = $sql['id'];
            $totalPages = ceil($allRecords / $limit);
            $prev = $page - 1;
            $next = $page + 1;

            while ($rows = mysqli_fetch_assoc($result)) {
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

        <!-- <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> -->

        <nav>
            <ul class="pagination">
                <li><a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo " ?page=" . $prev;
                                                } ?>">Prev</a>
                </li>
                <?php for ($a = 1; $a <= $totalPages; $a++) : ?>
                    <li><a class="page-link" href="tutors.php?page=<?= $a; ?>"><?= $a; ?></a>
                    </li>
                <?php endfor; ?>
                <li><a class="page-link" href="<?php if ($page >= $totalPages) {
                                                    echo '#';
                                                } else {
                                                    echo " ?page=" . $next;
                                                } ?>">Next</a>
                </li>
            </ul>
        </nav>

    </main>


    <?php include('../layout/footer.php'); ?>

</body>

</html>