<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

        <?php if (isset($_SESSION['contact_success'])): ?>
            <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?= htmlspecialchars($_SESSION['contact_success']) ?></span>
            </div>
            <?php unset($_SESSION['contact_success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['contact_error'])): ?>
            <div class="mb-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?= htmlspecialchars($_SESSION['contact_error']) ?></span>
            </div>
            <?php unset($_SESSION['contact_error']); ?>
        <?php endif; ?>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="/contact" method="POST" class="space-y-6 p-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" required
                           class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                           class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="4" required
                              class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Envoyer
                    </button>
                </div>
            </form>

            <div class="bg-gray-50 px-6 py-4">
                <div class="text-sm text-gray-500">
                    <p class="mb-2">Vous pouvez également nous contacter :</p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Par téléphone : <a href="tel:+33123456789" class="text-green-600 hover:text-green-700">01 23 45 67 89</a></li>
                        <li>Par email : <a href="mailto:contact@eartisanat.fr" class="text-green-600 hover:text-green-700">contact@eartisanat.fr</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 