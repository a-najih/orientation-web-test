# orientation-web-test

## 1 - Les commandes utilisées pour la créatin du projet :
#### Installer Composer
`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`

`php composer-setup.php`

`php -r "unlink('composer-setup.php');"`

#### Installation classique (recommandé pour faire des projets web)
`composer create-project symfony/website-skeleton mon-projet`

#### Installation minimaliste (recomandé pour faire un micro-services, une application de console ou une API)
`composer create-project symfony/skeleton mon-projet`


###### En option, vous pouvez également installer Symfony CLI
`curl -sS "https://get.symfony.com/cli/installer"`


## 2 - Pointer le domaine www.testrec01.local:5458 vers le dossier du projet  :

#### a- Modifier la configuration NGNIX : 

        listen 5458  default_server;
        listen [::]:5458  default_server ipv6only=on;

        server_name www.testrec01.local;
        root /var/www/public;
        index index.php index.html index.htm;

#### b- Resolver le nom de domaine dans le DNS : 
`sudo nano /etc/hosts`

127.0.0.1   localhost

. . .

127.0.0.1 www.testrec01.local


## 1 - REX du test:
#### a- Mise en palce de l'environement :

- J'ai perdu du temps au début pour mettre en marche mon environement.
- J’ai trouvé des difficultés à faire marcher le driver de Postgres. La solution finale était de killer tous les Containers, supprimer les images Docker et reconstituer une image propre.


#### b- Choix techniques :
- Le choix de Postgres était basé sur le fait qu'il a une meilleur indexation que Mysql.
- J'ai pris le temps de mettre en place un environement front basé sur du Yarn, Webpack encore, Sass builder et PostCss pour une meilleur intégration pour bootstrap avec symfony.
- Pour le module d'authentification, j'ai preféré d'utiliser le composant Security de Symfony, car il réponds bien au besoin.

#### c- Mini guide d’installation :
- Cloner le repo git vers un répertoire de travail
- Installer Docker et un DockerCompose
- Au niveau du répertoire « docker », monter l’environnement docker :
`docker-compose up –d –build`
- Dans le navigateur, tapez 'localost'



#### d- Le reste à faire :
- Le tarvail sur le fontend de la page des factures (faute de temps :( )



