1 Introduction
----------------
Google Captcha Version 2 vs Version 3


2 Directory Struct
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


3 Step by step do it
-----------------------

    3.1 Clone/download GoogleCaptcha folder to your computer

    3.2 Goto GoogleCaptch folder > D:\YourFolder\GoogleCaptcha

    3.3 Run composer: composer install/update

-----------------------

4 Config virtual host
-----------------------

    4.1 Add Virtual host for you project
        + example You're using XAMPP: D:\Xampp\apache\conf\extra\httpd-vhosts.conf
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

        + Restart apache

    4.2 Set site/secret key on your project
            D:\YourFolder\GoogleCaptcha\test\config.php

    4.3 Run test
            http://captcha.local/test
                |_v2: http://captcha.local/test/recaptcha-v2-checkbox.php
                |_v3: http://captcha.local/test/recaptcha-v3-request-scores.php

5 Search Google:
--------------
    > Lazada TrueMe
    > Youtube TrueMe
    > Tiktok TrueMe 
    > Sendo TrueMe

Sites:
--------------
> https://www.youtube.com/@TrueMeNews
> https://www.tiktok.com/@truemenews
> https://www.lazada.vn/shop/suatruemilk
> https://github.com/truemenews
> https://www.sendo.vn/shop/truemilk

Tags:
--------------
#TrueMe #trueme #true_me #SendoTrueMe #sendo_trueme #sendo_true_me
#TrueMeNews #truemenews #true_me_news #TrueMilk #truemilk #true_milk #YoutubeTrueme #youtube_trueme #youtubetrueme #LazadaTrueme #lazada_trueme #lazadatrueme 
#TiktokTrueme #tiktok_trueme #tiktoktrueme #tet #visa #mastercard #thetindung #tragop #tragop0% 