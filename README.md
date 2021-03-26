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
