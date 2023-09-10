# Générateurs de sites statiques

Un générateur de sites statiques (*static site generator*, ou *SSG*, en anglais) est un outil qui permet de générer des fichiers HTML à partir de gabarits et de données brutes. À l’opposé d’une page dynamique, générée sur le serveur au moment où l’utilisateur·rice la demande, une page statique est générée en amont, souvent localement, et ensuite téléversée sur le serveur. Comme ces pages sont pré-construites, elles utilisent très peu des ressources du serveur, et sont servies très rapidement.

## Moteur de gabarit

La plupart des générateur de sites statiques utilisent un moteur de gabarit : un outil qui permet d’abstraire la structure des documents HTML, et ainsi simplifier leur création. Ces moteurs utilisent des langages de programmation « simplifiés » tel que PHP, Jinja ou Liquid, lesquels permettent de décrire le *modèle* de la page sans manipuler directement ses données.

Par exemple, voici à quoi ressemble une navigation écrite avec le language [Nunjucks](https://mozilla.github.io/nunjucks/) :

```html
<nav>
	<ul>
		{% for navItem in navItems %}
			<li>
				<a href="{{ navItem.url }}">
					{{ navItem.name }}
				</a>
			</li>
		{% endfor %}
	</ul>
</nav>
```

Lors de la compilation du site Web, le moteur de gabarit remplace les variables par les valeurs appropriées, et génère une page HTML statique. 

Ainsi, étant donné les données ci-dessous :

```json
{
	"navItems": [
		{
			"name": "Home",
			"url": "/"
		},
		{
			"name": "About",
			"url": "/about"
		},
		{
			"name": "Projects",
			"url": "/projects"
		},
	]
}
```

le résultat serait le suivant : 

```html
<nav>
	<ul>
		<li><a href="/">Home</a></li>
		<li><a href="/about">About</a></li>
		<li><a href="/projects">Projects</a></li>
	</ul>
</nav>
```

## Composants

Nombreux générateurs de sites statiques permettent de séparer les pages HTML en plusieurs morceaux. Imaginez un site Web qui contient une centaine de pages, chacune comprenant la même entête. Non seulement serait-il très long de copier celle-ci une centaine de fois, mais tout changement devrait être fait séparément sur chacune des pages. Dans ce cas, abstraire l’entête permettrait de beaucoup simplifier le code.

La syntaxe pour ce faire varie selon le language et le générateur de sites statiques utilisés. Voici un exemple qui utilise Nunjucks :

```html
<!DOCTYPE html>
<html lang="fr">
	<!-- ... -->
	{% includes "header.njk" %}
	<!-- ... -->
</html>
```

Ce qui permet de mettre le code de l’entête dans le fichier « header.njk ». 


## Ressources

- [Qu’est-ce qu’un générateur de site statique ?](https://www.cloudflare.com/fr-fr/learning/performance/static-site-generator/)
- [Documentation de Eleventy](https://www.11ty.dev/docs/)
- [Documentation de Nunjucks](https://mozilla.github.io/nunjucks/templating.html)
- [Documentation de Hugo](https://gohugo.io/documentation/)