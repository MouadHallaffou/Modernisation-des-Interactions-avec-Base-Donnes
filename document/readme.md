# Documentation sur la Programmation Orientée Objet en PHP

## Introduction
La Programmation Orientée Objet (POO) est un paradigme qui organise le code autour des objets. Ces objets encapsulent des données (propriétés) et des comportements (méthodes). PHP supporte ce paradigme en permettant la création de classes pour définir des objets.

### Avantages de la POO
- La POO est plus rapide et plus facile à exécuter.
- La POO fournit une structure claire pour les programmes.
- La POO aide à garder le code PHP SEC « Don’t Repeat Yourself », rendant le code plus facile à maintenir, à modifier et à déboguer.
- La POO permet de créer des applications avec moins de code et un temps de développement plus court.

## Création de Classes et d’Objets

### Classe
Une classe est un modèle qui définit les propriétés et les méthodes d’un objet. Elle est créée avec le mot-clé `class`.

#### Exemple
```php
class Exemple {
    public $propriete;
    public function methode() {
        echo "Méthode appelée.";
    }
}
```

### Objet
Un objet est une instance d'une classe. On utilise `new` pour instancier un objet.

#### Exemple
```php
$objet = new Exemple();
$objet->methode();
```

## Objectif de la Programmation Orientée Objet (POO)
La POO vise à représenter les éléments du monde réel sous forme d'objets dans le code. Ces objets encapsulent des propriétés (caractéristiques) et des méthodes (comportements), facilitant ainsi la simulation et la gestion de systèmes complexes.

### Exemple
Prenons une entité du monde réel, comme une voiture. Une classe peut représenter cette entité, avec ses attributs et ses comportements.

```php
class Voiture {
    public $marque;
    public $couleur;
    public function __construct($marque, $couleur) {
        $this->marque = $marque;
        $this->couleur = $couleur;
    }
    public function demarrer() {
        echo "La voiture {$this->marque} démarre.\n";
    }
}
// Modélisation d'une voiture spécifique
$maVoiture = new Voiture("Renault", "bleue");
$maVoiture->demarrer();
```

**Sortie :** La voiture Renault démarre.

## Avantages de la POO

### 1. Réutilisabilité
Le code peut être réutilisé grâce à des classes génériques et des concepts comme l'héritage.

#### Exemple
```php
class Animal {
    public function manger() {
        echo "Cet animal mange.\n";
    }
}
class Chien extends Animal {
    public function aboyer() {
        echo "Le chien aboie.\n";
    }
}

$monChien = new Chien();
$monChien->manger();  // Sortie : Cet animal mange.
$monChien->aboyer();  // Sortie : Le chien aboie.
```

### 2. Évolutivité (Scalabilité)
La POO facilite l’ajout de nouvelles fonctionnalités sans affecter le code existant. Par exemple, on peut facilement ajouter une méthode `peindre` à la classe `Voiture` sans changer les autres parties du code.

### 3. Maintenabilité
Le code est plus structuré et facile à maintenir. Les objets encapsulent les données et les comportements, ce qui simplifie les corrections ou les modifications.

#### Exemple
Si l’on souhaite changer la façon dont une voiture démarre, il suffit de modifier la méthode `demarrer` dans la classe `Voiture`, sans impacter les autres parties du programme.

## Concepts Clés de la POO

### 1. Encapsulation
L'encapsulation consiste à regrouper les données (propriétés) et les comportements (méthodes) d'un objet au sein d'une même classe, tout en contrôlant leur accès. Cela permet de protéger les données internes d’un objet contre les modifications non autorisées en utilisant des modificateurs de visibilité : `private`, `protected`, et `public`.

#### Exemple d’Encapsulation
```php
class CompteBancaire {
    private $solde;
    public function __construct($soldeInitial) {
        $this->solde = $soldeInitial;
    }
    public function deposer($montant) {
        $this->solde += $montant;
    }
    public function afficherSolde() {
        echo "Le solde est de {$this->solde} euros.\n";
    }
}
$compte = new CompteBancaire(100);
$compte->deposer(50);
$compte->afficherSolde();
```

**Sortie :** Le solde est de 150 euros.

### 2. Abstraction
L'abstraction consiste à exposer uniquement les détails essentiels d’un objet tout en cachant les détails d'implémentation. En PHP, cela peut être réalisé à l’aide de classes abstraites ou d’interfaces.

#### Exemple de Classe Abstraite
```php
abstract class Forme {
    abstract public function calculerAire();
}

class Rectangle extends Forme {
    private $longueur;
    private $largeur;
    public function __construct($longueur, $largeur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }
    public function calculerAire() {
        return $this->longueur * $this->largeur;
    }
}

$rectangle = new Rectangle(5, 3);
echo "Aire du rectangle : " . $rectangle->calculerAire() . " unités²\n";
```

**Sortie :** Aire du rectangle : 15 unités².

### 3. Héritage
L'héritage permet à une classe d'hériter des propriétés et des méthodes d'une autre classe, appelée classe parent. Cela favorise la réutilisation du code et la création d'une hiérarchie.

#### Exemple d'Héritage
```php
class Animal {
    public function manger() {
        echo "Cet animal mange.\n";
    }
}
class Chien extends Animal {
    public function aboyer() {
        echo "Le chien aboie.\n";
    }
}
$monChien = new Chien();
$monChien->manger();  // Sortie : Cet animal mange.
$monChien->aboyer();  // Sortie : Le chien aboie.
```

### 4. Polymorphisme
Le polymorphisme permet à des objets de classes différentes d’être traités comme s'ils appartenaient à une même classe parent. Cela est souvent réalisé via des méthodes redéfinies (override) ou l'utilisation d'interfaces.

#### Exemple de Polymorphisme
```php
class Oiseau {
    public function communiquer() {
        echo "L'oiseau chante.\n";
    }
}
class Perroquet extends Oiseau {
    public function communiquer() {
        echo "Le perroquet imite des sons.\n";
    }
}
function faireCommuniquer(Oiseau $oiseau) {
    $oiseau->communiquer();
}
$unOiseau = new Oiseau();
$unPerroquet = new Perroquet();
faireCommuniquer($unOiseau);    // Sortie : L'oiseau chante.
faireCommuniquer($unPerroquet);  // Sortie : Le perroquet imite des sons.
```

## Classes et Objets en PHP

