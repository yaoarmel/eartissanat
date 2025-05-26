   <main class="flex-1 p-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <h1 class="text-3xl font-bold">Ajouter un produit</h1>
                <a href="/author/products" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-300 transition flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Retour à la liste
                </a>
            </div>

            <!-- Edit Product Form -->
            <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
                <form>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="name">Nom du produit</label>
                        <input type="text" id="name" name="name" value="" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="category">Catégorie</label>
                        <select id="category" name="category_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="price">Prix (FCFA)</label>
                        <input type="number" id="price" name="price" placeholder="30 000" value="" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" value="" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="description">Description</label>
                        <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">Un pagne tissé artisanal de grande qualité.</textarea>
                    </div>
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Image du produit</label>
                        <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"/>
                        <div class="mt-2">
                            <img src="https://via.placeholder.com/120x80?text=Image" alt="Aperçu" class="h-20 rounded shadow border">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="dimensions">Dimensions</label>
                        <input type="text" id="dimensions" name="dimensions" placeholder="60cm x 80cm" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="material">Materiaux</label>
                        <input type="text" id="material" name="material" value="" placeholder="Bois..." class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="origin">Origine</label>
                        <input type="text" id="origin" name="origin" value="" placeholder="Cote d'Ivoire" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <input type="text" name="author_id" value="" class="hidden">
                    <div class="flex justify-end gap-4">
                        <a href="products.html" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Annuler</a>
                        <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">Enregistrer</button>
                    </div>
                    
                </form>
            </div>
        </main>
    </div>