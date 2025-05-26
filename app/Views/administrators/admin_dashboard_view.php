<main class="flex-1 p-8">
    <h1 class="text-3xl font-bold mb-8">Tableau de bord administrateur</h1>
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fa-solid fa-users text-3xl text-green-600 mb-2"></i>
            <div class="text-2xl font-bold">120</div>
            <div class="text-gray-500">Utilisateurs</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fa-solid fa-box text-3xl text-blue-600 mb-2"></i>
            <div class="text-2xl font-bold">58</div>
            <div class="text-gray-500">Produits</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fa-solid fa-shopping-cart text-3xl text-yellow-500 mb-2"></i>
            <div class="text-2xl font-bold">34</div>
            <div class="text-gray-500">Commandes</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fa-solid fa-comments text-3xl text-purple-600 mb-2"></i>
            <div class="text-2xl font-bold">12</div>
            <div class="text-gray-500">Messages</div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow p-6 mb-10">
        <h2 class="text-xl font-bold mb-4">Derniers utilisateurs</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr>
                        <th class="py-2 px-4 font-semibold">Nom</th>
                        <th class="py-2 px-4 font-semibold">Email</th>
                        <th class="py-2 px-4 font-semibold">Rôle</th>
                        <th class="py-2 px-4 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="py-2 px-4">Jack Lee</td>
                        <td class="py-2 px-4">jack@example.com</td>
                        <td class="py-2 px-4">Admin</td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:underline mr-2">Voir</button>
                            <button class="text-red-600 hover:underline">Supprimer</button>
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2 px-4">Fatou K.</td>
                        <td class="py-2 px-4">fatou@example.com</td>
                        <td class="py-2 px-4">Utilisateur</td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:underline mr-2">Voir</button>
                            <button class="text-red-600 hover:underline">Supprimer</button>
                        </td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

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
                        <td class="py-2 px-4">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Livrée</span>
                        </td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:underline mr-2">Voir</button>
                            <button class="text-red-600 hover:underline">Annuler</button>
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2 px-4">#1022</td>
                        <td class="py-2 px-4">Fatou K.</td>
                        <td class="py-2 px-4">40 000 FCFA</td>
                        <td class="py-2 px-4">
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">En attente</span>
                        </td>
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