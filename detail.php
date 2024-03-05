<?php

require('config.php');
$id_billet = $_GET['id'];

$sql = 'SELECT * FROM billet JOIN client ON billet.id_client = client.id_client
            WHERE id_billet = :id_billet';
$req = $connection->prepare($sql);
$req->bindValue(':id_billet', $id_billet, PDO::PARAM_INT);
$req->execute();
?>
<?php require('header.php') ?>
<div class="container">
<div class="billet-container">
    <a href="index.php" class="retour-link">Retour à la liste des billets</a>

    <?php while ($data2 = $req->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="billet">
            <h1 class="billet-title">Le client <?= ucfirst($data2['prenom']); ?> <?= ucfirst($data2['nom']); ?></h1>
            <ul class="billet-details">
                <li>
                    Nom du client : <?= $data2['nom']; ?>
                </li>
                <li>
                    Prénom du client : <?= $data2['prenom']; ?>
                </li>
                <li>
                    Adresse électronique : <?= $data2['adresse_email']; ?>
                </li>
                <li>
                    Date de naissance : <?= $data2['dte_naissance']; ?>
                </li>
                <li>
                    Sexe : <?= $data2['sexe']; ?>
                </li>
                <li>
                    Adresse postale : <?= $data2['adresse_postale']; ?>
                </li>
                <li>
                    Numéro Téléphone : <?= $data2['num_tel']; ?>
                </li>
                <li>
                    Date de réservation : <?= $data2['date_reservation']; ?>
                </li>
                <li>
                    Heure de réservation : <?= $data2['heure_reservation']; ?>
                </li>
                <li>
                    Prix : <?= $data2['prix']; ?> FCFA
                </li>
                <li>
                    Statut : <?= $data2['statut']; ?>
                </li>
                <li>
                    Lieu de départ : <?= $data2['lieu_depart']; ?>
                </li>
                <li>
                    Destination : <?= $data2['destination']; ?>
                </li>
            </ul>
        </div>
    <?php } ?>
</div>

</div>
<?php require('footer.php') ?>