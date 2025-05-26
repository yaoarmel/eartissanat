        <main class="flex-1 p-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <h1 class="text-3xl font-bold">Mes commandes</h1>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-4">Liste de mes commandes</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">N° Commande</th>
                                <th class="py-2 px-4 font-semibold">Date</th>
                                <th class="py-2 px-4 font-semibold">Produit</th>
                                <th class="py-2 px-4 font-semibold">Quantité</th>
                                <th class="py-2 px-4 font-semibold">Total</th>
                                <th class="py-2 px-4 font-semibold">Statut</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">#1001</td>
                                <td class="py-2 px-4">2024-06-01</td>
                                <td class="py-2 px-4">Pagne tissé</td>
                                <td class="py-2 px-4">2</td>
                                <td class="py-2 px-4">30 000 FCFA</td>
                                <td class="py-2 px-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">En attente</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-green-600 hover:underline">Valider</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">#1000</td>
                                <td class="py-2 px-4">2024-05-28</td>
                                <td class="py-2 px-4">Collier perlé</td>
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">7 500 FCFA</td>
                                <td class="py-2 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Livrée</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline">Voir</button>
                                </td>
                            </tr>
                            <!-- Plus de lignes si besoin -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>