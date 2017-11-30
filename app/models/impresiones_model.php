<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Impresiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_cabecera($id){
        $this->db->where('id', $id); 
        return $this->db->get('saaTransferencia');
    }
    
    public function get_direccion($id){
        $this->db->where('id', $id); 
        return $this->db->get('catDirecciones');
    }
    
    public function get_no_cajas($id){
        $this->db->where('idTransferencia', $id);
        return $this->db->get('saaTransferencia_Caja');
    }
    
    
    public function  get_detalles_nocaja($id){
        $this->db->where('idCaja', $id);
        $this->db->limit(1);
        return $this->db->get('saaTransferencia_Detalle')->row_array();
    }
    
    public function  get_detalles_caja($id){
        $this->db->select('d.*, a.OrdenTrabajo');
        $this->db->from('saaTransferencia_Detalle as d');
        $this->db->join('saaArchivo as a', 'a.id = d.ot');
        $this->db->where('idCaja', $id);
        return $this->db->get();
    }
    
    public function  get_detalles_anio($id){
       
        $this->db->where('idCaja', $id);
        return $this->db->get('saaTransferencia_Detalle');
    }
    
    public function get_detalles($id){
        
        
        $this->db->select("d.*, a.OrdenTrabajo, a.Obra, a.idEjercicio");
        $this->db->from('saaTransferencia AS t');
        $this->db->join('saaTransferencia_Caja AS c', 'c.idTransferencia = t.id');
        $this->db->join('saaTransferencia_Detalle AS d', 'c.id = d.idCaja');
        $this->db->join('saaArchivo AS a', 'a.id = d.ot');
        $this->db->where('t.id', $id); 
        
        return $this->db->get();
                
    }

    public function get_ejecutoras(){
        
         
        $this->db->select("Direccion");
        $this->db->distinct();
        $this->db->from('saaRel_Archivo_Preregistro AS p');
        $this->db->join('saaArchivo AS a', 'p.idArchivo = a.id');
        $this->db->where('idEjercicio', 2017); 
        $this->db->where('p.preregistro_aceptado', 1); 
        return $this->db->get();
    }
    
    //No de archivos entregados por de ejecutoras por direccion
    public function get_entregados($archivo, $Direccion){
        
        $this->db->select("id");
        $this->db->where('idArchivo', $archivo);
        $this->db->where('idDireccion_responsable', $Direccion); 
        return $this->db->get("saaRel_Archivo_Preregistro");
    }

    //Archivos entregados por Ejecutoras
    public function get_archivos_entregados_ejecutoras($Direccion){
        
        
        $sql = "SELECT DISTINCT p.idArchivo, 
                        a.OrdenTrabajo,
                        a.Contrato,
                        a.Obra,
                        m.Modalidad,
                        a.idModalidad,
                        a.Normatividad,
                        a.Direccion, 
                        a.ImporteContratado
                        FROM `saaRel_Archivo_Preregistro` AS p
                        INNER JOIN saaArchivo AS a
                        ON  p.idArchivo = a.id
                        INNER JOIN `catDirecciones` AS d
                        ON d.id = p.idDireccion_responsable
                        INNER JOIN `saaModalidad` AS m ON a.idModalidad = m.id
                        WHERE idEjercicio =2017 AND p.preregistro_aceptado =1
                        AND a.Direccion = ?
                        ORDER BY ImporteContratado DESC";
        $query = $this->db->query($sql, array($Direccion));
        return $query;
    }

    public function addw_direccionesEjecutoras() {
        $sql = 'SELECT DISTINCT Direccion, idDireccion FROM `saaArchivo` ';
        $query = $this->db->query($sql);
        $addw[0]="No disponible";
        foreach ($query->result() as $row) {
            $addw[$row->idDireccion]=$row->Direccion;
        }
        return $addw;
    }
    
    public function listado_documentos_bloque($proceso, $bloque){
        $sql = 'SELECT `saaArchivo`.*, `saaRel_Archivo_Documento`.*
                FROM `saaArchivo` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaRel_Archivo_Documento`.`idArchivo` = `saaArchivo`.`id`
                WHERE `saaRel_Archivo_Documento`.`idTipoProceso` =? 
                AND `saaArchivo`.`idBloqueObra` = ?';
        $query = $this->db->query($sql, array($proceso, $bloque));
        return $query;
    }
    
    
    public function listado_contratistas(){
        $sql = 'SELECT OrdenTrabajo, Contratista, idBloqueObra
                FROM `saaArchivo`
                WHERE idBloqueObra= 1 || idBloqueObra= 2 || idBloqueObra= 3';
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function estimaciones_de_archivo($id){
        $sql = 'SELECT * FROM `saaRel_Archivo_Preregistro`
                WHERE idArchivo = ? AND tipo_documento =4';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function idRAD_estimaciones($id){
        $sql = 'SELECT DISTINCT `saaEstimaciones`.`idRel_Archivo_Documento` FROM `saaEstimaciones` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaEstimaciones`.`idRel_Archivo_Documento` = `saaRel_Archivo_Documento`.id
                WHERE `saaRel_Archivo_Documento`.idArchivo = ?';
        $query = $this->db->query($sql, array($id));
        return $query;

    }
    
    public function get_subdocumentos($id, $direccion){
        $sql = 'SELECT `saaEstimaciones`.*, `saaSubDocumentos`.`Nombre`
                FROM `saaEstimaciones` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaEstimaciones`.`idRel_Archivo_Documento` = `saaRel_Archivo_Documento`.id
                INNER JOIN `saaSubDocumentos`
                ON `saaSubDocumentos`.id = `saaEstimaciones`.`idSubDocumento`
                WHERE `saaRel_Archivo_Documento`.idArchivo = ?
                AND `saaEstimaciones`.idDireccion_responsable = ?
                ORDER BY Numero_Estimacion, ordenar_subdocumento ASC';
        $query = $this->db->query($sql, array($id, $direccion));
        return $query;

    }
    
    public function get_subdocumentos_archivo($id){
        $sql = 'SELECT `saaEstimaciones`.*, `saaSubDocumentos`.`Nombre`
                FROM `saaEstimaciones` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaEstimaciones`.`idRel_Archivo_Documento` = `saaRel_Archivo_Documento`.id
                INNER JOIN `saaSubDocumentos`
                ON `saaSubDocumentos`.id = `saaEstimaciones`.`idSubDocumento`
                WHERE `saaRel_Archivo_Documento`.idArchivo = ?
                
                ORDER BY Numero_Estimacion, ordenar_subdocumento ASC';
        $query = $this->db->query($sql, array($id));
        return $query;

    }
    
    public function estimaciones_preregistradas($idRAD, $direccion){
        $sql = 'SELECT * FROM saaEstimaciones 
                WHERE idRel_Archivo_Documento = ?
                AND idDireccion_responsable= ?';
        $query = $this->db->query($sql, array($idRAD, $direccion));
        return $query;
    }
    
    public function buscar_preregistro($idRAD, $direccion){
        $sql = 'SELECT * FROM `saaRel_Archivo_Preregistro`
                WHERE id_Rel_Archivo_Documento = ? AND idDireccion_responsable = ?';
        $query = $this->db->query($sql, array($idRAD, $direccion));
        return $query;
    }
    
    public function buscar_preregistro_archivo($idRAD){
        $sql = 'SELECT * FROM `saaRel_Archivo_Preregistro`
                WHERE id_Rel_Archivo_Documento = ?';
        $query = $this->db->query($sql, array($idRAD));
        return $query;
    }
    
    public function preregistra_estimaciones($data){
        
            $this->db->insert('saaRel_Archivo_Preregistro', $data);
            $e = $this->db->_error_message();
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
            
            if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Archivo_Preregistro', 'Data' => $data, 'id' => $registro));
            }

            if ($aff <1 ){ return "Error"; } else { return "Exito";}
    }

    public function  agrego_estimaciones($id, $direccion){
        $sql = 'SELECT * FROM `saaRel_Archivo_Preregistro`
                WHERE idArchivo = ? AND tipo_documento =4 AND idDireccion_responsable = ?';
        $query = $this->db->query($sql, array($idRAD, $direccion));
        return $query;
    }

    public function get_estimaciones_archivo($id, $usuario){
        $sql='SELECT * FROM `saaEstimaciones`
            WHERE idRel_Archivo_Documento = ? AND 
            idUsuario=?
            ORDER BY Numero_Estimacion, ordenar_subdocumento';
        $query = $this->db->query($sql, array($id, $usuario));
        return $query;
    }
    
     public function get_estimaciones($id, $usuario){
        $sql='SELECT * FROM `saaEstimaciones`
            WHERE idRel_Archivo_Documento = ? AND 
            idUsuario=?
            ORDER BY Numero_Estimacion, ordenar_subdocumento';
        $query = $this->db->query($sql, array($id, $usuario));
        return $query;
    }
    
    public function get_estimaciones_archivo_preregistro($id, $usuario){
        $sql='SELECT * FROM `saaEstimaciones`
            WHERE idRel_Archivo_Documento = ? AND 
            idUsuario=? AND (copia=1 OR no_aplica=1 OR original_recibido=1)
            AND eliminacion_logica=0
            ORDER BY Numero_Estimacion, ordenar_subdocumento ';
        $query = $this->db->query($sql, array($id, $usuario));
        return $query;
    }
    
    public function estimaciones_direccion($id, $direccion){
        $sql='SELECT `saaEstimaciones`.* , `saaRel_Archivo_Documento`.`idArchivo` 
            FROM `saaEstimaciones` 
            INNER JOIN `saaRel_Archivo_Documento` 
            ON `saaRel_Archivo_Documento`.id= `saaEstimaciones`.`idRel_Archivo_Documento`
            WHERE `saaRel_Archivo_Documento`.`idArchivo` = ?
            AND `saaEstimaciones`.`idDireccion_responsable` =?
            ORDER BY Numero_Estimacion,ordenar_subdocumento  ';
        $query = $this->db->query($sql, array($id, $direccion));
        return $query;
    }

    

    public function listado_documentos_finalizados_bloque($proceso, $bloque){
        $sql = 'SELECT `saaArchivo`.*, `saaRel_Archivo_Documento`.*
                FROM `saaArchivo` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaRel_Archivo_Documento`.`idArchivo` = `saaArchivo`.`id`
                WHERE `saaRel_Archivo_Documento`.`idTipoProceso` =? 
                AND (`saaRel_Archivo_Documento`.`Estatus` = 30 
                AND `saaArchivo`.`idBloqueObra` = ?)';
        $query = $this->db->query($sql, array($proceso, $bloque));
        return $query;
    }
    
    
    public function listado_archivos_direccion($idDireccion, $bloque){
        $sql = 'SELECT id, direccion, idDireccion, idBloqueObra FROM `saaArchivo`
                WHERE idDireccion = ? AND idBloqueObra = ?
                ORDER BY direccion ASC ';
        $query = $this->db->query($sql, array($idDireccion, $bloque));
        return $query;
    }
    
    public function no_documentos_por_archivo($idArchivo){
        $sql = 'SELECT COUNT(id) AS numero FROM  `saaRel_Archivo_Documento`
                    WHERE idArchivo = ? ';
        $query = $this->db->query($sql, array($idArchivo));
        return $query;
    }
    
    public function no_documentos_entregados_archivo($idArchivo){
        $sql = 'SELECT COUNT(id) AS numero_entregados FROM  `saaRel_Archivo_Documento`
                WHERE idArchivo = ? AND Estatus=30';
        $query = $this->db->query($sql, array($idArchivo));
        return $query;
    }
    
    public function no_obras_por_entregar($idArchivo){
        $sql = 'SELECT DISTINCT Estatus FROM `saaRel_Archivo_Documento`
                WHERE idArchivo = ?';
        $query = $this->db->query($sql, array($idArchivo));
        return $query;
    }


    

    public function listado_documentos_totales_general_bloque($bloque){
        $sql = 'SELECT `saaArchivo`.*, `saaRel_Archivo_Documento`.*
                FROM `saaArchivo` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaRel_Archivo_Documento`.`idArchivo` = `saaArchivo`.`id`
                WHERE `saaArchivo`.`idBloqueObra` = ?';
        $query = $this->db->query($sql, array($bloque));
        return $query;
    }
    
    public function listado_documentos_totales_finalizados_bloque($bloque){
        $sql = 'SELECT `saaArchivo`.*, `saaRel_Archivo_Documento`.*
                FROM `saaArchivo` 
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaRel_Archivo_Documento`.`idArchivo` = `saaArchivo`.`id`
                WHERE `saaRel_Archivo_Documento`.`Estatus` = 30 
                AND `saaArchivo`.`idBloqueObra` = ?';
        $query = $this->db->query($sql, array($bloque));
        return $query;
    }

    public function get_listado_archivos(){
        $this->db->where("eliminacion_logica", 0);
        $this->db->order_by("id" , "DESC");        
        return $this->db->get_where("saaArchivo");
    }

    public function caratula_detalle($id_estimacion) {
        $sql = 'SELECT catObrasPresupuesto.partida , sum(movEstimacionesDetalle.pu  * movEstimacionesDetalle.volumen ) as importe FROM movEstimacionesDetalle, catObrasPresupuesto WHERE movEstimacionesDetalle.idEstimacion = ? AND catObrasPresupuesto.id =  movEstimacionesDetalle.idPresupuesto GROUP BY catObrasPresupuesto.partida ORDER BY catObrasPresupuesto.partida, catObrasPresupuesto.id  ASC';
        $query = $this->db->query($sql, array($id_estimacion));
        return $query;
    }

    public function detalle_detalle($id_estimacion) {
        $sql = 'SELECT movEstimacionesDetalle.id, movEstimacionesDetalle.acumulado_anterior, movEstimacionesDetalle.presupuesto, movEstimacionesDetalle.volumen, movEstimacionesDetalle.saldo, movEstimacionesDetalle.pu, movEstimacionesDetalle.fc, catObrasPresupuesto.consecutivo, catObrasPresupuesto.partida, catObrasPresupuesto.codigo, catObrasPresupuesto.descripcion, catObrasPresupuesto.unidad, movEstimacionesDetalle.GeneradorJSON FROM movEstimacionesDetalle, catObrasPresupuesto  WHERE movEstimacionesDetalle.idPresupuesto = catObrasPresupuesto.id AND movEstimacionesDetalle.idEstimacion = ? ORDER BY catObrasPresupuesto.consecutivo';
        $query = $this->db->query($sql, array($id_estimacion));
        return $query;
    }

    public function detalle_estimacion($id_estimacion) {
        $sql = 'SELECT catObrasPresupuesto.partida , sum(movEstimacionesDetalle.pu  * movEstimacionesDetalle.volumen ) as importe FROM movEstimacionesDetalle, catObrasPresupuesto WHERE movEstimacionesDetalle.idEstimacion = ? AND catObrasPresupuesto.id =  movEstimacionesDetalle.idPresupuesto GROUP BY catObrasPresupuesto.partida ORDER BY catObrasPresupuesto.partida, catObrasPresupuesto.id';
        $query = $this->db->query($sql, array($id_estimacion));
        return $query;
    }

    public function g_conceptos($id_estimacion) {
        $sql = 'SELECT * FROM movEstimacionesDetalle WHERE idEstimacion = ?';
        $query = $this->db->query($sql, array($id_estimacion));
        return $query;
    }

    public function g_partidas($id_concepto) {
        $sql = 'SELECT id,idContratista,idConcepto,idPresupuesto,idEstimacion,partida,descripcion,localizacion,largo,ancho,alto,piezas,cantidad,total,observaciones FROM movEstimacionesGeneradores WHERE idConcepto = ?';
        $query = $this->db->query($sql, array($id_concepto));
        return $query;
    }

    public function g_sum_vol($id_concepto) {
        $sql = 'SELECT SUM(total) as volumen_total FROM movEstimacionesGeneradores WHERE idConcepto = ?';
        $query = $this->db->query($sql, array($id_concepto));
        return $query->row_array();
    }

    public function g_fotos_partidas($id_concepto) {
        $sql = 'SELECT id, fotografia FROM movEstimacionesGeneradores WHERE idConcepto = ? AND fotografia IS NOT NULL';
        $query = $this->db->query($sql, array($id_concepto));
        return $query;
    }

    public function detalle_generador($id_estimacion) {
        $data = array();
        $this->db->order_by("idConcepto ASC");
        $this->db->order_by("partida ASC");
        $query = $this->db->get_where("movEstimacionesGeneradores", array("idEstimacion" => $id_estimacion));
        foreach ($query->result() as $row) {
            $data[$row->idConcepto][$row->partida]['id'] = $row->id;
            $data[$row->idConcepto][$row->partida]['partida'] = $row->partida;
            $data[$row->idConcepto][$row->partida]['descripcion'] = $row->descripcion;
            $data[$row->idConcepto][$row->partida]['localizacion'] = $row->localizacion;
            $data[$row->idConcepto][$row->partida]['largo'] = $row->largo;
            $data[$row->idConcepto][$row->partida]['ancho'] = $row->ancho;
            $data[$row->idConcepto][$row->partida]['alto'] = $row->alto;
            $data[$row->idConcepto][$row->partida]['piezas'] = $row->piezas;
            $data[$row->idConcepto][$row->partida]['cantidad'] = $row->cantidad;
            $data[$row->idConcepto][$row->partida]['total'] = $row->total;
        }
        return $data;
    }

    public function get_supervisor($idSupervisor) {

        $qSupervision = $this->db->get_where("catSupervision", array("id" => $idSupervisor));
        if ($qSupervision->num_rows() <= 0) {
            return "No asignado";
        } else {
            $aSupervicion = $qSupervision->row_array();
            $qJefe = $this->db->get_where("catDependenciasFirmas", array("id" => $aSupervicion['idJefeSupervisor']));
            if ($qJefe->num_rows() <= 0) {
                return "No asignado, jefe";
            } else {
                $rJefe = $qJefe->row();
                return $rJefe->Nombre . "<br/>" . $rJefe->NombreArea;
            }
        }
    }

    public function get_jefesupervisor($idJefeSupervisor) {
        // obsoleta
//            $qSupervision =  $this->db->get_where("catSupervision",array("id" => $idSupervisor ));
//            if ($qSupervision->num_rows() <= 0){
//                return "No asignado";
//            } else {
//                $aSupervicion = $qSupervision->row_array();
//                $qJefe = $this->db->get_where("catDependenciasFirmas", array("id" => $aSupervicion['idJefeSupervisor']));
//                if ($qJefe->num_rows() <= 0){
//                    return "No asignado, jefe";
//                } else {
//                    $rJefe = $qJefe->row();
//                    return $rJefe->Nombre."<br/>".$rJefe->NombreArea;
//                }
//            }
//            $qSupervision =  $this->db->get_where("catSupervision",array("id" => $idSupervisor ));
//            if ($qSupervision->num_rows() <= 0){
//                return "No asignado";
//            } else {
        //$aSupervicion = $qSupervision->row_array();
        $qJefe = $this->db->get_where("catDependenciasFirmas", array("id" => $idJefeSupervisor));
        if ($qJefe->num_rows() <= 0) {
            return "No asignado, Jefe de Area";
        } else {
            $rJefe = $qJefe->row();
            return $rJefe->Nombre . "<br/>" . $rJefe->NombreArea;
        }
        //}
    }

    public function genera_foto($idEstimacion, $numfoto) {
        $qFoto = $this->db->get_where("movEstimacionesFotos", array("idEstimacion" => $idEstimacion, "NumFoto" => $numfoto));

        $temp_file = "./temp/" . md5(microtime(true)) . ".jpg";
        if ($qFoto->num_rows() > 0) {
            $aFoto = $qFoto->row_array();
            if (strlen($aFoto['Foto']) > 0) {
                $blob = $aFoto['Foto'];
                //$blob = bzdecompress($aObra['Fotografia']);
            } else {
                $blob = file_get_contents('./images/nodisponible.jpg');
            }
        } else {
            $blob = file_get_contents('./images/nodisponible.jpg');
        }
        $retorno = file_put_contents($temp_file, $blob);
        if ($retorno === FALSE) {
            die("Error escribiendo archivo");
        }
        return $temp_file;
    }

    public function supervisor($id) {
        $query = $this->db->get_where("catSupervision", array("id" => $id));
        if ($query->num_rows() > 0) {
            $datos = $query->row_array();

            return $datos["Supervisor"];
        } else {
            return "No Asignado";
        }
    }

    public function director($id) {
        $query = $this->db->get_where("catDependenciasFirmas", array("id" => $id));
        if ($query->num_rows() > 0) {
            $datos = $query->row_array();

            return $datos["Nombre"] . ',' . $datos['NombreArea'];
        } else {
            return "No Asignado, Jefe de Area";
        }
    }

    public function representante_legal($id) {
        $this->load->library('ferfunc');
        $query = $this->db->get_where("catContratistas", array("id" => $id));
        if ($query->num_rows() > 0) {
            $datos = $query->row_array();
            return $datos["RepresentanteLegal"];
        } else {
            return "";
        }
    }

    public function prorrogas($idObra) {
        $this->db->where('idObra', $idObra);
        $this->db->where('TipoRegistro', 1);
        return $this->db->get_where('catObrasProrrogas');
    }

    public function recalendarizacion($idObra) {
        $this->db->where('idObra', $idObra);
        $this->db->where('TipoRegistro', 2);
        return $this->db->get_where('catObrasProrrogas');
    }

    public function direccion($idDireccion) {
        $this->db->where('id', $idDireccion);
        $query = $this->db->get_where('catDirecciones');
        if ($query->num_rows() > 0) {
            $aDireccion = $query->row_array();
            $direccion = $aDireccion['Nombre'];
        } else {
            $direccion = "No Asignada";
        }
        return $direccion;
    }

    public function get_firmas_memoria($id) {
        $qFuncionario = $this->db->get_where("memfuncionarios", array("id" => $id));
        $addw = array();
        if ($qFuncionario->num_rows() > 0) {
            $rFuncionario = $qFuncionario->row();
            $area = array();
            $area['cargo'] = $rFuncionario->cargo;
            $area['nombre'] = $rFuncionario->nombre;
            $addw[$id] = $area;
        } else {
            $addw[$id] = array('cargo' => '', 'nombre' => '');
        }
        return $addw;
    }

    public function get_SubTiposPago($id) {
        $sql = 'SELECT * FROM memSubTiposPago WHERE id = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }

    public function datos_memoria($idMemoria) {
        $this->load->library('ferfunc');

        $this->db->where('id', $idMemoria);
        $query = $this->db->get_where('memMemorias')->row_array();
        
        $this->db->where('id', $query['idObra']);
        $dObra = $this->db->get_where('catObras')->row_array();
        
        
       
        
        $this->db->where('id', $query['idClavePresupuestal']);
        $qClave = $this->db->get_where('catClavesPresupuestales');
        
        $claves_presupuestales="";
        
        $aClave=$qClave->row_array();
        $claves_presupuestales=$aClave['ClavePresupuestal'];
          
        
        /*
        $sql ='select *from catObrasRelClavesPresupuestales where idObra=? and idClavePresupuestal=? order by id asc '; 
        $qRelClavesPresupuestales = $this->db->query($sql, array($query['idObra'],$query['idClavePresupuestal']));
       
        foreach ($qRelClavesPresupuestales->result() as $rRelClavesPresupuestales) {
            $sql ='select Nombre from catPartidasPresupuestales
            where id=?'; 
            $qClave = $this->db->query($sql, array($rRelClavesPresupuestales->idPartidaPresupuestal));
            foreach ($qClave->result() as $rClave) {
               $partidas_presupuestales.=$rClave->Nombre.'<br/>';
            }

        }
        
        */
        
        $this->db->where('idObra', $dObra['id']);
        $dPartida = $this->db->get_where('catObrasRelPartidasPresupuestales');

        /*


        
        $claves_presupuestales="";
        foreach ($dPartida->result() as $rPartida) {
            $sql ='select catClavesPresupuestales.* from catObrasRelClavesPresupuestales inner join catClavesPresupuestales on 
            catObrasRelClavesPresupuestales.idClavePresupuestal = catClavesPresupuestales.id
            where idRelPartidaPresupuestal=? order by id asc '; 
            $qClave = $this->db->query($sql, array($rPartida->id));
            foreach ($qClave->result() as $rClave) {
               $claves_presupuestales.=$rClave->ClavePresupuestal.'<br/>';
            }

        }
       */
        
        $partidas_presupuestales="";
        foreach ($dPartida->result() as $rPartida) {
            $sql ='select Nombre from catPartidasPresupuestales
            where id=?'; 
            $qClave = $this->db->query($sql, array($rPartida->idPartidaPresupuestal));
            foreach ($qClave->result() as $rClave) {
               $partidas_presupuestales.=$rClave->Nombre.'<br/>';
            }

        }
        
       
        
        
        $this->db->where('id', $query['idElaboro']);
        $dElabora = $this->db->get_where('memfuncionarios')->row_array();
        $this->db->where('id', $query['idVoBo']);
        $dvobo = $this->db->get_where('memfuncionarios')->row_array();
        $this->db->where('id', $query['idAutorizo']);
        $dautoriza = $this->db->get_where('memfuncionarios')->row_array();
        $this->db->where('id',$query['idReviso']);
        $dRevisa = $this->db->get_where('memfuncionarios')->row_array();
        $this->db->where('id', $dObra['idDireccion']);
        $dDireccion = $this->db->get_where('catDirecciones')->row_array();
//            print_r($dDireccion);
        $this->db->where('id', $query['idConcepto']);
        $dConcepto = $this->db->get_where('memTiposPago')->row_array();
        print_r($dConcepto);
        $this->db->where('id', $query['id_subtipopago']);
        $dSubTipo = $this->db->get_where('memSubTiposPago')->row_array();
        $this->db->where('id',$dObra['idResidencia']);
        $dResidencia=  $this->db->get_where('memResidencias')->row_array();

        $sumaConvenios = $this->importes_convenio_memoria($idMemoria);
        $sumaTotal = $dObra['ImporteOriginal'] + $sumaConvenios['ampliaciones'] - $sumaConvenios['reducciones'];
        $retenciones = $this->suma_retenciones($idMemoria);
        $acumulados = $this->suma_ejercido($idMemoria);
        $acumAnticipos = $this->importes_anticipos_memoria($idMemoria);
        $amortizado = $this->suma_amortizado($idMemoria);

        //$amortizado_clave_presupuestal = $this->suma_amortizado_clave_presupuestal($idMemoria);
        $acumulados_clave_presupuestal = $this->suma_ejercido_clave_presupuestal($idMemoria);
        $retenciones_clave_presupuestal = $this->suma_retenciones_clave_presupuestal($idMemoria);
        
       
        
        $importe_inicial_clave_presupuestal=$this->suma_importe_inicial_clave_presupuestal($query['idObra'],$query['idClavePresupuestal']);
        
        $importe_ampliacion_clave_presupuestal=$this->suma_importe_ampliacion_clave_presupuestal($query['idObra'],$query['idClavePresupuestal']);
      
        
       
        
        $retorno = array(
            'memoria' => $query,
            'obra' => $dObra,
            'partida' => $dPartida,
            'claves_presupuestales' => $claves_presupuestales,
            'direccion' => $dDireccion['Nombre'],
            'concepto' => $dConcepto['Nombre'],
            'idTipoPago' => $dSubTipo['idTipoPago'],
            'sub_tipo_pago' => $dSubTipo['Nombre'],
            'totalFactura' => $query['importe'],
            'importeMemorias_mas_dos_millar' => $query['importetotal'] + $query['retencion'],
            'amortizado' => $query['amortizado'],
            'totalFactura_menos_amortizado' => $query['importetotal'] - $query['amortizado'],
            'retencion_2_millar' => $query['retencion'],
            'autorizo' => $dautoriza,
            'vo_bo' => $dvobo,
            'elaboro' => $dElabora,
            'reviso' => $dRevisa,
            'ImporteInicialAsignado' => $dObra['ImporteOriginal'],
            'AcuerdosAdicion_Convenios' => $sumaConvenios['ampliaciones'],
            'AcuerdosReduccion_Convenios' => $sumaConvenios['reducciones'],
            'ImporteAsignado' => $sumaTotal,
            'acumuladoAnteriordosALMillar' => $retenciones['retencionesAnteriores'],
            'acumuladoFechadosAlMillar' => $retenciones['retencionesActuales'],
            'ejercidoAnterior' => $acumulados['anterior'],
            'ejercido_total' => $acumulados['actual'],
            'saldo' => $sumaTotal - $acumulados['actual'],
            'FondoInicial' => $dObra['ImporteAnticipo'],
            'FondoApliacion_Reducion' => $acumAnticipos['anticiposConvenios'],
            'FondoRovolventeModificado' => $acumAnticipos['anticipos'],
            'amortizadoAnterior' => $amortizado['anterior'],
            'amortizado_la_fecha' => $amortizado['actual'],
            'sandoAnticipo' => $acumAnticipos['anticipos'] - $amortizado['actual'],
            'FechaMemoria' => $this->ferfunc->fechacascompleta($query['fecha']),
            'partidas_presupuestales' => $partidas_presupuestales,
            'residencia'=>$dResidencia,
            'acumulados_clave_presupuestal_anterior' => $acumulados_clave_presupuestal['anterior'],
            'acumulados_clave_presupuestal_actual' => $acumulados_clave_presupuestal['actual'],
            'retenciones_clave_presupuestal_anterior' => $retenciones_clave_presupuestal['anterior'],
            'retenciones_clave_presupuestal_actual' => $retenciones_clave_presupuestal['actual'],
            'importe_inicial_clave_presupuestal' => $importe_inicial_clave_presupuestal,
            'importe_ampliacion_clave_presupuestal' => $importe_ampliacion_clave_presupuestal,
        );
        return $retorno;
    }

    
    
    public function suma_retenciones($idMemoria) {
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row();
        $this->db->select_sum('retencion');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero < ' . $dMemoria->numero);
        $dSumaAnterior = $this->db->get_where('memMemorias')->row_array();
        $this->db->select_sum('retencion');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero <= ' . $dMemoria->numero);
        $dSumaActual = $this->db->get_where('memMemorias')->row_array();
        return array('retencionesAnteriores' => $dSumaAnterior['retencion'], 'retencionesActuales' => $dSumaActual['retencion']);
    }

    
     public function suma_retenciones_clave_presupuestal($idMemoria) {
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row();
        $this->db->select_sum('retencion');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero < ' . $dMemoria->numero);
        $this->db->where('idClavePresupuestal', $dMemoria->idClavePresupuestal);
        $dSumaAnterior = $this->db->get_where('memMemorias')->row_array();
        $this->db->select_sum('retencion');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero <= ' . $dMemoria->numero);
        $this->db->where('idClavePresupuestal', $dMemoria->idClavePresupuestal);
        $dSumaActual = $this->db->get_where('memMemorias')->row_array();
        return array('anterior' => $dSumaAnterior['retencion'], 'actual' => $dSumaActual['retencion']);
    }
    
    
    public function suma_ejercido($idMemoria) {
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row();
        $this->db->select_sum('importe');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero < ' . $dMemoria->numero);
        $dSumaAnterior = $this->db->get_where('memMemorias')->row_array();
        $this->db->select_sum('importe');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero <= ' . $dMemoria->numero);
        $dSumaActual = $this->db->get_where('memMemorias')->row_array();
        return array('anterior' => $dSumaAnterior['importe'], 'actual' => $dSumaActual['importe']);
    }

    public function suma_ejercido_clave_presupuestal($idMemoria) {
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row();
        $this->db->select_sum('importetotal');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero < ' . $dMemoria->numero);
        $this->db->where('idClavePresupuestal', $dMemoria->idClavePresupuestal);
        $dSumaAnterior = $this->db->get_where('memMemorias')->row_array();
        $this->db->select_sum('importetotal');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero <= ' . $dMemoria->numero);
        $this->db->where('idClavePresupuestal', $dMemoria->idClavePresupuestal);
        $dSumaActual = $this->db->get_where('memMemorias')->row_array();
        return array('anterior' => $dSumaAnterior['importetotal'], 'actual' => $dSumaActual['importetotal']);
    }
    
    
    public function importes_anticipos_memoria($idMemoria) {
        $this->db->select('clave_movimiento');
        $this->db->select('clave_movimiento_anticipo');
        $this->db->select('idObra');
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row_array();
//        print_r($dMemoria);
        $this->db->select('NumeroAnticipo');
        $this->db->where('id', $dMemoria['clave_movimiento_anticipo']);
        $dAnticipo = $this->db->get_where('movAnticipos')->row_array();

        if (!empty($dAnticipo)) {
            $this->db->select_sum('Importe');
            $this->db->where('idObra', $dMemoria['idObra']);
            $this->db->where('idSubContrato <> 0');
            $this->db->where('NumeroAnticipo <= ' . $dAnticipo['NumeroAnticipo']);
            $sumAnticiposConvenios = $this->db->get_where('movAnticipos')->row_array();
            $sumAnticiposConvenios = $sumAnticiposConvenios['Importe'];

            $this->db->select_sum('Importe');
            $this->db->where('idObra', $dMemoria['idObra']);
            $this->db->where('NumeroAnticipo <= ' . $dAnticipo['NumeroAnticipo']);
            $sumAnticipos = $this->db->get_where('movAnticipos')->row_array();
            $sumAnticipos = $sumAnticipos['Importe'];
        } else {
            $sumAnticiposConvenios = 0;
            $sumAnticipos = 0;
        }

        return array('anticiposConvenios' => $sumAnticiposConvenios, 'anticipos' => $sumAnticipos);
    }

    public function suma_amortizado($idMemoria) {
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row();
        $this->db->select_sum('amortizado');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero < ' . $dMemoria->numero);
        $dSumaAnterior = $this->db->get_where('memMemorias')->row_array();
        $this->db->select_sum('amortizado');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('numero <= ' . $dMemoria->numero);
        $dSumaActual = $this->db->get_where('memMemorias')->row_array();
        return array('anterior' => $dSumaAnterior['amortizado'], 'actual' => $dSumaActual['amortizado']);
    }

    
    public function suma_amortizado_clave_presupuestal($idMemoria) {
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row();
        $this->db->select_sum('amortizado');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('idClavePresupuestal', $dMemoria->idClavePresupuestal);
        $this->db->where('numero < ' . $dMemoria->numero);
        $dSumaAnterior = $this->db->get_where('memMemorias')->row_array();
        $this->db->select_sum('amortizado');
        $this->db->where('idObra', $dMemoria->idObra);
        $this->db->where('idClavePresupuestal', $dMemoria->idClavePresupuestal);
        $this->db->where('numero <= ' . $dMemoria->numero);
        $dSumaActual = $this->db->get_where('memMemorias')->row_array();
        return array('anterior' => $dSumaAnterior['amortizado'], 'actual' => $dSumaActual['amortizado']);
    }
    
    
    public function suma_importe_inicial_clave_presupuestal($idObra,$idClavePresupuestal) {
       
        
        $sql ='SELECT IF(ISNULL(SUM(catObrasRelFuentesFinanciamiento.`Importe`)),0,SUM(catObrasRelFuentesFinanciamiento.`Importe`)) as Importe
        FROM  catObrasRelClavesPresupuestales INNER JOIN catObrasRelFuentesFinanciamiento 
        ON  (`catObrasRelClavesPresupuestales`.id=catObrasRelFuentesFinanciamiento.`idRelClavePresupuestal`) 
        WHERE catObrasRelClavesPresupuestales.idObra=? and catObrasRelClavesPresupuestales.idClavePresupuestal=?'; 
        $query = $this->db->query($sql, array($idObra,$idClavePresupuestal));
        
        $Importe=0;
        if ($query->num_rows()>0){
            $aQuery=$query->row_array();
            $Importe=$aQuery['Importe'];
        }
        
        
       
        
        return $Importe;
    }
    
    
    public function suma_importe_ampliacion_clave_presupuestal($idObra,$idClavePresupuestal) {
       
       
        
        $sql ='SELECT IF(ISNULL(SUM(catSubContratosRelFuentesFinanciamiento.`Importe`)),0,SUM(catSubContratosRelFuentesFinanciamiento.`Importe`)) as Importe
        FROM  ((catSubContratosRelClavesPrespuestales INNER JOIN catSubContratosRelFuentesFinanciamiento 
        ON  (`catSubContratosRelClavesPrespuestales`.id=catSubContratosRelFuentesFinanciamiento.`idSubContratoRelClavePresupuestal`))
        inner join catObrasSubContratos 
        on catObrasSubContratos.id=catSubContratosRelClavesPrespuestales.idSubContrato)
        WHERE catObrasSubContratos.idObra=? and catSubContratosRelClavesPrespuestales.idClavePresupuestal=?'; 
        $query = $this->db->query($sql, array($idObra,$idClavePresupuestal));
        
        $Importe=0;
        if ($query->num_rows()>0){
            $aQuery=$query->row_array();
            $Importe=$aQuery['Importe'];
        }
        
        
        return $Importe;
    }

    
    
    
    public function importes_convenio_memoria($idMemoria) {
        $this->db->select('clave_movimiento', 'convenio');
        $this->db->select('idObra');
        $this->db->where('id', $idMemoria);
        $dMemoria = $this->db->get_where('memMemorias')->row_array();
//        print_r($dMemoria);
        if ($dMemoria['clave_movimiento'] > 0) {
            $this->db->select('Numero');
            $this->db->where('id', $dMemoria['clave_movimiento']);
            $dConvenio = $this->db->get_where('catObrasSubContratos')->row_array();

            if (!empty($dConvenio)) {
                $this->db->select_sum('Importe');
                $this->db->where('idObra', $dMemoria['idObra']);
                $this->db->where('TipoDeSubContrato <> 3');
                $this->db->where('Numero <= ' . $dConvenio['Numero']);
                $sumAmpliaciones = $this->db->get_where('catObrasSubContratos')->row_array();
                $sumAmpliaciones = $sumAmpliaciones['Importe'];

                $this->db->select_sum('Importe');
                $this->db->where('idObra', $dMemoria['idObra']);
                $this->db->where('TipoDeSubContrato', 3);
                $this->db->where('Numero <= ' . $dConvenio['Numero']);
                $sumReducciones = $this->db->get_where('catObrasSubContratos')->row_array();
                $sumReducciones = $sumReducciones['Importe'];
            } else {
                $sumAmpliaciones = 0;
                $sumReducciones = 0;
            }
        } else {
            $sumAmpliaciones = 0;
            $sumReducciones = 0;
        }

        return array('ampliaciones' => $sumAmpliaciones, 'reducciones' => $sumReducciones);
    }

    public function conceptos_memorias($idMemoria) {
        $sql = 'SELECT
    `memFacturasConceptos`.*,
    `memFacturas`.`Fecha`,
    `memFacturas`.`Folio`,
    `memProveedores`.`nombre` AS proveedor
FROM
    `memFacturas`
    INNER JOIN `memFacturasConceptos` 
        ON (`memFacturas`.`id` = `memFacturasConceptos`.`idFactura`)
    INNER JOIN `memMemorias` 
        ON (`memMemorias`.`id` = `memFacturas`.`idMemoria`)
    LEFT JOIN `memProveedores`
    ON (`memFacturas`.`idProveedor`=`memProveedores`.`id`)
	WHERE memMemorias.`id`=?;';
        $query = $this->db->query($sql, array($idMemoria));
        return $query;
    }

    
    
    public function facturas_memorias($idMemoria) {
        $sql = 'SELECT
    `memFacturas`.`importefacturado`,        
    `memFacturas`.`Fecha`,
    `memFacturas`.`Folio`,
    `memProveedores`.`nombre` AS proveedor
FROM
    `memFacturas`
    INNER JOIN `memMemorias` 
        ON (`memMemorias`.`id` = `memFacturas`.`idMemoria`)
    LEFT JOIN `memProveedores`
    ON (`memFacturas`.`idProveedor`=`memProveedores`.`id`)
	WHERE memMemorias.`id`=?;';
        $query = $this->db->query($sql, array($idMemoria));
        return $query;
    }

    
    
    public function conceptos_aprovisionamiento($idaprovisionamiento) {
          $sql ='select *from memAprovisionamientoConceptos where idAprovisionamiento=? order by id asc '; 
          $query = $this->db->query($sql, array($idaprovisionamiento));
          return $query;
    }
    
    public function conceptos_ordencompra($idOrdenCompra) {
          $sql ='select *from memOrdenCompraConceptos where idOrdenCompra=? order by id asc '; 
          $query = $this->db->query($sql, array($idOrdenCompra));
          return $query;
    }
    public function firma_funcionario($idFuncionario) {
        $this->db->where('id', $idFuncionario);
        $query = $this->db->get_where('memfuncionarios');
        if ($query->num_rows() > 0) {
            $dFuncionario = $query->row_array();
            $firma['nombre'] = $dFuncionario['nombre'];
            $firma['cargo'] = $dFuncionario['cargo'];
        } else {
            $firma['nombre'] = '';
            $firma['cargo'] = '';
        }
        return $firma;
    }

    public function cheques_memorias($idMemoria) {
        $sql = "SELECT
    `memDedChequeCancelado`.*
    , `memNominas`.`idMemoria`
FROM
    `memDedChequeCancelado`
    INNER JOIN `memNominas` 
        ON (`memDedChequeCancelado`.`idNomina` = `memNominas`.`id`)
WHERE (`memNominas`.`idMemoria` =?);";
        $query = $this->db->query($sql, array($idMemoria));
//        return $query;
        $output = array();
        foreach ($query->result() as $rCheque) {
            $output[$rCheque->idFactura][] = $rCheque;
        }
        return $output;
    }

    public function partida_presupuestal($id) {
        $query = $this->db->get_where("catPartidasPresupuestales", array("id" => $id));
        return $query;
    }

    public function memorias_nominas($idObra) {
        $this->db->where('idConcepto >=3 and idConcepto<=5');
        $this->db->where('idObra', $idObra);
        $query = $this->db->get_where('memMemorias');
        return $query;
    }

    
    public function listado_memorias_nominas_retenciones($fechaInicio,$fechaFinal) {
      // `catObras`.`id` = ? 
    // $idObra=9761;   
     $sql = 'SELECT 
    `memMemorias` . *,
    `catObras`.`OrdenTrabajo`,
    `catObras`.`Contrato`,
    `catObras`.`Normatividad`,
    `catObras`.`Obra`,
    `catContratistas`.`RazonSocial`,
    `catClavesPresupuestales`.`ClavePresupuestal`
  
        FROM
            (((`memMemorias`
                INNER JOIN
            `catObras` ON `memMemorias`.`idObra` = `catObras`.`id`) inner join
            catContratistas on catObras.idContratista=catContratistas.id)
            inner join
            catClavesPresupuestales on catClavesPresupuestales.id=memMemorias.idClavePresupuestal)
        WHERE
            `memMemorias`.`fecha` BETWEEN ? AND ? ';



   //(`memMemorias`.`fecha` >= '. $fechaInicio . ' AND  `memMemorias`.`fecha` <= '.$fechaFinal.')';

       $query = $this->db->query($sql,array($fechaInicio,$fechaFinal));
        return $query;
        
    }


    public function listado_memorias_nominas($fechaInicio,$fechaFinal){

          $sql = 'SELECT 
    `memMemorias` . *,
    `catObras`.`OrdenTrabajo`,
    `catObras`.`TipoAsignacion`,
    `catObras`.`Normatividad`,
    `catObras`.`Obra`,
    `catObras`.`idDepEjecutora`,
    `memMemorias`.`idClavePresupuestal`,
    `memMemorias`.`numero`,
    `memMemorias`.`importetotal`,
    `memMemorias`.`retencion`,
    `memMemorias`.`amortacum`,
    `memNominas`.`idResidencia`,
    `memNominas`.`periodo`,
    `memNominas`.`concepto`,
    `memNominas`.`fecha_nomina`,
    `memNominas`. `ISPT`,
    `memNominas`. `isr`,
    `memNominas`. `isr_asim`

        FROM
       `memMemorias`
        INNER JOIN `catObras` 
                ON `memMemorias`.`idObra` = `catObras`.`id`
        INNER JOIN `memNominas`
                ON `memNominas`.`idMemoria` = `memMemorias`.`id`
        WHERE
            `memMemorias`.`fecha` BETWEEN ? AND ? ';



             $query = $this->db->query($sql,array($fechaInicio,$fechaFinal));
        return $query;



    }
    
    public function facturas_proveedor($idMemoria = 0, $idProveedor = 0) {
        if ($idProveedor > 0)
            $this->db->where('idProveedor', $idProveedor);
        if ($idMemoria > 0)
            $this->db->where('idMemoria', $idMemoria);
        $query = $this->db->get_where('memFacturas');
        return $query;
    }

    public function get_facturas_obra($idObra) {
        $sql = 'SELECT
      `memFacturas`.*
    , `memMemorias`.`numero` AS memoria
    , `catObras`.`OrdenTrabajo` AS obra
    , `memProveedores`.`nombre` AS proveedor
    FROM
    `memProveedores`
    INNER JOIN `memFacturas` 
        ON (`memProveedores`.`id` = `memFacturas`.`idProveedor`)
    INNER JOIN `memMemorias` 
        ON (`memMemorias`.`id` = `memFacturas`.`idMemoria`)
    INNER JOIN `catObras` 
        ON (`catObras`.`id` = `memMemorias`.`idObra`)
        where memMemorias.idObra=? 
        Order by memMemorias.numero ASC;';
        $query = $this->db->query($sql, array($idObra));
        return $query;
    }
    
    /*public function get_facturas_obra_nominas($idObra) {
        $sql = 'SELECT
      `memFacturas`.*
    , `memMemorias`.`numero` AS memoria
    , `catObras`.`OrdenTrabajo` AS obra
    , `memProveedores`.`nombre` AS proveedor
    FROM
    `memProveedores`
    INNER JOIN `memFacturas` 
        ON (`memProveedores`.`id` = `memFacturas`.`idProveedor`)
    INNER JOIN `memMemorias` 
        ON (`memMemorias`.`id` = `memFacturas`.`idMemoria`)
    INNER JOIN `catObras` 
        ON (`catObras`.`id` = `memMemorias`.`idObra`)
        where memMemorias.idObra=? 
        Order by memMemorias.numero ASC;';
        $query = $this->db->query($sql, array($idObra));
        return $query;
    }*/

    public function recibo_nomina($idMemoria) {
        $sql = 'SELECT
    `memMemorias`.*
    , SUM(`memNominas`.`isr_asim`) AS `isr_asim`
    , `memSubTiposPago`.`Nombre` AS `subTipo`
    , `memTiposPago`.`Nombre` AS `tipo`
FROM
    `memNominas`
    INNER JOIN `memMemorias` 
        ON (`memNominas`.`idMemoria` = `memMemorias`.`id`)
    INNER JOIN `memSubTiposPago` 
        ON (`memMemorias`.`id_subtipopago` = `memSubTiposPago`.`id`)
    INNER JOIN `memTiposPago` 
        ON (`memMemorias`.`idConcepto` = `memTiposPago`.`id`)
WHERE (`memMemorias`.`id` =?);';
        $query = $this->db->query($sql, array($idMemoria));
        return $query;
    }
    
    public function recibo_materiales($idMemoria) {
        $sql = 'SELECT
    `memMemorias`.*
    , `memSubTiposPago`.`Nombre` AS `subTipo`
    , `memTiposPago`.`Nombre` AS `tipo`
FROM
    `memMemorias`
    INNER JOIN `memSubTiposPago` 
        ON (`memMemorias`.`id_subtipopago` = `memSubTiposPago`.`id`)
    INNER JOIN `memTiposPago` 
        ON (`memMemorias`.`idConcepto` = `memTiposPago`.`id`)
WHERE (`memMemorias`.`id` =?);';
        $query = $this->db->query($sql, array($idMemoria));
        return $query;
    }

    public function cotizaciones_orden_compra($idOrdenCompra) {
      $sql='SELECT DISTINCT memProveedoresConceptos.idCotizacion 
      FROM memOrdenCompraConceptos INNER JOIN memProveedoresConceptos ON 
      memOrdenCompraConceptos.idCotizacionConcepto = memProveedoresConceptos.`id`  WHERE idOrdenCompra=?';

       $query = $this->db->query($sql, array($idOrdenCompra));
        return $query;
    }
    
    
    public function aprivisionamientos_orden_compra($idOrdenCompra) {
      $sql='SELECT DISTINCT memAprovisionamiento.Folio
      FROM memOrdenCompraConceptos INNER JOIN memAprovisionamiento ON 
      memOrdenCompraConceptos.idAprovisionamiento = memAprovisionamiento.`id`  WHERE idOrdenCompra=?';

       $query = $this->db->query($sql, array($idOrdenCompra));
        return $query;
    }
    
    
    
     public function get_clave_presupuestal($idClavePresupuestal) {
        $this->db->select('*');
        $this->db->where("catClavesPresupuestales.id", $idClavePresupuestal);
        $query = $this->db->get('catClavesPresupuestales');
        $clave_presupuestal="";
        if ($query->num_rows()>0){
            $aQuery=$query->row_array();
            $clave_presupuestal=$aQuery["ClavePresupuestal"];
        }
        return $clave_presupuestal;      
    }
    
    public function  datos_orden_trabajo($id){
       /*$query = $this->db->get_where("saaArchivo", array("id" => $id));
        return $query; */
        $sql = 'SELECT * FROM `saaArchivo` 
                INNER JOIN `saaModalidad`
                ON `saaModalidad`.id = `saaArchivo`.`idModalidad`
                WHERE `saaArchivo`.id= ? ';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    public function  datos_reporte_estatus_archivo ($id, $idDireccion_responsable){
       /*$query = $this->db->get_where("saaArchivo", array("id" => $id));
        return $query; */
        /*$sql = "SELECT 
                `saaRel_Archivo_Preregistro`.*,
                `saaRel_Archivo_Documento`.`idTipoProceso`,
                `saaDocumentos`.`Nombre`

                FROM saaRel_Archivo_Preregistro
                INNER JOIN `saaRel_Archivo_Documento`
                ON saaRel_Archivo_Documento.id = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                                INNER JOIN saaDocumentos 
                                ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id
                                WHERE ((`saaRel_Archivo_Preregistro`.idArchivo= $id AND `saaRel_Archivo_Preregistro`.idDireccion_responsable =$idDireccion_responsable )OR
                                `saaRel_Archivo_Preregistro`.idArchivo= $id AND `saaRel_Archivo_Preregistro`.tipo_documento =4)
                                AND `saaRel_Archivo_Preregistro`.preregistro_aceptado = 0 AND `saaRel_Archivo_Preregistro`.`eliminacion_logica`=0
                                ORDER BY saaRel_Archivo_Documento.Ordenar ASC
                                            ";*/
        $sql = "SELECT 
                `saaRel_Archivo_Preregistro`.*,
                `saaRel_Archivo_Documento`.`idTipoProceso`,
                `saaDocumentos`.`Nombre`

                FROM saaRel_Archivo_Preregistro
                INNER JOIN `saaRel_Archivo_Documento`
                ON saaRel_Archivo_Documento.id = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                INNER JOIN saaDocumentos 
                ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id
                WHERE ((`saaRel_Archivo_Preregistro`.idArchivo= ? AND `saaRel_Archivo_Preregistro`.idDireccion_responsable =? ) )
                AND `saaRel_Archivo_Preregistro`.preregistro_aceptado = 0 AND `saaRel_Archivo_Preregistro`.`eliminacion_logica`=0
                ORDER BY saaRel_Archivo_Documento.Ordenar ASC";
        $query = $this->db->query($sql, array($id, $idDireccion_responsable));
        return $query;
    }
    
    public function  datos_reporte_preregistro ($id, $idDireccion_responsable){
       /*$query = $this->db->get_where("saaArchivo", array("id" => $id));
        return $query; */
        $sql = 'SELECT 
                `saaRel_Archivo_Preregistro`.*,
                `saaRel_Archivo_Documento`.`idTipoProceso`,
                `saaDocumentos`.`Nombre`

                FROM saaRel_Archivo_Preregistro
                INNER JOIN `saaRel_Archivo_Documento`
                ON saaRel_Archivo_Documento.id = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                                INNER JOIN saaDocumentos 
                                ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id
                                WHERE `saaRel_Archivo_Preregistro`.idArchivo= ? AND `saaRel_Archivo_Preregistro`.idDireccion_responsable =?
                                AND `saaRel_Archivo_Preregistro`.`eliminacion_logica`=0
                                ORDER BY  Ordenar ASC
                                            ';
        $query = $this->db->query($sql, array($id, $idDireccion_responsable));
        return $query;
    }
    
    
    public function  datos_reporte_preregistro_cid ($id){
       /*$query = $this->db->get_where("saaArchivo", array("id" => $id));
        return $query; */
        $sql = 'SELECT 
                `saaRel_Archivo_Preregistro`.*,
                `saaRel_Archivo_Documento`.`idTipoProceso`,
                `saaDocumentos`.`Nombre`

                FROM saaRel_Archivo_Preregistro
                INNER JOIN `saaRel_Archivo_Documento`
                ON saaRel_Archivo_Documento.id = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                                INNER JOIN saaDocumentos 
                                ON saaRel_Archivo_Documento.idDocumento = saaDocumentos.id
                                WHERE `saaRel_Archivo_Preregistro`.idArchivo= ? 
                                AND `saaRel_Archivo_Preregistro`.`eliminacion_logica`=0
                                ORDER BY idTipoProceso, Nombre ASC
                                            ';
        $query = $this->db->query($sql, array($id, $idDireccion_responsable));
        return $query;
    }
    
    
    
    
    public function get_direcciones_por_bloque($bloque){
        $sql = 'SELECT DISTINCT idDireccion, direccion  FROM saaArchivo WHERE idBloqueObra=?';
        $query = $this->db->query($sql, array($bloque));
        return $query;
    }
    
    
    public function  get_obras_por_direccion($direccion, $bloque){
        $sql = 'SELECT COUNT(id) AS numero
                FROM `saaArchivo`
                WHERE idDireccion =? AND idBloqueObra =? ';
        $query = $this->db->query($sql, array($direccion, $bloque));
        return $query;
    }
    
    public function total_obras_en_proceso($direccion, $bloque){
        $sql = 'SELECT COUNT(id) AS numero_proceso
                FROM `saaArchivo`
                WHERE idDireccion =?
                AND (EstatusObra = "En Proceso"  OR EstatusObra = "Jurídico")
                AND idBloqueObra = ?';
        $query = $this->db->query($sql, array($direccion, $bloque));
        return $query;
    }
    
    public function total_obras_terminadas($direccion, $bloque){
        $sql = 'SELECT COUNT(id) AS numero_terminadas
                FROM `saaArchivo`
                WHERE idDireccion =?
                AND (EstatusObra = "Terminada"  
                OR EstatusObra = "Terminación Anticipada" 
                OR  EstatusObra = "Terminación por Mutuo") 
                AND idBloqueObra = ?';
        $query = $this->db->query($sql, array($direccion, $bloque));
        return $query;
    }

        public function listado_estatus_archivos(){
        $sql = 'SELECT DISTINCT EstatusObra FROM saaArchivo';
        $query = $this->db->query($sql);
        return $query;
        
    }

    public function addw_ubicaciones() {
        
        
        $query = $this->db->get("saaUbicacionFisica");
        $addw = array();
        $addw[0] = "No disponible";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Columna . '.' . $row->Fila . '.' . $row->Caja . '.' . $row->Apartado . '.' . $row->Posicion ;
                //$addw[$row->id] = $row->Columna ;
            }
        }
        return $addw;
    }
    
    public function addw_ejercicio() {
        
        
        $query = $this->db->get("Ejercicios");
        $addw = array();
        $addw[0] = "No disponible";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Anyo ;
                //$addw[$row->id] = $row->Columna ;
            }
        }
        return $addw;
    }
    
    public function  datos_relacion($id){
        $sql = 'SELECT * FROM saaRel_TipoProceso_UbicacionFisica 
                
                WHERE saaRel_TipoProceso_UbicacionFisica.id= ? ';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function datos_obra ($id){
        $sql = 'SELECT * FROM saaArchivo 
                
                WHERE saaArchivo.id= ? ';
        $query = $this->db->query($sql, array($id));
        return $query;
    }

        public function addw_relacion() {
        
        
        $query = $this->db->get("saaRel_TipoProceso_UbicacionFisica");
        $addw = array();
        $addw[0] = "No disponible";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Documentos;
                //$addw[$row->id] = $row->Columna ;
            }
        }
        return $addw;
    }
    
    public function ot_preregistradas($id){
        $this->db->select("idArchivo");
        $this->db->distinct();
        $this->db->where('idDireccion_responsable', $ot); 
        $this->db->where('eliminacion_logica', 0);
        return $this->db->get("saaRel_Archivo_Preregistro"); 
        
    }
    
    public function documentos_preregistro_ot() {
        
    }
    
    public function traer_datos($id){
        
       
        $this -> db -> select ( 'ut.*, 
                r.id,
                r.idIngreso,
                r.Bloques,
                r.Folio_Inicial,
                r.Folio_Final,
                i.idArchivo,
                i.clasificador,
                i.legajos,
                a.*' ); 
        $this -> db -> from ( 'saaConcentracion_UbicacionesTipos AS ut' ); 
        $this -> db -> join ( 'saaConcentracion_Registros AS r' ,  'r.idUbicacion = ut.id' ); 
        $this -> db -> join ( 'saaConcentracion_Ingreso AS i' ,  'i.id = r.idIngreso' ); 
        $this -> db -> join ( 'saaArchivo as a' ,  'a.id = i.idArchivo' ); 
        $this -> db -> where ('r.id', $id);
        $query = $this -> db -> get( ); 
        
        echo $query->num_rows();
        return $query;
    }

    public function log_new($cambios) {
            $this->load->model("control_usuarios_model");
            return $this->control_usuarios_model->log_new($cambios);
    }
    
}
