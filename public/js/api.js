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