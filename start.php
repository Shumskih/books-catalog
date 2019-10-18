<?php

exec('composer install');

exec('npm i');

exec('php artisan storage:clean --dbfresh');
