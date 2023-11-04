<?php
try {
    $serveur = "localhost";
    $login = "root";
    $pass = "";

    $connexion = new PDO("mysql:host=$serveur;dbname=oraseph", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT parfums.nom, parfums.description, parfums.image, parfums.prix, parfums.category 
    FROM parfums, cat 
    WHERE cat.id = parfums.category AND category = "1"';

    $post = $connexion->query($sql);
    $parfums=$post->fetchAll();


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
        <?php foreach ($parfums as $parfum) { ?>
            <div class="card">
                <img src="./img/<?php echo $parfum['image']; ?>" class="card-img-top" alt="Image du parfum">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $parfum['nom']; ?></h5>
                    <p class="card-text"><?php echo $parfum['description']; ?></p>
                    <p class="card-text">Prix : <?php echo $parfum['prix']; ?> €</p>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- D'autres contenus HTML vont ici -->
</body>
</html>