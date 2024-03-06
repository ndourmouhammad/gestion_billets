<?php
require('config.php');
$sql = 'SELECT * FROM billet JOIN client ON billet.id_client = client.id_client';

$statement = $connection->prepare($sql);
$statement->execute();
$billets = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require('header.php') ?>
<div class="banniere">
    <h1>Découvrez l'Excellence avec Simplon Travel Agency !</h1>
</div>
<div class="container">
    <h2>Liste des billets</h2>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Identifiant du billet</th>
                <th>Nom du client</th>
                <th>Numéro téléphone</th>
                <th>Action</th>
            </tr>
            <?php foreach ($billets as $billet) : ?>
                <tr>
                    <td><?= $billet->id_billet ?></td>
                    <td><?= $billet->prenom ?> <?= $billet->nom ?></td>
                    <td><?= $billet->num_tel ?></td>
                    <td>
                        <a href="update.php?id=<?= $billet->id_billet ?>" class="btn btn-info">Modifier</a>
                        <a onclick="return confirm('Confirmer la suppression')" href="delete.php?id=<?= $billet->id_billet ?>" class="btn btn-danger">Supprimer</a>
                        <a href="detail.php?id=<?= $billet->id_billet ?>" class="btn btn-info">Voir les détails</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <h2>Des destinations qu'on adore</h2>
    <ul class="ma-liste">
        <li><span class="ville">Dakar</span> - La belle capitale sénégalaise</li>
        <li><span class="ville">Diourbel</span> - Charmante ville du Sénégal</li>
        <li><span class="ville">Ziguinchor</span> - Nichée au cœur de la Casamance</li>
        <li><span class="ville">Ouagadougou</span> - La capitale culturelle du Burkina Faso</li>
        <li><span class="ville">Abidjan</span> - Perle des lagunes en Côte d'Ivoire</li>
        <li><span class="ville">Bissau</span> - La tranquille capitale de la Guinée-Bissau</li>
    </ul>

</div>
<?php require('footer.php') ?>