<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>

    <?php require 'View/parts/header.php'; ?>

    <h1>Liste des motos</h1>
    <a href="index.php?controller=moto&action=ajout">
        <button class="btn btn-success">Ajouter une moto</button>
    </a>
    <br><br>
    <form action="index.php?controller=moto&action=filtered" method="post">
        <label for="filter">N'afficher que les</label>
        <select name="filter" id="filter">
            <option value="" disabled selected hidden>-Choisissez un type-</option>
            <?php
            foreach (MotoController::$allowedType as $type) {
                echo '<option value="' . $type . '">' . $type . '</option>';
            }
            ?>
        </select>
        <button type="submit">Valider</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($motos as $moto) {
                ?>
                <tr>
                    <th scope="row">
                        <?php echo ($moto->getMoto_id()); ?>
                    </th>
                    <td>
                        <?php echo ($moto->getBrand()); ?>
                    </td>
                    <td>
                        <?php echo ($moto->getModel()); ?>
                    </td>
                    <td>
                        <?php echo ($moto->getType()); ?>
                    </td>
                    <td>
                        <img style="max-height: 100px" class="img-thumbnail" src="<?php echo (is_null($moto->getImage()) ? 'public/img/no-image.png' :
                            'public/img/' . $moto->getImage()) ?>" alt="image de <?php echo ($moto->getImage()); ?>">
                    </td>
                    <td>
                        <a href="index.php?controller=moto&action=detail&id=<?php echo ($moto->getMoto_id()); ?>">Voir
                            la
                            <?php echo ($moto->getBrand()); ?> </a><br>
                        <a href="index.php?controller=moto&action=delete&id=<?php echo ($moto->getMoto_id()); ?>">Supprimer
                            la
                            <?php echo ($moto->getBrand()); ?> </a>

                    </td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>

    <?php require 'View/parts/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>