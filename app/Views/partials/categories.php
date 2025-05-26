<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
?>
<section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full mb-8">
        Richesses ivoiriennes
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($categories as $category): ?>
            <a href="/products?category=<?= e($category['id']) ?>" class="group">
                <article class="text-center">
                    <div class="relative overflow-hidden rounded-[40px]">
                        <img src="<?= e($category['img_url']) ?>" 
                             alt="<?= e($category['description']) ?>"
                             loading="lazy"
                             class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-semibold">
                                <?= e($category['product_count']) ?> produits
                            </span>
                        </div>
                    </div>
                    <p class="mt-3 px-4 py-2 bg-gray-200 font-semibold rounded-full w-max mx-auto">
                        <?= e($category['name']) ?>
                    </p>
                </article>
            </a>
        <?php endforeach; ?>
    </div>
</section> 