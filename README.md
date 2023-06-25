# Hassani_Anturia_POO
Examen de PHP - POO

methode magique __get appelée lorsque l'on tente d'accéder à un attribut inaccessible (private, protected si l'on hérite pas de la classe). Elle ne prend pas de paramètre

Exemple : 

class MyClass {
    private $myAttribute = 'valeur';

    public function __get($name) {
        if ($name === 'myAttribute') {
            return $this->myAttribute;
        }
        // Gérer les autres attributs ici (le cas par défaut)
    }
}
$obj = new MyClass();
echo $obj->myAttribute; // Appelle implicitement la méthode __get('myAttribute')


methode magique __set appelé lorsque l'on modifie la valeur d'un attribut inaccessible

Exemple : 

class MyClass {
    private $myAttribute;

    public function __set($name, $value) {
        if ($name === 'myAttribute') {
            $this->myAttribute = $value;
        }
        // Gérer les autres attributs ici (le cas par défaut)
    }
}
$obj = new MyClass();
$obj->myAttribute = 'nouvelle valeur'; // Appelle implicitement la méthode __set('myAttribute', 'nouvelle valeur')


methode magique __construct appelé lorsque l'on instancie un nouvel objet

Exemple : 

class MyClass {
    public function __construct() {
        echo 'Une nouvelle instance de MyClass a été créée.';
    }
}
$obj = new MyClass(); // Appelle implicitement la méthode __construct()

methode magique __destruct : appelée lorque l'on supprime un objet. Si on ne l'appel pas elle est appelée implicitement à la fin du script

Exemple : 

class MyClass {
    public function __destruct() {
        echo 'L\'objet MyClass est supprimé.';
    }
}
$obj = new MyClass();
// Le reste du script...
// À la fin du script, l'objet sera automatiquement détruit et la méthode __destruct() sera appelée implicitement


methode magique __isset appelée lorsque l'on appel la fonction php isset sur un attribut inaccessible

Exemple : 

class MyClass {
    private $myAttribute = 'valeur';

    public function __isset($name) {
        if ($name === 'myAttribute') {
            return isset($this->myAttribute);
        }
        // Gérer les autres attributs ici (le cas par défaut)
    }
}
$obj = new MyClass();
echo isset($obj->myAttribute); // Appelle implicitement la méthode __isset('myAttribute')

