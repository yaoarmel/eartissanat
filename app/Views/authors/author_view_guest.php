<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Auteur du Produit
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Profil Auteur -->
        <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center md:col-span-1">
            <img src="/assets/img/avatar.png" alt="Avatar auteur" class="w-24 h-24 rounded-full mb-4 border-4 border-green-200 object-cover">
            <h3 class="text-xl font-bold mb-1"><?= $user['first_name'] . ' ' . $user['last_name'] ?? 'Auteur Inconnu' ?></h3>
            <p class="text-gray-600 mb-2">Artisan bijoutière</p>
            <p class="text-gray-600 mb-4 text-center"><?= $user['address'] ?? 'Localisation inconnue' ?></p>
            <div class="flex gap-2 mb-3">
             <?php if ($author['is_verified']): ?>
                <span class="flex items-center bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">
                <i class="fa-solid fa-shield-halved mr-1"></i> Confiance
            </span>
            <span class="flex items-center bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium">
                <i class="fa-solid fa-circle-check mr-1"></i> Vérifié
            </span>
             <?php endif;?>
            </div>
            <a href="mailto:<?= $user['email'] ?? 'email@inconnu.com' ?>" class="text-green-600 hover:underline text-sm mb-2 flex items-center gap-1">
            <i class="fa-regular fa-envelope"></i> Contacter
            </a>
            <div class="flex gap-3 mt-2">
            <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Description de l'auteur -->
        <div class="bg-white rounded-2xl shadow p-8 md:col-span-2 flex flex-col justify-center">
            <h4 class="text-lg font-semibold mb-3">À propos de l'auteur</h4>
            
            <p class="text-gray-700 mb-4">
                <?= $author['bio'] ?? 'Aucune description disponible' ?>
            </p>
            
            <div class="flex flex-wrap gap-2">
         
                <?php foreach ($keywordsArray as $key): ?>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs"><?= htmlspecialchars($key) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4 mt-12">
        
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Autres produits de Fatou Koné</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <? foreach ($products as $product): ?>
            <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                <img src="<?= $product['img_url'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-32 h-32 object-cover rounded mb-3">
                <h4 class="font-semibold text-lg mb-1"><?= htmlspecialchars($product['name']) ?></h4>
                <span class="text-green-600 font-bold mb-2"><?= htmlspecialchars($product['price']) ?> FCFA</span>
                <a href="product?id=<?= $product['id'] ?>" class="text-sm text-green-600 hover:underline">Voir le produit</a>
            </div>
            <? endforeach; ?>

        </div>
    </section>
</main>
