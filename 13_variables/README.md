# Les variables CSS

Les « propriétés personnalisées CSS » (ou variables CSS ; *custom properties* en anglais) sont des valeurs définies par les développeur·ses qui peuvent être utilisées à travers un document HTML. Elles sont particulièrement utiles lorsque les mêmes valeurs sont répétées souvent, ou lorsqu’il est nécessaire d’intégrer une charte graphique. Les propriétés personnalisés permettent ainsi d’abstraire une partie des feuilles de styles, et de faciliter leur maintien.

Voici comment déclarer une variable :

```css
element {
	--main-bg-color: brown;
}
```

Et voici comment l’utiliser :

```css
element {
	background-color: var(—main-bg-color);
}
```

## Ressources

-   https://developer.mozilla.org/fr/docs/Web/CSS/Using_CSS_custom_properties
