<?php require_once __DIR__ . '/../layouts/admin-header.php'; ?>

<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900"><?= htmlspecialchars($title) ?></h1>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?= htmlspecialchars($_SESSION['success']) ?></span>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <!-- Filtres -->
        <div class="mt-4 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="flex items-center space-x-4">
                <a href="/admin/authors?status=all" 
                   class="<?= $status === 'all' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?> px-4 py-2 rounded-md text-sm font-medium">
                    Tous
                </a>
                <a href="/admin/authors?status=pending" 
                   class="<?= $status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' ?> px-4 py-2 rounded-md text-sm font-medium">
                    En attente
                </a>
                <a href="/admin/authors?status=verified" 
                   class="<?= $status === 'verified' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?> px-4 py-2 rounded-md text-sm font-medium">
                    Vérifiés
                </a>
            </div>
        </div>

        <!-- Liste des artisans -->
        <div class="mt-4">
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul role="list" class="divide-y divide-gray-200">
                    <?php foreach ($authors as $author): ?>
                        <li>
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <?php if ($author['photo_url']): ?>
                                            <img class="h-10 w-10 rounded-full object-cover" 
                                                 src="<?= htmlspecialchars($author['photo_url']) ?>" 
                                                 alt="">
                                        <?php else: ?>
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-500 font-medium">
                                                    <?= strtoupper(substr($author['first_name'], 0, 1) . substr($author['last_name'], 0, 1)) ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="ml-4">
                                            <a href="/admin/authors/<?= $author['id'] ?>" class="text-sm font-medium text-green-600 hover:text-green-900">
                                                <?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?>
                                            </a>
                                            <p class="text-sm text-gray-500">
                                                <?= htmlspecialchars($author['email']) ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <?php if (!$author['is_verified']): ?>
                                            <form action="/admin/authors/verify" method="POST" class="inline">
                                                <input type="hidden" name="author_id" value="<?= $author['id'] ?>">
                                                <input type="hidden" name="action" value="verify">
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                                    Vérifier
                                                </button>
                                            </form>
                                            <form action="/admin/authors/verify" method="POST" class="inline">
                                                <input type="hidden" name="author_id" value="<?= $author['id'] ?>">
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                    Rejeter
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Vérifié
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <?php if ($author['key_words']): ?>
                                        <div class="flex flex-wrap gap-2">
                                            <?php foreach (explode(',', $author['key_words']) as $keyword): ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    <?= htmlspecialchars(trim($keyword)) ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <div class="mt-4 flex justify-center">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="/admin/authors?status=<?= $status ?>&page=<?= $i ?>" 
                           class="<?= $i === $page ? 'bg-green-50 border-green-500 text-green-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' ?> relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/admin-footer.php'; ?> 