<?php
    require_once __DIR__ . '/../other/allController.php';
    require_once __DIR__ . '/../other/header.php';
?>
    <!-- Contenu principal -->
    <main class="max-w-3xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Ajouter un article
            </h2>
            
            <form class="space-y-6" method="POST">
                <!-- Libellé -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Libellé de l'article</label>
                    <input type="text" name="libelle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Ordinateur Portable, Chaise...">
                </div>

                <!-- Prix -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prix (FCFA)</label>
                    <input type="number" name="prix" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: 750000">
                </div>

                <!-- Quantité en stock -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantité en stock</label>
                    <input type="number" name="quantite" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: 10">
                </div>

                <!-- Catégorie -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select name="categorie_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Sélectionnez une catégorie</option>
                            <?php foreach ($categories as $categorie): ?>
                                <option value="<?= $categorie['id'] ?>">
                                    <?= htmlspecialchars($categorie['libelle']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                </div>

                <!-- Boutons -->
                <div class="flex space-x-4">
                    <button type="submit" name="ajouter" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Ajouter
                    </button>
                    <a href="article.php" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition text-center">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>