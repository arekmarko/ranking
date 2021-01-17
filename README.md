# Uruchomienie bez Docker

1. Ustaw odpowiednie parametry bazy danych w www/db_connection.php
2. Uruchom w phpmyadmin skrypt sql dump/init.sql
3. Przekopiuj zawartość folderu www do folderu, z którego udostępnia strony serwer
   apache

# Uruchomienie z docker

```
docker-compose up -d
```

Aplikacja będzie dostępna na http://localhost:8000

Panel administratora na http://localhost:8080
