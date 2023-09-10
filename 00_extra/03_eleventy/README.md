# Introduction à Eleventy

[Eleventy](https://www.11ty.dev) (parfois 11ty) est un générateur de sites statiques écrit en Javascript. Par défaut, Eleventy ne *produit* aucun Javascript. Javascript est simplement utiliser lors de la transformation des gabarits en fichiers HTML.

## 1. Installation

Afin d’utiliser Eleventy, il faut pouvoir exécuter du code Javascript en dehors du navigateur, à partir d’une interface en ligne de commande. Pour ce faire, on utilise un environnement d'exécution nommé Node.

### 1.1. Node

Pour vérifier que Node est installé sur votre ordinateur, exécuter la commande suivante :

```sh
node -v
```

Si Node est installé, l’interface devrait retournée sa version (par exemple, `v20.3.0`). Sinon, suivez [les instructions pour installer Node](https://nodejs.dev/fr/learn/how-to-install-nodejs/).

### 1.2. NPM

Pour installer Eleventy, il faut d’abord initialiser NPM dans notre projet. NPM est le gestionnaire de paquets standard pour Node.js. Il permet de télécharger des programmes, de les mettre à jour, et de gérer leur version. 

Pour initialiser NPM dans votre projet, exécuter la commande suivante à la racine de son répertoire :

```sh
npm init -y
```

L’option `-y` indique à NPM de sauter le questionnaire de configuration. Une fois l’initialisation terminée, un fichier « package.json » contenant les informations de votre projet devrait apparaître dans votre répertoire.

### 1.3. Eleventy 

Une fois le projet initialisé, il suffit d’exécuter la commande suivante pour installer Eleventy :

```sh
npm install @11ty/eleventy --save-dev
```

Votre répertoire devrait maintenant contenir un nouveau dossier « node_modules », ainsi qu’un fichier « package-lock.json ». Ne modifiez pas le dossier « node_modules » ; il contient tous les sous-programmes dont dépend Eleventy pour fonctionner.

## 2. Générer un site Web statique

Pour générer un site Web statique avec Eleventy, il faut exécuter la commande suivante :

```sh
npx @11ty/eleventy
```

`npx` est une commande qui permet de lancer des paquets NPM. Une fois la commande exécutée, votre interface devrait afficher le message suivant :

```
[11ty] Wrote 0 files in 0.01 seconds
```

Par défaut, Eleventy traite tous les *templates* (ou gabarits ; dans notre cas, tous les fichiers de format Nunjucks) qui se trouvent dans le répertoire. Comme notre répertoire ne contient présentement aucun *template*, Eleventy n’a généré aucun fichier statique. 

Ajoutons donc un *template* à notre répertoire. À la racine de celui-ci, créez un fichier Nunjucks « index.njk », et ajoutez-y le code suivant :

```html
{% set fruits = ["pomme", "orange", "banane"] %}

<ul>
	{% for fruit in fruits %}
		<li>{{ fruit }}</li>
	{% endfor %}
</ul>
```

Dans le code Nunjucks ci-haut, `set` définit une variable `fruits` et y stocke un tableau contenant les chaînes `"pomme"`, `"orange"`, et `"banane"`. `for` permet ensuite d’itérer sur le tableau, et d’afficher chacune des variables entre double accolades.

Vous trouverez la documentation complète de Nunjucks à l’adresse suivante : https://mozilla.github.io/nunjucks/fr/templating.html.

Si vous lancez Eleventy de nouveau, celui-ci devrait transformer le *template* en HTML, et placer le fichier généré dans un nouveau dossier nommé « _site ». Attention, ne modifiez jamais directement les fichiers statiques qui se trouvent dans « _site » ; ceux-ci sont automatiquement remplacés par Eleventy lorsque vous changez le code source.

### 2.1. Serveur de développement local

Si vous ajoutez l’option `--serve` à la commande `npx @11ty/eleventy`, Eleventy démarrera pour vous un serveur de développement local. Par défaut, le serveur est disponible à l’adresse `http://localhost:8080/`. La page sera actualisée automatiquement lors d’un changement au code source.

## 3. Layout

Le HTML défini ci-haut n’est pas syntaxiquement valide ; il manque, à tout le moins, le *doctype*, un élément `html`, un `head` et un `body`. Comme ces éléments se répètent sur toutes les pages, il est préférable de les définir à l’aide d’un *layout*, c’est-à-dire un *modèle* duquel les pages peuvent héritées.

### 3.1. Définir un *layout*

Par défaut, Eleventy traite les *layouts* qui se trouvent dans le dossier « _includes ». Dans le dossier « _includes », créons donc un fichier « base.njk » qui contient le code suivant :

```html
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Super site — {{ title }}</title>
</head>
<body>
	{{ content | safe }}
</body>
</html>
```

Nous pourrons définir la variable `title` dans notre *template*. La variable `content`, quant à elle, contient automatiquement le contenu de la page qui hérite du *layout*. Le [filtre](https://mozilla.github.io/nunjucks/fr/templating.html#filtres) `safe` marque la valeur de la variable comme sûre.

### 3.2. Associer un *layout* à un *template*

Maintenant que notre *layout* de base est défini, il reste à associer celui-ci à notre *template*. Il existe plusieurs façons de le faire.

Le plus simple est d’indiquer le *layout* à utiliser dans le *front-matter* (avant-propos) de notre *template*. Un *front-matter* est un bloc de code placé au tout début d’un template, délimité par trois tirets `---`, et qui contient des données propres à celui-ci.

Ajoutons un *front-matter* au *template* « index.njk » que nous avons enregistré précédemment :

```html
---
layout: base.njk
title: Accueil
---

{% set fruits = ["pomme", "orange", "banane"] %}

<ul>
	{% for fruit in fruits %}
		<li>{{ fruit }}</li>
	{% endfor %}
</ul>
```

Par défaut, Eleventy traite le *front-matter* comme étant du code YAML, un format de représentation de données similaire à JSON. Vous pouvez consulter la documentation officielle de YAML à l’adresse suivante : https://yaml.org.

En plus de permettre de définir le *layout* à utiliser et le titre de notre page, toutes les données stockées dans le *front-matter* sont accessibles au *template*.

Par exemple, nous pourrions définir la variable `fruits` directement dans le *front-matter* :

```html
---
layout: base.njk
title: Accueil
fruits:
    - pomme
    - orange
    - banane
---

<ul>
	{% for fruit in fruits %}
		<li>{{ fruit }}</li>
	{% endfor %}
</ul>
```

Plutôt que de définir le *layout* dans chacun des *templates*, il est également possible de définir un *layout* dont tous les *templates* hériteront. Pour ce faire ajouter un fichier de configuration « .eleventy.js » à la racine de votre projet, et copiez-collez dans celui-ci le code suivant :

```js
module.exports = function(eleventyConfig) {
	eleventyConfig.addGlobalData("layout", "base.njk");
}
```

Tous les *templates* hériteront désormais du *layout* « base.njk ».

## 4. Données

Quoique facile et rapide, il n’est généralement pas conseillé de déclarer des variables directement dans vos *template*. Afin de faciliter le maintient du code, il est plutôt suggéré de placer les données de votre site Web dans des fichiers séparés.

Par défaut, Eleventy traite les fichiers JSON placés dans le dossier « _data », et rend les objects disponibles à tous les *templates* selon le nom du fichier.

Ainsi, pour définir la variable `fruits` ci-haut, il suffit de créer un nouveau fichier « fruits.json » dans le dossier « _data », et d’y enregistrer le code suivant :

```json
[
	"pomme", 
	"orange", 
	"banane"
]
```

La variable `fruits` sera alors automatiquement disponible dans votre *template*, sans avoir à la définir dans le *front-matter* ou avec `set`.

Pour plus d’informations sur comment utiliser des données avec Eleventy, voir la documentation à ce sujet : https://www.11ty.dev/docs/data/.

### 4.1. Données fournies par Eleventy

En plus des données que vous définissez vous-même, tous les *templates* ont accès à certaines données fournies par Eleventy. Une liste de ces données est disponible à l’adresse suivante : https://www.11ty.dev/docs/data-eleventy-supplied/.

## 5. Composants

Nunjucks permet de séparer le code de vos *templates* ou de vos *layouts* en plusieurs fichiers, et de les importer avec le mot clé `include`. Par défaut, Eleventy traite ces composants dans le dossier « _includes » (le même que pour les *layouts*).

Disons que je désire afficher sur ma page plusieurs `article`, chacun contenant une image et des informations sur un fruit en particulier. Dans ce cas, il est préférable de créer un composant « fruit-card.njk » : 

```html
<article>
	<img src="{{ fruit.image }}" alt="Image d’un·e {{ fruit.name }}.">
	<ul>
		<li><h3>{{ fruit.name }}</h3></li>
		<li>{{ fruit.color }}</li>
		<li>{{ fruit.origin }}</li>
		<li>{{ fruit.description }}</li>
	</ul>
</article>
```

Lequel nous pourrons ensuite instancier pour chaque fruit dans notre *template* :

```html
<!-- ... -->
<ul>
	{% for fruit in fruits %}
		<li>
			{% include "fruit-card.njk" %}
		</li>
	{% endfor %}
</ul>
<!-- ... -->
```

Veuillez noter que nous ne définissons pas la variable `fruit` dans le fichier « fruit-card.njk ». Le code Nunjucks du composant est importé tel quel dans le *template* avant que les variables soient remplacées par Eleventy. Le composant hérite donc des valeurs de la portée dans lequel il est importé.

## 6. Ressources

Si vous ajoutez des images, des feuilles de style, ou n’importe quelles ressources à votre projet, Eleventy ne les copiera pas automatiquement dans le dossier « _site » ; elles ne seront donc pas incluses avec votre site Web.

Pour ajouter ces ressources à votre site Web, il faut spécifier à Eleventy quels fichiers ou quels dossiers doivent être copiés dans « _site ». Pour ce faire, il suffit d’ajouter le code suivant dans un fichier de configuration « .eleventy.js » :

```js
module.exports = function(eleventyConfig) {
	
	// Si votre fichier de configuration contient déjà un
	// module.exports, ajoutez seulement la ligne ci-dessous.
	eleventyConfig.addPassthroughCopy("assets");
};
```

Tous les fichiers à l’intérieur du dossier « assets » seront désormais inclus avec votre site Web.

