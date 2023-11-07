<!DOCTYPE html>

	<meta charset="UTF-8">
	<script
		src="https://maxime-pigeon.github.io/example-block/example-block.js"
		type="module"
	></script>
	<title>Variables CSS</title>

<!------------------------------------------------------------------->
<!-- 1. Variables CSS ----------------------------------------------->
<!------------------------------------------------------------------->

<!-- Les « propriétés personnalisées CSS » (ou variables CSS ;
*custom properties* en anglais) sont des valeurs définies par les
développeur·ses qui peuvent être utilisées à travers un document
HTML ou une feuille de style. Elles sont particulièrement utiles
lorsque les mêmes valeurs sont répétées souvent, ou lorsqu'il
est nécessaire d'intégrer une charte graphique. Les propriétés
personnalisés permettent ainsi d'abstraire une partie des feuilles de
styles, et de faciliter leur maintien. -->

<!-- Exemple 1.1 ---------------------------------------------------->

<example-block name=1.1>
	<style>
		/* Dans un document normal, remplacer `:host` par `:root`. */
		:host {
			--color-primary: blue;
		}

		p {
			color: var(--color-primary);
		}
	</style>

	<p>
		Lorem ipsum dolor sit amet consectetur adipisicing elit.
		Voluptatibus magnam laboriosam, reprehenderit quas eligendi
		sequi eveniet consequuntur ad. Hic reiciendis deserunt dolorem
		sequi placeat ullam dolorum aperiam laborum iste quisquam?
	</p>

</example-block>

<!------------------------------------------------------------------->
<!-- 2. VALEUR DE RECOURS ------------------------------------------->
<!------------------------------------------------------------------->

<!-- La fonction `var()`, utilisée pour insérer la valeur d'une
propriété personnalisée, peut également prendre un deuxième
argument facultatif, soit une valeur de recours (ou fallback) au cas
où la valeur de subsitution référencée par la propriété est
invalide. -->

<!-- Exemple 2.1 ---------------------------------------------------->

<example-block name="2.1">
	
	<style>
		p {
			color: var(--color-primary, red);
		}
	</style>

	<p>
		Lorem ipsum dolor sit amet consectetur adipisicing elit.
		Voluptatibus magnam laboriosam, reprehenderit quas eligendi
		sequi eveniet consequuntur ad. Hic reiciendis deserunt dolorem
		sequi placeat ullam dolorum aperiam laborum iste quisquam?
	</p>


</example-block>

<!------------------------------------------------------------------->
<!-- 3. HÉRITAGE ---------------------------------------------------->
<!------------------------------------------------------------------->

<!-- Si la valeur d'une variable CSS n'est pas définie pour un
élément donné, alors celle-ci est héritée du parent. Ainsi, il
est possible de définir la valeur par défaut d'une variable dans la
racine du document, et d'écraser cette valeur par une autre plus bas
dans l'arborescence. -->

<!-- Exemple 3.1 ---------------------------------------------------->

<example-block name=3.1>
	<style>
		/* Dans un document normal, remplacer `:host` par `:root`. */
		:host {
			--color-bg: gainsboro;
		}

		div {
			padding: 1rem;
			background-color: var(--color-bg);
		}

		p {
			--color-bg: white;
			background-color: var(--color-bg);
		}
	</style>

	<div>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit.
			Voluptatibus magnam laboriosam, reprehenderit quas
			eligendi sequi eveniet consequuntur ad. Hic reiciendis
			deserunt dolorem sequi placeat ullam dolorum aperiam
			laborum iste quisquam?
		</p>
	</div>

</example-block>

<!------------------------------------------------------------------->

<!-- Les variables peuvent ainsi être utilisées côté serveur pour
modifier le style des éléments. -->

<!-- Exemple 3.2 ---------------------------------------------------->

<example-block name=3.2>
	<style>
		li {
			color: var(--color);
		}
	</style>

	<ul>
		<?php foreach (["blue", "green", "red"] as $color) : ?>
			<li style="--color: <?= $color ?>">
				<?= $color ?>
			</li>
		<?php endforeach ?>
	</ul>

</example-block>

<!------------------------------------------------------------------->
<!-- 4. RESSOURCES -------------------------------------------------->
<!------------------------------------------------------------------->

<!-- https://developer.mozilla.org/fr/docs/Web/CSS/Using_CSS_custom_properties -->

