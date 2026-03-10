<?php
define("WEBROOT","http://localhost:8000/");
require_once __DIR__ . "/other/header.php";

$page = 'article';
if(isset($_GET['page'])){
    $page = $_GET['page'];
}

