<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
?>
<section class="w-full sm:w-[70%] mx-auto mt-12 px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-bold text-green-600"><?= e($stats['total_artisans']) ?></h3>
            <p class="text-gray-600">Artisans vérifiés</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-bold text-green-600"><?= e($stats['total_products']) ?></h3>
            <p class="text-gray-600">Produits disponibles</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-bold text-green-600"><?= e($stats['total_categories']) ?></h3>
            <p class="text-gray-600">Catégories</p>
        </div>
    </div>
</section> 