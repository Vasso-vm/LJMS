LJMS

OVERVIEW
========================

TERMINOLOGY ( Abbreviations )
========================

* **Ftd** - Frontend  
* **Tpl** - Template


TECHNICAL REQUIREMENTS
========================

* git  
* composer  
* php >= 5.3.3  


GIT REPO BRANCHES
========================

* master - main work branch


TECHNOLOGIES
========================

## SYMFONY 2.4

* [Symfony Standard Edition](https://github.com/symfony/symfony-standard)

* [DoctrineFixturesBundle](http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html)

* [UserfulAnnotationsBundle](https://github.com/umbrella-web/Symfony2-UsefulAnnotationsBundle)

## THIRD-PARTY API

* recaptcha  http://www.google.com/recaptcha



DEPLOYMENT INSTRUCTIONS
========================

### Clone the repo 

    $ git clone

### Install vendors & configure parameters

    $ composer install

### Change the permissions of the next directories so that the web server can write into them:

    app/cache/
    app/logs/

> the ways to do it are described [here](http://symfony.com/doc/master/book/installation.html#configuration-and-setup) 

    $ sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs
    $ sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs

## Install assets

    $ php app/console assets:install

    $ php app/console assetic:dump

## Create configured databases

    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:update --force

## Load fixtures:

ORM fixtures:

    $ php app/console doctrine:fixtures:load 

## Check against requirements to run the application:

In web browser run:

    /check.php

    /check-prl.php


## Register LJMS application in reCAPTCHA

     http://www.google.com/recaptcha
     
     and set recaptcha_private_key and recaptcha_public_key in parameters.yml



