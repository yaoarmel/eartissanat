<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900"><?= htmlspecialchars($title) ?></h1>
        <a href="/profile/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
            Modifier le profil
        </a>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?= htmlspecialchars($_SESSION['success']) ?></span>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Informations personnelles</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nom complet</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= htmlspecialchars($user['first_name']) ?> <?= htmlspecialchars($user['last_name']) ?>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Adresse email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= htmlspecialchars($user['email']) ?>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Numéro de téléphone</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= htmlspecialchars($user['phone_number']) ?>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Âge</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= $user['age'] ?> ans
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Adresse</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= htmlspecialchars($user['address']) ?>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Type de compte</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= ucfirst($user['role']) ?>
                        <?php if ($user['role'] === 'artisant' && isset($author) && !$author['is_verified']): ?>
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                En attente de vérification
                            </span>
                        <?php elseif ($user['role'] === 'artisant' && isset($author) && $author['is_verified']): ?>
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Vérifié
                            </span>
                        <?php endif; ?>
                    </dd>
                </div>
            </dl>
        </div>

        <?php if ($user['role'] === 'artisant' && isset($author)): ?>
        <div class="px-4 py-5 sm:px-6 border-t border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Profil artisan</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <?php if ($author['photo_url']): ?>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Photo</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <img src="<?= htmlspecialchars($author['photo_url']) ?>" 
                             alt="Photo de profil" 
                             class="h-32 w-32 rounded-full object-cover">
                    </dd>
                </div>
                <?php endif; ?>
                
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Biographie</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= nl2br(htmlspecialchars($author['bio'] ?? 'Non renseigné')) ?>
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Site web</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?php if ($author['website']): ?>
                            <a href="<?= htmlspecialchars($author['website']) ?>" 
                               class="text-green-600 hover:text-green-500"
                               target="_blank">
                                <?= htmlspecialchars($author['website']) ?>
                            </a>
                        <?php else: ?>
                            Non renseigné
                        <?php endif; ?>
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Mots-clés</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?php if ($author['key_words']): ?>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach (explode(',', $author['key_words']) as $keyword): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <?= htmlspecialchars(trim($keyword)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            Non renseigné
                        <?php endif; ?>
                    </dd>
                </div>

                <?php if ($author['social_media_links']): ?>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Réseaux sociaux</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="space-y-2">
                            <?php foreach (json_decode($author['social_media_links'], true) as $platform => $link): ?>
                                <div class="flex items-center space-x-2">
                                    <span class="font-medium"><?= ucfirst($platform) ?>:</span>
                                    <a href="<?= htmlspecialchars($link) ?>" 
                                       class="text-green-600 hover:text-green-500"
                                       target="_blank">
                                        <?= htmlspecialchars($link) ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </dd>
                </div>
                <?php endif; ?>
            </dl>
        </div>
        <?php endif; ?>
    </div>
</div> 