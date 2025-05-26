<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <!-- Section titre -->
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            <?= htmlspecialchars($title ?? 'Catalogue des produits') ?>
        </h2>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- En-tête avec recherche -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <h1 class="text-3xl font-bold text-gray-900"><?= htmlspecialchars($title ?? 'Nos Produits') ?></h1>
            
            <!-- Barre de recherche -->
            <form action="/products/search" method="GET" class="w-full md:w-96">
                <div class="relative">
                    <input type="search" name="q" 
                           placeholder="Rechercher un produit..." 
                           value="<?= htmlspecialchars($search ?? '') ?>"
                           class="w-full px-4 py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </form>
        </div>

        <!-- Filtres et contrôles -->
        <div class="bg-white rounded-lg shadow p-4 mb-8">
            <div class="flex flex-col md:flex-row gap-4 justify-between items-start md:items-center mb-4">
                <!-- Tri -->
                <div class="flex items-center gap-2">
                    <label for="sort" class="text-sm font-medium text-gray-700">Trier par :</label>
                    <select id="sort" name="sort" onchange="updateFilters()"
                            class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="newest" <?= ($sort ?? '') === 'newest' ? 'selected' : '' ?>>Plus récents</option>
                        <option value="price_asc" <?= ($sort ?? '') === 'price_asc' ? 'selected' : '' ?>>Prix croissant</option>
                        <option value="price_desc" <?= ($sort ?? '') === 'price_desc' ? 'selected' : '' ?>>Prix décroissant</option>
                        <option value="popular" <?= ($sort ?? '') === 'popular' ? 'selected' : '' ?>>Popularité</option>
                    </select>
                </div>

                <!-- Vue grille/liste -->
                <div class="flex items-center gap-2">
                    <button onclick="setView('grid')" class="p-2 rounded-md hover:bg-gray-100 <?= ($view ?? 'grid') === 'grid' ? 'text-green-600' : 'text-gray-400' ?>">
                        <i class="fas fa-grid-2 text-lg"></i>
                    </button>
                    <button onclick="setView('list')" class="p-2 rounded-md hover:bg-gray-100 <?= ($view ?? 'grid') === 'list' ? 'text-green-600' : 'text-gray-400' ?>">
                        <i class="fas fa-list text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Filtres -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Catégories -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catégories</label>
                    <div class="flex flex-wrap gap-2">
                        <a href="/products" 
                           class="px-3 py-1 rounded-full text-sm <?= !isset($category) ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?>">
                            Tout
                        </a>
                        <?php foreach ($categories as $cat): ?>
                            <a href="/products/category/<?= htmlspecialchars(strtolower(str_replace(' ', '-', $cat['name']))) ?>" 
                               class="px-3 py-1 rounded-full text-sm <?= (isset($category) && $category['id'] == $cat['id']) ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?>">
                                <?= htmlspecialchars($cat['name']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Prix -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                    <div class="flex items-center gap-2">
                        <input type="number" name="min_price" placeholder="Min" value="<?= $min_price ?? '' ?>"
                               class="w-24 px-2 py-1 rounded border-gray-300 focus:ring-green-500 focus:border-green-500">
                        <span>-</span>
                        <input type="number" name="max_price" placeholder="Max" value="<?= $max_price ?? '' ?>"
                               class="w-24 px-2 py-1 rounded border-gray-300 focus:ring-green-500 focus:border-green-500">
                        <button onclick="updateFilters()" class="px-3 py-1 bg-gray-100 rounded-md hover:bg-gray-200">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Disponibilité -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Disponibilité</label>
                    <select name="availability" onchange="updateFilters()"
                            class="w-full rounded-md border-gray-300 py-1 pl-3 pr-10 text-base focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="all">Tous les produits</option>
                        <option value="in_stock">En stock</option>
                        <option value="out_of_stock">Rupture de stock</option>
                    </select>
                </div>

                <!-- Note minimale -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Note minimale</label>
                    <div class="flex items-center gap-1">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <button onclick="setRating(<?= $i ?>)" 
                                    class="text-2xl <?= ($rating ?? 0) >= $i ? 'text-yellow-400' : 'text-gray-300' ?>">
                                ★
                            </button>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grille de produits -->
        <div class="<?= ($view ?? 'grid') === 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6' : 'space-y-4' ?>">
            <?php foreach ($products as $product): ?>
                <article class="bg-white rounded-lg shadow overflow-hidden <?= ($view ?? 'grid') === 'list' ? 'flex' : '' ?>">
                    <a href="/product/<?= $product['id'] ?>" class="<?= ($view ?? 'grid') === 'list' ? 'w-48 flex-shrink-0' : '' ?>">
                        <img src="<?= htmlspecialchars($product['img_url']) ?>" 
                             alt="<?= htmlspecialchars($product['name']) ?>"
                             class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4 flex-1">
                        <div class="<?= ($view ?? 'grid') === 'list' ? 'flex justify-between items-start' : '' ?>">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    <?= htmlspecialchars($product['name']) ?>
                                </h3>
                                <p class="text-gray-600 text-sm mb-2">
                                    <?= htmlspecialchars(substr($product['description'], 0, ($view ?? 'grid') === 'list' ? 200 : 100)) ?>...
                                </p>
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="flex items-center">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="text-sm <?= $product['rating'] >= $i ? 'text-yellow-400' : 'text-gray-300' ?>">★</span>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="text-sm text-gray-500">(<?= $product['reviews_count'] ?? 0 ?>)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-green-600 font-bold text-lg">
                                        <?= number_format($product['price'], 2, ',', ' ') ?> €
                                    </span>
                                    <?php if ($product['old_price']): ?>
                                        <span class="text-gray-400 line-through text-sm">
                                            <?= number_format($product['old_price'], 2, ',', ' ') ?> €
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (($view ?? 'grid') === 'list'): ?>
                                <div class="ml-4">
                                    <form action="/cart/add" method="POST" class="flex gap-2">
                                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                        <input type="number" name="quantity" value="1" min="1" max="99"
                                               class="w-20 px-2 py-1 border rounded">
                                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                            Ajouter au panier
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (($view ?? 'grid') === 'grid'): ?>
                            <div class="mt-4 pt-4 border-t">
                                <form action="/cart/add" method="POST" class="flex gap-2">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <input type="number" name="quantity" value="1" min="1" max="99"
                                           class="w-20 px-2 py-1 border rounded">
                                    <button type="submit" class="flex-1 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                        Ajouter au panier
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
            <div class="mt-8 flex justify-center">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <?php if ($current_page > 1): ?>
                        <a href="?page=<?= $current_page - 1 ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Précédent</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php if ($i === $current_page): ?>
                            <span class="relative inline-flex items-center px-4 py-2 border border-green-500 bg-green-50 text-sm font-medium text-green-600">
                                <?= $i ?>
                            </span>
                        <?php else: ?>
                            <a href="?page=<?= $i ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                <?= $i ?>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <a href="?page=<?= $current_page + 1 ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Suivant</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Scripts pour les filtres -->
<script>
function updateFilters() {
    const sort = document.getElementById('sort').value;
    const minPrice = document.querySelector('[name="min_price"]').value;
    const maxPrice = document.querySelector('[name="max_price"]').value;
    const availability = document.querySelector('[name="availability"]').value;
    
    let url = new URL(window.location.href);
    url.searchParams.set('sort', sort);
    if (minPrice) url.searchParams.set('min_price', minPrice);
    if (maxPrice) url.searchParams.set('max_price', maxPrice);
    url.searchParams.set('availability', availability);
    
    window.location.href = url.toString();
}

function setView(view) {
    let url = new URL(window.location.href);
    url.searchParams.set('view', view);
    window.location.href = url.toString();
}

function setRating(rating) {
    let url = new URL(window.location.href);
    url.searchParams.set('rating', rating);
    window.location.href = url.toString();
}
</script> 