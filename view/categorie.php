<?php
    require_once __DIR__ . "/../controller/categorieController.php";

?>
    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Liste des catégories
                </h2>
                <a href="<?=WEBROOT?>?page=ajout-categorie" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    + Ajouter une catégorie
                </a>
            </div>
            
            <!-- Tableau des catégories -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nb articles</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach($categories as $categorie): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $categorie['libelle'] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?= $categorie['description'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= getNbArticleForCategorie($categorie['id']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                <a href="articles-categorie.php?id=<?= $categorie['id'] ?>" class="text-blue-600 hover:text-blue-900">Détail</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>