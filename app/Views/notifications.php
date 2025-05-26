<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Vos notifications
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4">
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-4">
            <!-- Notification 1 -->
            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-green-50 transition border-b">
                <i class="fa-solid fa-envelope text-green-600 text-2xl mt-1"></i>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">Nouveau message</span>
                        <span class="text-xs text-gray-400">Il y a 2 min</span>
                    </div>
                    <div class="text-gray-600">Vous avez reçu un nouveau message de <b>Nom du Fournisseur</b>.</div>
                </div>
            </div>
            <!-- Notification 2 -->
            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-green-50 transition border-b">
                <i class="fa-solid fa-box text-green-600 text-2xl mt-1"></i>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">Commande expédiée</span>
                        <span class="text-xs text-gray-400">Hier</span>
                    </div>
                    <div class="text-gray-600">Votre commande #12345 a été expédiée.</div>
                </div>
            </div>
            <!-- Notification 3 -->
            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-green-50 transition">
                <i class="fa-solid fa-check-circle text-green-600 text-2xl mt-1"></i>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">Paiement reçu</span>
                        <span class="text-xs text-gray-400">Lun.</span>
                    </div>
                    <div class="text-gray-600">Votre paiement pour la commande #12345 a été confirmé.</div>
                </div>
            </div>
            <!-- Si aucune notification -->
            <!--
            <div class="text-center text-gray-500 py-8">
                Aucune nouvelle notification.
            </div>
            -->
        </div>
    </section>
</main>