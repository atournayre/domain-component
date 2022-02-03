# Documentation

## Adresse email

```php
use Aroban\Component\Domain\AdresseEmail\AdresseEmail;

$emailAddress = new AdresseEmail('email@example.com');

// Cette méthode retourne true si l'adresse email est valide, false si non valide.
$emailAddress->estValide();

// Cette méthode retourne le nom de domaine d'une adresse email. 
$domaine = $emailAddress->domaine()
```

### Example d'utilisation dans une factory
```php
use Aroban\Component\Domain\AdresseEmail\AdresseEmail;

class CustomFactory
{
    /**
     * @param string $emailAddress
     *
     * @return stdClass
     */
    public function creer(string $emailAddress): stdClass
    {
        $email = new AdresseEmail($emailAddress);

        $objet = new stdClass();
        $objet->email = $email;

        return $objet;
    }
}
```
