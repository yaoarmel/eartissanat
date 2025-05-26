<main class="flex-grow">
    <section class="relative overflow-hidden rounded-3xl lg:w-[78%] w-[90%] mx-auto mt-6">
        <img src="assets/img/happy.png" alt="Confetti" class="absolute top-2 right-2 w-11  z-10">
        <img src="assets/img/hero.png" alt="Marché artisanal ivoirien"
             loading="lazy" class="w-full h-64 md:h-96 object-cover">
        <a href="#"
           class="absolute top-4 left-4 bg-green-600 text-white font-semibold px-4 py-2 rounded hover:bg-green-700 shadow-md flex items-center gap-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            J’en profite
        </a>
    </section>

    <!-- ✅ Titre -->
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Richesses ivoiriennes
        </h2>
    </section>

    <!-- ✅ Galerie de Cartes -->
    <section class="w-full sm:w-[70%] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4">
        <!-- Carte 1 -->
         <?php foreach ($categories as $categorie): ?>
        <a href="/products?category=<?= $categorie['id'] ?>">
            <article class="text-center">
                <img src="<?= $categorie['img_url'] ?>" alt="<?= $categorie['description'] ?>"
                     loading="lazy"
                     class="w-[80%] mx-auto object-cover rounded-[40px] transition-transform duration-300 hover:scale-105">
                <p class="mt-3 px-4 py-2 bg-gray-200 font-semibold rounded-full w-max mx-auto">
                    <?= $categorie['name'] ?>
                </p>
            </article>
        </a>
        <?php endforeach; ?>
    </section>

    <!-- ✅ Newsletter -->
    <section class="w-full sm:w-[70%] mx-auto px-4 mt-16 text-center">
        <h3 class="text-xl font-bold mb-4">Recevez nos nouveautés</h3>
        <form class="flex flex-col sm:flex-row gap-4 justify-center">
            <input type="email" placeholder="Votre email"
                   class="px-4 py-2 rounded border border-gray-300 w-full sm:w-auto">
            <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                S'abonner
            </button>
        </form>
    </section>
</main>


