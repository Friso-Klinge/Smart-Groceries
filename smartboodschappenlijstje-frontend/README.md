# Smart Groceries Frontend starten

Deze README legt uit hoe je de frontend van het Smart Groceries-project lokaal kunt starten.

## Benodigdheden

Zorg dat je deze programma's geïnstalleerd hebt:

- PHP
- Composer
- Node.js
- npm
- Git

## Project openen

Ga eerst naar de frontend-map van het project:

```bash
cd smartboodschappenlijstje-frontend
```

Controleer of je in de juiste map zit. In deze map moeten onder andere deze bestanden staan:

```text
artisan
composer.json
package.json
vite.config.js
```

## Eerste keer starten

Als je het project voor de eerste keer opent, voer je deze stappen uit.

### 1. PHP dependencies installeren

```bash
composer install
```

### 2. Node dependencies installeren

```bash
npm install
```

### 3. .env-bestand aanmaken

Als er nog geen `.env`-bestand bestaat:

```bash
cp .env.example .env
```

Op Windows PowerShell gebruik je:

```powershell
copy .env.example .env
```

### 4. App key aanmaken

```bash
php artisan key:generate
```

### 5. Database instellen

Als het project SQLite gebruikt, maak dan eerst het databasebestand aan:

```powershell
New-Item database\database.sqlite -ItemType File
```

Daarna voer je de migrations uit:

```bash
php artisan migrate
```

## Project starten

Voor Laravel + Vite heb je meestal twee terminals nodig.

### Terminal 1: Laravel server starten

```bash
php artisan serve
```

De website draait meestal op:

```text
http://127.0.0.1:8000
```

### Terminal 2: Vite frontend starten

```bash
npm run dev
```

Laat beide terminals open staan zolang je aan het project werkt.

## Na een merge met de development branch

Je hoeft niet altijd alles opnieuw te doen na een merge.

Gebruik dit als standaardcontrole:

```bash
composer install
npm install
php artisan migrate
php artisan optimize:clear
```

Daarna start je weer:

```bash
php artisan serve
```

En in een tweede terminal:

```bash
npm run dev
```

## Wanneer moet je welke command gebruiken?

| Situatie | Command |
| --- | --- |
| Nieuwe PHP packages | `composer install` |
| Nieuwe npm packages | `npm install` |
| Nieuwe database migrations | `php artisan migrate` |
| CSS of JavaScript werkt niet goed | `npm run dev` opnieuw starten |
| Config of cache problemen | `php artisan optimize:clear` |
| Alleen Blade/PHP code aangepast | Browser refreshen is meestal genoeg |

## Veelvoorkomende problemen

### CSS werkt niet

Controleer of Vite draait:

```bash
npm run dev
```

Controleer ook of dit in je Blade-layout staat:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Als er ook een apart CSS-bestand is, bijvoorbeeld `auth.css`, dan kan dit zijn:

```blade
@vite(['resources/css/app.css', 'resources/css/auth.css'])
```

### Database SQLite bestaat niet

Krijg je een fout zoals:

```text
Database file at path database/database.sqlite does not exist
```

Maak dan het bestand aan:

```powershell
New-Item database\database.sqlite -ItemType File
```

En voer daarna uit:

```bash
php artisan migrate
```

### Vite manifest not found

Voer uit:

```bash
npm run dev
```

Of bouw de frontend eenmalig:

```bash
npm run build
```

Tijdens development is `npm run dev` meestal genoeg.

## Korte startversie

Als alles al geïnstalleerd is, hoef je meestal alleen dit te doen:

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```
