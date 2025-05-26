<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

        <?php if (empty($conversations)): ?>
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg">Vous n'avez pas encore de conversations</p>
            </div>
        <?php else: ?>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    <?php foreach ($conversations as $conversation): ?>
                        <?php
                        $otherUser = $conversation['sender_id'] == Session::getUserId() ? 
                                   $conversation['receiver_name'] : 
                                   $conversation['sender_name'];
                        ?>
                        <li>
                            <a href="/conversation/<?= $conversation['id'] ?>" class="block hover:bg-gray-50">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-900">
                                                <?= htmlspecialchars($otherUser) ?>
                                            </p>
                                            <?php if ($conversation['last_message']): ?>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    <?= htmlspecialchars(substr($conversation['last_message'], 0, 100)) ?>...
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($conversation['last_message_date']): ?>
                                            <div class="ml-4 flex-shrink-0">
                                                <p class="text-sm text-gray-500">
                                                    <?= date('d/m/Y H:i', strtotime($conversation['last_message_date'])) ?>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 