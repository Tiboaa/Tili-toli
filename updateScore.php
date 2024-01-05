<?php
session_start();
include_once "includes/dbh_inc.php";

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $turns = $_POST['turns'];
    $rows = $_POST['rows'];
    $usersScore = "usersScore" . $rows;

    $updateScoreQuery = "UPDATE users SET $usersScore = ? WHERE usersId = ? AND ($usersScore = 0 OR $usersScore > ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $updateScoreQuery)) {
        echo "SQL error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "iii", $turns, $userid, $turns);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Score updated successfully!";
        } else {
            echo "Game is not completed yet or $usersScore is less than or equal to $turns.";
        }
    }
} else {
    echo "User is not logged in.";
}
?>
