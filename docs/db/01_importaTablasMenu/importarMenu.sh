#
# para ejecutar este script primero deberá conectarse con el usuario postgres.
# En el siguiente ejemplo se conectara con usuario postgres.
# La password que le pide a continucion sera del usuario root o administrador
# comando:
#  sudo su postrges
#  
# Una vez conectado ejecute este script:
# comando:
#  ./importarMenu.sh
#

pg_dump -d sedro_intra -f menu.sql
pg_dump -d sedro_intra -f role.sql
pg_dump -d sedro_intra -f menuitem.sql
pg_dump -d sedro_intra -f rolemenu.sql

