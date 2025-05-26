<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Vos notifications
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4">
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-4">
            <?php if (empty($notifications)): ?>
                <div class="text-center text-gray-500 py-8">
                    Aucune nouvelle notification.
                </div>
            <?php else: ?>
                <?php foreach ($notifications as $notification): ?>
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-green-50 transition border-b">
                        <i class="fa-solid <?= e($notification['icon']) ?> text-green-600 text-2xl mt-1"></i>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-bold"><?= e($notification['title']) ?></span>
                                <span class="text-xs text-gray-400"><?= e($notification['time_ago']) ?></span>
                            </div>
                            <div class="text-gray-600"><?= $notification['message'] ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
?> 