### 1. Définir une Classe
Une classe en PHP est une structure définissant des propriétés (attributs) et des méthodes (fonctions) que les objets créés à partir de cette classe auront. Elle est définie avec le mot-clé `class`, suivi du nom de la classe et d'accolades pour inclure ses propriétés et ses méthodes.

#### Syntaxe de Base
```php
class NomDeLaClasse {
    // Propriétés
    public $propriete1;
    public $propriete2;
    // Méthodes
    public function methode1() {
        // Code
    }
    public function methode2() {
        // Code
    }
}
```

#### Exemple d’une Classe Fruit
```php
class Fruit {
    // Propriétés
    public $name;
    public $color;
    // Méthodes
    public function set_name($name) {
        $this->name = $name;
    }
    public function get_name() {
        return $this->name;
    }
}
```

### 2. Créer des Objets à partir d’une Classe
Une fois qu’une classe est définie, vous pouvez créer des objets à partir de cette classe en utilisant le mot-clé `new`. Un objet est une instance d'une classe.

#### Syntaxe pour Créer un Objet
```php
$objet = new NomDeLaClasse();
```

#### Exemple
```php
$apple = new Fruit();  // Création d'un objet de type Fruit
$banana = new Fruit(); // Création d'un autre objet de type Fruit
$apple->set_name("Apple");  // Définit le nom de la pomme
$banana->set_name("Banana"); // Définit le nom de la banane
echo $apple->get_name();  // Affiche "Apple"
echo $banana->get_name(); // Affiche "Banana"
```

### 3. Propriétés et Méthodes dans une Classe
Les propriétés sont des variables qui stockent des données spécifiques à l'objet, tandis que les méthodes sont des fonctions qui définissent les actions que l'objet peut effectuer.

#### Exemple Complet avec Plusieurs Propriétés et Méthodes
```php
class Fruit {
    // Propriétés
    public $name;
    public $color;
    // Méthodes
    public function set_name($name) {
        $this->name = $name;
    }
    public function get_name() {
        return $this->name;
    }
    public function set_color($color) {
        $this->color = $color;
    }
    public function get_color() {
        return $this->color;
    }
}

// Création d'objets
$apple = new Fruit();
$apple->set_name("Apple");
$apple->set_color("Red");
echo "Name: " . $apple->get_name();  // Affiche : Name: Apple
echo "Color: " . $apple->get_color(); // Affiche : Color: Red
```

### 4. Le mot-clé $this
Le mot-clé `$this` est utilisé à l'intérieur des méthodes d’une classe pour faire référence à l'instance courante de l’objet. Il permet d'accéder aux propriétés et méthodes de l'objet dans lequel il est utilisé.

#### Exemple avec $this
```php
class Fruit {
    public $name;
    public function set_name($name) {
        $this->name = $name; // Utilisation de $this pour accéder à la propriété de l'objet
    }
    public function get_name() {
        return $this->name; // Utilisation de $this pour accéder à la propriété de l'objet
    }
}
$apple = new Fruit();
$apple->set_name("Apple");
echo $apple->get_name(); // Affiche : Apple
```

### 5. Modifier les Propriétés Directement
Il est possible de modifier les propriétés d’un objet directement depuis l’extérieur de la classe, même sans passer par une méthode. Cependant, cela dépend de la visibilité des propriétés (public, private, protected).

#### Exemple
```php
class Fruit {
    public $name;  // Propriété publique
}
$apple = new Fruit();
$apple->name = "Apple"; // Modification directe de la propriété
echo $apple->name; // Affiche : Apple
```

### 6. Vérification du Type d'un Objet avec `instanceof`
Le mot-clé `instanceof` permet de vérifier si un objet est une instance d'une classe spécifique. Cela peut être utile pour vérifier le type d’un objet avant d’appliquer une logique spécifique.

#### Exemple avec `instanceof`
```php
class Fruit {}
$apple = new Fruit();
var_dump($apple instanceof Fruit); // Affiche : bool(true)
```

### 7. Visibilité des Propriétés et Méthodes
PHP permet de définir la visibilité des propriétés et méthodes à l’aide de trois modificateurs :

- **public** : accessible depuis n’importe où (à l’intérieur ou à l’extérieur de la classe).
- **private** : accessible uniquement à l’intérieur de la classe.
- **protected** : accessible à l’intérieur de la classe et dans les classes qui en héritent.

#### Exemple de Visibilité
```php
class Fruit {
    public $name;
    private $price;
    public function set_price($price) {
        $this->price = $price; // accessible car à l'intérieur de la classe
    }
    public function get_price() {
        return $this->price; // accessible car à l'intérieur de la classe
    }
}
$apple = new Fruit();
$apple->name = "Apple"; // Accessible car public
$apple->set_price(1.99); // Méthode publique pour accéder à la propriété privée
echo $apple->name; // Affiche : Apple
echo $apple->get_price(); // Affiche : 1.99
```

## Héritage de Classes
L'héritage permet de créer une nouvelle classe (classe dérivée) à partir d'une classe existante (classe parente), tout en réutilisant ou en modifiant ses propriétés et méthodes.

### Syntaxe d'Héritage
```php
class Enfant extends ParentClass {
    // nouvelles propriétés ou méthodes
}
```

### Exemple d'Héritage
```php
class Fruit {
    public $name;
    public function set_name($name) {
        $this->name = $name;
    }
}
class Apple extends Fruit {
    public $color;
    public function set_color($color) {
        $this->color = $color;
    }
}
$apple = new Apple();
$apple->set_name("Apple");
$apple->set_color("Red");
echo $apple->name;  // Affiche : Apple
echo $apple->color; // Affiche : Red
```

## Concepts Fondamentaux de POO

### Propriétés et Méthodes
En POO, les propriétés (ou attributs) sont des variables définies dans la classe, et les méthodes (ou fonctions) sont des fonctions définies dans la classe.

### Exemple d’Interaction entre Propriétés et Méthodes
```php
class Voiture {
    public $marque;
    public $couleur;

    public function setMarque($marque) {
        $this->marque = $marque;
    }
    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }
    public function afficherInfo() {
        return "La voiture est une " . $this->marque . " de couleur " . $this->couleur;
    }
}
$maVoiture = new Voiture();
$maVoiture->setMarque('Toyota');
$maVoiture->setCouleur('Rouge');
echo $maVoiture->afficherInfo();  // Affiche : La voiture est une Toyota de couleur Rouge
```

