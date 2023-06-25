<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <?php require 'View/parts/header.php'; ?>
        
        <br>

        <a href="index.php?controller=moto&action=list"><button class="btn btn-outline-success" type="button">
                Liste de toutes les motos
            </button></a>
        <br><br>
        <h1>La moto
            <?php echo ($moto->getBrand()); ?>
        </h1><br>

        <img style="max-height: 500px" class="img-thumbnail" src="<?php echo (is_null($moto->getImage()) ? 'public/img/no-image.png' :
                            'public/img/' . $moto->getImage()) ?>"
                            alt="image de <?php echo ($moto->getImage()); ?>">
        <br>
        <div>
            <?php echo ($moto->getBrand()); ?>
        </div>
        <h2>Détails : </h2>
        <ul>
            <li>Modèle =
                <?php echo ($moto->getModel()); ?>
            </li>
        </ul>
        <ul>
            <li>Type =
                <?php echo ($moto->getType()); ?>
            </li>
        </ul>
        <?php require 'View/parts/footer.php'; ?>

        <?php require 'View/parts/footer.php'; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>