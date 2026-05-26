# 🛒 Smart Groceries / Smart Boodschappenlijstje

Dit project bestaat uit:

* 🟦 Laravel frontend
* ☕ Spring Boot API
* 🐳 Docker setup (alles draait via containers)

---

# 📦 Benodigdheden

Zorg dat je het volgende hebt geïnstalleerd:

* Docker Desktop
  https://www.docker.com/products/docker-desktop/
* Git

👉 Verder hoef je **NIETS lokaal te installeren**:

* geen Java
* geen Maven
* geen PHP
* geen Laravel setup

Alles draait via Docker.

---

# 🚀 Project starten

## 1. Repository clonen

```bash
git clone <JOUW-REPO-URL>
cd Smart-Groceries
```

---

## 2. Containers starten

Start het hele project met:

```bash
docker compose up --build
```

Dit:

* bouwt de Docker images
* start frontend + backend
* zet het netwerk automatisch goed

---

## 3. Open de applicatie

### 🟦 Frontend (Laravel)

```
http://localhost:8000
```

### ☕ API (Spring Boot)

```
http://localhost:8080
```

### 📄 Swagger UI

```
http://localhost:8080/swagger-ui/index.html
```

---

# 🧱 Project structuur

```
Smart-Groceries/
│
├── frontend/        # Laravel app
│   ├── Dockerfile
│   ├── app/
│   ├── routes/
│
├── api/             # Spring Boot API
│   ├── Dockerfile
│   ├── pom.xml
│   ├── src/
│
├── docker-compose.yml
└── README.md
```

---

# 🔧 Stoppen van het project

```bash
docker compose down
```

---

# ⚠️ Belangrijke notes

### API communicatie vanuit Laravel

Binnen Docker gebruik je:

```
http://api:8080
```

NIET:

```
http://localhost:8080
```

---

### Als poort al in gebruik is

Pas in `docker-compose.yml` de host poorten aan:

```yaml
ports:
  - "8081:8080"
```

Dan wordt Swagger:

```
http://localhost:8081/swagger-ui/index.html
```

---

# 🧪 Eerste keer build kan langer duren

Omdat Docker:

* images moet downloaden
* Maven dependencies moet installeren
* Laravel dependencies laadt

---

# 👨‍💻 Development flow

Voor wijzigingen:

```bash
git pull
docker compose up --build
```

---

# 🧠 Samenvatting

👉 1 command start alles:

```bash
docker compose up --build
```

👉 0 lokale installaties nodig
👉 100% reproduceerbaar project
👉 werkt op elk systeem met Docker

---

# 🎯 Authors

Smart Groceries Project Team