### Types de Méthodes
1. **Méthodes d'instance** : Ce sont les méthodes qui manipulent ou accèdent aux propriétés de l'objet courant (via `$this`).
2. **Méthodes statiques** : Ces méthodes ne nécessitent pas la création d'un objet. Elles sont appelées directement sur la classe et peuvent manipuler uniquement des propriétés ou des données statiques.

#### Exemple de Méthode Statique
```php
class Calculatrice {
    public static function addition($a, $b) {
        return $a + $b;
    }
}
echo Calculatrice::addition(5, 3); // Affiche : 8
```

## Constructeurs et Destructeurs
Les constructeurs et destructeurs sont des méthodes spéciales qui sont automatiquement appelées lors de la création ou de la destruction d’un objet. Ces méthodes permettent de gérer l'initialisation des objets et de nettoyer les ressources lorsque l'objet n’est plus utilisé.

### 1. Le Constructeur : `__construct()`
Le constructeur est une méthode spéciale qui est automatiquement appelée lors de la création d'un objet. Son rôle principal est d’initialiser les propriétés de l’objet dès sa création.

#### Syntaxe du Constructeur
```php
class NomDeLaClasse {
    public function __construct() {
        // Code d'initialisation ici
    }
}
```

Un constructeur peut également accepter des paramètres, ce qui permet de passer des valeurs lors de la création de l'objet, facilitant ainsi l'initialisation avec des valeurs spécifiques.

#### Exemple de Constructeur avec Paramètres
```php
class Voiture {
    public $marque;
    public $couleur;
    // Le constructeur prend des paramètres pour initialiser les propriétés
    public function __construct($marque, $couleur) {
        $this->marque = $marque;
        $this->couleur = $couleur;
    }
    public function afficherInfo() {
        return "Voiture: " . $this->marque . ", Couleur: " . $this->couleur;
    }
}
// Création de l'objet avec des paramètres
$voiture1 = new Voiture("Toyota", "Rouge");
echo $voiture1->afficherInfo();  // Affiche : Voiture: Toyota, Couleur: Rouge
```

### 2. Le Destructeur : `__destruct()`
Le destructeur est une méthode spéciale appelée automatiquement lorsqu'un objet est détruit ou hors de portée, c’est-à-dire lorsque l’objet est supprimé de la mémoire. Il est principalement utilisé pour nettoyer des ressources (comme des connexions à une base de données ou des fichiers ouverts) avant que l’objet ne soit complètement détruit.

#### Syntaxe du Destructeur
```php
class NomDeLaClasse {
    public function __destruct() {
        // Code de nettoyage ici
    }
}
```

#### Exemple de Destructeur
```php
class Fichier {
    public $nomFichier;
    public function __construct($nom) {
        $this->nomFichier = $nom;
        echo "Fichier $nom ouvert.\n";
    }
    public function __destruct() {
        echo "Fichier $this->nomFichier fermé.\n";
    }
}
// Création de l'objet, qui ouvre un fichier
$fichier1 = new Fichier("document.txt");
// À la fin du script, PHP appelle automatiquement le destructeur
```

## Modificateurs d'accès : public, private, protected
En programmation orientée objet (POO), les modificateurs d'accès sont utilisés pour définir la visibilité des propriétés et des méthodes d'une classe. Cela permet de contrôler l'accès à ces éléments depuis l'extérieur de la classe, ce qui est une forme d'encapsulation.

### 1. Modificateurs d'accès
Les modificateurs d'accès en PHP sont :
- **public** : La propriété ou la méthode est accessible de n'importe où, à l'intérieur ou à l'extérieur de la classe.
- **private** : La propriété ou la méthode est uniquement accessible à l'intérieur de la classe. Elle ne peut pas être accédée ou modifiée par une autre classe, même une classe enfant.
- **protected** : La propriété ou la méthode est accessible à l'intérieur de la classe et de ses classes dérivées (héritées). Elle n'est pas accessible à partir d'une instance d'une autre classe, mais peut l'être par les classes qui l'héritent.

### 2. Encapsulation
L'encapsulation est un concept clé de la POO qui consiste à restreindre l'accès direct aux propriétés d'un objet. Au lieu de permettre un accès direct aux propriétés, on les rend privées ou protégées et on fournit des méthodes publiques pour y accéder ou les modifier. Ces méthodes sont souvent appelées getters (pour obtenir une valeur) et setters (pour définir une valeur).

### 3. Modificateurs d'accès en détails avec des exemples
#### Propriétés et méthodes public
Les propriétés ou méthodes public peuvent être accédées ou modifiées par n'importe quel code externe, qu'il soit dans la classe ou à l'extérieur.

##### Exemple
```php
class Personne {
    public $nom;  // Propriété publique
    // Méthode publique
    public function afficherNom() {
        return $this->nom;
    }
}
$personne = new Personne();
$personne->nom = "Alice";  // Accès direct à la propriété publique
echo $personne->afficherNom();  // Affiche : Alice
```

#### Propriétés et méthodes private
Les propriétés et méthodes private ne sont accessibles que depuis la classe elle-même. Elles ne peuvent pas être accédées ou modifiées directement par une instance d'une autre classe, ni même par une classe enfant.

##### Exemple
```php
class Personne {
    private $nom;  // Propriété privée
    // Méthode privée
    private function afficherNom() {
        return $this->nom;
    }
    // Méthodes publiques pour accéder aux propriétés privées
    public function setNom($nom) {
        $this->nom = $nom;  // Utilisation d'un setter pour modifier une propriété privée
    }
    public function getNom() {
        return $this->nom;  // Utilisation d'un getter pour accéder à une propriété privée
    }
}
$personne = new Personne();
// $personne->nom = "Alice";  // Erreur ! Propriété privée
$personne->setNom("Alice");  // Modification via un setter
echo $personne->getNom();  // Affiche : Alice
```

### Propriétés et méthodes protected
Les propriétés ou méthodes protected peuvent être accédées par la classe elle-même et ses classes enfants (sous-classes), mais pas par des instances d'autres classes.

##### Exemple
```php
class Animal {
    protected $nom;  // Propriété protégée
    public function __construct($nom) {
        $this->nom = $nom;
    }
    // Méthode protégée
    protected function afficherNom() {
        return $this->nom;
    }
}
class Chien extends Animal {
    public function afficherNomChien() {
        return $this->afficherNom();  // Accès à la méthode protégée dans la classe enfant
    }
}
$chien = new Chien("Rex");
echo $chien->afficherNomChien();  // Affiche : Rex
```

