<main class="flex-grow">
<section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
        Conversation avec le fournisseur
    </h2>
</section>

<section class="w-full sm:w-[70%] mx-auto px-4">
    <div class="bg-white rounded-2xl shadow p-6 flex flex-col h-[60vh]">
        <!-- Header de la conversation -->
        <div class="flex items-center gap-4 border-b pb-4 mb-4">
            <img src="../assets/img/avatar.png" alt="Avatar fournisseur" class="w-14 h-14 rounded-full border-2 border-green-200 object-cover">
            <div>
                <h3 class="text-lg font-bold">Nom du Fournisseur</h3>
                <span class="text-green-600 text-sm">En ligne</span>
            </div>
        </div>
        <!-- Messages -->
        <div id="messages" class="flex-1 overflow-y-auto space-y-4 mb-4 px-2">
            <!-- Message reçu -->
            <div class="flex items-start gap-2">
                <img src="../assets/img/avatar.png" alt="Fournisseur" class="w-8 h-8 rounded-full object-cover">
                <div class="bg-gray-100 rounded-xl px-4 py-2 max-w-xs">
                    Bonjour, comment puis-je vous aider ?
                    <div class="text-xs text-gray-400 mt-1">10:00</div>
                </div>
            </div>
            <!-- Message envoyé -->
            <div class="flex items-end gap-2 justify-end">
                <div class="bg-green-100 rounded-xl px-4 py-2 max-w-xs">
                    Bonjour, je souhaite négocier le prix de ce produit.
                    <div class="text-xs text-gray-400 mt-1 text-right">10:01</div>
                </div>
                <img src="../assets/img/avatar.png" alt="Vous" class="w-8 h-8 rounded-full object-cover border-2 border-green-400">
            </div>
            <!-- Message reçu -->
            <div class="flex items-start gap-2">
                <img src="../assets/img/avatar.png" alt="Fournisseur" class="w-8 h-8 rounded-full object-cover">
                <div class="bg-gray-100 rounded-xl px-4 py-2 max-w-xs">
                    Bien sûr, quel est votre budget ?
                    <div class="text-xs text-gray-400 mt-1">10:02</div>
                </div>
            </div>
        </div>
        <!-- Zone de saisie -->
        <form id="chat-form" class="flex gap-2 mt-2">
            <input type="text" id="chat-input" class="flex-1 border rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Écrivez votre message...">
            <button type="submit" class="bg-green-600 text-white rounded-full px-5 py-2 hover:bg-green-700 transition">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</section>
</main>