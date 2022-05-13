<?php

require_once '../controller/fungsi.php';

$id = $_GET['id'];

if (drop_artikel($id) > 0) {

    return true;
} else {

    return false;
}
