<?php

exec('composer install');

exec('npm i');

exec('php artisan migrate:fresh --seed --cleanStorage');
