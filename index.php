<?php
    session_start();

    require 'autoload.php';

    // ICI : On redirige l'utilisateur avec des paramètres permettant
    // D'afficher la page d'accueil
    if(!array_key_exists("controller", $_GET) &&
        !array_key_exists("action", $_GET)) {
        header('Location: index.php?controller=default&action=home');
    }

    // Si le paramètre GET de notre url est égal à défault
    // On crée un nouvel objet DefaultController
    if($_GET["controller"] == 'default'){
        $controller = new DefaultController();
        // Si le paramètre get est égal à home
        if($_GET["action"] == "home"){
            // On renvoie vers la mèthode home de notre controller
            // DefaultController
            $controller->home();
        }
        if($_GET["action"]== 'not-found'){
            $controller->notFound();
        }
    }

    if($_GET["controller"] == 'security'){
        $controller = new SecurityController();
        if($_GET["action"] == 'login'){
            $controller->login();
        }

        if($_GET["action"] == 'logout'){
            $controller->logout();
        }
    }

    if($_GET["controller"] == 'moto'){
        $controller = new MotoController();
        if($_GET["action"] == 'list'){
           $controller->displayAll();
        }
       if($_GET['action'] == 'filtered') {
        $controller->displayFiltered($_POST["filter"]);
       }
        if($_GET['action'] == 'detail' && array_key_exists( 'id', $_GET)) {
            $controller->displayOne($_GET["id"]);
        }
        if($_GET["action"] == 'ajout'){
            $controller->ajout();
        }
        if($_GET["action"] == "delete" && array_key_exists("id", $_GET)){
            $controller->delete($_GET["id"]);
        }
      
    }


?>