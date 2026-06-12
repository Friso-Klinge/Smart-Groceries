# Smart Groceries

Smart Groceries is een slimme boodschappenlijst-app waarmee gebruikers producten kunnen vergelijken tussen verschillende winkels en zo geld kunnen besparen.

Het project bestaat uit twee onderdelen:

* **Frontend:** Laravel
* **Backend API:** Spring Boot met Java 21

---

# Benodigdheden

Zorg ervoor dat je de volgende software hebt geïnstalleerd:

* Git
* Docker Desktop
* Java JDK 21
* PHP 8.2 of hoger
* Composer
* Node.js en npm

---

# Project installeren met Docker

Dit is de makkelijkste manier om het volledige project te starten.

## 1. Clone de repository

```bash
git clone <repository-url>
```

Ga daarna naar de projectmap:

```bash
cd Smart-Groceries
```

---

## 2. Maak het `.env` bestand aan

Kopieer het voorbeeldbestand:

```bash
copy .env.example .env
```

In `.env.example` staan de standaard instellingen die nodig zijn om het project te starten.

Let op: de echte `.env` wordt niet meegestuurd naar GitHub. Daarom moet iedereen dit bestand zelf aanmaken.

---

## 3. Build de backend

Ga naar de backend map:

```bash
cd smartboodschappenlijstje-api
```

Build de Spring Boot API:

```bash
.\mvnw.cmd package
```

Ga daarna terug naar de hoofdmap:

```bash
cd ..
```

---

## 4. Build en start de Docker containers

Voer dit commando uit in de hoofdmap van het project, waar ook `docker-compose.yml` staat:

```bash
docker compose up --build
```

---

## 5. Open de applicatie

Frontend:

```text
http://localhost:8000
```

Backend API:

```text
http://localhost:8080
```

Swagger UI:

```text
http://localhost:8080/swagger-ui/index.html
```

---

# Testaccount

Voor testen en demonstraties kan het volgende account gebruikt worden:

```text
E-mail: demo@smartgroceries.nl
Wachtwoord: password
```

Als het testaccount nog niet bestaat, voer dan de database seeder uit:

```bash
php artisan db:seed
```

---

# Project lokaal starten zonder Docker

Je kunt de frontend en backend ook los van elkaar starten. Dit is handig tijdens development.

---

# Backend lokaal starten

## 1. Ga naar de API map

```bash
cd smartboodschappenlijstje-api
```

---

## 2. Build het project

```bash
.\mvnw.cmd package
```

---

## 3. Start de applicatie

```bash
.\mvnw.cmd spring-boot:run
```

---

## Backend URL's

Als de backend draait:

API base URL:

```text
http://localhost:8080
```

Swagger UI:

```text
http://localhost:8080/swagger-ui/index.html
```

---

# Frontend lokaal installeren

Ga naar de Laravel frontend map.

Installeer de PHP packages:

```bash
composer install
```

Installeer de Node packages:

```bash
npm install
```

Maak het `.env` bestand aan:

```bash
copy .env.example .env
```

Genereer de Laravel applicatiesleutel:

```bash
php artisan key:generate
```

Voer de database migraties uit:

```bash
php artisan migrate
```

Maak eventueel het testaccount aan:

```bash
php artisan db:seed
```

---

# Frontend lokaal starten

Start Laravel:

```bash
php artisan serve
```

Open daarna een tweede terminal en start Vite:

```bash
npm run dev
```

De frontend draait nu op:

```text
http://localhost:8000
```

---

# API communicatie

Wanneer de frontend lokaal draait, gebruikt de frontend:

```text
http://localhost:8080
```

Wanneer de frontend in Docker draait, gebruikt de frontend:

```text
http://api:8080
```

Gebruik in Docker dus niet `localhost` voor de backend, omdat `localhost` dan naar de container zelf verwijst.

---

# API keys

De benodigde API keys staan in het `.env.example` bestand.

Na het clonen moet iedereen dit bestand kopiëren naar `.env`:

```bash
copy .env.example .env
```

Daarna worden de API keys automatisch uit het `.env` bestand gebruikt.

Voorbeeld:

```env
FUEL_API_KEY=65a84cfb-0183-4874-84c5-33bace5e2b96
```

---

# API apart starten met Docker

Wil je alleen de backend API als losse Docker container draaien? Ga dan naar de backend map:

```bash
cd smartboodschappenlijstje-api
```

Build eerst de JAR:

```bash
.\mvnw.cmd package
```

Build daarna de Docker image:

```bash
docker build -t smart-api .
```

Run de container:

```bash
docker run -p 8080:8080 smart-api
```

De API is daarna bereikbaar via:

```text
http://localhost:8080
http://localhost:8080/swagger-ui/index.html
```

---

# Project structuur

```text
Smart-Groceries/
│
├── smartboodschappenlijstje-api/
│   ├── src/
│   ├── target/
│   ├── Dockerfile
│   ├── pom.xml
│   └── mvnw / mvnw.cmd
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── docker-compose.yml
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

# Veelvoorkomende problemen

## Vite foutmelding

Krijg je een foutmelding zoals:

```text
Vite manifest not found
```

of:

```text
Unable to locate file in Vite manifest
```

Voer dan in de frontend map opnieuw uit:

```bash
npm install
npm run dev
```

Controleer ook of beide processen draaien:

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

---

## Laravel key error

Krijg je een foutmelding over de Laravel application key?

Voer dan uit:

```bash
php artisan key:generate
```

---

## Database fout

Voer de migraties opnieuw uit:

```bash
php artisan migrate
```

Wil je ook het testaccount aanmaken?

```bash
php artisan db:seed
```

---

## Backend fout: No compiler is provided

Deze fout betekent meestal dat er geen JDK is geïnstalleerd, maar alleen een JRE.

Controleer je Java versie:

```bash
java -version
```

Installeer Java JDK 21 als dit nog niet goed staat.

---

## Backend fout: target/*.jar not found

Deze fout betekent dat de backend nog niet gebouwd is.

Ga naar de backend map en voer uit:

```bash
.\mvnw.cmd package
```

Start daarna Docker opnieuw vanuit de hoofdmap:

```bash
docker compose up --build
```

---

## Port 8080 already in use

De backend draait waarschijnlijk al ergens anders.

Sluit bijvoorbeeld IntelliJ, stop de andere backend of stop het proces dat poort 8080 gebruikt.

---

## Port 8000 already in use

De frontend draait waarschijnlijk al in een andere terminal.

Sluit die terminal of gebruik een andere poort.

---

# Development workflow

Voor elke wijziging:

```bash
git pull
```

Backend opnieuw builden:

```bash
cd smartboodschappenlijstje-api
.\mvnw.cmd package
```

Daarna terug naar de hoofdmap:

```bash
cd ..
```

Start alles opnieuw met Docker:

```bash
docker compose up --build
```

Werk je lokaal zonder Docker?

Backend:

```bash
cd smartboodschappenlijstje-api
.\mvnw.cmd spring-boot:run
```

Frontend:

```bash
php artisan serve
npm run dev
```

---

# Authors

Smart Groceries Development Team
