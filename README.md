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

Ajoutez le package `Hamada/Laravel_SmsSak` à votre projet Laravel en utilisant Composer.

```bash
composer require hamada/laravel-smssak
```

### Étape 2 : Publier la configuration

Après avoir installé le package, publiez le fichier de configuration avec la commande suivante :

```bash
php artisan vendor:publish --provider="Hamada\Laravel_SmsSak\SmsSakServiceProvider" --tag="config"
```

### Étape 3 : Configurer les informations d'API

Dans le fichier `config/smssak.php`, entrez vos informations d'API que vous pouvez obtenir à partir de votre compte SmsSak.

```php
return [
    'country' => 'dz', // Exemple : 'dz' pour l'Algérie
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

Voici un exemple d'utilisation pour envoyer un OTP par SMS :

```php
use Hamada\Laravel_SmsSak\Facades\SmsSak;

$phone = 'votre_numero_de_telephone';
$otp = SmsSak::sendOtp($phone);
```

### Vérifier un OTP

Pour vérifier un OTP, utilisez la fonction `verifyOtp` comme suit :

```php
use Hamada\Laravel_SmsSak\Facades\SmsSak;

$phone = 'votre_numero_de_telephone';
$otp = 'code_otp';
$isVerified = SmsSak::verifyOtp($phone, $otp);

if ($isVerified) {
    // OTP vérifié avec succès
} else {
    // Échec de la vérification
}
```

## Contributions

Les contributions sont les bienvenues ! Si vous avez des suggestions ou des améliorations, n'hésitez pas à créer une pull request.

## License

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.

---
