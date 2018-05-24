composer config repositories.my-mod vcs git@github.com:Haversant/MyMod.git

composer require my/mod:dev-master

php bin/magento module:enable My_Mod

php bin/magento setup:upgrade