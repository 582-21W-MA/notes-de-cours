# Installer PHP

Il est possible d’utiliser PHP directement dans votre interface en ligne de commande, sans avoir recours à un environnement de développement comme MAMP ou XAMPP. Par défaut, PHP contient un serveur Web intégré qui peut compiler des fichiers PHP en HTML, et avec lequel vous pouvez produire un site Web statique.

## Windows

Plusieurs options sont disponibles pour installer PHP sur Windows. Pour automatiser l’installation et la mise à jour, vous pouvez utiliser un gestionnaire de paquets, tel [Chocolatey](https://chocolatey.org), [Scoop](https://scoop.sh) ou [winget](https://learn.microsoft.com/en-us/windows/package-manager/). Une fois le gestionnaire installé, il suffit d’invoquer la commande d’installation dans votre interface en ligne de commande. Le gestionnaire téléchargera les fichiers nécessaires, et ajoutera PHP au PATH. 

Il est aussi possible de télécharger le fichier exécutable et de l’installer vous-même. Pour ce faire, télécharger la dernière version de PHP à l’adresse suivante : https://windows.php.net/download. Décompressez ensuite le fichier, et placez le à la racine de votre disque `C:`. 

PHP est maintenant installé, mais il n’est pas encore accessible à partir de l’interface en ligne de commande. Pour cela, il faut ajouter PHP à la variable `PATH` de votre système. `PATH` est une variable d’environnement qui spécifie l’ensemble des répertoires dans lesquels se trouvent les programmes exécutables. Pour ajouter PHP à votre PATH, suivez les étapes suivantes : 

1. Ouvrez le menu Start et cherchez « *environment variables* ». 
2. Ouvrez l’option « *Edit the system environment variables* » et cliquez sur le bouton « *Environment variables...* ». 
3. Dans la boîte « *System Variables* », trouvez la variable `path`, et cliquez sur `Edit`.
4. Dans la nouvelle fenêtre, cliquez sur `New`, puis ajoutez le chemin du dossier que vous avez placé dans le disque `C:`.
5. Redémarrer votre interface en ligne de commande.

Pour vérifier que l’installation est réussie, exécutez la commande `php -v` dans votre interface en ligne de commande. L’interface devrait retourner la version de PHP présentement installée.

## Mac

Sur Mac, il est recommandé d’utiliser le gestionnaire de paquets [Homebrew](https://brew.sh) pour installer PHP. Si Homebrew n’est pas installé sur votre Mac, exécuter la commande suivante dans votre Terminal :

```sh
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

Pour installer PHP, il suffit d’exécuter la commande `brew install php`. Pour vérifier que l’installation est réussie, exécutez la commande `php -v` dans votre Terminal. Il devrait retourner la version de PHP présentement installée.