## Encapsulation avec Getters et Setters
L'encapsulation est une pratique courante où les propriétés sont définies comme `private` ou `protected`, et on utilise des méthodes getters et setters pour y accéder ou les modifier. Cela permet de contrôler l'accès aux données de la classe et de valider les données avant de les modifier.

### Exemple complet d'encapsulation avec getters et setters
```php
class CompteBancaire {
    private $solde;  // Propriété privée
    // Constructeur pour initialiser le solde
    public function __construct($soldeInitial) {
        $this->solde = $soldeInitial;
    }
    // Getter pour obtenir le solde
    public function getSolde() {
        return $this->solde;
    }
    // Setter pour ajouter de l'argent au solde
    public function deposer($montant) {
        if ($montant > 0) {
            $this->solde += $montant;  // Ajoute de l'argent au solde
        }
    }
    // Setter pour retirer de l'argent du solde
    public function retirer($montant) {
        if ($montant > 0 && $montant <= $this->solde) {
            $this->solde -= $montant;  // Retire de l'argent du solde
        } else {
            echo "Montant invalide ou insuffisant.\n";
        }
    }
}
// Création d'un compte bancaire avec un solde initial de 1000€
$compte = new CompteBancaire(1000);
// Dépôt de 500€
$compte->deposer(500);
// Retrait de 200€
$compte->retirer(200);
// Affichage du solde actuel
echo "Solde du compte : " . $compte->getSolde();  // Affiche : Solde du compte : 1300
```

## Résumé des Concepts Clés
- **Propriétés** : Ce sont des variables définies dans la classe qui représentent l'état d'un objet. Exemple : `$nom`, `$age`, `$couleur`, `$marque`.
- **Méthodes** : Ce sont des fonctions définies dans la classe qui réalisent des actions ou manipulent les propriétés d’un objet. Exemple : `setNom()`, `getNom()`, `afficherInfo()`.
- **Interaction entre Propriétés et Méthodes** : Les méthodes sont utilisées pour accéder ou modifier les propriétés. Exemple : `setNom($nom)` modifie la propriété `$nom` de l'objet, `getNom()` retourne la valeur de `$nom`.
- **Méthodes statiques** : Ces méthodes peuvent être appelées sans créer un objet, et elles n'ont pas accès aux propriétés d'instance de l'objet, seulement aux propriétés statiques.

### Exemple Complet de Classe avec Propriétés et Méthodes
```php
class Livre {
    // Propriétés
    public $titre;
    public $auteur;
    public $prix;
    // Méthode pour définir les propriétés
    public function setDetails($titre, $auteur, $prix) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->prix = $prix;
    }
    // Méthode pour obtenir les détails du livre
    public function afficherDetails() {
        return "Titre: " . $this->titre . ", Auteur: " . $this->auteur . ", Prix: " . $this->prix . "€";
    }
}
$livre1 = new Livre();
$livre1->setDetails("PHP pour débutants", "John Doe", 29.99);
echo $livre1->afficherDetails(); // Affiche : Titre: PHP pour débutants, Auteur: John Doe, Prix: 29.99€
```

## Constructeurs et Destructeurs : Initialisation automatique des objets avec `__construct()` et nettoyage des ressources avec `__destruct()`
Dans la programmation orientée objet en PHP, les constructeurs et destructeurs sont des méthodes spéciales qui sont automatiquement appelées lors de la création ou de la destruction d’un objet. Ces méthodes permettent de gérer l'initialisation des objets et de nettoyer les ressources quand un objet n’est plus utilisé.

### 1. Le Constructeur : `__construct()`
Le constructeur est une méthode spéciale qui est automatiquement appelée lors de la création d'un objet. Son rôle principal est d’initialiser les propriétés de l’objet dès sa création.

#### Syntaxe du Constructeur
```php
class NomDeLaClasse {
    public function __construct() {
        // Code d'initialisation ici
    }
}
```

Un constructeur peut également accepter des paramètres, ce qui permet de passer des valeurs lors de la création de l'objet, facilitant ainsi l'initialisation avec des valeurs spécifiques.

#### Exemple de Constructeur avec Paramètres
```php
class Voiture {
    public $marque;
    public $couleur;
    // Le constructeur prend des paramètres pour initialiser les propriétés
    public function __construct($marque, $couleur) {
        $this->marque = $marque;
        $this->couleur = $couleur;
    }
    public function afficherInfo() {
        return "Voiture: " . $this->marque . ", Couleur: " . $this->couleur;
    }
}

// Création de l'objet avec des paramètres
$voiture1 = new Voiture("Toyota", "Rouge");
echo $voiture1->afficherInfo();  // Affiche : Voiture: Toyota, Couleur: Rouge
```

### 2. Le Destructeur : `__destruct()`
Le destructeur est une méthode spéciale appelée automatiquement lorsqu'un objet est détruit ou hors de portée, c’est-à-dire lorsque l’objet est supprimé de la mémoire. Il est principalement utilisé pour nettoyer des ressources (comme des connexions à une base de données ou des fichiers ouverts) avant que l’objet ne soit complètement détruit.

#### Syntaxe du Destructeur
```php
class NomDeLaClasse {
    public function __destruct() {
        // Code de nettoyage ici
    }
}
```

#### Exemple de Destructeur
```php
class Fichier {
    public $nomFichier;

    public function __construct($nom) {
        $this->nomFichier = $nom;
        echo "Fichier $nom ouvert.\n";
    }
    public function __destruct() {
        echo "Fichier $this->nomFichier fermé.\n";
    }
}
// Création de l'objet, qui ouvre un fichier
$fichier1 = new Fichier("document.txt");
// À la fin du script, PHP appelle automatiquement le destructeur
```

## Modificateurs d'accès : public, private, protected et exemples d'encapsulation avec des getters et setters
En programmation orientée objet (POO), les modificateurs d'accès sont utilisés pour définir la visibilité des propriétés et des méthodes d'une classe. Cela permet de contrôler l'accès à ces éléments depuis l'extérieur de la classe, ce qui est une forme d'encapsulation.

