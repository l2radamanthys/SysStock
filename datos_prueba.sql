INSERT INTO `empresas` (
`id_emp` ,
`razon_social_emp` ,
`tipo_emp` ,
`cuit_emp` ,
`es_cliente` ,
`es_proveedor`
)
VALUES 
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
    (NULL , 'Metan', '1')
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
    (NULL , '2', '1', 'Ciudad', 'Sin Zonas', NULL)
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

INSERT INTO `stock_db`.`personas` (
`nro_dni_pers`, 
`tipo_dni_pers`, 
`nombre_pers`, 
`apellido_pers`, 
`direccion_pers`, 
`fk_username_usr`, 
`telefono_usr`, 
`celular_usr`, 
`email_usr`, 
`fk_id_zona`, 
`fk_id_ciud`, 
`fk_id_prov`, 
`fk_id_emp`
)
VALUES 
    ('12345789', 'DNI', 'Juan', ' Perez', 'calle 123', 'user', '387-234-5678', '387-234-5678', 'user@usernet.com', '1, '1', '1', '1')
;