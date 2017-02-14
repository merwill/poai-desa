-- Function: get_hijos_unidad(integer)

-- DROP FUNCTION get_hijos_unidad(integer);

CREATE OR REPLACE FUNCTION get_hijos_unidad(id_unidad_param integer)
  RETURNS SETOF unidad AS
$BODY$
declare
    results record;
    entry   record;
    recs    record;
begin
    select into results * from unidad where id_unidad = $1;
    if found then
        for entry in select id_unidad from unidad where id_unidad_padre = $1 order by id_unidad desc loop
            for recs in select * from get_hijos_unidad(entry.id_unidad)   loop
                return next recs;
            end loop;
        end loop;
    end if;
    return next results;
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION get_hijos_unidad(integer)
  OWNER TO postgres;



-- Function: fn_get_hijos_unidad(integer)

-- DROP FUNCTION fn_get_hijos_unidad(integer);

CREATE OR REPLACE FUNCTION fn_get_hijos_unidad(IN id_unidad_param integer)
  RETURNS TABLE(id_unidad integer, id_tipo_unidad integer, codigo_seguimiento integer, denominacion character varying, fecha_creacion date, fecha_fin date, estado character, codigo_unidad character varying, codigo_unidad_padre character varying, id_entidad integer, normativa character, nivel integer, id_unidad_padre integer, sigla character varying, id_version integer) AS
$BODY$
declare
	V_UNIDAD ALIAS FOR $1;
