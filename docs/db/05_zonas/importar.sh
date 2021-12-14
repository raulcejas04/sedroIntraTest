#
# para ejecutar este script primero deberá conectarse con el usuario postgres.
# En el siguiente ejemplo se conectara con usuario postgres.
# La password que le pide a continucion sera del usuario root o administrador
# comando:
#  sudo su postrges
#  
# Una vez conectado ejecute este script:
# comando:
#  ./importar.sh
#

psql -d sedro_intra -f zonas.sql

