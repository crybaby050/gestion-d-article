<?php
    require_once __DIR__ . '/../other/allModel.php';
    require_once __DIR__ . '/../other/header.php';
?>
    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Articles de la catégorie : Informatique
                </h2>
                <a href="categories.html" class="text-gray-600 hover:text-gray-900">
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ordinateur Portable</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">750 000 FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-red-600 hover:text-red-900">Supprimer</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Smartphone Samsung</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">350 000 FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">25</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-red-600 hover:text-red-900">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>