<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'E-Artisanat') ?></title>
    <meta name="description" content="Découvrez les trésors artisanaux de la Côte d'Ivoire avec E-Artisanat.">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-800 transition-colors duration-300 min-h-screen flex flex-col">

    <!-- Navigation -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-screen-xl mx-auto px-8 py-5 flex justify-between items-center">
            <div class="text-2xl font-extrabold text-green-600 tracking-wide">
                <a href="/">E-Artisanat</a>
            </div>
            <nav class="flex items-center gap-5 text-lg font-medium">
                <a href="#" id="notification-btn" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="Notifications">
                    <i class="fa-regular fa-bell text-xl"></i>
                </a>
                <a href="/conversations" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="messages">
                    <i class="fa-regular fa-message text-xl"></i>
                </a>
                <a href="/cart" class="text-gray-700 hover:text-green-600 transition flex items-center mr-3" aria-label="Panier">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                </a>
                
                <!-- Notification Popup -->
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
                                <li><?= htmlspecialchars($notification['message']) ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <button id="close-notification" class="mt-4 px-4 py-1 bg-green-600 text-white rounded hover:bg-green-700">Fermer</button>
                </div>

                <div class="relative flex flex-row">
                    <a href="#" id="account-btn" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="Compte">
                        <i class="fa-regular fa-user text-xl"></i>
                    </a>

                    <!-- Account Popup -->
                    <div id="account-popup" class="hidden absolute right-3 top-20 bg-white shadow-lg rounded-xl p-4 w-64 z-50">
                        <?php if (isset($user)): ?>
                            <div class="flex items-center gap-3 mb-4">
                                <i class="fa-regular fa-user text-2xl text-green-600"></i>
                                <div>
                                    <p class="font-semibold"><?= htmlspecialchars($user['name']) ?></p>
                                    <a href="/profile" class="text-green-600 text-sm hover:underline">Voir le profil</a>
                                </div>
                            </div>
                            <form action="/logout" method="POST">
                                <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 mb-2">Se déconnecter</button>
                            </form>
                        <?php else: ?>
                            <a href="/login" class="block w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 mb-2 text-center">Se connecter</a>
                            <a href="/register" class="block w-full px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-center">S'inscrire</a>
                        <?php endif; ?>
                        <button id="close-account" class="w-full px-4 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mt-2">Fermer</button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</body>
</html> 