<?php
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

function searchCategories($keyword) {
    $result = [];
    foreach ($_SESSION['categories'] as $categorie) {
        if (stripos($categorie['libelle'], $keyword) !== false || 
            stripos($categorie['description'], $keyword) !== false) {
            $result[] = $categorie;
        }
    }
    return $result;
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

function updateCategorie($id, $libelle, $description) {
    foreach ($_SESSION['categories'] as &$categorie) {
        if ($categorie['id'] == $id) {
            $categorie['libelle'] = $libelle;
            $categorie['description'] = $description;
            return true;
        }
    }
    return false;
}

function updateCategorieDescription($id, $nouvelleDescription) {
    foreach ($_SESSION['categories'] as &$categorie) {
        if ($categorie['id'] == $id) {
            $categorie['description'] = $nouvelleDescription;
            return true;
        }
    }
    return false;
}

function countTotalCategories() {
    return count($_SESSION['categories']);
}

function getCategoriesWithArticleCount($articles = null) {
    if ($articles === null) {
        $articles = $_SESSION['articles'] ?? [];
    }
    
    $result = [];
    foreach ($_SESSION['categories'] as $categorie) {
        $count = 0;
        foreach ($articles as $article) {
            if ($article['categorie_id'] == $categorie['id']) {
                $count++;
            }
        }
        
        $result[] = [
            'id' => $categorie['id'],
            'libelle' => $categorie['libelle'],
            'description' => $categorie['description'],
            'nb_articles' => $count
        ];
    }
    return $result;
}

function getNonEmptyCategories() {
    $result = [];
    foreach ($_SESSION['categories'] as $categorie) {
        $nbArticles = 0;
        foreach ($_SESSION['articles'] as $article) {
            if ($article['categorie_id'] == $categorie['id']) {
                $nbArticles++;
                break;
            }
        }
        if ($nbArticles > 0) {
            $result[] = $categorie;
        }
    }
    return $result;
}

function getEmptyCategories() {
    $result = [];
    foreach ($_SESSION['categories'] as $categorie) {
        $hasArticle = false;
        foreach ($_SESSION['articles'] as $article) {
            if ($article['categorie_id'] == $categorie['id']) {
                $hasArticle = true;
                break;
            }
        }
        if (!$hasArticle) {
            $result[] = $categorie;
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