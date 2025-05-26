<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'E-Artisanat' ?></title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    
    <?php if (isset($extra_head)): ?>
        <?= $extra_head ?>
    <?php endif; ?>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <?php include BASE_PATH . '/app/Views/layouts/partials/header.php'; ?>

    <!-- Flash Messages -->
    <?php require_once __DIR__ . '/partials/flash.php'; ?>

    <!-- Main Content -->
    <main class="min-h-screen">
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <?php include BASE_PATH . '/app/Views/layouts/partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="/assets/js/script.js"></script>
    <?php if (isset($extra_scripts)): ?>
        <?= $extra_scripts ?>
    <?php endif; ?>
</body>
</html> 