# Projet : ORM Personnalisé pour Fut Champ

## Contexte du projet
Fut Champ, une web app spécialisée dans les **player cards** des joueurs de Football, souhaite améliorer son infrastructure de gestion des données. L'objectif est de créer un **Object-Relational Mapping (ORM)** personnalisé en PHP afin d'optimiser le processus de gestion des données. Cet ORM doit automatiser les opérations CRUD et fournir une solution flexible adaptée aux besoins spécifiques de Fut Champ.

## Objectif
L'ORM personnalisé doit permettre de manipuler facilement les données de la base de données sans nécessiter de requêtes SQL explicites. Il doit également simplifier la gestion des relations entre les tables, intégrer des mécanismes de validation des données, et offrir une gestion des erreurs robuste.

## Fonctionnalités Attendues de l'ORM

1. **Configuration Facile** :
   - L'ORM doit permettre une configuration rapide avec les paramètres de connexion à la base de données (hôte, utilisateur, mot de passe, base de données).

2. **Opérations CRUD Automatisées** :
   - L'ORM doit automatiser les opérations de **création (Create)**, **lecture (Read)**, **mise à jour (Update)** et **suppression (Delete)** d'enregistrements sans avoir à écrire de requêtes SQL.

3. **Gestion des Relations Simples** :
   - L'ORM doit supporter des relations simples entre les tables, comme les relations **un-à-un** et **un-à-plusieurs**.

4. **Validation Minimale des Données** :
   - L'ORM doit inclure des mécanismes de validation simples pour vérifier la cohérence des données avant de les insérer dans la base de données.

5. **Gestion des Erreurs et Exceptions** :
   - Le système doit être capable de gérer les erreurs et exceptions pour garantir la résilience de l'application.

6. **Compatibilité avec Diverses Bases de Données (Bonus)** :
   - L'ORM doit être compatible avec plusieurs systèmes de gestion de bases de données tels que **MySQL**, **PostgreSQL**, **SQLite**, etc.

## User Stories

- **En tant que développeur**, je veux pouvoir configurer l'ORM rapidement avec les paramètres de connexion à la base de données.
- **En tant que développeur**, je veux pouvoir effectuer des opérations CRUD sans avoir à écrire de requêtes SQL explicites.
- **En tant que développeur**, je veux pouvoir définir des relations simples entre les tables pour refléter la structure de ma base de données.
- **En tant que développeur**, je veux une validation minimale des données pour assurer la cohérence avant l'insertion.
- **En tant que développeur**, je veux que l'ORM gère les erreurs et exceptions de manière appropriée pour une meilleure robustesse.
- **(Bonus)** **En tant que développeur**, je veux que l'ORM soit compatible avec diverses bases de données, me permettant de l'utiliser selon les besoins du projet.

## Architecture de l'ORM

L'ORM sera structuré autour des concepts suivants :

- **Classe de Configuration** : Gère les paramètres de connexion à la base de données.
- **Classe de Modèle (Model)** : Représente les entités de la base de données (ex. : joueurs, équipes, etc.) et contient les méthodes pour effectuer les opérations CRUD.
- **Classe de Relation** : Gère les relations entre les entités, telles que les relations un-à-un et un-à-plusieurs.
- **Classe de Validation** : Fournit des mécanismes de validation pour les données avant insertion ou mise à jour.
- **Gestion des Exceptions** : Un système global pour capturer et gérer les erreurs et exceptions pendant l'exécution des opérations.

## Exemples d'Utilisation

### 1. Configuration de la Connexion à la Base de Données
```php
$orm = new ORM([
    'host' => 'localhost',
    'dbname' => 'fut_db',
    'username' => 'root',
    'password' => ''
]);
```

### Strecturedu projet:

```
project/
├── document/
│   └── readme.md
├── config/
│   └── database.php
├── includes/
│   └── Player.php
|
├── index.php
|
└── readme.md
```
