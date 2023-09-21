# Typographie

## Glossaire

### Typographie

Le mot **typographie**, composé du grec *tupos* (caractère d'écriture) et *graphein* (écrire), désigne l'acte d'écrire avec des caractères pré-fabriqués. À ne pas confondre avec le mot **calligraphie** (littéralement, « belle écriture »), qui désigne l'art de bien former les caractères d'écriture *manuscrite*, ni avec le **dessin de caractères**, qui est l'activité de concevoir des caractères typographiques.

### Corps du texte

Le **corps du/de texte** est la partie principale d'un document. Sur le Web, le corps du texte est balisé avec l'élément `<main>`. La qualité typographique d'un document est largement déterminée par l'apparence du corps de texte. Par conséquent, lors de la mise en forme d'un document, il est conseillé de commencer par définir celui-ci.

### Force de corps

La **force de corps** (ou simplement **corps**) désigne la taille du caractère typographique utilisée pour la mise en forme d'un texte. Sur le Web, elle est définie grâce à la propriété CSS `font-size`. Il est suggéré de choisir une force de corps entre 15 et 25 pixels pour le corps du texte.

Une fois la taille du corps de texte choisie, on peut définir la force des autres corps, tels les titres ou les notes. Pour ce faire, on met en place une **échelle typographique** relative au corps du texte. Par exemple, si le corps de texte a une force de 20 pixels, le titre peut avoir une force de 40 pixels, et les notes 10 pixels. Ou, en utilisant l'unité CSS `rem` : `1rem` pour le corps du texte, `2rem` pour le titre, et `0.5rem` pour les notes.

### Interligne

L'**interligne** désigne l'espacement vertical entre deux lignes de texte. Sa valeur devrait correspondre à 120–145% de la force du corps. Sur le Web, on utilise la propriété CSS `line-height` pour définir l'interligne, préférablement à l'aide d'unités relatives comme le pourcentage ou le `em`.

### Longueur de ligne

La longueur de ligne correspond à la largeur horizontale d'une ligne de texte. Une ligne devrait contenir en moyenne entre 45 et 90 caractères. Sur le Web, il est suggérer d'utiliser la propriété CSS `max-width` afin de controller la longueur de ligne du corps de texte. Ainsi, un paragraphe dont le `max-width` est de `600px` ne sera jamais plus large que 600 pixels, mais pourra rapetisser si la taille de la fenêtre est moindre.

### Police de caractères

Une **police de caractères** (*typeface*, en anglais) détermine le dessin ou l'apparence des lettres d'un texte. Georgia et Verdana, par exemple, sont des polices de caractères dessinées expressément pour le Web par Matthew Carter dans les années 1990. 

À ne pas confondre avec le mot **fonte**, qui désigne plus précisément un style, une graisse ou même un corps. Ainsi, Georgia est une police de caractères, tandis que Georgia Italic ou Georgia Bold sont des fontes. À l'exception des [fontes variables](https://medium.com/variable-fonts/https-medium-com-tiro-introducing-opentype-variable-fonts-12ba6cd2369) un fichier `.otf`, `.ttf` ou `.woff` contient une seule fonte.

Sur le Web, la règle CSS `@font-face` est utilisée pour *définir* une police de caractères. On utilise la propriété CSS `font-family` pour *choisir* la police de caractères d'un élément. Les propriétés `font-style` et `font-weight` sont respectivement utilisées pour définir le style (italique ou romain) et la graisse (léger, régulier, gras, etc.).

On divise les polices de caractères en deux familles. Les **polices à empattements** (*serif*, en anglais), comme Georgia, ont de petites pattes au bout des fûts. Les **polices sans empattements** ou **linéales** (*sans-serif*, en anglais), comme Verdana, n'ont pas de pattes. 

Un site Web se limite généralement à deux, au maximum trois polices de caractères. Puisque les polices à empattements et celles sans empattements sont très différentes, elles sont souvent combinées afin de distinguer les éléments d'une page. Ainsi, un titre composé en Georgia se démarque d'un corps de texte composé en Verdana.

## Ressources supplémentaires

- [Butterick's Practical Typography](https://practicaltypography.com)