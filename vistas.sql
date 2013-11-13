CREATE VIEW PersonaEmpresa AS 
SELECT 
    * 
FROM 
    personas AS pers 
        INNER JOIN empresas AS emp ON pers.fk_id_emp = emp.id_emp
;



CREATE VIEW ArticulosCategoria AS
SELECT 
    fk_id_art, 
    id_cat, 
    id_scat, 
    nombre_cat, 
    nombre_scat 

FROM 
    articulosporsubcategoria AS artscat 
        INNER JOIN subcategorias AS scat ON artscat.fk_id_scat = id_scat 
        INNER JOIN  categorias AS cat ON cat.id_cat = artscat.fk_fk_id_cat
;


CREATE VIEW ArticulosProveedor AS
SELECT 
    * 
FROM 
    ArticulosporProveedor AS ArtP 
        INNER JOIN Articulos AS Art ON Art.id_art = ArtP.fk_id_art
        INNER JOIN Personas AS Pers ON Pers.id_pers = ArtP.fk_id_pers
