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
        <a href="index.php?controller=default&action=home"><button class="btn btn-outline-success" type="button">Retour
                à
                l'accueil</button></a>
        <br><br>
        <h1>Ajouter une moto</h1>
        <form method="post" enctype="multipart/form-data" class="row">
            <div class="col-md-12">
                <label for="brand" class="form-label">Marque</label>
                <input type="text" value="<?php if (array_key_exists("brand", $_POST)) {
                    echo ($_POST["brand"]);
                }
                ; ?>" name="brand" class="form-control
            <?php if (array_key_exists("brand", $errors)) {
                echo ('is-invalid');
            } ?>" id="brand">

                <div id="validateBrand" class="invalid-feedback">
                    <?php if (array_key_exists("brand", $errors)) {
                        echo ($errors["brand"]);
                    } ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="model" class="form-label">Modèle</label>
                <input type="text" value="<?php if (array_key_exists("model", $_POST)) {
                    echo ($_POST["model"]);
                }
                ; ?>" class="form-control" name="model" id="model">
            </div>

            <div class="col-md-12">
                <label for="validationCustom04" class="form-label">Type</label>
                <select class="form-select
                 <?php if (array_key_exists("type", $errors)) {
                     echo ('is-invalid');
                 } ?>" name="type" id="validationCustom04">
                    <option value="" disabled selected hidden>-Choisissez un type-</option>
                    <?php
                    foreach (MotoController::$allowedType as $type) {
                        $selected = '';
                        if (array_key_exists("type", $_POST) && $_POST["type"] == $type) {
                            $selected = 'selected';
                        }
                        echo ('<option ' . $selected . ' value="' . $type . '">' . $type . '</option>');
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    <?php if (array_key_exists("type", $errors)) {
                        echo ($errors["type"]);
                    } ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control
            <?php if (array_key_exists("image", $errors)) {
                echo ('is-invalid');
            } ?>" id="image">
                <div class="invalid-feedback">
                    <?php if (array_key_exists("image", $errors)) {
                        echo ($errors["image"]);
                    } ?>
                </div>
            </div>


            <input type="submit" class="btn btn-success m-2">

        </form>

        <?php require 'View/parts/footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>