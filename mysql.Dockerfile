FROM mysql:8.0.19
COPY ./dump/travel.sql /docker-entrypoint-initdb.d/init.sql
