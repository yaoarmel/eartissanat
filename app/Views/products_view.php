<main class="flex-grow">
    <!-- Titre -->
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Catalogue de masques 
        </h2>
    </section>

    <!-- Liste des produits -->
    <section class="w-full sm:w-[70%] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-4">
        <!-- Produit 1 -->
         <?php foreach ($products as $product): ?>
            <article class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 flex flex-col relative">
                <div class="relative">
                    <img src="<?= $product['img_url'] ?>" alt="<?= $product['name'] ?>"
                        loading="lazy"
                        class="w-full h-48 object-cover rounded-xl mb-4">
                    <span class="absolute top-2 right-2 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Confiance
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-2"><?= $product['name'] ?></h3>
                
                <p class="text-gray-600 mb-4 text-sm"><?= $product['description'] ?></p>
                <a class="mt-auto bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition font-semibold" href="/product?id=<?= $product['id'] ?>">voir</a>
            </article>
        
        <?php endforeach; ?>
      
    </section>

    <!-- Newsletter -->
    <section class="w-full sm:w-[70%] mx-auto px-4 mt-16 text-center">
        <h3 class="text-xl font-bold mb-4">Recevez nos nouveautés</h3>
        <form class="flex flex-col sm:flex-row gap-4 justify-center">
            <input type="email" placeholder="Votre email"
                   class="px-4 py-2 rounded border border-gray-300 w-full sm:w-auto">
            <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                S'abonner
            </button>
        </form>
    </section>
</main>