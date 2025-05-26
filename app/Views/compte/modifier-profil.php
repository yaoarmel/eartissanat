<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Modifier le profil
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Formulaire de modification du profil -->
        <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center">
            <form class="w-full max-w-sm flex flex-col items-center" autocomplete="off" action="" method="POST" >
                <div class="mb-6 flex flex-col items-center">
                    <label for="avatar" class="cursor-pointer">
                        <img src="assets/img/avatar.png" alt="Avatar utilisateur" class="w-24 h-24 rounded-full mb-2 border-4 border-green-200 object-cover">
                        <span class="block text-green-600 text-sm hover:underline">Changer la photo</span>
                    </label>
                    <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden">
                </div>
                <div class="mb-4 w-full">
                    <label for="nom" class="block text-gray-700 font-medium mb-1">Nom</label>
                    <input type="text" id="nom" name="last_name" value="<?= $_SESSION['user']['last_name'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div class="mb-4 w-full">
                    <label for="prenom" class="block text-gray-700 font-medium mb-1">Prénom</label>
                    <input type="text" id="prenom" name="first_name" value="<?= $_SESSION['user']['first_name'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div class="mb-4 w-full">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div class="mb-4 w-full">
                    <label for="age" class="block text-gray-700 font-medium mb-1">Age</label>
                    <input type="number" id="age" name="age" value="<?= $_SESSION['user']['age'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>

                <div class="mb-4 w-full">
                    <label for="adresse" class="block text-gray-700 font-medium mb-1">Adresse</label>
                    <input type="text" id="adresse" name="address" value="<?= $_SESSION['user']['address'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div class="mb-4 w-full">
                    <label for="telephone" class="block text-gray-700 font-medium mb-1">Téléphone</label>
                    <input type="tel" id="telephone" name="phone_number" value="<?= $_SESSION['user']['phone_number'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div class="flex w-full gap-2 mt-4">
                    <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 font-semibold">Enregistrer</button>
                    <a href="/compte" class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-center font-semibold">Annuler</a>
                </div>
            </form>
        </div>
        <!-- Informations du compte (lecture seule) -->
        <div class="bg-white rounded-2xl shadow p-8">
            <h4 class="text-lg font-semibold mb-4">Informations du compte</h4>
            <ul class="space-y-3 text-gray-700">
                <li><span class="font-medium">Date d’inscription :</span> <?= $_SESSION['user']['created_at'] ?></li>
            </ul>
            <hr class="my-6">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-semibold">Mes commandes</h4>
                <a href="/mescommandes.html" class="text-green-600 text-sm hover:underline flex items-center gap-1">
                    Voir plus
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
            <ul class="space-y-2">
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1234</span>
                        <span class="text-green-600 font-medium">Livrée</span>
                    </li>
                </a>
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
                    </li>
                </a>
            </ul>
        </div>
    </section>
</main>