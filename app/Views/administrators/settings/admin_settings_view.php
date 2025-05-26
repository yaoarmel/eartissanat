<main class="flex-1 p-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto space-y-12">
        <!-- Paramètres du compte -->
        <section class="bg-white rounded-xl shadow p-8">
            <h1 class="text-3xl font-bold mb-8 text-center">Paramètres du compte administrateur</h1>
            <form class="space-y-6">
                <div>
                    <label class="block font-semibold mb-2" for="name">Nom complet</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                        value="Jack Lee"
                    >
                </div>
                <div>
                    <label class="block font-semibold mb-2" for="email">Adresse email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                        value="jack@example.com"
                    >
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold mb-2" for="password">Nouveau mot de passe</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Laisser vide pour ne pas changer"
                        >
                    </div>
                    <div>
                        <label class="block font-semibold mb-2" for="confirm-password">Confirmer le mot de passe</label>
                        <input
                            type="password"
                            id="confirm-password"
                            name="confirm-password"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Laisser vide pour ne pas changer"
                        >
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded font-semibold hover:bg-green-700 transition"
                    >
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </section>

        <!-- Suppression du compte -->
        <section class="bg-white rounded-xl shadow p-8">
            <h2 class="text-xl font-bold mb-4 text-red-600 text-center">Supprimer le compte</h2>
            <p class="mb-4 text-gray-700 text-center">
                Attention : Cette action est irréversible. Votre compte administrateur sera supprimé définitivement.
            </p>
            <div class="flex justify-center">
                <button
                    class="bg-red-600 text-white px-6 py-2 rounded font-semibold hover:bg-red-700 transition"
                >
                    Supprimer mon compte
                </button>
            </div>
        </section>
    </div>
</main>
    </div>