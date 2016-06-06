 #!/bin/bash

 cd /home/oscar/Code/CreditSintesi/YourBestGame/sami

 rm -rf /home/oscar/Code/CreditSintesi/YourBestGame/sami/build
 rm -rf /home/oscar/Code/CreditSintesi/YourBestGame/sami/cache


# Run API Docs
 git clone git@github.com:OscarDuranX/YourBestGame.git /home/oscar/Code/CreditSintesi/YourBestGame/sami/laravel

 php /home/oscar/Code/CreditSintesi/YourBestGame/sami.php update /home/oscar/Code/CreditSintesi/YourBestGame/sami/sami.php

 cp -r /home/oscar/Code/CreditSintesi/YourBestGame/sami/build/* /home/oscar/Code/CreditSintesi/YourBestGame/public/api

 rm -rf /home/oscar/Code/CreditSintesi/YourBestGame/sami/build
 rm -rf /home/oscar/Code/CreditSintesi/YourBestGame/sami/cache

# Cleanup
rm -rf /home/oscar/Code/CreditSintesi/YourBestGame/sami/laravel