<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <!-- En-tête de la page -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

        <!-- Filtres et catégories -->
        <div class="flex flex-wrap gap-4 mb-8">
            <a href="/products" class="px-4 py-2 rounded-full <?= !isset($category) ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' ?>">
                Tous les produits
            </a>
            <?php foreach ($categories as $cat): ?>
                <a href="/products/category/<?= htmlspecialchars(strtolower(str_replace(' ', '-', $cat['name']))) ?>" 
                   class="px-4 py-2 rounded-full <?= (isset($category) && $category['id'] == $cat['id']) ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' ?>">
                    <?= htmlspecialchars($cat['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Grille de produits -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($products as $product): ?>
                <article class="bg-white rounded-lg shadow overflow-hidden">
                    <a href="/product/<?= $product['id'] ?>">
                        <img src="<?= htmlspecialchars($product['img_url']) ?>" 
                             alt="<?= htmlspecialchars($product['name']) ?>"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                <?= htmlspecialchars($product['name']) ?>
                            </h3>
                            <p class="text-gray-600 text-sm mb-2">
                                <?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-green-600 font-bold">
                                    <?= number_format($product['price'], 2, ',', ' ') ?> €
                                </span>
                                <span class="text-gray-500 text-sm">
                                    Par <?= htmlspecialchars($product['author_name']) ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="p-4 border-t">
                        <form action="/cart/add" method="POST" class="flex gap-2">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="number" name="quantity" value="1" min="1" max="99"
                                   class="w-20 px-2 py-1 border rounded">
                            <button type="submit" class="flex-1 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Ajouter au panier
                            </button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 