<?php
try {
    $serveur = "localhost";
    $login = "root";
    $pass = "";

    $connexion = new PDO("mysql:host=$serveur;dbname=oraseph", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT maquillages.nom, maquillages.description, maquillages.image, maquillages.prix, maquillages.category 
    FROM maquillages, cat 
    WHERE cat.id = maquillages.category AND category = "2"';

    $post = $connexion->query($sql);
    $maquillages=$post->fetchAll();


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
        <?php foreach ($maquillages as $maquillage) { ?>
            <div class="card">
                <img src="./img/<?php echo $maquillage['image']; ?>" class="card-img-top" alt="Image du maquillage">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $maquillage['nom']; ?></h5>
                    <p class="card-text"><?php echo $maquillage['description']; ?></p>
                    <p class="card-text">Prix : <?php echo $maquillage['prix']; ?> €</p>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- D'autres contenus HTML vont ici -->
</body>
</html>