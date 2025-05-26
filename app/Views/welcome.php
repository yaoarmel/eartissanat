<?php
use App\Core\View;

if (!function_exists('partial')) {
    function partial($name, $data = []) {
        View::partial($name, $data);
    }
}
?>

<!-- Hero Section -->
<section class="relative overflow-hidden rounded-3xl lg:w-[78%] w-[90%] mx-auto mt-6">
    <img src="/assets/img/happy.png" alt="Confetti" class="absolute top-2 right-2 w-11 z-10">
    <img src="/assets/img/hero.png" alt="Marché artisanal ivoirien"
            loading="lazy" class="w-full h-64 md:h-96 object-cover">
    <a href="/products"
        class="absolute top-4 left-4 bg-green-600 text-white font-semibold px-4 py-2 rounded hover:bg-green-700 shadow-md flex items-center gap-2 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        Découvrir nos produits
    </a>
</section>

<!-- Statistiques -->
<?php partial('stats', ['stats' => $stats]); ?>

<!-- Catégories -->
<?php partial('categories', ['categories' => $categories]); ?>

<!-- Produits en vedette -->
<?php partial('featured-products', ['products' => $featured_products]); ?>

<!-- Newsletter -->
<?php partial('newsletter'); ?>