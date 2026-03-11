<?php
    require_once __DIR__ . "/../controller/categorieController.php";
    
    // Vérifier si l'ID est fourni
    if(!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: ' . WEBROOT . '?page=categorie');
        exit;
    }
    
    $categorie_id = intval($_GET['id']);
    
    // Récupérer les informations de la catégorie
    $categorie = getCategorieById($categorie_id);
    
    // Vérifier si la catégorie existe
    if(!$categorie) {
        echo "Catégorie non trouvée";
        exit;
    }
    
    // $articles_cat est déjà défini dans le contrôleur si la condition est remplie
    // Mais par sécurité, on peut le redéfinir
    if(!isset($articles_cat)) {
        $articles_cat = getArticlesByCategorie($categorie_id);
    }
?>
    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Articles de la catégorie : Informatique
                </h2>
                <a href="<?=WEBROOT?>?page=categorie" class="text-gray-600 hover:text-gray-900">
                    ← Retour aux catégories
                </a>
            </div>
            
            <!-- Tableau des articles de la catégorie -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach($articles_cat as $article): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $article['libelle'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $article['prix'] ?> FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $article['quantite'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>