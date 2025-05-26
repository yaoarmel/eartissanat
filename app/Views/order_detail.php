<main class="flex-grow">
        <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
                Détail de la Commande #1234
            </h2>
        </section>

        <section class="w-full sm:w-[70%] mx-auto px-4">
            <div class="bg-white rounded-2xl shadow p-8 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p><span class="font-semibold">N° Commande :</span> #1234</p>
                        <p><span class="font-semibold">Date :</span> 12/06/2024</p>
                        <p><span class="font-semibold">Statut :</span> <span class="text-green-600 font-medium">Livrée</span></p>
                    </div>
                    <div>
                        <p><span class="font-semibold">Montant total :</span> 15 000 FCFA</p>
                        <p><span class="font-semibold">Adresse de livraison :</span> Abidjan, Cocody, Riviera 2</p>
                        <p><span class="font-semibold">Téléphone :</span> +225 07 00 00 00 00</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-8">
                <h3 class="text-xl font-bold mb-4">Articles commandés</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantité</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix Unitaire</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center gap-3">
                                <img src="../assets/img/produits/pagne.png" alt="Panier tressé" class="h-12 w-12 rounded object-cover">
                                Panier tressé
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 000 FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap">10 000 FCFA</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center gap-3">
                                <img src="../assets/img/produits/poteries.png" alt="Panier tressé" class="h-12 w-12 rounded object-cover">
                                Panier tressé
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 000 FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap">10 000 FCFA</td>
                        </tr>
                       
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-right font-bold">Total</td>
                            <td class="px-6 py-4 font-bold">20 000 FCFA</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </main>
