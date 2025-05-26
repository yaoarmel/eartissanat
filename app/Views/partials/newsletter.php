<section class="w-full sm:w-[70%] mx-auto px-4 mt-16 mb-12 text-center">
    <div class="bg-gray-100 rounded-lg p-8">
        <h3 class="text-2xl font-bold mb-4">Restez informé de nos nouveautés</h3>
        <p class="text-gray-600 mb-6">Inscrivez-vous à notre newsletter pour recevoir nos dernières actualités et offres spéciales.</p>
        <form action="/newsletter/subscribe" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center max-w-lg mx-auto">
            <input type="email" name="email" placeholder="Votre email"
                   required
                   class="px-4 py-2 rounded-lg border border-gray-300 w-full sm:w-auto focus:ring-2 focus:ring-green-500 focus:border-green-500">
            <button type="submit" 
                    class="bg-green-600 text-white px-8 py-2 rounded-lg hover:bg-green-700 transition-colors duration-300">
                S'abonner
            </button>
        </form>
    </div>
</section> 