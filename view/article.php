<?php
    require_once __DIR__ . "/../controller/articleController.php";
?>
    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Liste des articles
                </h2>
                <div class="flex space-x-4">
                    <button id="toggleView" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                        Vue cartes
                    </button>
                    <a href="<?=WEBROOT?>?page=ajout-article" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        + Ajouter un article
                    </a>
                </div>
            </div>
            
            <!-- Vue Tableau (par défaut) -->
            <div id="tableView" class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach($articles as $article): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $article['libelle'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $article['prix'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $article['quantite'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= getNameCategorieById($article['categorie_id']) ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- Vue Cartes (masquée par défaut) -->
            <div id="cardView" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Carte 1 -->
                <?php foreach($articles as $article): ?>
                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-2"><?= $article['libelle'] ?></h3>
                    <p class="text-gray-600 mb-1">Prix: <?= $article['prix'] ?> FCFA</p>
                    <p class="text-gray-600 mb-1">Quantité: <?= $article['quantite'] ?></p>
                    <p class="text-gray-600 mb-3">Catégorie: <?= getNameCategorieById($article['categorie_id']) ?></p>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>

    <script>
        const toggleBtn = document.getElementById('toggleView');
        const tableView = document.getElementById('tableView');
        const cardView = document.getElementById('cardView');
        
        toggleBtn.addEventListener('click', () => {
            if (tableView.classList.contains('hidden')) {
                tableView.classList.remove('hidden');
                cardView.classList.add('hidden');
                toggleBtn.textContent = 'Vue cartes';
            } else {
                tableView.classList.add('hidden');
                cardView.classList.remove('hidden');
                toggleBtn.textContent = 'Vue tableau';
            }
        });
    </script>
</body>
</html>