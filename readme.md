##Link del figma:
https://www.figma.com/make/iFH3VKbbMzWUiClpsMWvBC/OnlyWay---Prototipo?p=f&t=9aTAbi0zCRUaYBcx-0&preview-route=%2Fadmin%2Fdashboard


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

**Nota: Para ambos lenguajes  (PHP-JavaScript) cuando se utilicen variables CONSTANTES, se deben de declarar en UPPER_SNAKE_CASE pero todas las palabras en mayusculas** 
<br>Ejemplo <br> <br> MI_VARIABLE_CONSTANTE
+ En JavaScript se declara: <br>
const MI_VARIABLE_CONSTANTE = VALOR;
<br>
+ En PHP se declara: <br>
define('MI_VARIABLE_CONSTANTE', VALOR);
<br>


**Nota 2: Todos los CSS deben de llevar el archivo **normalize.css** ya que este genera toda la armonía de nuestra pagina web, así como el uso de las variables de colores que se van a utilizar en este proyecto**

<br>

## CSS
Para este proyecto vamos a optar por generar un CSS modular para tener un mejor mantenimiento a futuro del codigo y un mayor orden a la hora de tener que modificar algun elemento de nuestra pagina web.
Por lo que la estructura será de la siguiente manera:
+ Carpeta CSS
**-- base:** Acá vamos a tener el ***normalize.css** y el de **variables.css**
**-- components:** Aca vamos a tener todos los archivos .css de los componentes reutilizables de nuestro sitio, a como lo son **los card, tables, etc**.
**-- Layout:** Acá se almacenarán los CSS de los layouts que conformaran nuestra página, es decir los **grids.css** para estructurar la pagina, **headers, mains con la información base, footers, navbar etc.**
**-- Pages:** Acaá vamos a tener el CSS de las diferentes paginas de nuestro proyecto por lo que solamente es estilizado general de la pagina.
**-- Main.css:** Este archivo es el encapsulador de todos los css creados anteriormente, cuando se cree un css nuevo se debe de importar en este **main.css** para que contenga la información del nuevo css creado.
>Nota: El link de css que se va a poner en los diferentes HTML solamente debe de ser el **main.css**, ya que es el único que contendrá toda la información de los css de las carpetas

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

> Nota: Estas variables se encuentran en el archivo variables.css

#### Fuente a utilizar
Se van a utilizar fuentes sans-serif distrubidas de la siguiente manera.
| Familia | Uso |
|:--: | :--: |
| Poppins | Titulos, Subtitulos,Botones |
| Roboto | Parrafos, textos largos, etc|

>Nota: Estas variables se encuentran en el archivo variables.css

# Estructura de Carpetas JavaScript.
## Regla usada en el proyecto
Separación de responsabilidades

| Tipo de JS       | Ubicación     | Uso                        |
| ---------------- | ------------- | -------------------------- |
| Global           | `js/app.js`   | Inicialización general     |
| Utilidades       | `js/utils.js` | Funciones reutilizables    |
| Componentes      | `js/modules/` | Navbar, modals, tabs       |
| Lógica de página | `js/pages/`   | Login, registro, dashboard |

Objetivo: evitar scripts gigantes
+ aislar comportamiento por componente
+ mantener scripts reutilizables
+ facilitar mantenimiento del sistema.


