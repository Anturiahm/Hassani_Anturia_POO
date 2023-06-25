<?php
// Moto Manager
// Cette classe aura le role de transformer nos requêtes MySQL en objet (Selection)
// Elle devra aussi transformer nos objets en requête mysql (insert / update)
// Cette classe elle étend de la classe abstraite DbManager qui contient la connection
// a notre BDD (attribut PDO)
class MotoManager extends DbManager {

    // Ici, nous avons mèthode getAll
    public function getAll() {
        // Elle requête toutes les motos dans notre BDD
        $query = $this->pdo->prepare("SELECT * FROM moto");
        $query->execute();
        // On récupère ici nos resultats sous forme de tableau
        $results = $query->fetchAll();

        // On crée un tableau vide qui contiendra nos objets
        $motos = [];

        // On parcourt nos resultats, on les tranforme en objet
        foreach ($results as $res){
            // On ajoute ces objets dans notre tableau créé à la ligne 17
            $motos[] = new Moto($res['moto_id'], $res['brand'],
                $res['model'],
                $res['type'],
                $res['image']);
        }

        // On retourne notre tableau contenant nos objets 
        return $motos;
    }

    public function getOne($id){
        $query =
            $this->pdo->prepare("SELECT * FROM moto WHERE moto_id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetch();

        $moto = null;
        if($res){
            $moto = new Moto($res['moto_id'], $res['brand'], $res['model'],
                $res["type"], $res["image"]);
        }

        return $moto;
    }

    public function getFiltered($filter){
        $query =
            $this->pdo->prepare("SELECT * FROM moto WHERE type = :type");
        $query->bindParam(':type', $filter);
        $query->execute();
        $results = $query->fetchAll();

        $motos = [];
        foreach ($results as $res){
            $motos[] = new Moto($res['moto_id'], $res['brand'], $res['model'],
                $res["type"], $res["image"]);
        }
        
        return $motos;
    }

    public function add(Moto $moto) {
        $brand = $moto->getBrand();
        $model = $moto->getModel();
        $type = $moto->getType();
        $image = $moto->getImage();

        $query = $this->pdo->prepare(
            "INSERT INTO moto (brand, model, type, image) VALUES
                    (:brand, :model, :type, :image)");

        $query->execute(
            [
                "brand"=>$brand,
                "model"=> $model,
                "type"=> $type,
                "image"=> $image]);

        $moto->setMoto_id($this->pdo->lastInsertId());

        return $moto;

    }

    public function delete($id){
        $query = $this->pdo->prepare("DELETE FROM moto WHERE moto_id=:id");
        $query->bindParam(":id", $id);
        $query->execute();
    }
}