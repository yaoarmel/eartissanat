 <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Tableau de bord auteur</h1>
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <i class="fa-solid fa-box text-3xl text-blue-600 mb-2"></i>
                    <div class="text-2xl font-bold">12</div>
                    <div class="text-gray-500">Mes produits</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <i class="fa-solid fa-shopping-cart text-3xl text-yellow-500 mb-2"></i>
                    <div class="text-2xl font-bold">7</div>
                    <div class="text-gray-500">Commandes reçues</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <i class="fa-solid fa-comments text-3xl text-purple-600 mb-2"></i>
                    <div class="text-2xl font-bold">3</div>
                    <div class="text-gray-500">Nouveaux messages</div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-xl shadow p-6 mb-10">
                <h2 class="text-xl font-bold mb-4">Mes derniers produits</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">Nom</th>
                                <th class="py-2 px-4 font-semibold">Catégorie</th>
                                <th class="py-2 px-4 font-semibold">Prix</th>
                                <th class="py-2 px-4 font-semibold">Stock</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">Pagne tissé</td>
                                <td class="py-2 px-4">Textile</td>
                                <td class="py-2 px-4">15 000 FCFA</td>
                                <td class="py-2 px-4">8</td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-green-600 hover:underline mr-2">Éditer</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">Collier perlé</td>
                                <td class="py-2 px-4">Bijoux</td>
                                <td class="py-2 px-4">7 500 FCFA</td>
                                <td class="py-2 px-4">15</td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-green-600 hover:underline mr-2">Éditer</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <!-- Plus de lignes si besoin -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-4">Mes dernières commandes</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">ID</th>
                                <th class="py-2 px-4 font-semibold">Client</th>
                                <th class="py-2 px-4 font-semibold">Produit</th>
                                <th class="py-2 px-4 font-semibold">Montant</th>
                                <th class="py-2 px-4 font-semibold">Statut</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">#205</td>
                                <td class="py-2 px-4">Awa D.</td>
                                <td class="py-2 px-4">Pagne tissé</td>
                                <td class="py-2 px-4">15 000 FCFA</td>
                                <td class="py-2 px-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Livrée</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-red-600 hover:underline">Annuler</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">#204</td>
                                <td class="py-2 px-4">Moussa S.</td>
                                <td class="py-2 px-4">Collier perlé</td>
                                <td class="py-2 px-4">7 500 FCFA</td>
                                <td class="py-2 px-4"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">En attente</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-red-600 hover:underline">Annuler</button>
                                </td>
                            </tr>
                            <!-- Plus de lignes si besoin -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        </div>