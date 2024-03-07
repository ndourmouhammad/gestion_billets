<?php
require('config.php');
$id = $_GET['id'];
$sql = 'SELECT * FROM billet JOIN client ON client.id_client = billet.id_client WHERE id_billet = :id';
$statement = $connection->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$billets = $statement->fetch(PDO::FETCH_OBJ);

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

    // Mettre à jour les détails du client dans la table "client"
    $update_client_query = $connection->prepare("UPDATE client SET nom = :nom, prenom = :prenom, dte_naissance = :dte_naissance, sexe = :sexe, adresse_postale = :adresse_postale, num_tel = :num_tel, adresse_email = :adresse_email WHERE id_client = :id_client");
    $update_client_query->bindParam(':nom', $nom);
    $update_client_query->bindParam(':prenom', $prenom);
    $update_client_query->bindParam(':dte_naissance', $dte_naissance);
    $update_client_query->bindParam(':sexe', $sexe);
    $update_client_query->bindParam(':adresse_postale', $adresse_postale);
    $update_client_query->bindParam(':num_tel', $num_tel);
    $update_client_query->bindParam(':adresse_email', $adresse_email);
    $update_client_query->bindParam(':id_client', $billets->id_client);
    $update_client_query->execute();

    // Mettre à jour les détails du billet dans la table "billet"
    $update_query = $connection->prepare("UPDATE billet SET date_reservation = :date_reservation, heure_reservation = :heure_reservation, prix = :prix, statut = :statut, lieu_depart = :lieu_depart, destination = :destination WHERE id_billet = :id_billet");
    $update_query->bindParam(':date_reservation', $date_reservation);
    $update_query->bindParam(':heure_reservation', $heure_reservation);
    $update_query->bindParam(':prix', $prix);
    $update_query->bindParam(':statut', $statut);
    $update_query->bindParam(':lieu_depart', $lieu_depart);
    $update_query->bindParam(':destination', $destination);
    $update_query->bindParam(':id_billet', $id);
    $update_query->execute();

    echo "Le billet a été mis à jour avec succès.";
    header('location: index.php');
}
?>

<?php require('header.php') ?>

</div>
<div class="container">
    <h2>Modifier mon billet</h2>
    <form method="post" class="reservation-form">
    <div class="form-row">
        <div class="form-group">
            <label for="nom">Nom du client :</label>
            <input type="text" id="nom" name="nom" value="<?= $billets->nom ?>" > 
        </div>
        <div class="form-group">
            <label for="prenom">Prénom du client :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $billets->prenom ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" value="<?= $billets->prix ?>"> 
        </div>
        <div class="form-group">
            <label for="statut">Statut :</label>
            <input type="text" id="statut" name="statut" value="<?= $billets->statut ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <input type="text" id="sexe" name="sexe" value="<?= $billets->sexe ?>">
        </div>
        <div class="form-group">
            <label for="dte_naissance">Date de naissance :</label>
            <input type="date" id="dte_naissance" name="dte_naissance" value="<?= $billets->dte_naissance ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="adresse_postale">Adresse postale :</label>
            <input type="text" id="adresse_postale" name="adresse_postale" value="<?= $billets->adresse_postale ?>">
        </div>
        <div class="form-group">
            <label for="num_tel">Numéro téléphone :</label>
            <input type="tel" id="num_tel" name="num_tel" value="<?= $billets->num_tel ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="adresse_email">Adresse email :</label>
            <input type="email" id="adresse_email" name="adresse_email" value="<?= $billets->adresse_email ?>">
        </div>
        <div class="form-group">
            <label for="date_reservation">Date de réservation :</label>
            <input type="date" id="date_reservation" name="date_reservation" value="<?= $billets->date_reservation ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="heure_reservation">Heure de réservation :</label>
            <input type="time" id="heure_reservation" name="heure_reservation" value="<?= $billets->heure_reservation ?>">
        </div>
        <div class="form-group">
            <label for="lieu_depart">Lieu de départ :</label>
            <input type="text" id="lieu_depart" name="lieu_depart" value="<?= $billets->lieu_depart ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" value="<?= $billets->destination ?>">
        </div>
    </div>
    <div class="form-row">
        <button type="submit">Mettre à jour le billet</button>
    </div>
</form>

</div>
<?php require('footer.php') ?>
