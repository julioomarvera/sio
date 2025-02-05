
ALTER TABLE `tbl_reporte` ADD `id_sector` INT NULL AFTER `id_origen`, ADD `id_zona` INT NULL AFTER `id_sector`, ADD `id_seccion` INT NULL AFTER `id_zona`;

ALTER TABLE `tbl_reporte_dtl` ADD `latitud` VARCHAR(50) NULL AFTER `eliminado`, ADD `longitud` VARCHAR(50) NULL AFTER `latitud`;
