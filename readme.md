# PROCEDURE D'INSTALLATION DE L'APPLICATION

1- installation des dépendances

    $composer install

2- installation des packages 

    $npm install

    ou 

    $yarn add

3- creer la base de données 

- si vous avez la cli symfony installer taper la comande

    `$symfony console doctrine:database:create`

- sinon utilisé la commande php

    `$php bin/console doctrine:database:create`

4- appliquer les migrations

- si vous avez la cli symfony installer taper la comande

    `$symfony console doctrine:migration:migrate`

- sinon utilisé la commande php

    `$php bin/console doctrine:migration:migrate`

5- lancer les fixtures pour avoir des utilisateurs en base de données (facultatif vous pouvez tout aussi bien en creer au niveau de l'application)

    $symfony console doctrine:fixtures:load

    $php bin/console doctrine:fixtures:load


## tout est Okey.



