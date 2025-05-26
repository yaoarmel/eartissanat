
    <main class="flex-grow flex items-center justify-center">
        <section class="bg-white rounded-2xl shadow p-8 w-full max-w-md mt-16 mb-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Inscription</h2>
            <form method="POST" action="/register">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" id="name" name="last_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Ex: Assohou Rodrigue">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Prenoms</label>
                    <input type="text" id="name" name="first_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Ex: Assohou Rodrigue">
                </div>
                <div class="mb-4">
                    <label for="tel" class="block text-gray-700 font-medium mb-2">Numero de telephone</label>
                    <input type="tel" id="phone" name="phone"  required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Ex: +225 07 07 07 07 07">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Votre mot de passe">
                </div>
                <div class="mb-6">
                    <label for="confirm-password" class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-password" name="confirm-password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Confirmez votre mot de passe">
                </div>
                <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition">Créer un compte</button>
            </form>
            <div class="flex justify-between mt-4 text-sm">
                <a href="/login" class="text-green-600 hover:underline">Déjà un compte ? Se connecter</a>
            </div>
        </section>
    </main>

