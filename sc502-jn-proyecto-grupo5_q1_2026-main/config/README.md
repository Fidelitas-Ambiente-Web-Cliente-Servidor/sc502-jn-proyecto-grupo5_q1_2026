# Configuración de la Base de Datos

## Credenciales por defecto

En `models/User.php`:
- **Host**: localhost
- **Usuario**: root
- **Contraseña**: (vacía)
- **Base de datos**: sc502_grupo5_app

## Pasos para configurar la BD

### Opción 1: phpMyAdmin

1. Abre phpMyAdmin en `http://localhost/phpmyadmin`
2. Haz clic en "Importar"
3. Selecciona el archivo `config/setup.sql`
4. Haz clic en "Ejecutar"

### Opción 2: Terminal MySQL

```bash
mysql -u root < config/setup.sql
```

O si necesitas especificar contraseña:

```bash
mysql -u root -p < config/setup.sql
```

## Estructura de Tablas

- **users**: Usuarios del sistema (clientes, vendedores, admins)
- **products**: Catálogo de productos
- **orders**: Órdenes de compra
- **order_items**: Detalles de ítems en órdenes

## Modificar credenciales de conexión

Si necesitas cambiar user/password/host, edita estas constantes en `models/User.php`:

```php
private const DB_HOST = 'localhost';
private const DB_NAME = 'sc502_grupo5_app';
private const DB_USER = 'root';
private const DB_PASSWORD = '';
```
