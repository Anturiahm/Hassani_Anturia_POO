<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <?php require 'View/parts/header.php'; ?>
        <h1>Heeey ! Welcome to Parc Moto</h1>

        <div class="d-grid gap-2">
            <a href="index.php?controller=moto&action=list"><button class="btn  btn-outline-primary" type="button">Voir nos
                    motos</button></a>
            <a href="index.php?controller=moto&action=ajout"><button class="btn  btn-outline-primary" type="button">Ajouter une
                    moto</button></a>
        </div>

        <?php require 'View/parts/footer.php'; ?>
    </div>

    <?php require 'View/parts/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>