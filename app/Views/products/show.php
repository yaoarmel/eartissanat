<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            <!-- Image gallery -->
            <div class="flex flex-col">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="<?= htmlspecialchars($product['img_url']) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>"
                         class="w-full h-full object-center object-cover">
                </div>
            </div>

            <!-- Product info -->
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900"><?= htmlspecialchars($product['name']) ?></h1>
                
                <div class="mt-3">
                    <h2 class="sr-only">Informations produit</h2>
                    <p class="text-3xl text-gray-900"><?= number_format($product['price'], 2, ',', ' ') ?> €</p>
                </div>

                <!-- Artisan info -->
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-900">Artisan</h3>
                    <div class="mt-2 flex items-center">
                        <?php if (isset($author['photo_url'])): ?>
                            <img src="<?= htmlspecialchars($author['photo_url']) ?>" 
                                 alt="<?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?>"
                                 class="h-10 w-10 rounded-full object-cover">
                        <?php else: ?>
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500 font-medium">
                                    <?= strtoupper(substr($author['first_name'], 0, 1) . substr($author['last_name'], 0, 1)) ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        <div class="ml-3">
                            <a href="/artisans/<?= $author['id'] ?>" class="text-sm font-medium text-green-600 hover:text-green-900">
                                <?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?>
                            </a>
                            <?php if ($author['is_verified']): ?>
                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Vérifié
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Product details -->
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-900">Description</h3>
                    <div class="mt-2 prose prose-sm text-gray-500">
                        <?= nl2br(htmlspecialchars($product['description'])) ?>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Origine</h3>
                        <p class="mt-2 text-sm text-gray-500"><?= htmlspecialchars($product['origin']) ?></p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Matériau</h3>
                        <p class="mt-2 text-sm text-gray-500"><?= htmlspecialchars($product['material']) ?></p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Dimensions</h3>
                        <p class="mt-2 text-sm text-gray-500"><?= htmlspecialchars($product['dimensions']) ?></p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Catégorie</h3>
                        <p class="mt-2 text-sm text-gray-500"><?= htmlspecialchars($product['category_name']) ?></p>
                    </div>
                </div>

                <!-- Stock and Add to cart -->
                <div class="mt-8 flex">
                    <?php if ($product['stock'] > 0): ?>
                        <form action="/cart/add" method="POST" class="flex-1">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <div class="flex items-center">
                                <label for="quantity" class="sr-only">Quantité</label>
                                <select id="quantity" name="quantity" 
                                        class="rounded-md border border-gray-300 text-base font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                    <?php for ($i = 1; $i <= min(10, $product['stock']); $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <button type="submit" 
                                        class="ml-4 flex-1 bg-green-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Ajouter au panier
                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="flex-1">
                            <button disabled 
                                    class="w-full bg-gray-400 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white">
                                Rupture de stock
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 