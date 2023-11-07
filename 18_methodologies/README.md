# Méthodologies

Il existe plusieurs façons d'organiser les feuilles de style d'un
site Web afin de faciliter le travail d'équipe et le maintien du code
source dans le temps. Le choix de méthodologie dépend des besoins
du projet, mais les conseils suivants s'appliquent généralement, peu
importe le contexte.

## Nomenclature

Afin de faciliter la compréhension des feuilles de style, il est
recommandé de nommer les identificateurs, les classes et les
propriétés personnalisées en fonction du contenu ou de la structure
auquel ils sont rattachés. Il ne devrait pas être nécessaire de
consulter les fichiers HTML pour comprendre à quelle partie de la
page se réfère un sélecteur.

## Organisation

Bien que les feuilles de style s'appliquent généralement à
l'entièreté d'un site Web, il est conseillé de séparer celles-ci
en fonction des différentes parties de l'interface graphique.
Ainsi, il est commun d'avoir une feuille de style qui contient les
déclarations globales (`body`, `a`, `img`, etc.), une autre qui
contient les déclarations de variables, une autre pour l'entête, et
ainsi de suite.
