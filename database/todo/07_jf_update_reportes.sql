--actualiza los reportes con forme su comunidad para que tengan ya los sectores y demás datos 

update
	tbl_reporte tr
left join (
	select
		tat.id_zona,
		tat.id_sector,
		tat.id_seccion,
		tat.id_comunidad
	from
		tbl_asig_territorial tat
	group by
		tat.id_comunidad
	) stat on
	tr.id_colonia = stat.id_comunidad 
set
	tr.id_zona = stat.id_zona,
	tr.id_sector = stat.id_sector,
	tr.id_seccion = stat.id_seccion;