### 1. Modificateurs d'accès
Les modificateurs d'accès en PHP sont :
- **public** : La propriété ou la méthode est accessible de n'importe où, à l'intérieur ou à l'extérieur de la classe.
- **private** : La propriété ou la méthode est uniquement accessible à l'intérieur de la classe. Elle ne peut pas être accédée ou modifiée par une autre classe, même une classe enfant.
- **protected** : La propriété ou la méthode est accessible à l'intérieur de la classe et de ses classes dérivées (héritées). Elle n'est pas accessible à partir d'une instance d'une autre classe, mais peut l'être par les classes qui l'héritent.

### 2. Encapsulation
L'encapsulation est un concept clé de la POO qui consiste à restreindre l'accès direct aux propriétés d'un objet. Au lieu de permettre un accès direct aux propriétés, on les rend privées ou protégées et on fournit des méthodes publiques pour y accéder ou les modifier. Ces méthodes sont souvent appelées getters (pour obtenir une valeur) et setters (pour définir une valeur).

### 3. Modificateurs d'accès en détails avec des exemples

#### Propriétés et méthodes public
Les propriétés ou méthodes public peuvent être accédées ou modifiées par n'importe quel code externe, qu'il soit dans la classe ou à l'extérieur.

##### Exemple
```php
class Personne {
    public $nom;  // Propriété publique
    // Méthode publique
    public function afficherNom() {
        return $this->nom;
    }
}
$personne = new Personne();
$personne->nom = "Alice";  // Accès direct à la propriété publique
echo $personne->afficherNom();  // Affiche : Alice
```

#### Propriétés et méthodes private
Les propriétés et méthodes private ne sont accessibles que depuis la classe elle-même. Elles ne peuvent pas être accédées ou modifiées directement par une instance d'une autre classe, ni même par une classe enfant.

##### Exemple
```php
class Personne {
    private $nom;  // Propriété privée
    // Méthode privée
    private function afficherNom() {
        return $this->nom;
    }
    // Méthodes publiques pour accéder aux propriétés privées
    public function setNom($nom) {
        $this->nom = $nom;  // Utilisation d'un setter pour modifier une propriété privée
    }
    public function getNom() {
        return $this->nom;  // Utilisation d'un getter pour accéder à une propriété privée
    }
}
$personne = new Personne();
// $personne->nom = "Alice";  // Erreur ! Propriété privée
$personne->setNom("Alice");  // Modification via un setter
echo $personne->getNom();  // Affiche : Alice
```

### Propriétés et méthodes protected
Les propriétés ou méthodes protected peuvent être accédées par la classe elle-même et ses classes enfants (les sous-classes), mais pas par des instances d'autres classes.

##### Exemple
```php
class Animal {
    protected $nom;  // Propriété protégée
    public function __construct($nom) {
        $this->nom = $nom;
    }
    // Méthode protégée
    protected function afficherNom() {
        return $this->nom;
    }
}
class Chien extends Animal {
    public function afficherNomChien() {
        return $this->afficherNom();  // Accès à la méthode protégée dans la classe enfant
    }
}
$chien = new Chien("Rex");
echo $chien->afficherNomChien();  // Affiche : Rex
```

### Introduction aux Classes Abstraites en PHP

Les classes abstraites en PHP sont des modèles qui ne peuvent pas être instanciés directement. Elles permettent de définir des structures de base et d'imposer des méthodes à d'autres classes qui en héritent. Ce document présente les concepts clés des classes abstraites, des méthodes abstraites, ainsi que des exemples concrets en PHP.

### 1. Créer des Modèles pour d'Autres Classes

Une classe abstraite sert de modèle pour d'autres classes, définissant une structure de base tout en imposant certaines méthodes. Les classes concrètes qui héritent de la classe abstraite doivent implémenter les méthodes abstraites mais peuvent également utiliser les méthodes déjà définies dans la classe abstraite.

#### Exemple

Imaginons une classe abstraite `Forme` qui définit un modèle pour des formes géométriques comme des cercles et des carrés.

```php
<?php
// Classe abstraite qui sert de modèle pour d'autres classes
abstract class Forme {
    // Méthode abstraite pour calculer l'aire
    abstract public function calculerAire();
    // Méthode concrète pour afficher des informations sur la forme
    public function afficherInfo() {
        echo "Je suis une forme géométrique.<br>";
    }
}
?>
```

#### Détails de l'exemple

- La classe `Forme` est abstraite et contient une méthode abstraite `calculerAire()`.
- Elle inclut également une méthode concrète `afficherInfo()` accessible aux classes dérivées.

### 2. Méthodes Abstraites et Leur Implémentation

Une méthode abstraite est définie sans implémentation dans une classe abstraite, servant de "contrat" pour les sous-classes. Si une sous-classe ne fournit pas d'implémentation pour la méthode abstraite, PHP générera une erreur.

#### Caractéristiques des Méthodes Abstraites

- Aucune implémentation dans la classe abstraite.
- Les sous-classes doivent implémenter chaque méthode abstraite.
- Une classe contenant une méthode abstraite doit être abstraite.

#### Exemple de Méthode Abstraite

Créons deux classes concrètes (`Cercle` et `Carre`) héritant de la classe abstraite `Forme`.

```php
<?php
// Classe abstraite
abstract class Forme {
    abstract public function calculerAire();  // Méthode abstraite
    public function afficherInfo() {
        echo "Je suis une forme géométrique.<br>";
    }
}
// Sous-classe Cercle qui hérite de Forme
class Cercle extends Forme {
    private $rayon;
    public function __construct($rayon) {
        $this->rayon = $rayon;
    }
    // Implémentation de la méthode calculerAire()
    public function calculerAire() {
        return pi() * pow($this->rayon, 2);  // Aire d'un cercle : πr²
    }
}
// Sous-classe Carre qui hérite de Forme
class Carre extends Forme {
    private $cote;
    public function __construct($cote) {
        $this->cote = $cote;
    }
    // Implémentation de la méthode calculerAire()
    public function calculerAire() {
        return pow($this->cote, 2);  // Aire d'un carré : côté²
    }
}
?>
```

#### Utilisation des Classes Concrètes

```php
<?php
// Création d'un cercle avec un rayon de 5
$cercle = new Cercle(5);
echo "Aire du cercle : " . $cercle->calculerAire() . "<br>";  // Aire du cercle : 78.539816339745
// Création d'un carré avec un côté de 4
$carre = new Carre(4);
echo "Aire du carré : " . $carre->calculerAire() . "<br>";  // Aire du carré : 16
?>
```

