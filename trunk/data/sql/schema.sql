CREATE TABLE anuncio (id BIGINT AUTO_INCREMENT, titulo VARCHAR(150) NOT NULL, descripcion text NOT NULL, precio DOUBLE(50, 2) NOT NULL, fechainicio DATE NOT NULL, fechafin DATE, idcategoriaanuncio BIGINT NOT NULL, idprovinciaanuncio BIGINT NOT NULL, localidad VARCHAR(80), codigopostal VARCHAR(30), tipoanuncio VARCHAR(30) NOT NULL, enlacevideo text, borrado TINYINT(1) DEFAULT '0' NOT NULL, activo TINYINT(1) DEFAULT '0' NOT NULL, nombre VARCHAR(80) NOT NULL, correo VARCHAR(80) NOT NULL, telefono VARCHAR(30), tipo VARCHAR(30) NOT NULL, visitas BIGINT DEFAULT 0 NOT NULL, votopositivo BIGINT DEFAULT 0 NOT NULL, votonegativo BIGINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idcategoriaanuncio_idx (idcategoriaanuncio), INDEX idprovinciaanuncio_idx (idprovinciaanuncio), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE categoriaAnuncio (id BIGINT AUTO_INCREMENT, texto text NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE categoriaContenido (id BIGINT AUTO_INCREMENT, texto text NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE comentario (id BIGINT AUTO_INCREMENT, idanuncio BIGINT NOT NULL, nombre VARCHAR(80) NOT NULL, correo VARCHAR(80) NOT NULL, telefono VARCHAR(30), texto text NOT NULL, borrado TINYINT(1) DEFAULT '0' NOT NULL, activo TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idanuncio_idx (idanuncio), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE configuracion (id BIGINT AUTO_INCREMENT, variable VARCHAR(255) NOT NULL, valor TEXT NOT NULL, descripcion LONGBLOB, tipo VARCHAR(30) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contacto (id BIGINT AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, telefono VARCHAR(20), empresa VARCHAR(100), comentario TEXT NOT NULL, documento TEXT, borrado TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contactoAnuncio (id BIGINT AUTO_INCREMENT, idanuncio BIGINT NOT NULL, nombre VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, telefono VARCHAR(20), mensaje text NOT NULL, borrado TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idanuncio_idx (idanuncio), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contenido (id BIGINT AUTO_INCREMENT, idusuario BIGINT NOT NULL, idcategoriacontenido BIGINT NOT NULL, titulo VARCHAR(255) NOT NULL, contenido text NOT NULL, borrado TINYINT(1) DEFAULT '0' NOT NULL, activo TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idusuario_idx (idusuario), INDEX idcategoriacontenido_idx (idcategoriacontenido), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE denunciaAnuncio (id BIGINT AUTO_INCREMENT, idanuncio BIGINT NOT NULL, nombre VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, telefono VARCHAR(20), empresa VARCHAR(100), razonanuncio TEXT NOT NULL, documento TEXT, solucionado TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idanuncio_idx (idanuncio), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE fotografiaAnuncio (id BIGINT AUTO_INCREMENT, idanuncio BIGINT NOT NULL, descripcion text NOT NULL, fotografia VARCHAR(255) NOT NULL, borrado TINYINT(1) DEFAULT '0' NOT NULL, activo TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idanuncio_idx (idanuncio), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE provinciaAnuncio (id BIGINT AUTO_INCREMENT, texto text NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE usuarioAnuncio (id BIGINT AUTO_INCREMENT, idanuncio BIGINT NOT NULL, nombre VARCHAR(80) NOT NULL, correo VARCHAR(80) NOT NULL, telefono VARCHAR(30), tipo VARCHAR(8) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, imagenperfil VARCHAR(255), first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128) NOT NULL, is_active TINYINT(1) DEFAULT '1', borrado TINYINT(1) DEFAULT '0' NOT NULL, is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE anuncio ADD CONSTRAINT anuncio_idprovinciaanuncio_provinciaAnuncio_id FOREIGN KEY (idprovinciaanuncio) REFERENCES provinciaAnuncio(id);
ALTER TABLE anuncio ADD CONSTRAINT anuncio_idcategoriaanuncio_categoriaAnuncio_id FOREIGN KEY (idcategoriaanuncio) REFERENCES categoriaAnuncio(id);
ALTER TABLE comentario ADD CONSTRAINT comentario_idanuncio_anuncio_id FOREIGN KEY (idanuncio) REFERENCES anuncio(id);
ALTER TABLE contactoAnuncio ADD CONSTRAINT contactoAnuncio_idanuncio_anuncio_id FOREIGN KEY (idanuncio) REFERENCES anuncio(id);
ALTER TABLE contenido ADD CONSTRAINT contenido_idusuario_sf_guard_user_id FOREIGN KEY (idusuario) REFERENCES sf_guard_user(id);
ALTER TABLE contenido ADD CONSTRAINT contenido_idcategoriacontenido_categoriaContenido_id FOREIGN KEY (idcategoriacontenido) REFERENCES categoriaContenido(id);
ALTER TABLE denunciaAnuncio ADD CONSTRAINT denunciaAnuncio_idanuncio_anuncio_id FOREIGN KEY (idanuncio) REFERENCES anuncio(id);
ALTER TABLE fotografiaAnuncio ADD CONSTRAINT fotografiaAnuncio_idanuncio_anuncio_id FOREIGN KEY (idanuncio) REFERENCES anuncio(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
