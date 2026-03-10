<?php
require_once __DIR__ . "/../model/articleModel.php";

$articles = getAllArticles();
$categories = getAllCategories();
if (isset($_POST['ajouter'])) {
    
    $libelle = trim($_POST['libelle'] ?? '');
    $prix = floatval($_POST['prix'] ?? 0);
    $quantite = intval($_POST['quantite'] ?? 0);
    $categorie_id = intval($_POST['categorie_id'] ?? 0);
    
    $errors = [];
    
    if (empty($libelle)) {
        $errors['libelle'] = 'Le libellé est obligatoire';
    } elseif (strlen($libelle) < 3) {
        $errors['libelle'] = 'Le libellé doit contenir au moins 3 caractères';
    }
    
    if ($prix <= 0) {
        $errors['prix'] = 'Le prix doit être supérieur à 0';
    }
    
    if ($quantite < 0) {
        $errors['quantite'] = 'La quantité ne peut pas être négative';
    }
    
    if ($categorie_id <= 0) {
        $errors['categorie_id'] = 'Veuillez sélectionner une catégorie';
    }
    
    // S'il n'y a pas d'erreurs
    if (empty($errors)) {
        // Ajouter l'article
        addArticle($libelle, $prix, $quantite, $categorie_id);
        
        // Redirection vers la liste des articles avec le paramètre page
        header('Location: ' . WEBROOT . '?page=article');
        exit;
    }
}

?>