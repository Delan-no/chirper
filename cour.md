## Modèles, migrations et controllers

Pour permettre à l'utilisateur de poster des commentaires, on aura besoin d'un:

- modèle: qui nous fournit un moyen simple d'interagir avec la BDD
- migration: qui nous permet de facilement créer et modifier les tables de notre BDD
- controlleur: responsable de traiter les requêtes et de renvoyer des réponses

## Middleware

Un middleware est une fonctionnalité permettant de filtrer les requêtes HTTP effectuée dans l'application. Les middlewares sont des couches interméidaires qui peuvent être ajoutées au pipeline de traitement des requêtes HTTp pour effectuer des tâches spécifiques avant que la requête n'atteingne la route appropriée ou après que la réponse ait été générée par le contrôleur.

## Composants

### composants sous forme de classes

composants les plus versatiles et robustes
peuvent prendre des paramètres

### composants anonymes

composants simples ne prenant aucun paramètre

## Fonctions d'aide Laravel

`route()`: fonction qui génère l'URL correspondant à une route nommée

`action()`: fonction qui génère l'URL correspondant à l'action (méthode) d'un controlleur donné.

`url()`: fonction qui génère l'URL complet (http://.../url)

`__()`: fonction qui renvoie la traduction pour une chaîne de caractère donnée.

`session()`: fonction qui récupère les données de session

`setLocale`: fonction qui change la langue de l'application

## Mass assignation

La mass assignation est une techniuqe qui permet de définir plusieurs attributs d'un modèle en une seule fois. Par exemple, imaginez que vous avez un modèle `Utilisateur` avec des champs tels que `nom`, `email`, `rôle`. la mass assignation permet de définir tous ces champs en une fois, ce qui peut être très pratique et vous faire gagner du temps.

Cependant, dsi elle n'est pas gérée avec précaution, la mass assignation peut entrîner une vulnérabilité de sécurité appelée "over-posting" ou "vulnérabilité de mass assignation".