<?php
session_start();
include_once '../../hysteria_db/Class.DatabaseEngine.php';
$db = new DatabaseEngine();

$password = $_POST['password'];
$password_encrypted = sha1($password);

$error = 0;

$sql = "
SELECT * FROM `user`
WHERE   `username` = '" . $_POST['username'] . "'
AND     `sha1pw`  = '" . $password_encrypted . "'
AND     `username` != ''
AND     `sha1pw`  != ''
    ";

$result = $db->query($sql);
$data = $db->getObjectList($result);

if (mysqli_num_rows($result) != 0) {


    foreach ($data as $value) {
        if ($value->active == 1) {
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $value->username;
            $error = 1;
        }
        else {
            header("Location: reg.php?error=129");
        }
    }
}


if ($error == 1) {
    $_SESSION["user"] = $_REQUEST["username"];
    header("Location: index.php");
} else {
    header("Location: reg.php?error=1");
}