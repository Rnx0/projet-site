<?php
try {
    $serveur = "localhost";
    $login = "root";
    $pass = "";

    $connexion = new PDO("mysql:host=$serveur;dbname=oraseph", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT sacs.nom, sacs.description, sacs.image, sacs.prix, sacs.category 
    FROM sacs, cat 
    WHERE cat.id = sacs.category AND category = "3"';

    $post = $connexion->query($sql);
    $sacs=$post->fetchAll();


} catch (PDOException $e) {
    echo 'Erreur de base de données : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php require "./template/head.php"; ?> 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<head><link rel="stylesheet" href="./styles.css"></head>

<body>
    <!-- Votre contenu HTML -->
    <?php require "./template/navbar.php"; ?>
    <div class="content">
        <?php foreach ($sacs as $sac) { ?>
            <div class="card">
                <img src="./img/<?php echo $sac['image']; ?>" class="card-img-top" alt="Image du parfum">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $sac['nom']; ?></h5>
                    <p class="card-text"><?php echo $sac['description']; ?></p>
                    <p class="card-text">Prix : <?php echo $sac['prix']; ?> €</p>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- D'autres contenus HTML vont ici -->
</body>
</html>