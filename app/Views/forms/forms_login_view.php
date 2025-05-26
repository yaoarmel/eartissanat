


<main class="flex-grow flex items-center justify-center">
        <section class="bg-white rounded-2xl shadow p-8 w-full max-w-md mt-16 mb-12">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Connexion</h2>
            <form method="POST" action="/login">
            <div class="mb-4">
                    <label for="tel" class="block text-gray-700 font-medium mb-2">Numero de telephone</label>
                    <input type="tel" id="phone" name="phone_number" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Ex: +225 07 07 07 07 07">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Votre mot de passe">
                </div>
                <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition">Se connecter</button>
            </form>
            <div class="flex justify-between mt-4 text-sm">
                <a href="#" class="text-green-600 hover:underline">Mot de passe oublié ?</a>
                <a href="/register" class="text-green-600 hover:underline">Créer un compte</a>
            </div>
        </section>
    </main>

