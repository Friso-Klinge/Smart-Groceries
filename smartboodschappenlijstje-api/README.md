# ☕ Smart Groceries API (Spring Boot)

Dit is de backend API voor het Smart Groceries project.
De API is gebouwd met **Spring Boot (Java 21)** en kan zowel lokaal als via Docker worden uitgevoerd.

---

# 📦 Benodigdheden

Om de API lokaal te draaien heb je nodig:

* Java 21 (JDK)
* Maven (of Maven Wrapper `mvnw`)
* Docker (optioneel, voor container run)
* Git

👉 Aanrader: gebruik de Maven Wrapper, dan hoef je Maven niet apart te installeren.

---

# 🚀 API lokaal starten (zonder Docker)

## 1. Ga naar de API map

```bash id="m1k8qp"
cd smartboodschappenlijstje-api
```

---

## 2. Build het project

```bash id="x8k2mq"
.\mvnw.cmd package
```

---

## 3. Start de applicatie

```bash id="a1m8qp"
.\mvnw.cmd spring-boot:run
```

---

## 🌐 API endpoints

Als de applicatie draait:

### API base URL

```
http://localhost:8080
```

### Swagger UI

```
http://localhost:8080/swagger-ui/index.html
```

---

# 🐳 API starten met Docker

## 1. Build JAR eerst

```bash id="b7n2wx"
.\mvnw.cmd package
```

---

## 2. Build Docker image

```bash id="c9p3lx"
docker build -t smart-api .
```

---

## 3. Run container

```bash id="d8k2qp"
docker run -p 8080:8080 smart-api
```

---

## 🌐 Docker URLs

```
http://localhost:8080
http://localhost:8080/swagger-ui/index.html
```

---

# 📁 Project structuur

```text id="e7m1wx"
smartboodschappenlijstje-api/
│
├── src/
│   ├── main/
│   │   ├── java/
│   │   └── resources/
│
├── target/
├── Dockerfile
├── pom.xml
└── mvnw / mvnw.cmd
```

---

# 🔗 API communicatie (Docker setup)

Wanneer je frontend in Docker draait:

👉 Gebruik deze URL in frontend:

```
http://api:8080
```

❌ NIET:

```
http://localhost:8080
```

---

# ⚠️ Veelvoorkomende problemen

## ❌ No compiler is provided

👉 Je hebt geen JDK geïnstalleerd
✔ Installeer Java 21

---

## ❌ target/*.jar not found

👉 Je hebt geen build gedaan
✔ Run:

```bash
.\mvnw.cmd package
```

---

## ❌ Port 8080 already in use

👉 API draait al ergens anders
✔ Stop IntelliJ of wijzig poort in Docker run

---

# 🧪 Development workflow

Voor elke wijziging:

```bash
git pull
.\mvnw.cmd package
docker compose up --build
```

---

# 👨‍💻 Author

Smart Groceries Development Team
