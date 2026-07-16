[< Volver al índice](../entregable03.md)

# Episodio 43 - Where To Go From Here

Este episodio de cierre no incluyó código nuevo: Jeffrey dedica los últimos minutos del curso a reflexionar sobre hacia dónde continuar después de terminar el proyecto, tanto a nivel de funcionalidades como de herramientas para seguir aprendiendo.

## Ideas para seguir el proyecto

Como el proyecto de ideas es de código abierto, Jeffrey sugiere seguir agregándole funcionalidades que un cliente real podría pedir. Su ejemplo principal es agregar **soporte de equipos**: que varios usuarios puedan pertenecer al mismo equipo y colaborar sobre las mismas ideas, con una capa de autorización más matizada — por ejemplo, que un integrante del equipo pueda ver las ideas de otro, pero no necesariamente editarlas o eliminarlas. Este tipo de requerimiento es representativo de proyectos reales y buena práctica para seguir desarrollando el sistema de policies que ya empezamos a usar en el episodio 38.

## Herramientas recomendadas para seguir aprendiendo

Jeffrey menciona tres caminos posibles después de Laravel From Scratch:

- **Laravel Livewire**: permite construir interfaces interactivas usando solo PHP, sin escribir JavaScript.
- **Vue.js o React**: si se prefiere trabajar con JavaScript del lado del cliente, integrándolo con un backend en Laravel.
- **Inertia.js**: un puente entre ambos mundos, que permite mantener el enrutamiento y la autorización tradicionales del lado del servidor, mientras se aprovechan las ventajas de una SPA (Single Page Application) completa. Menciona que este es el stack que usa Laracasts en su propio sitio.

## Reflexión

No hay un único camino correcto para continuar, la recomendación final es simplemente elegir uno y seguir practicando.

## Comentario personal

Me pareció un buen cierre porque plantea con claridad que terminar este curso no es el final del aprendizaje, sino un punto de partida. La sugerencia de agregar soporte de equipos con autorización más granular me interesó particularmente, porque es una extensión natural de lo que ya construi en los episodios de autorización (`IdeaPolicy`) sería el siguiente paso lógico si continuara desarrollando este proyecto más allá del entregable. De las herramientas mencionadas, Inertia.js me llama la atención para explorar en el futuro ya que combina lo que ya aprendi de Laravel con la posibilidad de interfaces mas dinámicas sin abandonar el enrutamiento tradicional del servidor.

<sub>Documentado por Xavier Fernández Zúñiga - ISW-811</sub>