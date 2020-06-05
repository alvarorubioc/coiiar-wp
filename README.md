[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

_COIIAR
===

Hola. Esto es el tema para el Colegio Oficial de Ingenieros industriales de Aragón y La Rioja, llamado coiiar. Está basado en el starter theme [Underscores](https://underscores.me/)

Usa Sass para los estilos y compila en el archivo style.css de la propia plantilla, por lo que los cambios en styles.css no afectarán, tendrás que modificar los estilos en dev/sass. 

Instalación
---------------

### Requerimientos

`coiiar` solo requiere estas dependencias:

- [Node.js](https://nodejs.org/)
- [Gulp.js](https://gulpjs.com/)

### Cómo empezar

Clona o descarga este repositorio `$ git clone https://github.com/alvarorubioc/coiiar-wp` en tu carpeta de themes.

### Setup

Para empezar a usar todas las herramientas necesitas instalar Node.js.

```sh
$ npm install
```

### Tareas de Gulp disponibles

`coiiar` está preparado para el desarollo de la plantilla para WordPress:

- $ `gulp` : Escucha todos los cambios en la carpeta dev o los archivos php, recarga el navegador cuando haces cambios y compila todo lo necesario.
- `$ gulp javascript` : compila los js en dev/js a assets/js
- `$ gulp imagemin` : optimiza las img en dev/img a assets/img
- `$ gulp sass` : compila los estilos de sass en el root = styles.css y styles.css.map
- `$ gup icons` : compila los svg a en dev/icons a un sprite en assstes/icons
- `$ gulp build` : crea un .zip excluyendo la carpeta dev, node_modules, .git, etc, para la distribución de la plantilla

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

<<<<<<< HEAD
Good luck!
=======
Good luck!
>>>>>>> b7a037c74cfe691635770b98a1fd65989b46665f
