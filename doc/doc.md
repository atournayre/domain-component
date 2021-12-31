# Documentation

## Email

```php
use Atournayre\Component\Domain\AdresseEmail\AdresseEmail;

$emailAddress = new AdresseEmail('email@example.com');

// This method return true if email address is valid, false if not valid.
$emailAddress->isValid();

// This method retrieve the domain of the email address. 
$domain = $emailAddress->domain()
```

### Example of validation usage
```php
use Atournayre\Component\Domain\AdresseEmail\AdresseEmail;

class CustomFactory
{
    /**
     * @return stdClass
     */
    public function create(): stdClass
    {
        $email = new AdresseEmail($emailAddress);

        $stdObject = new stdClass();
        $stdObject->email = $email;

        return $stdObject;
    }
}
```
