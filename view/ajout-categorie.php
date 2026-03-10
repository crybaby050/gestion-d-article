<?php
    //require_once __DIR__ . '/../other/allController.php';
    require_once __DIR__ . "/../controller/articleController.php";

?>
    <!-- Contenu principal -->
    <main class="max-w-3xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Ajouter une catégorie
            </h2>
            
            <form class="space-y-6" method="POST">
                <!-- Libellé de la catégorie -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Libellé de la catégorie</label>
                    <input type="text" name="libelle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Informatique, Mobilier, Fournitures...">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea rows="3" name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Description de la catégorie..."></textarea>
                </div>

                <!-- Boutons -->
                <div class="flex space-x-4">
                    <button type="submit" name="ajout" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Ajouter
                    </button>
                    <a href="<?=WEBROOT?>?page=categorie" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition text-center">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>