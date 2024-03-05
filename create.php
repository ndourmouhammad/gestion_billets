<?php
require('config.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $dte_naissance = $_POST["dte_naissance"];
    $sexe = $_POST["sexe"];
    $adresse_postale = $_POST["adresse_postale"];
    $num_tel = $_POST["num_tel"];
    $adresse_email = $_POST["adresse_email"];
    $date_reservation = $_POST["date_reservation"];
    $heure_reservation = $_POST["heure_reservation"];
    $lieu_depart = $_POST["lieu_depart"];
    $destination = $_POST["destination"];
    $prix = $_POST["prix"];
    $statut = $_POST["statut"];

    // Insérer d'abord le nouveau client
    $insert_client_query = $connection->prepare("INSERT INTO client (nom, prenom, dte_naissance, sexe, adresse_postale, num_tel, adresse_email) VALUES (:nom, :prenom, :dte_naissance, :sexe, :adresse_postale, :num_tel, :adresse_email)");
    $insert_client_query->bindParam(':nom', $nom);
    $insert_client_query->bindParam(':prenom', $prenom);
    $insert_client_query->bindParam(':dte_naissance', $dte_naissance);
    $insert_client_query->bindParam(':sexe', $sexe);
    $insert_client_query->bindParam(':adresse_postale', $adresse_postale);
    $insert_client_query->bindParam(':num_tel', $num_tel);
    $insert_client_query->bindParam(':adresse_email', $adresse_email);
    $insert_client_query->execute();

    // Récupérer l'ID du nouveau client
    $id_client = $connection->lastInsertId();

    // Insérer les détails du billet dans la table "billet"
    $insert_query = $connection->prepare("INSERT INTO billet (id_client, date_reservation, heure_reservation, prix, statut, lieu_depart, destination) VALUES (:client_id, :date_reservation, :heure_reservation, :prix, :statut, :lieu_depart, :destination)");
    $insert_query->bindParam(':client_id', $id_client);
    $insert_query->bindParam(':date_reservation', $date_reservation);
    $insert_query->bindParam(':heure_reservation', $heure_reservation);
    $insert_query->bindParam(':prix', $prix);
    $insert_query->bindParam(':statut', $statut);
    $insert_query->bindParam(':lieu_depart', $lieu_depart);
    $insert_query->bindParam(':destination', $destination);
    $insert_query->execute();

    echo "Le billet a été ajouté avec succès.";
    header('location: index.php');
}

?>

<?php require('header.php') ?>

<div class="banniere-create">
<h1>Merci de votre intérêt pour notre service de réservation.</h1>
</div>
<div class="container">
    <h2>Ajouter un billet</h2>
    <form method="post" class="reservation-form">
    <div class="form-row">
        <div class="form-group">
            <label for="nom">Nom du client :</label>
            <input type="text" id="nom" name="nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom du client :</label>
            <input type="text" id="prenom" name="prenom">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix">
        </div>
        <div class="form-group">
            <label for="statut">Statut :</label>
            <input type="text" id="statut" name="statut">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <input type="text" id="sexe" name="sexe">
        </div>
        <div class="form-group">
            <label for="dte_naissance">Date de naissance :</label>
            <input type="date" id="dte_naissance" name="dte_naissance">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="adresse_postale">Adresse postale :</label>
            <input type="text" id="adresse_postale" name="adresse_postale">
        </div>
        <div class="form-group">
            <label for="num_tel">Numéro téléphone :</label>
            <input type="tel" id="num_tel" name="num_tel">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="adresse_email">Adresse email :</label>
            <input type="email" id="adresse_email" name="adresse_email">
        </div>
        <div class="form-group">
            <label for="date_reservation">Date de réservation :</label>
            <input type="date" id="date_reservation" name="date_reservation">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="heure_reservation">Heure de réservation :</label>
            <input type="time" id="heure_reservation" name="heure_reservation">
        </div>
        <div class="form-group">
            <label for="lieu_depart">Lieu de départ :</label>
            <input type="text" id="lieu_depart" name="lieu_depart">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination">
        </div>
    </div>
    <div class="form-row">
        <button type="submit">Ajouter le billet</button>
    </div>
</form>

</div>
<?php require('footer.php') ?>
