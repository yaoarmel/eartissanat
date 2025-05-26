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
            <a href="/admin"
               class="flex items-center gap-3 px-4 py-2 rounded font-semibold
               <?php echo isActive('/admin', $currentRoute) && $currentRoute === '/admin' ? 'text-green-700 bg-green-100' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-gauge"></i> Tableau de bord
            </a>
            <a href="/admin/users"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/admin/users', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-users"></i> Utilisateurs
            </a>
            <a href="/admin/products"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/admin/products', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-box"></i> Produits
            </a>
            <a href="/admin/orders"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/admin/orders', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-shopping-cart"></i> Commandes
            </a>
            <a href="/messages"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/messages', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-comments"></i> Messages
            </a>
            <a href="/admin/settings"
               class="flex items-center gap-3 px-4 py-2 rounded
               <?php echo isActive('/admin/settings', $currentRoute) ? 'text-green-700 bg-green-100 font-semibold' : 'hover:bg-gray-100'; ?>">
                <i class="fa-solid fa-cog"></i> Paramètres
            </a>
        </nav>
    </aside>

