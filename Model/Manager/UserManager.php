<?php
class UserManager extends DbManager
{

    public function getByUsername($username)
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM utilisateur WHERE username = :username"
        );
        $query->bindParam("username", $username);

        $query->execute();
        $res = $query->fetch();

        $user = null;
        if ($res != false) {
            $user = new User(
                $res["utilisateur_id"], $res["username"],
                $res["name"], $res["firstname"],
                $res["password"]
            );
        }

        return $user;
    }

    public function admin()
    {
        $um = new UserManager();
        if ($um->getByUsername("admin") == null) {
            $user = new User(
                null,
                "admin",
                "AdminName",
                "AdminFirstname",
                password_hash("admin", PASSWORD_BCRYPT)
            );

            $username = $user->getUsername();
            $name = $user->getName();
            $firstname = $user->getFirstname();
            $password = $user->getPassword();

            $query = $this->pdo->prepare(
                "INSERT INTO utilisateur (username, name, firstname, password) VALUES 
                (:username, :name, :firstname, :password)"
            );

            $query->bindParam("username", $username);
            $query->bindParam('name', $name);
            $query->bindParam('firstname', $firstname);
            $query->bindParam('password', $password);

            $query->execute();
        }


    }
}