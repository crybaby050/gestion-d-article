<?php

$categories = getAllCategories();
if (isset($_POST['ajout'])) {
    // Récupérer les données
    $libelle = trim($_POST['libelle'] ?? '');
    $description = trim($_POST['description'] ?? '');
    
    // Valider les données avec votre fonction
    $errors = validateCategorieData($libelle, $description);
    
    // Vérifier si la catégorie existe déjà
    $categorieExistante = getCategorieByLibelle($libelle);
    if ($categorieExistante) {
        $errors[] = "Une catégorie avec ce libellé existe déjà";
    }
    
    // S'il y a pas des erreurs
    if (empty($errors)) {
        // Ajouter la catégorie
        $resultat = addCategorie($libelle, $description);
        header('Location: categorie.php');
        exit;
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Appeler la fonction du model pour récupérer les articles de cette catégorie
    $articles_cat = getArticlesByCategorie($id);
    
    // Récupérer les infos de la catégorie
    //$categorie = getCategorieById($id);
}
?>