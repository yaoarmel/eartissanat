    <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Paramètres du compte</h1>
            <form class="bg-white rounded-xl shadow p-6 max-w-xl space-y-6">
                <div>
                    <label class="block font-semibold mb-2" for="name">Nom complet</label>
                    <input id="name" type="text" class="w-full border rounded px-4 py-2" placeholder="Votre nom" value="Nom Prénom">
                </div>
                <div>
                    <label class="block font-semibold mb-2" for="email">Adresse e-mail</label>
                    <input id="email" type="email" class="w-full border rounded px-4 py-2" placeholder="Votre email" value="email@example.com">
                </div>
                <div>
                    <label class="block font-semibold mb-2" for="password">Nouveau mot de passe</label>
                    <input id="password" type="password" class="w-full border rounded px-4 py-2" placeholder="Nouveau mot de passe">
                </div>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded font-semibold hover:bg-green-700 transition">Enregistrer</button>
            </form>
        </main>
    </div>