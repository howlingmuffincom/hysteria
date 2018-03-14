<?php
session_start();
if(isset($_SESSION['login'])) {
    if($_SESSION['login'] == 1) {
        //echo 'Success. You will now be forwarded.';
        header('Location: /hysteria');
    }
}