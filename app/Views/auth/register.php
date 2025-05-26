<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Créer un compte
                </h2>
            </div>

            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="/register" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="first_name" class="sr-only">Prénom</label>
                        <input id="first_name" name="first_name" type="text" required 
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Prénom">
                    </div>
                    <div>
                        <label for="last_name" class="sr-only">Nom</label>
                        <input id="last_name" name="last_name" type="text" required 
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Nom">
                    </div>
                    <div>
                        <label for="email" class="sr-only">Adresse email</label>
                        <input id="email" name="email" type="email" required 
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Adresse email">
                    </div>
                    <div>
                        <label for="phone_number" class="sr-only">Numéro de téléphone</label>
                        <input id="phone_number" name="phone_number" type="tel" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Numéro de téléphone">
                    </div>
                    <div>
                        <label for="age" class="sr-only">Âge</label>
                        <input id="age" name="age" type="number" min="18" max="120"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Âge">
                    </div>
                    <div>
                        <label for="address" class="sr-only">Adresse</label>
                        <input id="address" name="address" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Adresse">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" required 
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                               placeholder="Mot de passe">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="is_artisan" name="is_artisan" type="checkbox" 
                           class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                           onchange="toggleArtisanFields(this.checked)">
                    <label for="is_artisan" class="ml-2 block text-sm text-gray-900">
                        Je suis un artisan
                    </label>
                </div>

                <div id="artisan_fields" class="hidden space-y-6">
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Biographie</label>
                        <textarea id="bio" name="bio" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                  placeholder="Parlez-nous de vous et de votre travail..."></textarea>
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Site web</label>
                        <input type="url" name="website" id="website"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                               placeholder="https://www.votresite.com">
                    </div>

                    <div>
                        <label for="key_words" class="block text-sm font-medium text-gray-700">Mots-clés</label>
                        <input type="text" name="key_words" id="key_words"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                               placeholder="poterie, céramique, artisanat...">
                    </div>

                    <div>
                        <label for="social_media" class="block text-sm font-medium text-gray-700">Réseaux sociaux (JSON)</label>
                        <input type="text" name="social_media" id="social_media"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                               placeholder='{"instagram": "@votrecompte", "facebook": "votrepage"}'>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        S'inscrire
                    </button>
                </div>

                <div class="text-sm text-center">
                    <a href="/login" class="font-medium text-green-600 hover:text-green-500">
                        Déjà un compte ? Connectez-vous
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleArtisanFields(show) {
    const artisanFields = document.getElementById('artisan_fields');
    artisanFields.classList.toggle('hidden', !show);
    
    // Rendre les champs requis ou non selon le cas
    const fields = artisanFields.querySelectorAll('input, textarea');
    fields.forEach(field => {
        field.required = show;
    });
}
</script> 