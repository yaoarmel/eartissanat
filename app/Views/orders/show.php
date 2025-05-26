<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="/orders" class="text-green-600 hover:text-green-700">
            <i class="fas fa-arrow-left mr-2"></i>Retour aux commandes
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-2xl font-bold text-gray-900"><?= htmlspecialchars($title) ?></h1>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Commandé le <?= date('d/m/Y', strtotime($order['created_at'])) ?>
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Statut</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?= $order['status'] === 'completed' ? 'bg-green-100 text-green-800' : 
                               ($order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                'bg-gray-100 text-gray-800') ?>">
                            <?= ucfirst($order['status']) ?>
                        </span>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Produit</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= htmlspecialchars($order['product_name']) ?>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Quantité</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= $order['quantity'] ?>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Prix unitaire</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= number_format($order['price'], 2, ',', ' ') ?> €
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Total</dt>
                    <dd class="mt-1 text-sm font-semibold text-green-600 sm:mt-0 sm:col-span-2">
                        <?= number_format($order['price'] * $order['quantity'], 2, ',', ' ') ?> €
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Adresse de livraison</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= htmlspecialchars($order['first_name']) ?> <?= htmlspecialchars($order['last_name']) ?><br>
                        <?= htmlspecialchars($order['phone_number']) ?><br>
                        <?= htmlspecialchars($order['email']) ?>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div> 