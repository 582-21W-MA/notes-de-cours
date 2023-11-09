# Mustache

Le moteur de gabarit que nous utiliserons dans ce cours se nomme
[Mustache](https://mustache.github.io). Comme n'importe quel moteur de
gabarit, Mustache prend un gabarit (`index.mustache`) ainsi qu'un jeu
de données (`data.json`), et produit un document qui combine les deux
(`index.html`).

## Interface en ligne de commande

### Installation

Vous trouverez ci-inclus les fichiers exécutables de Mustache pour
Mac et Windows. Vous pouvez exécuter ces programmes en spécifiant leur chemin d'accès dans votre terminal. Par exemple, si vous vous trouvez
dans le même répertoire que le fichier exécutable :

```sh
./mustache # sur Mac
./mustache.exe # sur Windows
```

Ou vous pouvez ajouter le fichier exécutable à votre variable
d'environnement `PATH`.

### Utilisation

Pour utiliser Mustache à partir d'une interface en ligne de commande,
on invoque la commande `mustache` suivie du jeu de données suivi du
gabarit :

```sh
mustache <données> <gabarit>
```

Par défaut, la commande `mustache` renvoie le résultat dans la sortie
standard, c'est-à-dire directement dans le terminal. Pour écrire
plutôt le résultat dans un fichier, utilisez l'opérateur de
redirection `>` :

```sh
mustache data.json index.mustache > index.html
```

## Syntaxe

La syntaxe du langage Mustache est faite de **tags** identifiés par
deux accolades (ou moustaches). `{{nom}}`, `{{#fruits}}` et `{{>
header}}` sont des exemples de *tag*, chacun d'un type différent. On
appèle les mots entre accolades (nom, fruits, header) des **clés**.

### Variable

Le plus commun des *tags* est celui de type variable : `{{variable}}`.
Lorsque le gabarit est traité, le *tag* est remplacé par la valeur
de la variable. Ainsi, étant donné le jeu de données suivant en format JSON : `{ "name": "Laurence" }`, et le gabarit `<p>{{name}}</p>`,
Mustache produira `<p>Laurence</p>`.

### Section

Une section imprime un bloc de texte zero ou plusieurs fois en
fonction de la valeur de la clé. Une section débute par un *tag*
avec un quadrillion (`{{#fruits}}`), et se termine par un *tag* avec
une barre oblique (`{{/fruits}}`).

Si la valeur de la clé est fausse, le bloc de texte n'est pas
imprimé. Si la valeur est itérable, le bloc est imprimé pour
chacune des itérations. Si la valeur est un tableau, l'itérateur
implicite `{{.}}` est utilisé pour imprimer chaque élément.

Par exemple, étant donné le jeu de donnés suivant en format JSON :

```json
{
	"fruits": ["Banane", "Kiwi", "Fraise"]
}
```

et le gabarit ci-dessous :

```html
<ul>
	{{#fruits}}
		<li>{{.}}</li>
	{{/fruits}}
</ul>
```

Mustache produira :

```html
<ul>
	<li>Banane</li>
	<li>Kiwi</li>
	<li>Fraise</li>
</ul>
```

### Partiel

Mustache rend également possible la décomposition d'un document en
plusieurs morceaux, de la même manière qu'un outil de prototypage
comme Figma permet de séparer une interface graphique en composants.
En effet, le *tag* de type partiel, identifié par le signe plus grand
(`{{> header}}`), permet d'importer un gabarit dans un autre.

Ainsi, étant donnée le gabarit `header.mustache` suivant :

```html
<header>
	<a href="/">Logo</a>
</header>
```

et le gabarit `index.mustache` ci-bas :

```html
<!-- ... -->
<body>
	{{> header}}
	<main>
		<!-- ... -->
	</main>
</body>
```

le résultat sera :

```html
<!-- ... -->
<body>
	<header>
		<a href="/">Logo</a>
	</header>
	<main>
		<!-- ... -->
	</main>
</body>
```

Notez que la clé du *tag* reflète le chemin d'accès du gabarit
partiel à partir du gabarit dans lequel il est importé, et que le
gabarit partiel hérite du contexte où il est invoqué.

Par exemple, étant donné le jeu de données suivant en format JSON :

```json
{
	"ingredients": ["Steak", "Blé d'inde", "Patates"]
}
```

un gabarit partiel dont le chemin est `/partials/article.mustache` et
dont le contenu est :

```html
<article>{{.}}</article>
```

ainsi qu'un gabarit dont le chemin est `/index.mustache` et le contenu
est :

```html
<ul>
	{#ingredients}
		<li>{> partials/article}</li>
	{/ingredients}
</ul>
```

Mustache produira :

```html
<ul>
	<li><article>Steak</article></li>
	<li><article>Blé d'inde</article></li>
	<li><article>Patates</article></li>
</ul>
```

## Ressources

- [Documentation de la commande mustache](https://mustache.github.io/mustache.1.html)
- [Documentation du langage Mustache](https://mustache.github.io/mustache.5.html)
