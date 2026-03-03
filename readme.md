## Nomenclatura y Estandar para las convenciones a definir las clases y ID en el proyecto
La información a continuación sirve para llevar un estandar en la creación de convenciones de clases en el ***HTML*** para el ***CSS*** aso como también la creación correcta en los ***id*** con el fin de poder hacer una correcta manipulación con el uso de ***JS***
***Es importante cumplir con este estandar y nomenclaturas para poder tener un entorno concruente y facil de mantener por los desarrolladores***

### Puntos importantes a usar
* Kebab-case
* Prefijos descriptivos
* Nombres Semanticos
* No mezclar convenciones

### Regla mental
El nombre debe de responder:
+ ¿Qué es esto y qué hace?
No debe de responder:
+ ¿Donde está ubicado?

#### Convención a utilizar
Para este proycto vamos a utilizar el Kebab-case para la creación de las clases y id en este sistema.
El kebab-case consiste en empezar la creacion del nombre en minuscula y separar el siguiente elemento con un "-" y empezando el siguiente elemento en minuscula
<br>

#### Tabla de contenido para el uso correcto de clases y id

| Elemento | Tipo de abreviatura | Descripción |
| :---: | :---: | :--- |
| ID | Prefijos <br> ***btn-*** <br> ***input-*** <br>***form-*** | Utilizar el uso de prefijos al crear los id al inico y leugo en nombre descriptivo del id. <br> Ejemplo <br> ***btn-login*** <br> ***input-email***
| Clases| BEM | Se utilizará la convención BEM que corresponde a bloque__elemeneto--modificador <br> Ejemplo <br> **product-card** <br> **producto-card__title** <br> **producto-card__title--primary** <br> **producto-card__price** |

<br>


#### Tabla de contenidos para el uso correcto de variables en JavaScript y PHP
La convención a utilizar en este proyecto corresponde a kamelCase.
En camelCase las variable se declaran con las palabras sin espacios, capitalizando la primera letra de la palabra en mayúscula, exceptuando la primera palabra.
| Lenguaje | Nomenclatura | Descripción / Ejemplo |
| :---: | :--: | :--- |
| JavaScript | camelCase | Se debe de dejar la primera palabra en minuscula y los siguientes sin espacios y con la primera en mayuscula. <br> Ejemplo:<br>**miVariableEjemplo**<br>**miVariable**<br>**varible**
| PHP | camelCase | Se debe de dejar la primera palabra en minuscula y los siguientes sin espacios y con la primera en mayuscula. <br> Ejemplo:<br>**miVariableEjemplo**<br>**miVariable**<br>**varible**

**Nota: Para ambos lenguajes  (PHP-JavaScript) cuando se utilicen variables CONSTANTES, se deben de declarar en camelCase pero todas las palabras en mayusculas** <br>Ejemplo <br> MIVARIABLECONSTANTE

**Nota 2: Todos los CSS deben de llevar el archivo **normalize.css** ya que este genera toda la armonía de nuestra pagina web, así como el uso de las variables de colores que se van a utilizar en este proyecto**

<br>

#### COLORES CSS

|Color | Tipo | Descripción|
|:--: |:--: | :--: |
|🔴 `#CC0000` |Primario | Uso en banner, botones, descuentos|
| ⚪`#FFFFFF` | Fondo General y textos  | Uso en los fondos principales  y textos de la pagina |
|⚫`#000000`  | Fondo footer, SubTitulos | Uso en los footers de la pagina y los subtitulos de la pagina| 
|⚫`#CC0000` y  ⚪`#FFFFFF` | Botones Secundarios | Uso en botones ecundarios con borde rojo y texto blanco|
|🟢`#00cc22`  | Badgest de estado | Activo / Completado|
| 🔴`#CC0000`  | Badgest de estado | Inactivo / Agotado|
| 🟡 `#ccbe00`  | Badgest de estado | Pendiente / Bajo de stock|

#### Fuente a utilizar
Se van a utilizar fuentes sans-serif distrubidas de la siguiente manera.
| Familia | Uso |
|:--: | :--: |
| Poppins | Titulos, Subtitulos,Botones |
| Roboto | Parrafos, textos largos, etc|

Esta familias estan instaladas en el archivo normalize por lo que se consumen desde ahí.