### Résumé des Concepts Clés en PHP

- **Classe Abstraite (Abstract Class)**:
  - Ne peut pas être instanciée directement.
  - Peut contenir des méthodes abstraites que les classes dérivées doivent obligatoirement implémenter.
  - Peut aussi contenir des méthodes concrètes pouvant être utilisées par les classes dérivées.

- **Méthode Abstraite (Abstract Method)**:
  - Méthode sans corps dans la classe abstraite.
  - Chaque classe concrète qui hérite de la classe abstraite doit implémenter cette méthode.
  - Peut y avoir plusieurs méthodes abstraites dans une classe abstraite.

- **Héritage**:
  - Une classe concrète peut hériter d’une classe abstraite et fournir des implémentations pour les méthodes abstraites.
  - Cela permet de spécialiser le comportement des sous-classes tout en maintenant une structure de base uniforme.

### Avantages des Classes Abstraites

- **Organisation et Structure**: Permettent de définir une structure commune pour les sous-classes.
- **Encapsulation du Comportement Commun**: Les méthodes concrètes peuvent être partagées entre toutes les sous-classes.
- **Imposition d’un Contrat**: L’utilisation de méthodes abstraites garantit que toutes les sous-classes implémentent certaines méthodes, assurant la cohérence dans le programme. 

#### Conclusion

Les classes abstraites et les méthodes abstraites en PHP sont des outils puissants pour structurer le code, garantir la cohérence et favoriser la réutilisation des méthodes communes entre différentes classes. Pour une programmation orientée objet efficace, leur utilisation est essentielle.


## Interfaces en PHP

En PHP, une interface est un outil puissant pour définir un contrat que les classes doivent respecter. Les interfaces permettent de structurer le code en définissant des méthodes que les classes doivent implémenter, sans imposer d’héritage de comportement.

### Concepts Clés

#### 1. Définir un contrat pour les classes

- Une interface est une structure qui définit un ensemble de méthodes que les classes doivent implémenter.
- Les méthodes n’ont pas d’implémentation dans l’interface et doivent être définies dans les classes.
  
**Caractéristiques des interfaces :**
- Les méthodes définies n’ont pas de corps (pas d’implémentation).
- Une classe qui implémente une interface doit implémenter toutes ses méthodes.
- Une interface ne peut contenir que des méthodes publiques.
- Les interfaces sont définies avec le mot-clé `interface`.

**Exemple :**

```php
<?php
// Définition d'une interface
interface Animal {
    public function faireDuBruit();
    public function seDeplacer();
}
// Classe Chien qui implémente l'interface Animal
class Chien implements Animal {
    public function faireDuBruit() {
        return "Wouaf!";
    }
    public function seDeplacer() {
        return "Je cours sur mes pattes.";
    }
}
// Classe Oiseau qui implémente l'interface Animal
class Oiseau implements Animal {
    public function faireDuBruit() {
        return "Cui-cui!";
    }
    public function seDeplacer() {
        return "Je vole dans les airs.";
    }
}
// Utilisation des classes
$chien = new Chien();
echo $chien->faireDuBruit();  // Affiche : Wouaf!
echo $chien->seDeplacer();   // Affiche : Je cours sur mes pattes.
$oiseau = new Oiseau();
echo $oiseau->faireDuBruit();  // Affiche : Cui-cui!
echo $oiseau->seDeplacer();   // Affiche : Je vole dans les airs.
?>
```

#### 2. Implémenter plusieurs interfaces

- Une classe peut implémenter plusieurs interfaces, ce qui permet d’ajouter plusieurs ensembles de comportements ou de fonctionnalités, contournant les limites de l’héritage unique en PHP.

**Exemple :**

```php
<?php
// Interface pour les objets capables de voler
interface Volant {
    public function voler();
}
// Interface pour les objets capables de nager
interface Nageant {
    public function nager();
}
// Classe Canard qui implémente deux interfaces
class Canard implements Volant, Nageant {
    public function voler() {
        return "Je vole avec mes ailes.";
    }
    public function nager() {
        return "Je nage dans l'eau.";
    }
}
// Classe Avion qui implémente uniquement l'interface Volant
class Avion implements Volant {
    public function voler() {
        return "Je vole avec des moteurs.";
    }
}
// Utilisation des classes
$canard = new Canard();
echo $canard->voler();  // Affiche : Je vole avec mes ailes.
echo $canard->nager();  // Affiche : Je nage dans l'eau.
$avion = new Avion();
echo $avion->voler();  // Affiche : Je vole avec des moteurs.
?>
```

### Avantages des interfaces

- **Flexibilité** : Une classe peut implémenter plusieurs interfaces, permettant à une classe d’avoir plusieurs comportements sans être limitée par un héritage unique.
- **Organisation du code** : Les interfaces aident à structurer le code en définissant des contrats clairs, facilitant maintenance et compréhension.
- **Polymorphisme** : Les interfaces permettent de traiter différents objets de manière uniforme tant qu’ils implémentent la même interface.

### Exemple de polymorphisme avec des interfaces

```php
<?php
function faireVoler(Volant $objet) {
    echo $objet->voler();
}
$canard = new Canard();
$avion = new Avion();
faireVoler($canard);  // Affiche : Je vole avec mes ailes.
faireVoler($avion);   // Affiche : Je vole avec des moteurs.

?>
```

### Différences entre interfaces et classes abstraites en PHP

| Caractéristique               | Interface                                            | Classe abstraite                                             |
|-------------------------------|------------------------------------------------------|--------------------------------------------------------------|
| Héritage                      | Une classe peut implémenter plusieurs interfaces.    | Une classe ne peut hériter que d'une seule classe abstraite. |
| Implémentation des méthodes   | Ne contient aucune implémentation de méthode.        | Peut contenir des méthodes abstraites et concrètes.          |
| Accès des méthodes            | Toutes les méthodes doivent être publiques.          | Les méthodes peuvent être publiques, protégées ou privées.   |
| Usage                         | Définit uniquement un contrat.                       | Peut définir des comportements communs et un contrat.        |

# Guide sur les Propriétés et Méthodes Statique en PHP

En PHP, les méthodes et propriétés statiques sont utilisées pour définir des fonctionnalités et des données partagées au niveau de la classe, et non au niveau des instances. Voici une explication détaillée des concepts, accompagnée d'exemples.

## 1. Propriétés Statique : Partager des Données