begin
    RETURN QUERY
    SELECT 
	
	dblink.id_unidad,
        dblink.id_tipo_unidad,
        dblink.codigo_seguimiento,
        dblink.denominacion,
        dblink.fecha_creacion,
        dblink.fecha_fin,
        dblink.estado,
        dblink.codigo_unidad,
        dblink.codigo_unidad_padre,
        dblink.id_entidad,
        dblink.normativa,
        dblink.nivel,
        dblink.id_unidad_padre,
        dblink.sigla,
        dblink.id_version
	
	
	from
	dblink('hostaddr=192.168.0.110 port=5432 dbname=prod_mof user=postgres password=admin'::text, 
	'SELECT 
	       T0.id_unidad
                ,T0.id_tipo_unidad
                ,T0.codigo_seguimiento
                ,T0.denominacion
                ,T0.fecha_creacion
                ,T0.fecha_fin
                ,T0.estado
                ,T0.codigo_unidad
                ,T0.codigo_unidad_padre
                ,T0.id_entidad
                ,T0.normativa
                ,T0.nivel
                ,T0.id_unidad_padre
                ,T0.sigla
                ,T0.id_version
	 FROM get_hijos_unidad('||V_UNIDAD||') as T0
	 
	 '::TEXT)
	dblink(
	  id_unidad integer,
  id_tipo_unidad integer,
  codigo_seguimiento integer,
  denominacion character varying,
  fecha_creacion date,
  fecha_fin date,
  estado character,
  codigo_unidad character varying,
  codigo_unidad_padre character varying,
  id_entidad integer,
  normativa character,
  nivel integer,
  id_unidad_padre integer,
  sigla character varying,
  id_version integer
	);


    
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION fn_get_hijos_unidad(integer)
  OWNER TO postgres;

  
  
  
 -- Function: fn_og_by_gestion(integer)

-- DROP FUNCTION fn_og_by_gestion(integer);

CREATE OR REPLACE FUNCTION fn_og_by_gestion(IN id_gestion integer)
  RETURNS TABLE(codigo_poa text, og_separador text, og_id_das character varying, og_codigo integer, og_id_obj_gestion integer, og_id_unidad integer, og_sigla_unidad character varying, og_unidad character varying, og_descripcion character varying, oe_separador text, oe_codigo integer, oe_id_obj_esp integer, oe_id_unidad_resp numeric, oe_sigla_unidad_resp character varying, oe_unidad_resp character varying, oe_descripcion character varying, oe_resultado_esperado character varying, oe_cve_tipo_obj character, oe_indicador character varying, op_separador text, op_codigo integer, op_id_operacion integer, op_id_unidad integer, op_sigla_unidad character varying, op_descripcion character varying, op_metas character varying, op_medio_verificacion character varying, op_ponderacion double precision, op_cve_tipo_operacion character varying, op_indicador character varying, op_periodo_inicio character varying, op_periodo_fin character varying) AS
$BODY$
declare
	V_GESTION ALIAS FOR $1;
begin
    RETURN QUERY

SELECT dblink.*
FROM dblink('hostaddr=192.168.0.110 port=5432    
dbname=poa_ppto user=postgres password=admin'::text,
'SELECT
    (e.sigla ||''.'' || og.codigo || ''.'' || oe.codigo || ''.'' || o.codigo) AS codigo_poa,
    '' || ''                                                              AS og_separador,
    og.id_das                                                           AS og_id_das,
    og.codigo                                                           AS og_codigo,
    og.id_obj_gestion                                                   AS og_id_obj_gestion,
    ou.id_unidad                                                        AS og_id_unidad,
    eo_og.sigla                                                         AS og_sigla_unidad,
    eo_og.descripcion                                                   AS og_unidad,
    og.descripcion                                                      AS og_descripcion,
    '' || ''                                                              AS oe_separador,
    oe.codigo                                                           AS oe_codigo,
    oe.id_obj_esp                                                       AS oe_id_obj_esp,
    oe.id_unidad_resp                                                   AS oe_id_unidad_resp,
    eo.sigla                                                            AS oe_sigla_unidad_resp,
    eo.descripcion                                                      AS oe_unidad_resp,
    oe.descripcion                                                      AS oe_descripcion,
    oe.resultado_esperado                                               AS oe_resultado_esperado,
    oe.cve_tipo_obj                                                     AS oe_cve_tipo_obj,
    cc.interpretacion                                                   AS oe_indicador,
    '' || ''                                                              AS op_separador,
    o.codigo                                                            AS op_codigo,
    o.id_ope                                                            AS op_id_operacion,
    eo_ope.id_unidad                                                    AS op_id_unidad,
    eo_ope.sigla                                                        AS op_sigla_unidad,
    o.descripcion                                                       AS op_descripcion,
    o.metas                                                             AS op_metas,
    o.medio_verificacion                                                AS op_medio_verificacion,
    o.ponderacion                                                       AS op_ponderacion,
    o.cve_tipo_objetivo__                                               AS op_cve_tipo_operacion,
    c.interpretacion                                                    AS op_indicador,
    cfi.interpretacion                                                  AS op_periodo_inicio,
    cff.interpretacion                                                  AS op_periodo_fin
from objges_unid ou
inner join objetivo_gestion og on og.id_obj_gestion = ou.id_obj_gestion
inner join objetivo_especifico oe on oe.id_obj_gestion = og.id_obj_gestion
inner join operacion o on o.id_obj_esp = oe.id_obj_esp
inner join estructura_organizacional eo_og on eo_og.id_unidad = ou.id_unidad
inner join estructura_organizacional eo on eo.id_unidad = oe.id_unidad_resp
inner join estructura_organizacional eo_ope on eo_ope.id_unidad = o.id_unidad_ejec
inner join claves c on c.valor_clave = o.cve_tipo_objetivo__
inner join claves cc on cc.valor_clave = oe.cve_tipo_obj
inner join claves cfi on cfi.valor_clave = o.periodo_inicio
inner join claves cff on cff.valor_clave = o.periodo_fin
inner join entidad e on og.id_entidad = e.id_entidad
where  og.id_entidad = 35
and ou.cve_vigente = ''V''
and og.cve_vigente = ''V''
and og.cve_estado = ''A''
and oe.cve_vigente = ''V''
and oe.cve_estado = ''A''
and o.cve_vigente = ''V''
and o.cve_estado = ''A''
and c.clave = ''cve_tipo_objetivo''
and cc.clave = ''cve_tipo_objetivo_esp''
and ou.id_unidad = (SELECT gup.id_unidad FROM get_unidad_padre(oe.id_unidad_resp::integer,1) gup )
--and oe.id_unidad_resp = 950
and og.id_gestion in (SELECT gpp.id_gestion FROM gestion_poa_ppto gpp where gpp.gestion = '||V_GESTION||'::integer)
order by  og.codigo , oe.codigo , o.codigo'::text) 
dblink(
codigo_poa	text,
og_separador	text,
og_id_das	character varying,
og_codigo	integer,
og_id_obj_gestion	integer,
og_id_unidad	integer,
og_sigla_unidad	character varying,
og_unidad	character varying,
og_descripcion	character varying,
oe_separador	text,
oe_codigo	integer,
oe_id_obj_esp	integer,
oe_id_unidad_resp	numeric,
oe_sigla_unidad_resp	character varying,
oe_unidad_resp	character varying,
oe_descripcion	character varying,
oe_resultado_esperado	character varying,
oe_cve_tipo_obj	bpchar,
oe_indicador	character varying,
op_separador	text,
op_codigo	integer,
op_id_operacion	integer,
op_id_unidad	integer,
op_sigla_unidad	character varying,
op_descripcion	character varying,
op_metas	character varying,
op_medio_verificacion	character varying,
op_ponderacion	double precision,
op_cve_tipo_operacion	character varying,
op_indicador	character varying,
op_periodo_inicio	character varying,
op_periodo_fin	character varying
);
    
    
    
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION fn_og_by_gestion(integer)
  OWNER TO postgres;





-- Function: fn_og_by_gestion(integer, integer)

-- DROP FUNCTION fn_og_by_gestion(integer, integer);

CREATE OR REPLACE FUNCTION fn_og_by_gestion(IN gestion integer, IN id_unidad integer)
  RETURNS TABLE(codigo_poa text, og_separador text, og_id_das character varying, og_codigo integer, og_id_obj_gestion integer, og_id_unidad integer, og_sigla_unidad character varying, og_unidad character varying, og_descripcion character varying, oe_separador text, oe_codigo integer, oe_id_obj_esp integer, oe_id_unidad_resp numeric, oe_sigla_unidad_resp character varying, oe_unidad_resp character varying, oe_descripcion character varying, oe_resultado_esperado character varying, oe_cve_tipo_obj character, oe_indicador character varying, op_separador text, op_codigo integer, op_id_operacion integer, op_id_unidad integer, op_sigla_unidad character varying, op_descripcion character varying, op_metas character varying, op_medio_verificacion character varying, op_ponderacion double precision, op_cve_tipo_operacion character varying, op_indicador character varying, op_periodo_inicio character varying, op_periodo_fin character varying) AS
$BODY$
declare
	V_GESTION ALIAS FOR $1;
	V_ID_UNIDAD ALIAS FOR $2;

	V_WHERE text := ' ';
begin

       IF (V_ID_UNIDAD IS NOT NULL) THEN
         BEGIN
               V_WHERE = ' and oe.id_unidad_resp = '||V_ID_UNIDAD||' ';
         END;
       END IF;

    RETURN QUERY

SELECT dblink.*
FROM dblink('hostaddr=192.168.0.110 port=5432    
dbname=poa_ppto user=postgres password=admin'::text,
'SELECT
    (e.sigla ||''.'' || og.codigo || ''.'' || oe.codigo || ''.'' || o.codigo) AS codigo_poa,
    '' || ''                                                              AS og_separador,
    og.id_das                                                           AS og_id_das,
    og.codigo                                                           AS og_codigo,
    og.id_obj_gestion                                                   AS og_id_obj_gestion,
    ou.id_unidad                                                        AS og_id_unidad,
    eo_og.sigla                                                         AS og_sigla_unidad,
    eo_og.descripcion                                                   AS og_unidad,
    og.descripcion                                                      AS og_descripcion,
    '' || ''                                                              AS oe_separador,
    oe.codigo                                                           AS oe_codigo,
    oe.id_obj_esp                                                       AS oe_id_obj_esp,
    oe.id_unidad_resp                                                   AS oe_id_unidad_resp,
    eo.sigla                                                            AS oe_sigla_unidad_resp,
    eo.descripcion                                                      AS oe_unidad_resp,
    oe.descripcion                                                      AS oe_descripcion,
    oe.resultado_esperado                                               AS oe_resultado_esperado,
    oe.cve_tipo_obj                                                     AS oe_cve_tipo_obj,
    cc.interpretacion                                                   AS oe_indicador,
    '' || ''                                                              AS op_separador,
    o.codigo                                                            AS op_codigo,
    o.id_ope                                                            AS op_id_operacion,
    eo_ope.id_unidad                                                    AS op_id_unidad,
    eo_ope.sigla                                                        AS op_sigla_unidad,
    o.descripcion                                                       AS op_descripcion,
    o.metas                                                             AS op_metas,
    o.medio_verificacion                                                AS op_medio_verificacion,
    o.ponderacion                                                       AS op_ponderacion,
    o.cve_tipo_objetivo__                                               AS op_cve_tipo_operacion,
    c.interpretacion                                                    AS op_indicador,
    cfi.interpretacion                                                  AS op_periodo_inicio,
    cff.interpretacion                                                  AS op_periodo_fin
from objges_unid ou
inner join objetivo_gestion og on og.id_obj_gestion = ou.id_obj_gestion
inner join objetivo_especifico oe on oe.id_obj_gestion = og.id_obj_gestion
inner join operacion o on o.id_obj_esp = oe.id_obj_esp
inner join estructura_organizacional eo_og on eo_og.id_unidad = ou.id_unidad
inner join estructura_organizacional eo on eo.id_unidad = oe.id_unidad_resp
inner join estructura_organizacional eo_ope on eo_ope.id_unidad = o.id_unidad_ejec
inner join claves c on c.valor_clave = o.cve_tipo_objetivo__
inner join claves cc on cc.valor_clave = oe.cve_tipo_obj
inner join claves cfi on cfi.valor_clave = o.periodo_inicio
inner join claves cff on cff.valor_clave = o.periodo_fin
inner join entidad e on og.id_entidad = e.id_entidad
where  og.id_entidad = 35
and ou.cve_vigente = ''V''
and og.cve_vigente = ''V''
and og.cve_estado = ''A''
and oe.cve_vigente = ''V''
and oe.cve_estado = ''A''
and o.cve_vigente = ''V''
and o.cve_estado = ''A''
and c.clave = ''cve_tipo_objetivo''
and cc.clave = ''cve_tipo_objetivo_esp''
and ou.id_unidad = (SELECT gup.id_unidad FROM get_unidad_padre(oe.id_unidad_resp::integer,1) gup )
'||V_WHERE||'
and og.id_gestion in (SELECT gpp.id_gestion FROM gestion_poa_ppto gpp where gpp.gestion = '||V_GESTION||'::integer)
order by  og.codigo , oe.codigo , o.codigo'::text) 
dblink(
codigo_poa	text,
og_separador	text,
og_id_das	character varying,
og_codigo	integer,
og_id_obj_gestion	integer,
og_id_unidad	integer,
og_sigla_unidad	character varying,
og_unidad	character varying,
og_descripcion	character varying,
oe_separador	text,
oe_codigo	integer,
oe_id_obj_esp	integer,
oe_id_unidad_resp	numeric,
oe_sigla_unidad_resp	character varying,
oe_unidad_resp	character varying,
oe_descripcion	character varying,
oe_resultado_esperado	character varying,
oe_cve_tipo_obj	bpchar,
oe_indicador	character varying,
op_separador	text,
op_codigo	integer,
op_id_operacion	integer,
op_id_unidad	integer,
op_sigla_unidad	character varying,
op_descripcion	character varying,
op_metas	character varying,
op_medio_verificacion	character varying,
op_ponderacion	double precision,
op_cve_tipo_operacion	character varying,
op_indicador	character varying,
op_periodo_inicio	character varying,
op_periodo_fin	character varying
);
    
    
    
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION fn_og_by_gestion(integer, integer)
  OWNER TO postgres;


  
  