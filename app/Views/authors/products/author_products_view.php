      <main class="flex-1 p-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <h1 class="text-3xl font-bold">Mes produits</h1>
                <a href="/author/products/add" class="bg-green-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Ajouter un produit
                </a>      
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-4">Liste de mes produits</h2>
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
                            <?php foreach ($products as $product): ?>
                                <form action="" method="get">
                               <tr class="border-t">
                                <td class="py-2 px-4"><?= $product['name'] ?></td>
                                <td class="py-2 px-4"><?= $product['category_name'] ?></td>
                                <td class="py-2 px-4"><?= $product['price'] ?> FCFA</td>
                                <td class="py-2 px-4"><?= $product['stock'] ?></td>
                                <td class="py-2 px-4">
                                    <a href="/author/products/edit?id=<?= $product['id'] ?>" class="text-green-600 hover:underline mr-2">Éditer</a>
                                    
                                    <a href="/author/products/?delete=<?= $product['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
                                    
                                </td>
                            </tr>
                                </form>
                            <?php endforeach; ?>
                            <!-- Plus de lignes si besoin -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
