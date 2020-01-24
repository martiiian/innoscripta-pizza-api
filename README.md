## API for pizza innoscript app

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/49a2a2f5ca754826924e90e6e6fb0bdd)](https://www.codacy.com?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=martiiian/innoscripta-pizza-api&amp;utm_campaign=Badge_Grade)

[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/49a2a2f5ca754826924e90e6e6fb0bdd)](https://www.codacy.com?utm_source=github.com&utm_medium=referral&utm_content=martiiian/innoscripta-pizza-api&utm_campaign=Badge_Coverage)

# Install
### install laravel environment
(Sorry I don't have any docker image yet)
Install php7.2 and this extensions or use homestead in virtual machine
```
    PHP >= 7.2
    BCMath PHP Extension
    Ctype PHP Extension
    JSON PHP Extension
    Mbstring PHP Extension
    OpenSSL PHP Extension
    PDO PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension
```

install nginx and mysql, set mysql data in env

install composer 
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

run 
```
composer install
key:generate
jwt:secret
php artisan migrate:refresh --seed   
```

