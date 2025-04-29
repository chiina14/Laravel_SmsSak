# Laravel SmsSak

Une bibliothèque Laravel pour l'intégration de l'API SmsSak afin d'envoyer et de vérifier les OTP (One-Time Passwords) par SMS.

## Description

Laravel SmsSak est un package Laravel qui vous permet d'intégrer facilement l'API de **SmsSak** dans votre application Laravel. Ce package vous permet d'envoyer des OTP par SMS et de les vérifier afin d'assurer la sécurité de l'authentification des utilisateurs.

## Fonctionnalités

- Envoi de OTP via SmsSak
- Vérification de OTP
- Personnalisation des messages et des paramètres de l'API

## Prérequis

Avant d'installer ce package, assurez-vous que vous avez les éléments suivants :

- PHP 8.1 ou supérieur
- Laravel 10.x
- Un compte et une clé API sur [SmsSak](https://smssak.com/)

## Installation

### Étape 1 : Ajouter le package à votre projet Laravel

Ajoutez le package `hamada/laravel-smssak` à votre projet Laravel en utilisant Composer.

```
composer require hamada/laravel-smssak
```

### Étape 2 : Publier la configuration

Après avoir installé le package, publiez le fichier de configuration avec la commande suivante :

```
php artisan vendor:publish --provider="Hamada\Laravel_SmsSak\SmsSakServiceProvider" --tag="config"
```

### Étape 3 : Configurer les informations d'API

Dans le fichier `config/smssak.php`, entrez vos informations d'API que vous pouvez obtenir à partir de votre compte SmsSak.

```php
return [
    'country' => 'dz',
    'project_id' => env('SMSSAK_PROJECT_ID', 'votre_project_id'),
    'api_key' => env('SMSSAK_API_KEY', 'votre_api_key'),
];
```

Ajoutez également ces informations dans votre fichier `.env` :

```
SMSSAK_PROJECT_ID=votre_project_id
SMSSAK_API_KEY=votre_api_key
```

## Utilisation

### Envoyer un OTP

```php
use Hamada\Laravel_SmsSak\Facades\SmsSak;

$phone = '+213XXXXXXXXX';
$response = SmsSak::sendOtp($phone);
```

### Vérifier un OTP

```php
use Hamada\Laravel_SmsSak\Facades\SmsSak;

$phone = '+213XXXXXXXXX';
$otp = '1234';
$response = SmsSak::verifyOtp($phone, $otp);

if ($response['success']) {
    // OTP vérifié avec succès
} else {
    // Échec de la vérification
}
```

## Contributions

Les contributions sont les bienvenues ! Si vous avez des suggestions ou des améliorations, n'hésitez pas à créer une pull request.

## License

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.
