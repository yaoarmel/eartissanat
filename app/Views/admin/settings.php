<?php
// Contenu de la page
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Paramètres du site</h1>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <form action="/admin/settings/update" method="POST" class="space-y-6 p-6">
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Paramètres généraux</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-gray-700">Nom du site</label>
                        <input type="text" name="site_name" id="site_name" value="<?= e($settings['site_name'] ?? '') ?>"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="site_description" class="block text-sm font-medium text-gray-700">Description du site</label>
                        <textarea name="site_description" id="site_description" rows="3"
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"><?= e($settings['site_description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Contact</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700">Email de contact</label>
                        <input type="email" name="contact_email" id="contact_email" value="<?= e($settings['contact_email'] ?? '') ?>"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700">Téléphone de contact</label>
                        <input type="tel" name="contact_phone" id="contact_phone" value="<?= e($settings['contact_phone'] ?? '') ?>"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Réseaux sociaux</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="facebook_url" class="block text-sm font-medium text-gray-700">Facebook</label>
                        <input type="url" name="facebook_url" id="facebook_url" value="<?= e($settings['facebook_url'] ?? '') ?>"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="instagram_url" class="block text-sm font-medium text-gray-700">Instagram</label>
                        <input type="url" name="instagram_url" id="instagram_url" value="<?= e($settings['instagram_url'] ?? '') ?>"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <i class="fas fa-save mr-2"></i>
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div> 