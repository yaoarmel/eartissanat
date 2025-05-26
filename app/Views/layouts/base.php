<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EArtisanat' ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    
    <?php if (isset($extra_head)): ?>
        <?= $extra_head ?>
    <?php endif; ?>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    <!-- Header -->
    <?php require_once __DIR__ . '/partials/header.php'; ?>

    <!-- Flash Messages -->
    <?php require_once __DIR__ . '/partials/flash.php'; ?>

    <!-- Main Content -->
    <main class="flex-grow">
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . '/partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="/assets/js/main.js"></script>
    <?php if (isset($extra_scripts)): ?>
        <?= $extra_scripts ?>
    <?php endif; ?>
</body>
</html> 