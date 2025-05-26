<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Récapitulatif de la commande -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h2 class="text-lg font-medium text-gray-900">Récapitulatif de votre commande</h2>
                </div>
                <div class="border-t border-gray-200">
                    <ul role="list" class="divide-y divide-gray-200">
                        <?php foreach ($cartItems as $item): ?>
                            <li class="px-4 py-4">
                                <div class="flex items-center">
                                    <img src="<?= htmlspecialchars($item['img_url']) ?>" 
                                         alt="<?= htmlspecialchars($item['name']) ?>"
                                         class="w-16 h-16 object-cover rounded">
                                    <div class="ml-4 flex-1">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            <?= htmlspecialchars($item['name']) ?>
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Quantité : <?= $item['quantity'] ?>
                                        </p>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">
                                            <?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?> €
                                        </p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="px-4 py-4 bg-gray-50 sm:px-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Total</p>
                            <p><?= number_format($total, 2, ',', ' ') ?> €</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire de paiement -->
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Informations de paiement</h3>
                    <form action="/order/create" method="POST">
                        <div class="space-y-6">
                            <div>
                                <label for="card_number" class="block text-sm font-medium text-gray-700">
                                    Numéro de carte
                                </label>
                                <input type="text" name="card_number" id="card_number" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                       placeholder="1234 5678 9012 3456">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="expiry" class="block text-sm font-medium text-gray-700">
                                        Date d'expiration
                                    </label>
                                    <input type="text" name="expiry" id="expiry" required
                                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                           placeholder="MM/AA">
                                </div>
                                <div>
                                    <label for="cvc" class="block text-sm font-medium text-gray-700">
                                        CVC
                                    </label>
                                    <input type="text" name="cvc" id="cvc" required
                                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                           placeholder="123">
                                </div>
                            </div>

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Nom sur la carte
                                </label>
                                <input type="text" name="name" id="name" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                       placeholder="John Doe">
                            </div>

                            <div>
                                <button type="submit"
                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Payer <?= number_format($total, 2, ',', ' ') ?> €
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 