<?php
$currentRoute = $_SERVER['REQUEST_URI'];
function isActive($route, $currentRoute) {
    return strpos($currentRoute, $route) === 0;
}
?>

<div class="flex flex-1">
    <!-- Sidebar -->
    <aside class="bg-white w-64 min-h-screen shadow-lg hidden md:block">
        <nav class="flex flex-col gap-2 p-6">
            <a href="/author/dashboard"
               class="flex items-center gap-3 px-4 py-2 rounded font-semibold
               <?php echo isActive('/author/dashboard', $currentRoute) && $currentRoute === '/admin' ? 'text-green-700 bg-green-100' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-gauge"></i> Tableau de bord
            </a>
            <a href="/author/products"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/author/products', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-users"></i> Mes produits
            </a>
            <a href="/author/orders"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/author/orders', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-box"></i> Mes commandes
            </a>
            <a href="/messages"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/messages', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-shopping-cart"></i> Messages
            </a>
            <a href="/author/settings"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/author/settings', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-shopping-cart"></i> Paramètres
            </a>
           
    </aside>

