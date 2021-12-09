curl --location --request POST 'http://172.29.0.1:8180/auth/realms/master/protocol/openid-connect/token' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'grant_type=password' \
--data-urlencode 'username=admin' \
--data-urlencode 'password=qaz123' \
--data-urlencode 'cliend_id=admin-cli' \
--data-urlencode 'client_secret=75803452-0e59-4adb-aae8-82fc527f5a86' \

