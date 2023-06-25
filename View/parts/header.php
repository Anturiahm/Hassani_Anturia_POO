<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">
            <img src="public/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Parc Moto
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=default&action=home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=moto&action=list">Les motos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=security&action=logout">Se déconnecter</a>
                </li>
            </ul>
        </div>

        <?php

        if($this->currentUser){
            echo('Bonjour ' . $this->currentUser->getName() .' '. $this->currentUser->getFirstname());
        }

        ?>
    </div>
</nav>