<?php
require_once __DIR__ . "/../model/categorieModel.php";

$categories = getAllCategories();
$errors = [];

// Traitement du formulaire
if (isset($_POST['ajout'])) {
    
    $libelle = trim($_POST['libelle'] ?? '');
    $description = trim($_POST['description'] ?? '');
    
    // Valider les données
    $errors = validateCategorieData($libelle, $description);
    
    // S'il n'y a pas d'erreurs
    if (empty($errors)) {
        // Ajouter la catégorie
        $resultat = addCategorie($libelle, $description);
        
        if ($resultat !== false) {
            // Redirection vers la liste des catégories
            header('Location: ' . WEBROOT . '?page=categorie&success=1');
            exit;
        }
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $articles_cat = getArticlesByCategorie($id);
}
?>