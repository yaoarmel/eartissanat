<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <a href="/conversations" class="text-green-600 hover:text-green-700">
                <i class="fas fa-arrow-left mr-2"></i>Retour aux conversations
            </a>
        </div>

        <div class="bg-white shadow sm:rounded-lg">
            <!-- En-tête de la conversation -->
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-gray-900"><?= htmlspecialchars($title) ?></h1>
            </div>

            <!-- Messages -->
            <div class="px-4 py-5 sm:p-6 space-y-4 max-h-[600px] overflow-y-auto">
                <?php foreach ($messages as $message): ?>
                    <div class="flex <?= $message['sender_id'] == Session::getUserId() ? 'justify-end' : 'justify-start' ?>">
                        <div class="<?= $message['sender_id'] == Session::getUserId() ? 
                                   'bg-green-600 text-white' : 
                                   'bg-gray-100 text-gray-900' ?> 
                                   rounded-lg px-4 py-2 max-w-[70%]">
                            <div class="text-sm">
                                <?= nl2br(htmlspecialchars($message['content'])) ?>
                            </div>
                            <div class="mt-1 text-xs <?= $message['sender_id'] == Session::getUserId() ? 
                                                     'text-green-100' : 
                                                     'text-gray-500' ?>">
                                <?= date('d/m/Y H:i', strtotime($message['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Formulaire d'envoi -->
            <div class="px-4 py-3 bg-gray-50 sm:px-6">
                <form action="/conversation/send" method="POST" class="flex space-x-4">
                    <input type="hidden" name="conversation_id" value="<?= $conversation['id'] ?>">
                    <div class="flex-1">
                        <label for="content" class="sr-only">Message</label>
                        <textarea id="content" name="content" rows="1" required
                                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                  placeholder="Écrivez votre message..."></textarea>
                    </div>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 