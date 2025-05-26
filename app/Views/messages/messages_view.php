<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Vos conversations
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4">
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-4">
            <!-- Conversation 1 -->
            <a href="/conversation" class="flex items-center gap-4 p-4 rounded-xl hover:bg-green-50 transition border-b">
                <img src="assets/img/avatar.png" alt="Fournisseur" class="w-12 h-12 rounded-full object-cover border-2 border-green-200">
                <div class="flex-1">
                    <div class="flex justify-between items-center"></div>
                        <h3 class="font-bold text-lg">Nom du Fournisseur</h3>
                        <span class="text-xs text-gray-400">10:02</span>
                    </div>
                    <div class="text-gray-600 truncate">Bien sûr, quel est votre budget ?</div>
                </div>
                <span class="inline-block bg-green-500 text-white text-xs px-2 py-1 rounded-full">1</span>
            </a>
            <!-- Conversation 2 -->
            <a href="/conversation" class="flex items-center gap-4 p-4 rounded-xl hover:bg-green-50 transition border-b">
                <img src="/assets/img/avatar.png" alt="Fournisseur" class="w-12 h-12 rounded-full object-cover border-2 border-green-200">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">Artisan Bijoux</h3>
                        <span class="text-xs text-gray-400">Hier</span>
                    </div>
                    <div class="text-gray-600 truncate">Merci pour votre commande !</div>
                </div>
            </a>
            <!-- Conversation 3 -->
            <a href="/conversation" class="flex items-center gap-4 p-4 rounded-xl hover:bg-green-50 transition">
                <img src="/assets/img/avatar.png" alt="Fournisseur" class="w-12 h-12 rounded-full object-cover border-2 border-green-200">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">Tisserand Local</h3>
                        <span class="text-xs text-gray-400">Lun.</span>
                    </div>
                    <div class="text-gray-600 truncate">Votre colis est en route.</div>
                </div>
            </a>
        </div>
    </section>
</main>