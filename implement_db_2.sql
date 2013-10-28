CREATE  TABLE IF NOT EXISTS `Articulos` (
  `id_art` INT NOT NULL AUTO_INCREMENT ,
  `codigo_art` VARCHAR(20) NULL ,
  `nombre_art` VARCHAR(45) NULL ,
  `detalle_art` TEXT NULL ,
  `precio_costo_art` DECIMAL(19,4) NULL DEFAULT 0.0 ,
  `precio_venta_lista_art` DECIMAL(19,4) NULL DEFAULT 0.0 ,
  `precio_venta_art` DECIMAL(19,4) NULL DEFAULT 0.0 ,
  `stock_art` INT UNSIGNED NULL DEFAULT 0 ,
  `stock_min_art` INT UNSIGNED NULL DEFAULT 0 ,
  `stock_max_art` INT UNSIGNED NULL DEFAULT 0 ,
  `not_stock_art` TINYINT(1) NULL ,
  PRIMARY KEY (`id_art`) ,
  UNIQUE INDEX `codigo_art_UNIQUE` (`codigo_art` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;

-- -----------------------------------------------------
-- Table `Categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Categorias` (
  `id_cat` INT NOT NULL AUTO_INCREMENT ,
  `nombre_cat` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_cat`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `SubCategorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SubCategorias` (
  `id_scat` INT NOT NULL AUTO_INCREMENT ,
  `nombre_scat` VARCHAR(45) NULL ,
  `fk_id_cat` INT NOT NULL ,
  PRIMARY KEY (`id_scat`, `fk_id_cat`) ,
  INDEX `fk_Categorias_SubCategorias1_idx` (`fk_id_cat` ASC) ,
  CONSTRAINT `fk_Categorias_SubCategorias1`
    FOREIGN KEY (`fk_id_cat` )
    REFERENCES `Categorias` (`id_cat` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `ArticulosPorSubCategoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ArticulosPorSubCategoria` (
  `fk_id_art` INT NOT NULL ,
  `fk_id_scat` INT NOT NULL ,
  `fk_fk_id_cat` INT NOT NULL ,
  INDEX `fk_Articulos_ArticulosPorSubCategoria1_idx` (`fk_id_art` ASC) ,
  INDEX `fk_SubCategorias_ArticulosPorSubCategoria1_idx` (`fk_id_scat` ASC, `fk_fk_id_cat` ASC) ,
  CONSTRAINT `fk_Articulos_ArticulosPorSubCategoria1`
    FOREIGN KEY (`fk_id_art` )
    REFERENCES `Articulos` (`id_art` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_SubCategorias_ArticulosPorSubCategoria1`
    FOREIGN KEY (`fk_id_scat` , `fk_fk_id_cat` )
    REFERENCES `SubCategorias` (`id_scat` , `fk_id_cat` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


CREATE  TABLE IF NOT EXISTS `LoteArticulos` (
  `id_lote` INT NOT NULL AUTO_INCREMENT ,
  `fk_id_art` INT NOT NULL ,
  `fk_id_emp` INT NOT NULL ,
  `codigo_lote` VARCHAR(20) NULL DEFAULT '' ,
  `fecha_ingreso_lote` TIMESTAMP NULL DEFAULT NOW() ,
  `fecha_vencimiento_lote` DATE NULL ,
  `stock_disponible_lote` INT NULL DEFAULT 0 ,
  `stock_ingreso_lote` INT NULL DEFAULT 0 ,
  `fecha_not_vencimiento_lote` DATE NULL ,
  `not_vencimiento_lote` TINYINT(1) NULL DEFAULT FALSE ,
  PRIMARY KEY (`id_lote`, `fk_id_emp`, `fk_id_art`) ,
  INDEX `fk_Articulos_LoteArticulos1_idx` (`fk_id_art` ASC) ,
  INDEX `fk_Empresas_LoteArticulos1_idx` (`fk_id_emp` ASC) ,
  CONSTRAINT `fk_Articulos_LoteArticulos1`
    FOREIGN KEY (`fk_id_art` )
    REFERENCES `Articulos` (`id_art` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Empresas_LoteArticulos1`
    FOREIGN KEY (`fk_id_emp` )
    REFERENCES `Empresas` (`id_emp` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;