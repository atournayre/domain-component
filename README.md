# Domain Component

> ⚠️ **Développement en cours** ⚠️
> 
> Ne pas utiliser en production

Ce composant met à disposition des fonctionnalités utilisables dans le Domaine d'une application.


## Installation
```shell
composer require atournayre/domain-component
```

## Traits
* AdresseEmail
* Nom
* NomDeFamille
* UUID

## Types personnalisés
| Type | Description    |
|---|----------------|
| AdresseEmail | Adresse email  |
| Nom | Nom            |
| NomDeFamille | Nom de famille |

Plus [Documentation](doc/doc.md)

## Traductions

Dans controller, services ...
```php
use Atournayre\Component\Domain\Type\Exception\Exception;

try {}
catch(Exception $e) {
     $translatedMessage = vsprintf($translator->trans($e->getMessageKey()), $e->getMessageData()));
}
```

Dans Twig
```html
<div class="alert alert-danger">{{ error.messageKey|trans|format(error.messageData) }}</div>
```


## Contribuer

Vous voulez une nouvelle fonctionnalité ? Vous pouvez la demander mais créer une pull request est le meilleur moyen de l'obtenir.

Toutes les contributions sont les bienvenues.
