DELIMITER $$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_iniciar_sesion`(IN `usuario` VARCHAR(100), IN `contrasennia1` VARCHAR(100), OUT `salida` INT(10))
IF EXISTS 
(SELECT 
 NOMBRE_USUARIO, 
 CONTRASENIA 
 FROM tb_usuario 
 WHERE nombre_usuario=usuario AND contrasenia=contrasennia1) THEN
SET salida=(SELECT id_role from tb_usuario WHERE nombre_usuario=usuario AND contrasenia=contrasennia1);
 ELSE
SET salida= 0;
end if$$
DELIMITER ;

-----------------------------------------------------

DELIMITER $$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_mostrar_articulos`()
    NO SQL
SELECT A.ID_ARTICULO,A.NOMBRE_ARTICULO,A.PRECIO,A.DESCRIPCION,C.nombre_categoria FROM tb_articulo A JOIN tb_articulo_categoria AC ON AC.id_articulo=A.id_articulo JOIN tb_categoria C ON C.id_categoria=AC.id_categoria WHERE A.is_deleted=0 AND AC.is_deleted=0$$
DELIMITER ;

-------------------------------------------------

DELIMITER $$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_mostrar_categorias`()
SELECT id_categoria,nombre_categoria FROM tb_categoria$$
DELIMITER ;

---------------------------------------------------

DELIMITER $$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_registrar_articulo`(IN `param_nombre_articulo` VARCHAR(100), IN `param_precio` VARCHAR(100), IN `param_descripcion` VARCHAR(300), IN `param_id_categoria` INT(10), IN `param_nombre_imagen` VARCHAR(100), OUT `salida` INT(10))
BEGIN
DECLARE local_id_articulo INT;

IF EXISTS (SELECT nombre_articulo FROM tb_articulo WHERE NOMBRE_ARTICULO=param_nombre_articulo) THEN

SET salida=0;

ELSE



INSERT INTO tb_articulo (nombre_articulo,precio,descripcion,nombre_imagen) VALUES (param_nombre_articulo,param_precio,param_descripcion,param_nombre_imagen);

SET local_id_articulo= (SELECT LAST_INSERT_ID());

INSERT INTO tb_articulo_categoria (id_articulo,id_categoria) VALUES (local_id_articulo,param_id_categoria);

SET salida=1;

END IF;
END$$
DELIMITER ;

------------------------------------------

DELIMITER $$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_registrar_promocion`(IN `p_fecha_inicial` VARCHAR(100), IN `p_fecha_final` VARCHAR(100), IN `p_id_articulo` INT(10), IN `p_precio_nuevo` VARCHAR(100), OUT `salida` INT(10))
    NO SQL
BEGIN
DECLARE LOCAL_PRECIO_ANTES VARCHAR(32);

SET LOCAL_PRECIO_ANTES:=(SELECT PRECIO FROM tb_articulo WHERE ID_ARTICULO=p_id_articulo);

INSERT INTO tb_promocion (id_articulo,fecha_inicio,fecha_final,precio_antes,precio_despues) VALUES (p_id_articulo,p_fecha_inicial,p_fecha_final,LOCAL_PRECIO_ANTES,p_precio_nuevo);

SET salida=1;

END$$
DELIMITER ;

---------------------------------------

DELIMITER $$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_registrar_usuario`(IN `param_usuario` VARCHAR(100), IN `param_edad` INT(10), IN `param_direccion` VARCHAR(300), IN `param_genero` VARCHAR(100), IN `param_contrasennia` VARCHAR(300), IN `param_role` INT(100), OUT `salida` INT(10))
IF NOT EXISTS 
(SELECT nombre_usuario from tb_usuario where
nombre_usuario=param_usuario) THEN
INSERT INTO tb_usuario (nombre_usuario,id_role,edad,direccion,genero,contrasenia)
VALUES
(param_usuario,param_role,param_edad,param_direccion,param_genero,param_contrasennia);

SET salida=1;

ELSE

SET salida=0;

end if$$
DELIMITER ;

