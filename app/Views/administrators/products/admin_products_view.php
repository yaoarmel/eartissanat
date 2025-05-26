<main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Gestion des produits</h1>
                <button class="bg-green-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Ajouter un produit
                </button>
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-4">Liste des produits</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">Image</th>
                                <th class="py-2 px-4 font-semibold">Nom</th>
                                <th class="py-2 px-4 font-semibold">Catégorie</th>
                                <th class="py-2 px-4 font-semibold">Prix</th>
                                <th class="py-2 px-4 font-semibold">Stock</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">
                                    <img src="https://via.placeholder.com/40" alt="Produit 1" class="w-10 h-10 rounded object-cover">
                                </td>
                                <td class="py-2 px-4">Panier en osier</td>
                                <td class="py-2 px-4">Artisanat</td>
                                <td class="py-2 px-4">8 000 FCFA</td>
                                <td class="py-2 px-4">25</td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Modifier</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">
                                    <img src="https://via.placeholder.com/40" alt="Produit 2" class="w-10 h-10 rounded object-cover">
                                </td>
                                <td class="py-2 px-4">Tapis berbère</td>
                                <td class="py-2 px-4">Décoration</td>
                                <td class="py-2 px-4">15 000 FCFA</td>
                                <td class="py-2 px-4">10</td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Modifier</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
