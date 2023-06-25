<?php

// Classe en charge de la sécurité de notre application
class SecurityController {
    // Manager qui permettra de requêter nos données utilisateur
    private $userManager;
    // Partagé avec les classe enfant c'est l'utilisateur connecté
    protected $currentUser;

    //
    public function __construct()
    {
        // On réccupére notre user manager
        $this->userManager = new UserManager();
        $this->userManager->admin();
        $this->currentUser = null;
        // si il est dans la session on le met dans notre attribut
        if(array_key_exists("user", $_SESSION)){
            // Il est stocké en session sous forme de texte
            // On le remet en objet
            $this->currentUser = unserialize($_SESSION["user"]);
        }
    }

    // Cette méthode vérifie que l'on a un attribut currentUser
    // Si ce n'est pas le cas, alors on est pas connecté
    // Donc on redirige vers la page de login
    protected function isLoggedIn(){
        if(!$this->currentUser){
            header("Location: index.php?controller=security&action=login");
            die();
        }
    }

    // Méthode de logout
    // Elle supprime la session, vide l'attribut de l'utilisateur courant
    // Redirige vers la page de login
    public function logout(){
        session_destroy();
        $this->currentUser = null;

        header('Location: index.php?controller=security&action=login');
    }

    // Affiche le formulaire de login
    // Lors de la soumission du formulaire elle le vérifie,
    // Connecte notre utilisateur si les identifiants sont bons
    // Stock en session notre utilisateur après l'avoir transformé en chaine de caractères
    // Elle met à jour notre attribut currentUser avec l'utilisateur connecté
    public function login(){
        $errors = [];

              
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            if(empty($_POST["username"])){
                $errors["username"] = 'Veuillez saisir un username';
            }

            if(empty($_POST["password"])){
                $errors["password"] = 'Veuillez saisir un mot de passe';
            }

            if(count($errors) == 0){
                $user = $this->userManager->getByUsername($_POST["username"]);

                if(is_null($user) || !password_verify($_POST["password"], $user->getPassword())){
                    $errors["password"] = 'Identifiant ou mot de passe invalid';
                } else {
                    $this->currentUser = $user;
                    $_SESSION["user"] = serialize($user);
                    header('Location: index.php?controller=default&action=home');
                }
            }


        }
        require 'View/security/login.php';
    }

   
}