<?php
class MotoController extends SecurityController {
    private $mm;

    public static $allowedType = [
        "Enduro",
        "Custom",
        "Sportive", 
        "Roadster"
    ];

    public static $allowedFile = [
        "image/jpeg",
        "image/png"
    ];

    public function __construct(){
        parent::__construct();
        parent::isLoggedIn();
        $this->mm = new MotoManager();
    }

    public function displayAll(){
        $motos = $this->mm->getAll();

        require 'View/motos/list.php';
    }

    public function displayFiltered($filter){
        $motos = $this->mm->getFiltered($filter);

      require 'View/motos/filtered.php';
    }



    public function displayOne($id){
        $moto = $this->mm->getOne($id);

        if(is_null($moto)){
            header("Location: index.php?controller=default&action=not-found&scope=moto");
        }

        require 'View/motos/detail.php';
    }

    public function ajout(){

        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            // Vérifier mon formulaire
            $errors = $this->checkForm();


            if(count($errors) == 0){
                $moto = new Moto(null, $_POST["brand"], $_POST["model"],
                $_POST["type"], null);

                if($_FILES["image"]["error"] != 4){
                  if(!in_array($_FILES["image"]['type'], self::$allowedFile)){
                      $errors["image"] = "Nous acceptons seulement les JPEG / PNG";
                  }

                  if($_FILES["image"]['error'] != 0){
                      $errors["image"] = "Une erreur s'est produite pendant l'upload";
                  }

                  if($_FILES["image"]["size"]>2000000){
                      $errors["image"] = "L'image est trop lourde elle doit faire moins de 2Mo";
                  }

                  if(count($errors) == 0){
                      $filename = uniqid().explode("/",$_FILES["image"]['type'])[1];
                      move_uploaded_file($_FILES["image"]["tmp_name"], 'public/img/'.$filename);
                      $moto->setImage($filename);
                  }
                }

                if(count($errors) == 0){
                    $this->mm->add($moto);
                    header("Location: index.php?controller=moto&action=list");
                    die();
                }


            }

        } 

        require "View/motos/form-add.php";
    }

    private function checkForm(){
        $errors = [];
        if(empty($_POST["brand"])){
            $errors["brand"] = 'Veuillez saisir la marque de la moto';
        }

        if(strlen($_POST["brand"])>250){
            $errors["brand"] = "Le nom de la marque est trop long (250 caractères maximum)";
        }

        if(!in_array($_POST["type"], self::$allowedType)){
            $errors["type"] = "Ce type n'existe pas";
        }


        return $errors;
    }

    public function delete($id){
        $moto = $this->mm->getOne($id);

        if(is_null($moto)){
            header('Location: index.php?controller=default&action=not-found&scope=moto');
        } else {
            unlink("public/img/".$moto->getImage());
            $this->mm->delete($moto->getMoto_id());
            header("Location: index.php?controller=moto&action=list");
        }


    }

}