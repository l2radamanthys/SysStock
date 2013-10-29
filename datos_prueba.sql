INSERT INTO `empresas` (
`id_emp` ,
`razon_social_emp` ,
`tipo_emp` ,
`cuit_emp` ,
`es_cliente` ,
`es_proveedor`
)
VALUES 
    (NULL , 'No Definido', '', '12-34567890-1', '1', '1'),
    (NULL , 'Empresa de Prueba', 'Responsable Inscripto', '11-12345678-1', '1', '1'),
    (NULL , 'Otra Empresa de Prueba', 'Responsable Inscripto', '11-12345679-2', '1', '1')
;


INSERT INTO `provincias` (
`id_prov` ,
`nombre_prov`
)
VALUES 
    (NULL , 'Salta'), 
    (NULL , 'Jujuy'), 
    (NULL , 'Tucuman')
;


INSERT INTO `ciudades` (
`id_ciud` ,
`nombre_ciud` ,
`fk_id_prov`
)
VALUES 
    (NULL , 'Salta Capital', '1'),
    (NULL , 'Metan', '1'),
    (NULL , 'San Salvador de Jujuy', '2'), 
    (NULL , 'Tucuman', '3')
;


INSERT INTO `zonas` (
`id_zona` ,
`fk_id_ciud` ,
`fk_id_prov` ,
`nombre_zona` ,
`barrios_zona` ,
`observaciones_zona`
)
VALUES 
    (NULL , '1', '1', 'Centro', 'Macro Centro y Micro Centro', NULL),
    (NULL , '2', '1', 'Ciudad', 'Sin Zonas', NULL),
    (NULL , '5', '2', 'Ciudad', 'Sin Zonas', NULL),
    (NULL , '6', '3', 'Ciudad', 'Sin Zonas', NULL)
;

INSERT INTO `usuarios` (
`username_usr` ,
`password_usr` ,
`tipo_usr` ,
`register_date_usr` ,
`last_login_date_usr`
)
VALUES 
    ('user', 'user', 'Vendedor', CURRENT_TIMESTAMP , NULL)
;

INSERT INTO `personas` (
    `id_pers`, 
    `nro_dni_pers`, 
    `tipo_dni_pers`, 
    `nombre_pers`, 
    `apellido_pers`, 
    `direccion_pers`, 
    `fk_username_usr`, 
    `telefono_pers`, 
    `celular_pers`, 
    `email_pers`, 
    `observaciones_pers`, 
    `fk_id_zona`, 
    `fk_id_ciud`, 
    `fk_id_prov`, 
    `fk_id_emp`
    ) VALUES 
    ('', '123', 'DNI', 'Juan ', 'Perez', 'mi kasa', 'user', '387-234-5678', '387-234-5678', 'user@usernet.com', NULL, '1', '1', '1', '1')
;    

INSERT INTO  `categorias` (
`id_cat` ,
`nombre_cat`
)
VALUES 
    (NULL ,  'Bebidas'), 
    (NULL ,  'Lacteos')
;
