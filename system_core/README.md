# Investing Partner

## Command to up and running

1. ``` npm install -g bower ```
2. ``` bower install ```
3. ``` npm i ```
4. ``` npm run dev ```
4. ``` composer install ```
5. ``` php artisan migrate:fresh --seed ```

## for authentication
1. go to ``` oauth_client ``` table, copy ``` secret ``` where ``` id ``` is 2
2. update .env file with the following code, and replace secret with coppied secret
```
PASSPORT_LOGIN_ENDPOINT=${APP_URL}/oauth/token
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET={secret}
```

## troubleshoot
case 1: 500 error while login
message: "cURL error 60: SSL certificate problem: unable to get local issuer certificate (see http://curl.haxx.se/libcurl/c/libcurl-errors.html)"

this problem ofter occurs in local environment with self signed ssl certificate. just update ``` APP_URL ``` value without https