Les propriétés statiques appartiennent à la classe et non à ses instances. Cela signifie que leur valeur est partagée entre toutes les instances d'une classe. Vous pouvez accéder aux propriétés statiques sans créer d'instance de la classe, en utilisant l'opérateur `::`.

### Déclaration et Utilisation des Propriétés Statiques

```php
<?php
class Compteur {
    // Propriété statique
    public static $compte = 0;
    // Méthode pour incrémenter la propriété statique
    public static function incrementer() {
        self::$compte++;
    }
}
// Accéder à la propriété statique sans instancier la classe
echo "Valeur initiale : " . Compteur::$compte . "<br>";  // Affiche : Valeur initiale : 0
// Incrémenter la propriété statique
Compteur::incrementer();
Compteur::incrementer();
// Afficher la nouvelle valeur
echo "Valeur après incrémentations : " . Compteur::$compte . "<br>";  // Affiche : Valeur après incrémentations : 2

?>
```

**Explication :**
- La propriété `$compte` est déclarée avec le mot-clé `static` et appartient à la classe `Compteur`.
- Elle est incrémentée via la méthode statique `incrementer()`.
- La propriété statique est partagée entre toutes les instances de la classe, mais ici, elle est manipulée directement au niveau de la classe.

## 2. Méthodes Statique : Créer des Méthodes Utilitaires

Les méthodes statiques appartiennent également à la classe et non aux instances. Elles sont souvent utilisées pour des fonctions utilitaires ou des opérations qui n'ont pas besoin d'accéder à des données spécifiques de l'instance.

### Déclaration et Utilisation des Méthodes Statiques

```php
<?php

class MathUtils {
    // Méthode statique pour additionner deux nombres
    public static function addition($a, $b) {
        return $a + $b;
    }
    // Méthode statique pour calculer la puissance
    public static function puissance($base, $exposant) {
        return pow($base, $exposant);
    }
}
// Appeler les méthodes statiques sans instancier la classe
echo "Addition : " . MathUtils::addition(5, 10) . "<br>";  // Affiche : Addition : 15
echo "Puissance : " . MathUtils::puissance(2, 3) . "<br>";  // Affiche : Puissance : 8
?>
```

**Explication :**
- Les méthodes `addition()` et `puissance()` sont statiques et sont appelées directement via la classe `MathUtils` en utilisant `::`.
- Elles n’ont pas besoin d’instances pour être utilisées, car elles n’interagissent pas avec des propriétés non statiques.

## 3. Combiner Propriétés et Méthodes Statiques

Vous pouvez utiliser des propriétés statiques avec des méthodes statiques pour gérer des données partagées ou globales dans une application.

### Exemple : Gestion d'un Identifiant Unique Partagé

```php
<?php
class Identifiant {
    // Propriété statique pour suivre l'ID courant
    private static $idCourant = 0;
    // Méthode statique pour générer un nouvel ID
    public static function genererNouvelId() {
        self::$idCourant++;
        return self::$idCourant;
    }
}

// Générer des ID sans instancier la classe
echo "Premier ID : " . Identifiant::genererNouvelId() . "<br>";  // Affiche : Premier ID : 1
echo "Deuxième ID : " . Identifiant::genererNouvelId() . "<br>"; // Affiche : Deuxième ID : 2
echo "Troisième ID : " . Identifiant::genererNouvelId() . "<br>"; // Affiche : Troisième ID : 3
?>
```

**Explication :**
- La propriété statique `$idCourant` est utilisée pour suivre un identifiant unique.
- La méthode statique `genererNouvelId()` incrémente et retourne cet identifiant.

## 4. Accéder aux Méthodes et Propriétés Statiques depuis une Instance

Bien que les propriétés et méthodes statiques appartiennent à la classe, vous pouvez y accéder via une instance (même si ce n’est pas recommandé).

### Exemple :

```php
<?php

class Exemple {
    public static $statique = "Je suis une propriété statique.";
    public static function afficherStatique() {
        return "Je suis une méthode statique.";
    }
}

$instance = new Exemple();
// Accéder à une propriété et une méthode statique via l'instance
echo $instance::$statique . "<br>";  // Affiche : Je suis une propriété statique.
echo $instance::afficherStatique() . "<br>";  // Affiche : Je suis une méthode statique.
?>
```

## 5. Exemple Pratique : Gestion de Configuration Globale

Les méthodes et propriétés statiques sont utiles pour gérer une configuration globale ou un ensemble d’utilitaires.

### Exemple : Gestion d'une Configuration

```php
<?php

class Config {
    // Propriété statique pour stocker les paramètres
    private static $parametres = [];
    // Méthode statique pour définir un paramètre
    public static function definir($cle, $valeur) {
        self::$parametres[$cle] = $valeur;
    }
    // Méthode statique pour obtenir un paramètre
    public static function obtenir($cle) {
        return self::$parametres[$cle] ?? null;
    }
}

// Définir des paramètres
Config::definir('base_de_donnees', 'mysql');
Config::definir('hote', 'localhost');
// Obtenir les paramètres
echo "Base de données : " . Config::obtenir('base_de_donnees') . "<br>";  // Affiche : Base de données : mysql
echo "Hôte : " . Config::obtenir('hote') . "<br>";  // Affiche : Hôte : localhost
?>
```

## Avantages des Méthodes et Propriétés Statiques

- **Partage de données :** Les propriétés statiques permettent de partager des données entre toutes les instances d'une classe.
- **Accès simplifié :** Les méthodes statiques peuvent être appelées sans créer une instance, ce qui les rend idéales pour des utilitaires ou des gestionnaires globaux.
- **Performance :** Pas besoin d'instancier une classe pour accéder aux méthodes ou propriétés statiques.

## Points Importants à Retenir

- Les propriétés statiques doivent être accessibles via `self::$propriete` dans la classe, ou `NomDeClasse::$propriete` à l'extérieur.
- Les méthodes statiques doivent être appelées via `NomDeClasse::methode()` ou `self::methode()` à l'intérieur de la classe.
- Elles sont partagées entre toutes les instances, mais ne peuvent pas accéder directement aux propriétés ou méthodes non statiques de la classe.

# Namespaces et Autoloading en PHP

Les namespaces et l’autoloading sont des fonctionnalités essentielles pour organiser et gérer le code dans les projets PHP modernes, en particulier lorsqu'ils impliquent de nombreux fichiers et classes. Voici une explication détaillée et des exemples concrets.

