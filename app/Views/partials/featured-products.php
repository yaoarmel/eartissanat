<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
?>
<section class="w-full sm:w-[70%] mx-auto mt-12 px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">
        Produits en vedette
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php foreach ($products as $product): ?>
            <article class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 flex flex-col relative group">
                <div class="relative overflow-hidden rounded-xl">
                    <img src="<?= e($product['img_url']) ?>" 
                         alt="<?= e($product['name']) ?>"
                         loading="lazy"
                         class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">
                    <?php if ($product['author_is_verified']): ?>
                        <span class="absolute top-2 right-2 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Artisan vérifié
                        </span>
                    <?php endif; ?>
                </div>
                <h3 class="font-semibold text-lg mt-4 mb-2"><?= e($product['name']) ?></h3>
                <p class="text-gray-600 mb-4 text-sm line-clamp-2"><?= e($product['description']) ?></p>
                <div class="mt-auto flex items-center justify-between">
                    <span class="font-bold text-green-600"><?= number_format($product['price'], 2, ',', ' ') ?> €</span>
                    <a href="/products/<?= e($product['id']) ?>" 
                       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition font-semibold">
                        Voir
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section> 