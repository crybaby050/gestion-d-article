<?php
require_once __DIR__ . "/../model/articleModel.php";

$articles = getAllArticles();
$categories = getAllCategories();
if (isset($_POST['ajouter'])) {
    
    $libelle = trim($_POST['libelle'] ?? '');
    $prix = floatval($_POST['prix'] ?? 0);
    $quantite = intval($_POST['quantite'] ?? 0);
    $categorie_id = intval($_POST['categorie_id'] ?? 0); // ← Directement l'ID
    
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
    
    if ($categorie_id <= 0) { // ← Vérification directe de l'ID
        $errors['categorie_id'] = 'Veuillez sélectionner une catégorie';
    } else {
        // Vérifier que la catégorie existe vraiment
        $categorie = getCategorieById($categorie_id);
        if (!$categorie) {
            $errors['categorie_id'] = 'Catégorie invalide';
        }
    }
    
    // S'il n'y a pas d'erreurs
    if (empty($errors)) {
        // Ajouter l'article (newId() doit être DANS addArticle)
        addArticle($libelle, $prix, $quantite, $categorie_id);
        
        // Redirection vers la liste
        header('Location: article.php?success=1');
        exit;
    } else {
        // En cas d'erreur, rediriger avec les erreurs
        $query = http_build_query([
            'errors' => json_encode($errors),
            'libelle' => $libelle,
            'prix' => $prix,
            'quantite' => $quantite,
            'categorie_id' => $categorie_id
        ]);
        header('Location: ajout-article.php?' . $query);
        exit;
    }
}

?>