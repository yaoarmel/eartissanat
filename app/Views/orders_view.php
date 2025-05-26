<main class="flex-grow">
        <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
                Mes Commandes
            </h2>
        </section>

        <section class="w-full sm:w-[70%] mx-auto px-4">
            <div class="bg-white rounded-2xl shadow p-8">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">N° Commande</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Montant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Détails</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">#1234</td>
                            <td class="px-6 py-4 whitespace-nowrap">12/06/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap">15 000 FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap"><span class="text-green-600 font-medium">Livrée</span></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="detailcommande.html" class="text-green-600 hover:underline">Voir</a></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">#1235</td>
                            <td class="px-6 py-4 whitespace-nowrap">15/06/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap">8 500 FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap"><span class="text-yellow-600 font-medium">En cours</span></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="detailcommande.html" class="text-green-600 hover:underline">Voir</a></td>
                        </tr>
                        <!-- Ajoutez d'autres commandes ici -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>