## 1. Organiser le code avec les namespaces

### Qu’est-ce qu’un namespace ?
Un namespace (espace de noms) en PHP est une façon de regrouper des classes, fonctions ou constantes sous un même nom logique. Cela permet :
- D’éviter les conflits de noms entre classes ou fonctions dans un projet.
- De mieux organiser les fichiers dans des dossiers correspondant à leur structure logique.

Les namespaces sont définis avec le mot-clé `namespace` au début d’un fichier PHP.

### Exemple d’utilisation des namespaces
Imaginons un projet avec des classes pour gérer les utilisateurs et les produits, dans des modules différents.

**Structure des fichiers :**
```
src/
├── Utilisateurs/
│   └── Gestionnaire.php
├── Produits/
    └── Gestionnaire.php
```

**Code :**

`src/Utilisateurs/Gestionnaire.php`
```php
<?php
namespace App\Utilisateurs;
class Gestionnaire {
    public function afficherUtilisateurs() {
        return "Liste des utilisateurs.";
    }
}
```

`src/Produits/Gestionnaire.php`
```php
<?php
namespace App\Produits;
class Gestionnaire {
    public function afficherProduits() {
        return "Liste des produits.";
    }
}
```

**Utilisation des namespaces :**
```php
<?php
require_once 'src/Utilisateurs/Gestionnaire.php';
require_once 'src/Produits/Gestionnaire.php';
// Import des classes avec leurs namespaces
use App\Utilisateurs\Gestionnaire as GestionnaireUtilisateurs;
use App\Produits\Gestionnaire as GestionnaireProduits;
// Instanciation des classes
$gestionnaireUtilisateurs = new GestionnaireUtilisateurs();
$gestionnaireProduits = new GestionnaireProduits();
// Appel des méthodes
echo $gestionnaireUtilisateurs->afficherUtilisateurs(); // Affiche : Liste des utilisateurs.
echo $gestionnaireProduits->afficherProduits(); // Affiche : Liste des produits.
?>
```

### Résumé de l'exemple :
- Les classes `Gestionnaire` pour les utilisateurs et les produits sont définies dans des namespaces distincts : `App\Utilisateurs` et `App\Produits`.
- La fonction `use` permet de simplifier leur utilisation et de résoudre les conflits éventuels.

## 2. Autoloading des classes avec Composer

### Qu’est-ce que l’autoloading ?
L’autoloading est un mécanisme qui charge automatiquement les fichiers contenant des classes, interfaces ou traits, lorsque ceux-ci sont utilisés, sans avoir à les inclure manuellement avec `require` ou `include`.

### Pourquoi utiliser Composer ?
Composer est un gestionnaire de dépendances pour PHP qui fournit un autoloader standardisé. Il simplifie :
- Le chargement automatique des classes.
- La gestion des dépendances externes.

### Configurer l’autoloading avec Composer
#### Étape 1 : Installer Composer
Si Composer n’est pas installé sur votre machine, téléchargez-le à partir de [getcomposer.org](https://getcomposer.org/).

#### Étape 2 : Créer un fichier `composer.json`
À la racine de votre projet, créez un fichier `composer.json` pour déclarer l’autoloading.

**Exemple de fichier `composer.json` :**
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```
Dans cet exemple :
- `"psr-4"` est une norme d’autoloading qui mappe les namespaces PHP aux dossiers du projet.
- Le namespace `App\` correspond au dossier `src/`.

#### Étape 3 : Générer l’autoloader
Après avoir créé le fichier `composer.json`, exécutez la commande suivante dans votre terminal pour générer l’autoloader :
```bash
composer dump-autoload
```
Cela crée un fichier `vendor/autoload.php` que vous pouvez inclure pour activer l’autoloading.

#### Étape 4 : Utiliser l’autoloader
Supposons que vous avez les mêmes classes que précédemment dans le dossier `src/`. Voici comment les utiliser avec Composer :

**Code :**
```php
<?php
// Inclure l'autoloader de Composer
require_once __DIR__ . '/vendor/autoload.php';
// Utiliser les classes
use App\Utilisateurs\Gestionnaire as GestionnaireUtilisateurs;
use App\Produits\Gestionnaire as GestionnaireProduits;
$gestionnaireUtilisateurs = new GestionnaireUtilisateurs();
$gestionnaireProduits = new GestionnaireProduits();
echo $gestionnaireUtilisateurs->afficherUtilisateurs(); // Affiche : Liste des utilisateurs.
echo $gestionnaireProduits->afficherProduits(); // Affiche : Liste des produits.
?>
```

### Résumé de l'autoloading :
- L’autoloading gère automatiquement le chargement des fichiers PHP nécessaires.
- Plus besoin de `require` ou `include` manuels.

## 3. Avantages des namespaces et de l’autoloading

### Avantages des namespaces :
- Évite les conflits de noms dans des projets complexes.
- Structure le code de manière logique en suivant une hiérarchie.
- Simplifie le travail avec des frameworks ou bibliothèques externes.

### Avantages de l’autoloading avec Composer :
- Réduit la maintenance : plus besoin de gérer manuellement les `require` ou `include`.
- Supporte les normes standardisées comme PSR-4.
- Permet d’intégrer facilement des dépendances externes via Composer.

## Résumé
Les namespaces permettent d’organiser le code et d’éviter les conflits de noms. L’autoloading avec Composer simplifie le chargement des classes en suivant la norme PSR-4. Avec cette combinaison, les projets PHP restent bien structurés et évolutifs.


# Conclusion Générale sur la Programmation Oriente Object
La programmation orientée objet en PHP est une approche puissante et flexible pour structurer les applications, en permettant de modéliser les entités du monde réel grâce à des objets. Elle favorise la modularité, la réutilisabilité et la maintenabilité du code.

En combinant les concepts clés comme l’encapsulation, l’abstraction, l’héritage et le polymorphisme, l’OOP permet de résoudre des problèmes complexes avec des solutions claires et bien organisées. Les outils tels que les classes abstraites, les interfaces et les namespaces renforcent cette structure en offrant un cadre robuste pour le développement.

En conclusion, maîtriser l’OOP en PHP est essentiel pour construire des applications évolutives, collaboratives et alignées avec les meilleures pratiques de l'industrie. Que ce soit pour des projets simples ou des systèmes complexes, l’OOP est un fondement incontournable du développement moderne en PHP.


