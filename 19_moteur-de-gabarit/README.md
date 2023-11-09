# Moteur de gabarit

Dans le contexte du Web, un moteur de gabarit est un programme qui
prend un gabarit et un jeu de données, et les combine pour produire
un document HTML. Ces moteurs utilisent des langages de programmation
simplifiés tels que Mustache, Jinja ou Nunjucks, lesquels permettent
de décrire le modèle de la page sans manipuler directement son
contenu.

Prenons, par exemple, la liste de fruits suivante :

```html
<ul>
	<li>Banane</li>
	<li>Kiwi</li>
	<li>Fraise</li>
</ul>
```

Vous remarquerez que chaque item de la liste suit le même modèle :

```html
<li>Nom du fruit</li>
```

Puisque que la liste contient seulement trois fruits, il n'est pas
très long d'écrire celle-ci à la main. Imaginez toutefois une liste
qui contient une centaine d'items, ou une liste qui contient, en plus
du nom du fruit, sa description et son origine ; ce serait une perte
de temps d'écrire tout ce code à la main.

Or, étant donné le modèle de la liste ainsi que son jeu de
données, un moteur de gabarit peut générer le code pour nous.

Par exemple, voici à quoi ressemble le modèle de la liste de fruits
ci-haute écrit avec le langage de gabarit Mustache :

```html
<ul>
	{{#fruits}}
		<li>{{.}}</li>
	{{/fruits}}
</ul>
```

Outre le gain de temps, vous remarquerez aussi que l'utilisation
d'un moteur de gabarit permet de renforcer la séparation des
responsabilités au sein du code source. Dans l'exemple ci-haut,
le *contenu* a été abstrait du document HTML, lequel contient
maintenant que la *structure* de la page Web. Cela permet de
modifier le jeu de données sans avoir à changer le balisage.