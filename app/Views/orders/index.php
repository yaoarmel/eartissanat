<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

    <?php if (empty($orders)): ?>
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg mb-4">Vous n'avez pas encore de commande</p>
            <a href="/products" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Découvrir nos produits
            </a>
        </div>
    <?php else: ?>
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200">
                <?php foreach ($orders as $order): ?>
                    <li>
                        <a href="/order/<?= $order['id'] ?>" class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <p class="text-sm font-medium text-green-600 truncate">
                                            <?= htmlspecialchars($order['product_name']) ?>
                                        </p>
                                        <div class="ml-2 flex-shrink-0 flex">
                                            <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                <?= $order['status'] === 'completed' ? 'bg-green-100 text-green-800' : 
                                                   ($order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                                    'bg-gray-100 text-gray-800') ?>">
                                                <?= ucfirst($order['status']) ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="text-sm text-gray-500">
                                            <?= number_format($order['price'] * $order['quantity'], 2, ',', ' ') ?> €
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            Quantité : <?= $order['quantity'] ?>
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <p>
                                            Commandé le <?= date('d/m/Y', strtotime($order['created_at'])) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div> 