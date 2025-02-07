ALTER TABLE tbl_reporte_historia ADD latitud varchar(100) DEFAULT null NULL;
ALTER TABLE tbl_reporte_historia ADD longitud varchar(100) DEFAULT null NULL;

ALTER TABLE tbl_reporte_historia ADD atendido TINYINT DEFAULT null NULL COMMENT 'Campo para indicar si se atendió o no, null no aplica.';
