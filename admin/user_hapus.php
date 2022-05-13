<?php

require_once '../controller/fungsi.php';

$id = $_GET['id'];

if (drop_user($id) > 0) {

    return true;
} else {

    return false;
}
