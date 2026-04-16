/* Este lo vamos a usar para cargar los modulos globales e iniciar los objetos comunes que vamos a usar en el sitio */

export const URLBASE = '/Proyecto/sc502-jn-proyecto-grupo5_q1_2026'
export const APICONTROLLER = URLBASE + '/controllers/auth/AuthController.php'
export const DISPLAY_INLINE_BLOCK = "inline-block";
export const DISPLAY_NONE = "none";

export function crearCuerpoApi(method, datos) {
    let cuerpo;
    switch (method) {
        case ('POST'):
            cuerpo = {
                method: method,
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify(datos)
            }
            break;
        case ('GET'):
            cuerpo = {  
                method: method,
                headers: {
                    'content-type': 'application/json'
                }
            }
    }
     
    return cuerpo;
}