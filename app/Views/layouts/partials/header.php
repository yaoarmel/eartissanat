<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
?>

<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-8 py-5 flex justify-between items-center">
        <!-- Bouton menu mobile -->
        <button id="mobile-menu-button" class="md:hidden text-gray-600 hover:text-green-600" aria-label="Menu">
            <i class="fas fa-bars text-2xl"></i>
        </button>

        <!-- Logo -->
        <div class="text-2xl font-extrabold text-green-600 tracking-wide">
            <a href="/" class="flex items-center space-x-2">
                <img src="/assets/img/logo.png" alt="E-Artisanat" class="h-10">
                <span class="hidden sm:inline">E-Artisanat</span>
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
        <div class="flex items-center gap-3 sm:gap-5 text-lg font-medium">
            <!-- Notifications -->
            <a href="#" id="notification-btn" class="text-gray-700 hover:text-green-600 transition flex items-center relative" aria-label="Notifications">
                <i class="fa-regular fa-bell text-xl"></i>
                <?php if (isset($unread_notifications) && $unread_notifications > 0): ?>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        <?= e($unread_notifications) ?>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Messages -->
            <a href="/conversations" class="text-gray-700 hover:text-green-600 transition flex items-center relative" aria-label="messages">
                <i class="fa-regular fa-message text-xl"></i>
                <?php if (isset($unread_messages) && $unread_messages > 0): ?>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        <?= e($unread_messages) ?>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Panier -->
            <a href="/cart" class="text-gray-700 hover:text-green-600 transition flex items-center relative" aria-label="Panier">
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
                            <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Se déconnecter</button>
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
        <div class="bg-white w-80 min-h-screen p-4 transform transition-transform duration-300 ease-in-out translate-x-0">
            <!-- En-tête du menu mobile -->
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="/assets/img/logo.png" alt="E-Artisanat" class="h-8">
                    <h2 class="text-xl font-bold text-green-600">E-Artisanat</h2>
                </div>
                <button id="close-mobile-menu" class="text-gray-500 hover:text-gray-700 p-2">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Section utilisateur mobile -->
            <?php if (isset($user)): ?>
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fa-regular fa-user text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800"><?= e($user['name']) ?></p>
                            <a href="/profile" class="text-green-600 text-sm hover:underline">Voir le profil</a>
                        </div>
                    </div>
                    <?php if ($user['role'] === 'admin'): ?>
                        <a href="/admin" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg mb-2">
                            <i class="fas fa-cog"></i>
                            <span>Administration</span>
                        </a>
                    <?php endif; ?>
                    <?php if ($user['role'] === 'author'): ?>
                        <a href="/author/dashboard" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg mb-2">
                            <i class="fas fa-store"></i>
                            <span>Tableau de bord</span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="mb-6 pb-4 border-b border-gray-200 space-y-2">
                    <a href="/login" class="block w-full px-4 py-2 bg-green-600 text-white rounded-lg text-center font-medium hover:bg-green-700">
                        Se connecter
                    </a>
                    <a href="/register" class="block w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-center font-medium hover:bg-gray-300">
                        S'inscrire
                    </a>
                </div>
            <?php endif; ?>

            <!-- Navigation principale mobile -->
            <nav class="space-y-1">
                <a href="/products" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-box"></i>
                    <span>Produits</span>
                </a>
                <a href="/categories" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-tags"></i>
                    <span>Catégories</span>
                </a>
                <a href="/artisans" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-users"></i>
                    <span>Artisans</span>
                </a>
                <a href="/about" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-info-circle"></i>
                    <span>À propos</span>
                </a>
            </nav>

            <!-- Actions rapides mobile -->
            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="grid grid-cols-3 gap-4">
                    <a href="/notifications" class="flex flex-col items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <div class="relative">
                            <i class="fa-regular fa-bell text-xl mb-1"></i>
                            <?php if (isset($unread_notifications) && $unread_notifications > 0): ?>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                                    <?= e($unread_notifications) ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs">Notifications</span>
                    </a>
                    <a href="/conversations" class="flex flex-col items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <div class="relative">
                            <i class="fa-regular fa-message text-xl mb-1"></i>
                            <?php if (isset($unread_messages) && $unread_messages > 0): ?>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                                    <?= e($unread_messages) ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs">Messages</span>
                    </a>
                    <a href="/cart" class="flex flex-col items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <div class="relative">
                            <i class="fa-solid fa-cart-shopping text-xl mb-1"></i>
                            <?php if (isset($cart_count) && $cart_count > 0): ?>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                                    <?= e($cart_count) ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs">Panier</span>
                    </a>
                </div>
            </div>

            <!-- Déconnexion mobile -->
            <?php if (isset($user)): ?>
                <div class="mt-6">
                    <form action="/logout" method="POST">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Se déconnecter</span>
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du menu mobile
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMobileMenu = document.getElementById('close-mobile-menu');
    const mobileMenuContent = mobileMenu.querySelector('div');

    function openMobileMenu() {
        mobileMenu.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            mobileMenuContent.classList.remove('translate-x-0');
            mobileMenuContent.classList.add('-translate-x-full');
        }, 0);
    }

    function closeMobileMenuHandler() {
        mobileMenuContent.classList.remove('-translate-x-full');
        mobileMenuContent.classList.add('translate-x-0');
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    mobileMenuButton.addEventListener('click', openMobileMenu);
    closeMobileMenu.addEventListener('click', closeMobileMenuHandler);
    mobileMenu.addEventListener('click', function(e) {
        if (e.target === mobileMenu) {
            closeMobileMenuHandler();
        }
    });

    // Gestion des notifications
    const notificationBtn = document.getElementById('notification-btn');
    const notificationPopup = document.getElementById('notification-popup');
    const closeNotification = document.getElementById('close-notification');

    notificationBtn.addEventListener('click', function(e) {
        e.preventDefault();
        notificationPopup.classList.toggle('hidden');
    });

    closeNotification.addEventListener('click', function() {
        notificationPopup.classList.add('hidden');
    });

    // Gestion du compte
    const accountBtn = document.getElementById('account-btn');
    const accountPopup = document.getElementById('account-popup');

    accountBtn.addEventListener('click', function(e) {
        e.preventDefault();
        accountPopup.classList.toggle('hidden');
    });

    // Fermer les popups lors d'un clic à l'extérieur
    document.addEventListener('click', function(e) {
        if (!notificationBtn.contains(e.target) && !notificationPopup.contains(e.target)) {
            notificationPopup.classList.add('hidden');
        }
        if (!accountBtn.contains(e.target) && !accountPopup.contains(e.target)) {
            accountPopup.classList.add('hidden');
        }
    });
});
</script>