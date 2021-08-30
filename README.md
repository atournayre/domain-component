# Domain Component

This component provide custom types with validation rules for Domain entities.

## Installation
```shell
composer require atournayre/domain-component
```

## Custom types
| Type | Description |
|---|---|
| EmailAddress | Email addresses |

More [Documentation](doc/doc.md)

## Validation interface

Each custom type implement ``ValidationInterface``.

Validation methods can be used in :
* Domain entities
* Form contraints
* Api Platform Data Persister
* anywhere!

## Examples

### Email address
```php
use Atournayre\Component\Domain\EmailAddress\EmailAddress;

$emailAddress = new EmailAddress('email@example.com');

// This method return true if email address is valid, false if not valid.
$emailAddress->isValid();

// This method throws a EmailAddressException if not valid. 
$emailAddress->validate();
```



## Contributing

Of course, open source is fueled by everyone's ability to give just a little bit of their time for the greater good. If you'd like to see a feature or add some of your own happy words, awesome! Tou can request it - but creating a pull request is an even better way to get things done.

Either way, please feel comfortable submitting issues or pull requests: all contributions and questions are warmly appreciated :).