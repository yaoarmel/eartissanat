<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

    <?php if (empty($cartItems)): ?>
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg mb-4">Votre panier est vide</p>
            <a href="/products" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Découvrir nos produits
            </a>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- En-tête du tableau -->
            <div class="grid grid-cols-6 gap-4 p-4 bg-gray-50 border-b">
                <div class="col-span-2">Produit</div>
                <div>Prix unitaire</div>
                <div>Quantité</div>
                <div>Total</div>
                <div>Actions</div>
            </div>

            <!-- Articles du panier -->
            <?php foreach ($cartItems as $item): ?>
                <div class="grid grid-cols-6 gap-4 p-4 border-b items-center">
                    <div class="col-span-2 flex items-center gap-4">
                        <img src="<?= htmlspecialchars($item['img_url']) ?>" 
                             alt="<?= htmlspecialchars($item['name']) ?>"
                             class="w-16 h-16 object-cover rounded">
                        <div>
                            <h3 class="font-semibold"><?= htmlspecialchars($item['name']) ?></h3>
                            <p class="text-sm text-gray-600">Réf: <?= $item['product_id'] ?></p>
                        </div>
                    </div>
                    <div class="text-gray-900">
                        <?= number_format($item['price'], 2, ',', ' ') ?> €
                    </div>
                    <div>
                        <form action="/cart/update" method="POST" class="flex items-center gap-2">
                            <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" 
                                   min="1" max="99" class="w-20 px-2 py-1 border rounded"
                                   onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="font-semibold text-green-600">
                        <?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?> €
                    </div>
                    <div>
                        <form action="/cart/remove" method="POST" class="inline">
                            <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Total et actions -->
            <div class="p-4 bg-gray-50">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xl font-bold">Total</span>
                    <span class="text-2xl font-bold text-green-600">
                        <?= number_format($total, 2, ',', ' ') ?> €
                    </span>
                </div>
                <div class="flex justify-between">
                    <form action="/cart/clear" method="POST">
                        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Vider le panier
                        </button>
                    </form>
                    <a href="/checkout" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Passer la commande
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div> 