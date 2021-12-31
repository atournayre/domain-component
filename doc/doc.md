# Documentation

## Email

```php
use Atournayre\Component\Domain\EmailAddress\EmailAddress;

// This method throws a EmailAddressException if not valid. 
$emailAddress = new EmailAddress('email@example.com');

// This method return true if email address is valid, false if not valid.
$emailAddress->isValid();

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
     * @throws EmailAddressIsEmptyException
     * @throws EmailAddressIsNotValidException
     * @throws EmailAddressShouldContainsArobaseException
     */
    public function create(): stdClass
    {
        $email = new EmailAddress($emailAddress);

        $stdObject = new stdClass();
        $stdObject->email = $email;

        return $stdObject;
    }
}
```
