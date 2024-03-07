<?php
require('config.php');
require('header.php');

// Définir une variable pour stocker le message de confirmation
$message_confirmation = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Ici pour ce projet je vais me limiter sur l'affichage peut-être à l'avanir je peux ajouter ça dans la base de données

    // Message de confirmation
    $message_confirmation = 'Votre message a bien été envoyé. Nous vous contacterons bientôt.';
}
?>

<section id="contact">
    <div class="container">
        <h2 class="section-title">Contactez-nous</h2>
        <div class="contact-form">
            <?php if (!empty($message_confirmation)) : ?>
                <p><?php echo $message_confirmation; ?></p>
                <p><a href="contact.php">Retour à la page précédente</a></p>
            <?php else : ?>
                <form method="post">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" placeholder="Votre nom">

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Votre email">

                    <label for="message">Message :</label>
                    <textarea id="message" name="message" placeholder="Votre message"></textarea>

                    <button type="submit">Envoyer</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require('footer.php'); ?>
