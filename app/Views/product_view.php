<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-10 px-4 flex flex-col lg:flex-col gap-10 bg-white rounded-3xl shadow-lg py-10">
        <!-- Product Image -->
        <div class=" flex flex-col items-center">
            <img src="<?= $product['img_url'] ?>" alt="Masque traditionnel africain" 
                 class="w-[90%] max-w-md rounded-3xl object-cover shadow-md">
            <div class="flex gap-2 mt-4">
                <img src="<?= $product['img_url'] ?>" alt="Miniature 1" class="w-16 h-16 object-cover rounded-xl border-2 border-green-600">
                <!-- <img src="/assets/img/produits/masque.png" alt="Miniature 2" class="w-16 h-16 object-cover rounded-xl opacity-60"> -->
            </div>
        </div>
        <!-- Product Details -->
        <div class=" flex flex-col justify-center">
            <h1 class="text-3xl font-bold mb-4 text-gray-800"><?= $product['name'] ?></h1>
            <div class="flex items-center gap-3 mb-2"></div>
            <div class="flex gap-2 mb-3 text-base">
                <span class="flex items-center bg-green-100 text-green-700 px-2 py-1 rounded-full font-medium text-sm sm:text-base">
                    <i class="fa-solid fa-shield-halved mr-1"></i> Confiance
                </span>
                <span class="flex items-center bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-medium text-sm sm:text-base">
                    <i class="fa-solid fa-circle-check mr-1"></i> Vérifié
                </span>
            </div>
            <ul class="mb-4 text-gray-600 list-disc list-inside">
                <li>Matériau : <?= $product['material'] ?></li>
                <li>Dimensions : <?= $product['dimensions'] ?></li>
                <li>Fait main, pièce unique</li>
                <li>Auteur : <a href="/author?id=<?= $product['author_id'] ?>" class="font-bold text-green-700"><?= $authors['first_name'] . ' ' . $authors['last_name'] ?></a></li>
                <li>Pays d'origine : <?= $product['origin'] ?></li>
            </ul>
            <div class="flex items-center gap-4  mt-6">
                <span class="text-2xl font-bold text-green-600"><?= $product['price'] ?></span>
                <span class="text-gray-400 line-through">40 000 FCFA</span>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-semibold">-13%</span>
            </div>
            
            <div class="flex gap-4 mb-6 mt-6">
                <a href="/panier" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-semibold transition flex-1">
                    Commander
                </a>
                <a href="/conversation" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 font-semibold transition flex-1">
                    Négocier
                </a>
            </div>
            <div class="flex items-center gap-3 mb-2">
                <img src="/assets/img/produits/wave.png" alt="Wave" class="h-8 w-auto">
                <img src="/assets/img/produits/orange.png" alt="Orange" class="h-8 w-auto">
                <img src="/assets/img/produits/mtn.png" alt="MTN" class="h-8 w-auto">
                <img src="/assets/img/produits/moov.png" alt="Moov" class="h-8 w-auto">
                <img src="/assets/img/produits/paypal.png" alt="PayPal" class="h-8 w-auto">
            </div>
            <p class="text-sm text-gray-500">Paiement sécurisé & livraison rapide</p>
        </div>
    </section>

    <!-- ✅ Product Description & Reviews -->
    <section class="w-full sm:w-[70%] mx-auto mt-10 px-4">
        <div class="bg-gray-50 rounded-2xl p-6 shadow">
            <h2 class="text-xl font-bold mb-3">Description</h2>
            <p class="text-gray-700 mb-4">
            <?= $product['description'] ?>
            </p>
            <h3 class="text-lg font-semibold mt-6 mb-2">Avis clients</h3>
            <div class="space-y-3">
                <div class="bg-white rounded-xl p-4 shadow flex flex-col sm:flex-row gap-2">
                    <span class="font-bold text-green-700">Fatou K.</span>
                    <span class="text-gray-600">"Magnifique masque, livraison rapide et produit fidèle à la description."</span>
                </div>
                <div class="bg-white rounded-xl p-4 shadow flex flex-col sm:flex-row gap-2">
                    <span class="font-bold text-green-700">Jean M.</span>
                    <span class="text-gray-600">"Très belle pièce artisanale, je recommande !"</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ Newsletter -->
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