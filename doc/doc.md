# Documentation

## Email

```php
use Atournayre\Component\Domain\EmailAddress\EmailAddress;

$emailAddress = new EmailAddress('email@example.com');

// This method return true if email address is valid, false if not valid.
$emailAddress->isValid();

// This method throws a EmailAddressException if not valid. 
$emailAddress->validate();

// This method retrieve the domain of the email address. 
$domain = $emailAddress->domain()
```

### Example of validation usage
```php
use Atournayre\Component\Domain\EmailAddress\EmailAddress;
use Atournayre\Component\Domain\EmailAddress\EmailAddress\Exception;

class CustomFactory
{
    /**
     * @return stdClass
     * @throws EmailAddressException
     */
    public function create(): stdClass
    {
        $email = new EmailAddress($emailAddress);
        $email->validate();

        $stdObject = new stdClass();
        $stdObject->email = $email;

        return $stdObject;
    }
}
```
