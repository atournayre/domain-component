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
* UUID

## Types personnalisés
| Type | Description    |
|---|----------------|
| AdresseEmail | Adresse email  |
| Nom | Nom            |

Plus [Documentation](doc/doc.md)

## Validation d'objet
Un objet que l'on veut rentre "validable" doit étendre la classe ```Atournayre\Component\Domain\Validation\Validable```.

Il disposera alors d'une méthode ```estValide()```.

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
