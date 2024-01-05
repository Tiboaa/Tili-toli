<?php

if (isset($_POST["submit"])) {
    echo "It works";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if (emptyInputRegister($name, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidUid($name) !== false) {
        header("location: ../register.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../register.php?error=pwdnomatch");
        exit();
    }
    /*if (pwdShort($pwd) !== false) {
        header("location: ../register.php?error=pwdshort");
        exit();
    }*/
    if (uidExists($conn, $name, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }
    

    createUser($conn, $name, $email, $pwd);

}
else {
    header("location: ../register.php");
    exit();
}