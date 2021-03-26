# Backend

Need php-msql module and docker

* `composer run server`: launch backend
* `composer run db:init`: launch mysql db server
* `php bin/console doctrine:migrations:migrate`: to install the project schema
* `php bin/console doctrine:fixtures:load`: load fixtures data
* `php bin/console doctrine:fixtures:load -q`: to no need to answer
* `php bin/console doctrine:fixtures:load`
* `php bin/console doctrine:fixtures:load --group=group1 --group=group2`
* `php bin/console doctrine:fixtures:load --group=RpgFixtures`
