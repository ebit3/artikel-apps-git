<?php

require_once '../controller/fungsi.php';

session_start();

unset($_SESSION['profile']);
unset($_SESSION['status_admin_login']);

header('location:../auth/login.php');
