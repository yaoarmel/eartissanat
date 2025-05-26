<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8"><?= htmlspecialchars($title) ?></h1>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6 prose max-w-none">
                <h2>1. Collecte des informations</h2>
                <p>
                    Nous collectons les informations suivantes :
                </p>
                <ul>
                    <li>Nom et prénom</li>
                    <li>Adresse email</li>
                    <li>Numéro de téléphone</li>
                    <li>Adresse postale</li>
                    <li>Informations de paiement</li>
                </ul>

                <h2>2. Utilisation des informations</h2>
                <p>
                    Les informations que nous collectons sont utilisées pour :
                </p>
                <ul>
                    <li>Traiter vos commandes</li>
                    <li>Vous contacter concernant vos commandes</li>
                    <li>Personnaliser votre expérience</li>
                    <li>Améliorer notre service client</li>
                </ul>

                <h2>3. Protection des informations</h2>
                <p>
                    Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles.
                    Nous utilisons un cryptage à la pointe de la technologie pour protéger les informations sensibles transmises en ligne.
                </p>

                <h2>4. Cookies</h2>
                <p>
                    Notre site utilise des cookies pour améliorer l'expérience utilisateur. Un cookie est un petit fichier texte 
                    qui est placé sur votre disque dur par un serveur de pages Web. Les cookies ne peuvent pas être utilisés pour 
                    exécuter des programmes ou transmettre des virus à votre ordinateur.
                </p>

                <h2>5. Divulgation à des tiers</h2>
                <p>
                    Nous ne vendons, n'échangeons et ne transférons pas vos informations personnelles identifiables à des tiers. 
                    Cela ne comprend pas les tierces parties de confiance qui nous aident à exploiter notre site Web ou à mener nos affaires, 
                    tant que ces parties conviennent de garder ces informations confidentielles.
                </p>

                <h2>6. Consentement</h2>
                <p>
                    En utilisant notre site, vous consentez à notre politique de confidentialité.
                </p>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 