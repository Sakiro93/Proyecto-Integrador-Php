<?php
if (session_id() == '') {
    session_start();
}
if (empty($_SESSION['_USER_'])) {
    header('location:login.php');    
}
$user = $_SESSION['_USER_'];
