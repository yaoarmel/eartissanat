<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
?>

<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-screen-xl mx-auto px-8 py-5 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-extrabold text-green-600 tracking-wide">
            <a href="/" class="flex items-center space-x-2">
                <img src="/assets/img/logo.png" alt="E-Artisanat" class="h-10">
                <span>E-Artisanat</span>
            </a>
        </div>

        <!-- Navigation principale -->
        <nav class="hidden md:flex items-center space-x-6">
            <a href="/products" class="text-gray-600 hover:text-green-600">Produits</a>
            <a href="/categories" class="text-gray-600 hover:text-green-600">Catégories</a>
            <a href="/artisans" class="text-gray-600 hover:text-green-600">Artisans</a>
            <a href="/about" class="text-gray-600 hover:text-green-600">À propos</a>
        </nav>

        <!-- Actions utilisateur -->
        <div class="flex items-center gap-5 text-lg font-medium">
            <!-- Notifications -->
            <a href="#" id="notification-btn" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="Notifications">
                <i class="fa-regular fa-bell text-xl"></i>
                <?php if (isset($unread_notifications) && $unread_notifications > 0): ?>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        <?= e($unread_notifications) ?>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Messages -->
            <a href="/conversations" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="messages">
                <i class="fa-regular fa-message text-xl"></i>
                <?php if (isset($unread_messages) && $unread_messages > 0): ?>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        <?= e($unread_messages) ?>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Panier -->
            <a href="/cart" class="text-gray-700 hover:text-green-600 transition flex items-center mr-3 relative" aria-label="Panier">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
                <?php if (isset($cart_count) && $cart_count > 0): ?>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        <?= e($cart_count) ?>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Popup Notifications -->
            <div id="notification-popup" class="hidden absolute right-7 top-20 bg-white shadow-lg rounded-xl p-4 w-80 z-50">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold">Notifications</h4>
                    <a href="/notifications" class="text-green-600 text-sm hover:underline flex items-center gap-1">
                        Voir plus
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
                <ul class="text-gray-700 text-sm space-y-2">
                    <?php if (empty($notifications)): ?>
                        <li>Aucune nouvelle notification.</li>
                    <?php else: ?>
                        <?php foreach ($notifications as $notification): ?>
                            <li><?= e($notification['message']) ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button id="close-notification" class="mt-4 px-4 py-1 bg-green-600 text-white rounded hover:bg-green-700">Fermer</button>
            </div>

            <!-- Compte utilisateur -->
            <div class="relative">
                <a href="#" id="account-btn" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="Compte">
                    <i class="fa-regular fa-user text-xl"></i>
                </a>

                <!-- Popup Compte -->
                <div id="account-popup" class="hidden absolute right-0 top-12 bg-white shadow-lg rounded-xl p-4 w-64 z-50">
                    <?php if (isset($user)): ?>
                        <div class="flex items-center gap-3 mb-4">
                            <i class="fa-regular fa-user text-2xl text-green-600"></i>
                            <div>
                                <p class="font-semibold"><?= e($user['name']) ?></p>
                                <a href="/profile" class="text-green-600 text-sm hover:underline">Voir le profil</a>
                            </div>
                        </div>
                        <?php if ($user['role'] === 'admin'): ?>
                            <a href="/admin" class="block w-full px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mb-2 text-center">
                                Administration
                            </a>
                        <?php endif; ?>
                        <?php if ($user['role'] === 'author'): ?>
                            <a href="/author/dashboard" class="block w-full px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mb-2 text-center">
                                Tableau de bord
                            </a>
                        <?php endif; ?>
                        <form action="/logout" method="POST">
                            <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 mb-2">Se déconnecter</button>
                        </form>
                    <?php else: ?>
                        <a href="/login" class="block w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 mb-2 text-center">Se connecter</a>
                        <a href="/register" class="block w-full px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-center">S'inscrire</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Menu mobile -->
<div class="md:hidden">
    <div id="mobile-menu" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 z-50">
        <div class="bg-white w-64 min-h-screen p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-green-600">Menu</h2>
                <button id="close-mobile-menu" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <nav class="space-y-4">
                <a href="/products" class="block text-gray-600 hover:text-green-600">Produits</a>
                <a href="/categories" class="block text-gray-600 hover:text-green-600">Catégories</a>
                <a href="/artisans" class="block text-gray-600 hover:text-green-600">Artisans</a>
                <a href="/about" class="block text-gray-600 hover:text-green-600">À propos</a>
            </nav>
        </div>
    </div>
</div>