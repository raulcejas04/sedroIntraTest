service postgresql restart
dropdb sedro_intra
createdb sedro_intra
psql -d sedro_intra -f sedro_intra.sql

