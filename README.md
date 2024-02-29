### Quelles sont les fonctionnalités principales du Symfony CLI ?

- Création de projets Symfony
- Développement en temps réel
- Exécuter et arrêter un serveur local
- Génération de code
- Installation de dépendances (et sécurisation)
- Gestion de base données
- Déploiement
- Définition des environements

### Expliquer ce qu'est le fichier .env en symfony

- Définition des variables d'environnements
- Commitable
- Données sensibles dans le .env.local

### Expliquer pourquoi il faut changer le connecteur à la base de données

- Car on peut utiliser un grand nombre de base de données, il faut donc adapter la ligne du .env pour se connecter à la bonne

### Commencer à réfléchir aux relations à définir entre les entités (Many To One/Many To Many/...) ?

Un lien peut avoir plusieurs réactions
- Link -> Reaction : OneToMany

Une réaction ne peut avoir qu'un seul lien
- Reaction -> Link : ManyToOne

Un user peut avoir plusieurs réactions
- User -> Reaction : OneToMany

Une réaction ne peut avoir qu'un seul user
- Reaction -> User : ManyToOne

Un user peut avoir plusieurs links
- User -> Link : OneToMany

Un lien ne peut avoir qu'un seul user
- Link -> User : ManyToOne

### Première réflexion : quelles routes qui vont devoir être créées dans l’application en fonction des différentes vues ?

- "/" pour la homepage
- "/login" pour se connecter
- "/create" pour créer un lien
- "/profile" pour voir son profil (ett voir tous ses propres lien)
- "/profile/id" pour voir le profil d'une autre personne

### Qu'est ce que le ParamConverter

- ParamConverter est un composant utilisé pour convertir automatiquement certains paramètres de requête en objets spécifiques dans les contrôleurs. Il est principalement utilisé pour simplifier le processus de récupération d'objets à partir des paramètres de requête dans les actions des contrôleurs.

### À quoi sert le Doctrine ParamConverter ?

-  Il simplifie grandement le processus de récupération d'objets depuis la base de données dans les contrôleurs Symfony.


### Qu'est-ce qu'un formulaire Symfony ?

-
Un formulaire Symfony fait référence à un composant de Symfony, un framework PHP, qui permet de gérer facilement la création, la validation et le traitement des formulaires HTML dans une application web.

### Quels avantages offrent l'usage d'un formulaire ?

- Collecte de données structurée
- Interaction utilisateur conviviale
- Validation des données côté client et côté serveur
- Personnalisation et flexibilité
- Sécurité
- Traitement efficace des données
- Compatibilité multiplateforme

### Quelles sont les différentes personalisations de formulaire qui peuvent être faites dans Symfony ?

- on peut altérer chaque champ d'un formulaire
  - Le label
  - Le message d'erreur
  - Le champ en lui même (l'input)
  - le message Help
- On peut les remoduler dans l'ordre qu'on veut

### a

- a
