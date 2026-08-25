# Budget Tracker
Application Laravel de suivi de dépenses personnelles avec catégorisation et analyse mensuelle

## Lien de la démo
https://budget-tracker-production-hmnbxj.laravel.cloud

## identifiants de test
Identifiant : 'demo@budget-tracker.test'
Mot de passe : 'Password'

## Stack

- Laravel 12 / PHP 8.x
- MySQL 8.4
- Blade + Tailwind CSS + Alpine.js
- Laravel Breeze (authentification)

## Fonctionnalités

- Authentification (inscription, connexion) via Laravel Breeze
- Gestion des transactions : création, consultation, modification, suppression
- Gestion des catégories personnalisées par utilisateur
- Page d'analyse : total du mois en cours, répartition par catégorie, historique des 6 derniers mois
- Suivi des transactions non catégorisées
- Cloisonnement strict des données : chaque utilisateur n'accède qu'aux siennes
- Validation serveur via FormRequest, protection CSRF, protection contre l'assignation de masse
- Interface responsive

## Installation

```bash
git clone https://github.com/antoine-devlp/budget-tracker.git
cd budget-tracker

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configurer la base de données dans `.env` :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=budget_tracker
DB_USERNAME=root
DB_PASSWORD=
```
```bash
php artisan migrate
php artisan db:seed
npm run dev
```
