<?php

if (isset($_POST["submit"])) {
    echo "It works";

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if (emptyInputLogin($username, $pwd,) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}