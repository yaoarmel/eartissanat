<main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Commandes</h1>

            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-4">Dernières commandes</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">ID</th>
                                <th class="py-2 px-4 font-semibold">Client</th>
                                <th class="py-2 px-4 font-semibold">Montant</th>
                                <th class="py-2 px-4 font-semibold">Statut</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">#1023</td>
                                <td class="py-2 px-4">Jean M.</td>
                                <td class="py-2 px-4">35 000 FCFA</td>
                                <td class="py-2 px-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Livrée</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-red-600 hover:underline">Annuler</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">#1022</td>
                                <td class="py-2 px-4">Fatou K.</td>
                                <td class="py-2 px-4">40 000 FCFA</td>
                                <td class="py-2 px-4"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">En attente</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-red-600 hover:underline">Annuler</button>
                                </td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>