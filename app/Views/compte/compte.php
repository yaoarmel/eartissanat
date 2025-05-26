<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Mon Compte
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Profil utilisateur -->
        <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center">
            <img src="../assets/img/avatar.png" alt="Avatar utilisateur" class="w-24 h-24 rounded-full mb-4 border-4 border-green-200 object-cover">
            <h3 class="text-xl font-bold mb-1"><?= $_SESSION['user']['last_name'] . ' ' . $_SESSION['user']['first_name']  ?></h3>
            <p class="text-gray-600 mb-4"><?= '+225 '. $_SESSION['user']['phone_number']?></p>
            <a href="/modifier-profil" class="text-green-600 hover:underline text-sm mb-2">Modifier le profil</a>

            

            <a href="/deconnexion" class="text-red-500 hover:underline text-sm">Se déconnecter</a>
              <!-- add author -->
               <?php if ($isAuthor): ?>
            <div class="flex items-center justify-between mt-6">
                <a href="/author/dashboard" class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-user"></i> Je suis auteur
                </a>
            </div>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] == 'admin'): ?>
            <div class="flex items-center justify-between mt-6">
                <a href="/admin" class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-user"></i> Tableau de bord administrateur
                </a>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Informations du compte -->
        <div class="bg-white rounded-2xl shadow p-8">
            <h4 class="text-lg font-semibold mb-4">Informations du compte</h4>
            <ul class="space-y-3 text-gray-700">
                <li><span class="font-medium">Adresse :</span> <?= $_SESSION['user']['address'] ?></li>
                <li><span class="font-medium">Téléphone :</span> <?= '+225 ' . $_SESSION['user']['phone_number'] ?></li>
                <li><span class="font-medium">Date d’inscription :</span> <?= $_SESSION['user']['created_at'] ?></li>
                <li><span class="font-medium">Email :</span> <?= $_SESSION['user']['email'] ?></li>
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
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
                    </li>
                </a>
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
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