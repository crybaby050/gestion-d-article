<?php
require_once __DIR__ . "/../data/config.php";


function getAllCategories() {
    return $_SESSION['categories'];
}

function getCategorieById($id) {
    foreach ($_SESSION['categories'] as $categorie) {
        if ($categorie['id'] == $id) {
            return $categorie;
        }
    }
    return null;
}

function getCategorieByLibelle($libelle) {
    foreach ($_SESSION['categories'] as $categorie) {
        if (strtolower($categorie['libelle']) == strtolower($libelle)) {
            return $categorie;
        }
    }
    return null;
}

function newCategorieId() {
    $maxId = 0;
    foreach ($_SESSION['categories'] as $categorie) {
        if ($categorie['id'] > $maxId) {
            $maxId = $categorie['id'];
        }
    }
    return $maxId + 1;
}

function addCategorie($libelle, $description) {
    // Vérifier si la catégorie existe déjà
    $existe = getCategorieByLibelle($libelle);
    if ($existe) {
        return false; // Catégorie déjà existante
    }
    
    $nouvelleCategorie = [
        'id' => newCategorieId(),
        'libelle' => $libelle,
        'description' => $description
    ];
    
    $_SESSION['categories'][] = $nouvelleCategorie;
    return $nouvelleCategorie;
}

function countTotalCategories() {
    return count($_SESSION['categories']);
}

function getNbArticleForCategorie($id){
    $count = 0;
    foreach($_SESSION['articles'] as $article){
        if($article['categorie_id'] == $id){
            $count = $count + 1;
        }
    }
    return $count;
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

function validateCategorieData($libelle, $description) {
    $erreurs = [];
    
    if (empty(trim($libelle))) {
        $erreurs[] = "Le libellé est obligatoire";
    } elseif (strlen($libelle) < 2) {
        $erreurs[] = "Le libellé doit contenir au moins 2 caractères";
    } elseif (strlen($libelle) > 50) {
        $erreurs[] = "Le libellé ne doit pas dépasser 50 caractères";
    }
    
    if (strlen($description) > 255) {
        $erreurs[] = "La description ne doit pas dépasser 255 caractères";
    }
    
    return $erreurs;
}

?>