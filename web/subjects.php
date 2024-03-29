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
    <link rel="stylesheet" href="../css/searchbar.css">
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

        <div class="searchbar">
            <div class="searchbar-field">
                <form action="./subjects.php" class="searchbar-input" method="POST">
                    <input type="text" placeholder="Search..." name="search">
                    <button class="searchbar-btn" type="submit">
                        <img class="searchbar-btn-img" src="../assets/images/purple-magnifying-glass.png" alt="search">
                    </button>
                </form>
            </div>
        </div>

        <h1 class="table-title">Subjects</h1>
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Thumbnail
                </th>
                <th>
                    Subject
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price (MYR)
                </th>
                <th>
                    Rating
                </th>
                <th>
                    Tutor
                </th>
            </tr>
            <?php
            include('../php/dbconnect.php');

            $limit = 5;
            $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
            $pageStart = ($page - 1) * $limit;
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $query = "SELECT *
                        FROM tbl_subjects ts
                        JOIN tbl_tutors tt
                        ON ts.tutor_id = tt.tutor_id
                        WHERE ts.subject_name LIKE '%$search%'
                            OR tt.tutor_name LIKE '%$search%'
                            OR ts.subject_description LIKE '%$search%'
                        ";
            } else {
                $query = "SELECT *
                        FROM tbl_subjects ts
                        JOIN tbl_tutors tt
                        ON ts.tutor_id = tt.tutor_id
                        ";
            }
            $result = $conn->query($query);
            // $sql = $conn->query("SELECT count(subject_id) AS id FROM tbl_subjects")->fetch_assoc();
            // $allRecords = $sql['id'];
            $allRecords = $result->num_rows;
            $totalPages = ceil($allRecords / $limit);
            $query = $query . "LIMIT $pageStart, $limit";

            $result = $conn->query($query);
            $prev = $page - 1;
            $next = $page + 1;

            while ($rows = mysqli_fetch_assoc($result)) {
                echo '
                <tr>
                    <td>'
                    . $rows['subject_id'] . '
                    </td>
                    <td>
                        <img class="img-db" src="../assets/subjects/' . $rows['subject_id'] . '.jpg"></img>
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
                    <td>
                    🌟 ' . $rows['subject_rating'] .
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

        <!-- <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="?page=2">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> -->

        <!-- TODO: fix pagination of search results -->
        <nav>
            <ul class="pagination">
                <li><a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo " ?page=" . $prev;
                                                } ?>">Prev</a>
                </li>
                <?php for ($a = 1; $a <= $totalPages; $a++) : ?>
                    <li><a class="page-link" href="subjects.php?page=<?= $a; ?>"><?= $a; ?></a>
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