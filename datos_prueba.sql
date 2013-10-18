INSERT INTO `stock_db`.`empresas` (
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


INSERT INTO `stock_db`.`provincias` (
`id_prov` ,
`nombre_prov`
)
VALUES 
    (NULL , 'Salta'), 
    (NULL , 'Jujuy'), 
    (NULL , 'Tucuman')
;


INSERT INTO `stock_db`.`ciudades` (
`id_ciud` ,
`nombre_ciud` ,
`fk_id_prov`
)
VALUES 
    (NULL , 'Salta Capital', '1')
;


INSERT INTO `stock_db`.`zonas` (
`id_zona` ,
`fk_id_ciud` ,
`fk_id_prov` ,
`nombre_zona` ,
`barrios_zona` ,
`observaciones_zona`
)
VALUES 
    (NULL , '1', '1', 'Centro', 'Macro Centro y Micro Centro', NULL)
;

INSERT INTO `stock_db`.`usuarios` (
`username_usr` ,
`password_usr` ,
`tipo_usr` ,
`register_date_usr` ,
`last_login_date_usr`
)
VALUES 
    ('user', 'user', 'Vendedor', CURRENT_TIMESTAMP , NULL)
;