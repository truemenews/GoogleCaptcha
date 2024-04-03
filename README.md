| 1. Introduction
----------------
Google Captcha Version 2 vs Version 3

| 2. Directory Struct
-----------------------

    Root
    |__test
    |   |__config.php -> change site/secret your key here
    |   |__recaptcha-v2-checkbox.php => google capcha v2
    |   |
    |   |__recaptcha-v3-request-scores.php => google captcha version 3
    |   |__recaptcha-v3-verify.php => check site is robot or not
    |   
    |
    |__composer.json

-----------------------


| 3. Step by step do it
-----------------------

    3.1 Clone/download GoogleCaptcha folder to your computer

    3.2 Goto GoogleCaptch folder > D:\YourFolder\GoogleCaptcha

    3.3 Run composer: composer install/update

-----------------------

| 4. Config virtual host
-----------------------

    4.1 Add Virtual host for you project
        example You're using XAMPP: D:\Xampp\apache\conf\extra\httpd-vhosts.conf
        ```
            <VirtualHost captcha.local:80>
                DocumentRoot "D:/Projects/captcha"
                ServerName captcha.local
                
                 <Directory D:/Projects/captcha>
                     #AllowOverride none
                 AllowOverride All
                     Require all granted
                     DirectoryIndex index.php
                     Order allow,deny
                     Allow from all
                 </Directory>
            </VirtualHost> 
        ```

    4.2 You have to create new facade corresponding
            D:\YourFolder\CallStatic\yourweb\facade\ProcessFacade.php and extends CallStatic class

    4.3 Register alias 
        at D:\YourFolder\CallStatic\yourweb\config\alias.php


    4.4 Run test file D:\YourFolder\CallStatic\yourweb\index.php
        for test, you will Process call static sumAll()
-----------------------

