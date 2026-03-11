<?php
define("WEBROOT","http://localhost:8000/");
require_once __DIR__ . "/other/header.php";

$page = 'article';
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
if($page == 'article'){
    require_once ("view/article.php");
}elseif($page == 'ajout-article'){
    require_once("view/ajout-article.php");
}elseif($page == 'categorie'){
    require_once("view/categorie.php");
}elseif($page == 'ajout-categorie'){
    require_once("view/ajout-categorie.php");
}elseif($page == 'articles-categorie'){
    require_once("view/articles-categorie.php");
}else{
    echo "Error 404";
}