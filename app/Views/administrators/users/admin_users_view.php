<main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Gestion des utilisateurs</h1>
                <button class="bg-green-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-user-plus"></i> Ajouter un utilisateur
                </button>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                    <div>
                        <input type="text" placeholder="Rechercher un utilisateur..." class="border border-gray-300 rounded px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-green-200">
                    </div>
                    <div>
                        <select class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-200">
                            <option value="">Filtrer par rôle</option>
                            <option value="admin">Admin</option>
                            <option value="utilisateur">Utilisateur</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">Nom</th>
                                <th class="py-2 px-4 font-semibold">Email</th>
                                <th class="py-2 px-4 font-semibold">Rôle</th>
                                <th class="py-2 px-4 font-semibold">Statut</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">Jack Lee</td>
                                <td class="py-2 px-4">jack@example.com</td>
                                <td class="py-2 px-4">Admin</td>
                                <td class="py-2 px-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Actif</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-yellow-600 hover:underline mr-2">Modifier</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">Fatou K.</td>
                                <td class="py-2 px-4">fatou@example.com</td>
                                <td class="py-2 px-4">Utilisateur</td>
                                <td class="py-2 px-4"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">En attente</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-yellow-600 hover:underline mr-2">Modifier</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-2 px-4">Awa D.</td>
                                <td class="py-2 px-4">awa@example.com</td>
                                <td class="py-2 px-4">Utilisateur</td>
                                <td class="py-2 px-4"><span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Suspendu</span></td>
                                <td class="py-2 px-4">
                                    <button class="text-blue-600 hover:underline mr-2">Voir</button>
                                    <button class="text-yellow-600 hover:underline mr-2">Modifier</button>
                                    <button class="text-red-600 hover:underline">Supprimer</button>
                                </td>
                            </tr>
                            <!-- Plus de lignes si besoin -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>