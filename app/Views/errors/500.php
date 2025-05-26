<?php
$title = $title ?? 'Erreur interne du serveur';
?>

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-xl w-full px-4">
        <div class="text-center">
            <h1 class="text-9xl font-bold text-red-600">500</h1>
            <p class="mt-4 text-xl text-gray-600">Erreur interne du serveur</p>
            <p class="mt-2 text-gray-500">Une erreur inattendue s'est produite. Notre équipe technique a été notifiée.</p>
            <?php if (isset($error) && defined('DEBUG') && DEBUG): ?>
                <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-lg text-left">
                    <pre class="whitespace-pre-wrap"><?= htmlspecialchars($error) ?></pre>
                </div>
            <?php endif; ?>
            <div class="mt-6">
                <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div> 