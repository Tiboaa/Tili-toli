<?php
    include_once 'header.php';
?>
    <a id ="vissza" href="index.php">Vissza</a>
    <h1>Top 10 Highscores</h1>

    <?php
    include_once "includes/dbh_inc.php";

    $queryScore3 = "SELECT usersName, usersScore3, FIND_IN_SET(usersScore3, (SELECT GROUP_CONCAT(DISTINCT usersScore3 ORDER BY usersScore3 DESC) FROM users)) AS rank3 FROM users ORDER BY usersScore3 DESC LIMIT 10";
    $resultScore3 = mysqli_query($conn, $queryScore3);

    if (!$resultScore3) {
        die("Query failed: " . mysqli_error($conn));
    }

    $queryScore4 = "SELECT usersName, usersScore4, FIND_IN_SET(usersScore4, (SELECT GROUP_CONCAT(DISTINCT usersScore4 ORDER BY usersScore4 DESC) FROM users)) AS rank4 FROM users ORDER BY usersScore4 DESC LIMIT 10";
    $resultScore4 = mysqli_query($conn, $queryScore4);

    if (!$resultScore4) {
        die("Query failed: " . mysqli_error($conn));
    }

    $queryScore5 = "SELECT usersName, usersScore5, FIND_IN_SET(usersScore5, (SELECT GROUP_CONCAT(DISTINCT usersScore5 ORDER BY usersScore5 DESC) FROM users)) AS rank5 FROM users ORDER BY usersScore5 DESC LIMIT 10";
    $resultScore5 = mysqli_query($conn, $queryScore5);

    if (!$resultScore5) {
        die("Query failed: " . mysqli_error($conn));
    }
    ?>


    <h2>UsersScore3</h2>
    <table id="table" border="1">
        <tr>
            <th>Rank</th>
            <th>User</th>
            <th>Score 3</th>
        </tr>
        <?php
        $rank3 = 1;
        while ($row = mysqli_fetch_assoc($resultScore3)) {
            echo "<tr>";
            echo "<td>" . $rank3 . "</td>";
            echo "<td>" . $row['usersName'] . "</td>";
            echo "<td>" . $row['usersScore3'] . "</td>";
            echo "</tr>";
            $rank3++;
        }
        ?>
    </table>

    <h2>UsersScore4</h2>
    <table id="table" border="1">
        <tr>
            <th>Rank</th>
            <th>User</th>
            <th>Score 4</th>
        </tr>
        <?php
        $rank4 = 1;
        while ($row = mysqli_fetch_assoc($resultScore4)) {
            echo "<tr>";
            echo "<td>" . $rank4 . "</td>";
            echo "<td>" . $row['usersName'] . "</td>";
            echo "<td>" . $row['usersScore4'] . "</td>";
            echo "</tr>";
            $rank4++;
        }
        ?>
    </table>

    <h2>UsersScore5</h2>
    <table id="table" border="1">
        <tr>
            <th>Rank</th>
            <th>User</th>
            <th>Score 5</th>
        </tr>
        <?php
        $rank5 = 1;
        while ($row = mysqli_fetch_assoc($resultScore5)) {
            echo "<tr>";
            echo "<td>" . $rank5 . "</td>";
            echo "<td>" . $row['usersName'] . "</td>";
            echo "<td>" . $row['usersScore5'] . "</td>";
            echo "</tr>";
            $rank5++;
        }
        ?>
    </table>
</body>
</html>
