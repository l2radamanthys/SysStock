-- -----------------------------------------------------
-- Table `db`.`Empresas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Empresas` (
  `id_emp` INT NOT NULL AUTO_INCREMENT ,
  `razon_social_emp` VARCHAR(45) NOT NULL ,
  `tipo_emp` ENUM('','Responsable Inscripto',
                    'Responsable no Inscripto',
                    'No Responsable',
                    'Excento',
                    'Consumidor Final',
                    'Monotributo',
                    'No Categorizado',
                    'Proveedor del Exterior',
                    'Cliente del Exterior',
                    'IVA liberado Ley 19.640',
                    'Responsable Inscripto Agente de Persepcion',
                    'Peque?o Contribuyente Eventual',
                    'Monotributo Social',
                    'Peq. Contribuyente Eventual Social') NOT NULL DEFAULT '',
  `cuit_emp` VARCHAR(20) NULL DEFAULT '' ,
  `es_cliente` TINYINT(1) NULL DEFAULT FALSE ,
  `es_proveedor` TINYINT(1) NULL DEFAULT FALSE ,
  PRIMARY KEY (`id_emp`) ,
  UNIQUE INDEX `id_emp_UNIQUE` (`id_emp` ASC) ,
  UNIQUE INDEX `cuit_emp_UNIQUE` (`cuit_emp` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;
 
 
-- -----------------------------------------------------
-- Table `db`.`Provincias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Provincias` (
  `id_prov` INT NOT NULL AUTO_INCREMENT ,
  `nombre_prov` VARCHAR(35) NULL ,
  PRIMARY KEY (`id_prov`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;
 
 
-- -----------------------------------------------------
-- Table `db`.`Ciudades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Ciudades` (
  `id_ciud` INT NOT NULL AUTO_INCREMENT ,
  `nombre_ciud` VARCHAR(45) NULL ,
  `fk_id_prov` INT NOT NULL ,
  PRIMARY KEY (`id_ciud`, `fk_id_prov`) ,
  INDEX `fk_Provincias_Ciudades1_idx` (`fk_id_prov` ASC) ,
  CONSTRAINT `fk_Provincias_Ciudades1`
    FOREIGN KEY (`fk_id_prov` )
    REFERENCES `Provincias` (`id_prov` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;
 
 
-- -----------------------------------------------------
-- Table `db`.`Zonas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Zonas` (
  `id_zona` INT NOT NULL AUTO_INCREMENT ,
  `fk_id_ciud` INT NOT NULL ,
  `fk_id_prov` INT NOT NULL ,
  `nombre_zona` VARCHAR(35) NULL ,
  `barrios_zona` TEXT NULL ,
  `observaciones_zona` TEXT NULL,
  PRIMARY KEY (`id_zona`, `fk_id_ciud`, `fk_id_prov`) ,
  INDEX `fk_Ciudades_Zonas1_idx` (`fk_id_ciud` ASC, `fk_id_prov` ASC) ,
  CONSTRAINT `fk_Ciudades_Zonas1`
    FOREIGN KEY (`fk_id_ciud` , `fk_id_prov` )
    REFERENCES `Ciudades` (`id_ciud` , `fk_id_prov` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;
 
 
-- -----------------------------------------------------
-- Table `db`.`Sucursal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sucursal` (
  `id_suc` INT NOT NULL AUTO_INCREMENT ,
  `fk_id_emp` INT NOT NULL ,
  `nombre_suc` VARCHAR(45) NULL ,
  `direccion_suc` VARCHAR(60) NULL ,
  `email_suc` VARCHAR(45) NULL ,
  `telefono_a_suc` VARCHAR(20) NULL ,
  `telefono_b_suc` VARCHAR(20) NULL ,
  `web_suc` VARCHAR(45) NULL ,
  `fk_id_zona` INT ,
  `fk_id_ciud` INT ,
  `fk_id_prov` INT ,
  PRIMARY KEY (`id_suc`, `fk_id_emp`) ,
  INDEX `fk_Empresas_Sucursal_idx` (`fk_id_emp` ASC) ,
  INDEX `fk_Zonas_Sucursal1_idx` (`fk_id_zona` ASC, `fk_id_ciud` ASC, `fk_id_prov` ASC) ,
  CONSTRAINT `fk_Empresas_Sucursal`
    FOREIGN KEY (`fk_id_emp` )
    REFERENCES `Empresas` (`id_emp` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Zonas_Sucursal1`
    FOREIGN KEY (`fk_id_zona` , `fk_id_ciud` , `fk_id_prov` )
    REFERENCES `Zonas` (`id_zona` , `fk_id_ciud` , `fk_id_prov` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;
 
 
-- -----------------------------------------------------
-- Table `db`.`Usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Usuarios` (
  `username_usr` VARCHAR(16) NOT NULL ,
  `password_usr` VARCHAR(16) NOT NULL ,
  `tipo_usr` ENUM('Vendedor', 'Preventista', 'Gerente', 'Administrador') NULL DEFAULT 'Vendedor',
  `register_date_usr` TIMESTAMP NULL DEFAULT NOW() ,
  `last_login_date_usr` TIMESTAMP NULL ,
  PRIMARY KEY (`username_usr`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;
 
 
 
CREATE  TABLE IF NOT EXISTS `Personas` (
  `id_pers` INT NOT NULL AUTO_INCREMENT ,
  `nro_dni_pers` INT NULL ,
  `tipo_dni_pers` ENUM('DNI','Libreta Enrrolamiento', 'Libreta Civica', 'Pasaporte', 'Visa', 'Otros') NULL ,
  `nombre_pers` VARCHAR(45) NULL ,
  `apellido_pers` VARCHAR(45) NULL ,
  `direccion_pers` VARCHAR(60) NULL ,
  `fk_username_usr` VARCHAR(16) NULL DEFAULT '' ,
  `telefono_usr` VARCHAR(45) NULL ,
  `celular_usr` VARCHAR(45) NULL ,
  `email_usr` VARCHAR(45) NULL ,
  `observaciones_pers` TEXT NULL ,
  `fk_id_zona` INT NULL ,
  `fk_id_ciud` INT NULL ,
  `fk_id_prov` INT NULL ,
  `fk_id_emp` INT NULL ,
  `es_cliente` TINYINT(1) NULL DEFAULT FALSE ,
  `es_proveedor` TINYINT(1) NULL DEFAULT FALSE ,
  PRIMARY KEY (`id_pers`) ,
  INDEX `fk_Usuarios_Personas1_idx` (`fk_username_usr` ASC) ,
  INDEX `fk_Zonas_Personas1_idx` (`fk_id_zona` ASC, `fk_id_ciud` ASC, `fk_id_prov` ASC) ,
  INDEX `fk_Empresas_Personas1_idx` (`fk_id_emp` ASC) ,
  CONSTRAINT `fk_Usuarios_Personas1`
    FOREIGN KEY (`fk_username_usr` )
    REFERENCES `Usuarios` (`username_usr` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Zonas_Personas1`
    FOREIGN KEY (`fk_id_zona` , `fk_id_ciud` , `fk_id_prov` )
    REFERENCES `Zonas` (`id_zona` , `fk_id_ciud` , `fk_id_prov` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Empresas_Personas1`
    FOREIGN KEY (`fk_id_emp` )
    REFERENCES `Empresas` (`id_emp` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;