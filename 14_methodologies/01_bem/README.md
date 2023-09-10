# BEM

BEM (*Blocks Elements Modifiers*) est une méthodologie ayant pour but de faciliter l’écriture et le maintien des feuilles de style, particulièrement pour les projets de grande envergure. Elle propose une convention de nommage des classes CSS qui, comme son nom l’indique, se divise en trois.

## Bloc

Un « bloc » représente un composant indépendant d’une interface, tel un entête, une barre de navigation ou un formulaire. Il encapsule une entité autonome qui a une signification en soi, et qui peut donc être utilisé dans n’importe quel autre contexte. Un bloc peut en contenir un autre, mais les deux restent sémantiquement égaux.

### Nommage

Le nom d’un bloc peut contenir des lettres, des chiffres et de tirets. Pour nommer un bloc, il suffit de choisir un mot qui décrit bien le composant qu’il représente.

```html
<style>
	.bloc { ... }
</style>

<div class="bloc">...</div>
```

### Exemple

```html
<header class="site-header">
	<nav class="main-nav">
		...
	</nav>
</header>
<ul class="carrousel">
	...
</ul>
```

## Élément

Un « élément » est une partie d’un bloc. Il en est dépendant, et ne peut donc être utilisé à l’extérieur de celui-ci.

### Nommage

La classe qui représente un élément est composée du nom du bloc parent suivi de deux tirets bas suivis du nom de l’élément.

```html
<style>
	/* Correct */
	.bloc__element{ ... }

	/* Incorrect */
	.bloc .bloc__element { ... }
	div.bloc__element { ... }
</style>

<div class="bloc__element">...</div>
```

### Exemple

```html
<header class="site-header">
	<nav class="main-nav">
		<a href="/..." class="main-nav__anchor">
			...
		</a>
	</nav>
</header>
<ul class="carrousel">
	<li class="carrousel__item">
		...
	</li>
</ul>
```

## Modificateur

Un « modificateur » représente un état ou une apparence particulière. Il vient modifier un bloc ou un élément.

### Nommage

La classe qui représente un modificateur est composée du nom du bloc ou de l’élément modifié suivi de deux tirets suivis du nom du modificateur.

```html
<style>
	bloc--modificateur { ... }
</style>

<!-- Correct -->
<div class="bloc bloc--modificateur">...</div>

<!-- Incorrect -->
<div class="bloc--modificateur">...</div>
```

### Exemple

```html
<header class="site-header">
	<nav class="main-nav">
		<a href="/..." class="main-nav__anchor">
			...
		</a>
		<a href="/..." class="main-nav__anchor main-nav__anchor--active">
			...
		</a>
	</nav>
</header>
<ul class="carrousel">
	<li class="carrousel__item">
		...
	</li>
	<li class="carrousel__item carrousel__item--visible">
		...
	</li>
</ul>
```

## Ressources

- https://getbem.com