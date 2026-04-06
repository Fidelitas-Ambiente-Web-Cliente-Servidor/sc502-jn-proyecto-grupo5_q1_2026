1. Params (Parámetros)
Qué hace: Agrega variables directamente a la URL (ej: ?id=5&page=2).
Cuándo usarla: Cuando haces peticiones GET. Si escribes algo aquí, Postman lo pone automáticamente al final de tu URL. En tu caso (usando JSON por POST), casi no la tocarás.
2. Authorization (Autorización)
Qué hace: Permite enviar credenciales de seguridad (Tokens, Usuario/Contraseña).
Cuándo usarla: Cuando tu sistema de login esté listo. Aquí es donde configurarías el Bearer Token para que el servidor sepa quién eres antes de dejarte entrar a rutas protegidas.
3. Headers (Encabezados) — ¡Importante!
Qué hace: Envía "metadatos" de la petición (como el idioma, el tipo de navegador, o el formato del contenido).
Dato útil: Como seleccionaste Body > JSON, Postman ya agregó automáticamente un Header llamado Content-Type: application/json. Sin esto, tu PHP no entendería que le envías un JSON.
4. Body (Cuerpo) — ¡La que más usarás!
Qué hace: Es donde escribes los datos "pesados" que quieres enviar al servidor (tu JSON).
Opciones:
raw: Para enviar texto puro (como el JSON que escribiste).
form-data: Útil si quieres probar subir archivos o imágenes a tu PHP.
5. Scripts (Pre-request y Tests)
Qué hacen: Permiten ejecutar código JavaScript antes de enviar la petición o después de recibir la respuesta.
Cuándo usarla: Para pruebas automáticas. Por ejemplo: "Si la respuesta es 200, guarda este Token automáticamente para la siguiente petición".