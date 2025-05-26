<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Mon compte</h1>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center gap-4">
                <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center">
                    <?php if ($user['avatar']): ?>
                        <img src="<?= e($user['avatar']) ?>" alt="Photo de profil" class="w-full h-full rounded-full object-cover">
                    <?php else: ?>
                        <i class="fas fa-user text-4xl text-gray-400"></i>
                    <?php endif; ?>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900"><?= e($user['name']) ?></h2>
                    <p class="text-sm text-gray-500"><?= e($user['email']) ?></p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nom complet</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= e($user['name']) ?></dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= e($user['email']) ?></dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= e($user['phone'] ?? 'Non renseigné') ?></dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Adresse</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= e($user['address'] ?? 'Non renseignée') ?></dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-4">
        <a href="/account/edit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <i class="fas fa-edit mr-2"></i>
            Modifier mon profil
        </a>
        <a href="/orders" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <i class="fas fa-box mr-2"></i>
            Mes commandes
        </a>
        <a href="/notifications" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <i class="fas fa-bell mr-2"></i>
            Notifications
        </a>
        <a href="/conversations" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            <i class="fas fa-comments mr-2"></i>
            Messages
        </a>
    </div>
</div> 