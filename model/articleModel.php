<?php

function getAllArticles() {
    return $_SESSION['articles'];
}

function getArticleById($id) {
    foreach ($_SESSION['articles'] as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
    return null;
}

function getArticlesByCategorie($categorie_id) {
    $result = [];
    foreach ($_SESSION['articles'] as $article) {
        if ($article['categorie_id'] == $categorie_id) {
            $result[] = $article;
        }
    }
    return $result;
}

function newId() {
    $maxId = 0;
    foreach ($_SESSION['articles'] as $article) {
        if ($article['id'] > $maxId) {
            $maxId = $article['id'];
        }
    }
    return $maxId + 1;
}

function addArticle($libelle, $prix, $quantite, $categorie_id) {
    $nouvelArticle = [
        'id' => newId(),
        'libelle' => $libelle,
        'prix' => $prix,
        'quantite' => $quantite,
        'categorie_id' => $categorie_id
    ];
    
    $_SESSION['articles'][] = $nouvelArticle;
    return $nouvelArticle;
}

function getNameCategorieById($id){
    foreach($_SESSION['categories'] as $categorie){
        if($categorie['id'] == $id){
            return $categorie['libelle'];
        }
    }
}

/*
function increaseArticleQuantity($id, $quantiteAjoutee) {
    foreach ($_SESSION['articles'] as &$article) {
        if ($article['id'] == $id) {
            $article['quantite'] += $quantiteAjoutee;
            return true;
        }
    }
    return false;
}

function decreaseArticleQuantity($id, $quantiteRetiree) {
    foreach ($_SESSION['articles'] as &$article) {
        if ($article['id'] == $id) {
            if ($article['quantite'] >= $quantiteRetiree) {
                $article['quantite'] -= $quantiteRetiree;
                return true;
            }
            return false; // Stock insuffisant
        }
    }
    return false;
}

function countTotalArticles() {
    return count($_SESSION['articles']);
}
*/

function countArticlesByCategorie($categorie_id) {
    $count = 0;
    foreach ($_SESSION['articles'] as $article) {
        if ($article['categorie_id'] == $categorie_id) {
            $count++;
        }
    }
    return $count;
}

function calculateTotalStockValue() {
    $total = 0;
    foreach ($_SESSION['articles'] as $article) {
        $total += $article['prix'] * $article['quantite'];
    }
    return $total;
}

function calculateStockValueByCategorie() {
    $valeurs = [];
    foreach ($_SESSION['articles'] as $article) {
        if (!isset($valeurs[$article['categorie_id']])) {
            $valeurs[$article['categorie_id']] = 0;
        }
        $valeurs[$article['categorie_id']] += $article['prix'] * $article['quantite'];
    }
    return $valeurs;
}

/*
function ruptureArticles() {
    $result = [];
    foreach ($_SESSION['articles'] as $article) {
        if ($article['quantite'] == 0) {
            $result[] = $article;
        }
    }
    return $result;
}
*/

?>