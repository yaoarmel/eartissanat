      <main class="flex-1 p-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <h1 class="text-3xl font-bold">Photos & Téléversements</h1>
                <a href="products.html" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-300 transition flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Retour à la liste
                </a>
            </div>

            <!-- Upload Photos Section -->
            <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
                <form action="" method="POST" >
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Téléverser des photos</label>
                        <input type="file" multiple accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"/>
                        <p class="text-xs text-gray-500 mt-2">Formats acceptés : JPG, PNG. Taille max : 5Mo par image.</p>
                    </div>
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Aperçu des photos</label>
                        <div class="flex gap-4 flex-wrap">
                            <img src="../../assets/img/hero.png" alt="Aperçu 1" class="h-20 rounded shadow border">
                            <img src="/assets/img/hero.png" alt="Aperçu 2" class="h-20 rounded shadow border">
                            <img src="/assets/img/hero.png" alt="Aperçu 3" class="h-20 rounded shadow border">
                        </div>
                    </div>
                    <div class="flex justify-end gap-4">
                        <a href="products.html" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Annuler</a>
                        <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">Enregistrer</button>
                    </div>
                </form>
            </div>
        </main>
    </div>