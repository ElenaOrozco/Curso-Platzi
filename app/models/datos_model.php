<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function datos_archivo_insert($data) {
        
        $this->db->insert('saaArchivo', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaArchivo', 'Data' => $data, 'id' => $registro));
        }
        
        //$this->db->db_debug = $oldv; 

        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $registro);
        }
        
    }
    
    public function historico_archivo($idArchivo){
        $this->db->where("idArchivo", $idArchivo);
        $this->db->order_by("id" , "DESC");        
        return $this->db->get_where("saaHistorialBloque");
    }
    
    public function listado_historico_bloque(){
         return $this->db->get("saaHistorialBloque");
    }

    public function listado() {
        $this->db->where("eliminacion_logica", 0);
        $this->db->order_by("id" , "DESC");        
        return $this->db->get_where("saaArchivo");
    }
    
    public function listado_736() {
        $sql= 'SELECT * FROM `saaArchivo`
                WHERE
                (idBloqueObra = 1 OR idBloqueObra = 2 OR idBloqueObra = 3)
                AND eliminacion_logica = 0
                ORDER BY id DESC';
        $query = $this->db->query($sql);
        return $query;
    }
    
     public function listado_tx() {
        $sql= 'SELECT * FROM `saaArchivo`
                WHERE
                (idBloqueObra = 3)
                AND eliminacion_logica = 0
                ORDER BY id DESC';
        $query = $this->db->query($sql);
        return $query;
    }
    
    
    public function listado_736_captura() {
        $sql= 'SELECT DISTINCT `saaArchivo`.id ,
                `saaArchivo`.*
                FROM `saaArchivo`
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaArchivo`.id = `saaRel_Archivo_Documento`.`idArchivo`
                WHERE
                (idBloqueObra = 1 OR idBloqueObra = 2 OR idBloqueObra = 3)
                AND eliminacion_logica = 0 
                AND
                (`saaRel_Archivo_Documento`.copia =1 || `saaRel_Archivo_Documento`.`original_recibido` =1)
                ORDER BY `saaArchivo`.id DESC';
        $query = $this->db->query($sql);
        return $query;
    }
    
    
    
    
   


    public function get_Tipos_Arch(){
        return $this->db->get("saaTipo_archivo");
    }
    public function get_Tipos_Arch_select(){
        //$this->db->select("id", "Tipo_archivo");
        $Tipos_Arch = $this->db->get("saaTipo_archivo");
        $tpa = array();
        if ($Tipos_Arch->num_rows() > 0) {
             foreach ($Tipos_Arch->result() as $rTPArchivo) {
                 $tpa["$rTPArchivo->id"] = $rTPArchivo->Tipo_archivo;
             }
        }
        return $tpa;
    }
    
    public function get_usuarios(){
        $usrs = $this->db->get("catUsuarios");
        $tpa = array();
        if ($usrs->num_rows() > 0) {
             foreach ($usrs->result() as $usr) {
                 $tpa["$usr->id"] = $usr->Nombre;
             }
        }
        return $tpa;
    }
    
    public function get_Tam_Norm(){
        return $this->db->get("saaTamano_normaliza");
    }
    public function get_Tam_Norm_select(){
        $tam_arch = $this->db->get("saaTamano_normaliza");
        $tama = array();
        if ($tam_arch->num_rows() > 0) {
             foreach ($tam_arch->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Tamano;
             }
        }
        return $tama;
    }
    
    
    public function get_Tipos_uni(){
        return $this->db->get("saaTipo_unidad");
    }
    public function get_Tipos_uni_select(){
        $tpus = $this->db->get("saaTipo_unidad");
        $tama = array();
        if ($tpus->num_rows() > 0) {
             foreach ($tpus->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Unidad;
             }
        }
        return $tama;
    }
    
    public function get_Titularidad_id($idT = null){
        $this->db->where("id", $idT);
        return $this->db->get("saaTitularidad");
    }
    
    public function get_Titularidades(){
        return $this->db->get("saaTitularidad");
    }
    public function get_Titularidades_select(){
        $titus = $this->db->get("saaTitularidad");
        $tama = array();
        if ($titus->num_rows() > 0) {
             foreach ($titus->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Titulo;
             }
        }
        return $tama;
    }
    
    public function get_SubDocs_select(){
        $subdocs = $this->db->get("saaSubDocumentos");
        $tama = array();
        if ($subdocs->num_rows() > 0) {
             foreach ($subdocs->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Nombre;
             }
        }
        return $tama;
    }
    
    public function get_SubDocs_idDoc_select($idT = null){
        $this->db->where('idDocumento', $idT);
        $subdocs = $this->db->get("saaSubDocumentos");
        $tama = array();
        if ($subdocs->num_rows() > 0) {
             foreach ($subdocs->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Nombre;
             }
        }
        return $tama;
    }
    
    
    public function get_Direcciones(){
        return $this->db->get("Direcciones");
    }
    
    
    public function get_Direcciones_SIOP(){
        return $this->db->get("catDirecciones");
    }
    
     public function get_Direcciones_select(){
        $dirs = $this->db->get("Direcciones");
        $tama = array();
        if ($dirs->num_rows() > 0) {
             foreach ($dirs->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Nombre;
             }
        }
        return $tama;
    }
    
    public function get_Modalidades(){
        return $this->db->get("saaModalidad");
    }
    public function get_Modalidades_select(){
        $mod = $this->db->get("saaModalidad");
        $tama = array();
        if ($mod->num_rows() > 0) {
             foreach ($mod->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Modalidad;
             }
        }
        return $tama;
    }
        
    public function get_Estatuss(){
        return $this->db->get("sisEstatus");
    }
    public function get_Estatus_select(){
        $estat = $this->db->get("sisEstatus");
        $tama = array();
        if ($estat->num_rows() > 0) {
             foreach ($estat->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Nombre;
             }
        }
        return $tama;
    }
        
    public function get_Ejercicio(){
        return $this->db->get("Ejercicios");
    }
     public function get_Ejercicio_select(){
        $ejer = $this->db->get("Ejercicios");
        $tama = array();
        if ($ejer->num_rows() > 0) {
             foreach ($ejer->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Anyo;
             }
        }
        return $tama;
    }
    
    public function get_procesos(){
        $this->db->order_by("Ordenar", "asc");
        return $this->db->get("saaTipoProceso");
    }
    
     public function get_procesos_archivo($id){
        $sql= 'SELECT DISTINCT `saaRel_Archivo_Documento`.idTipoProceso FROM `saaRel_Archivo_Documento`
                WHERE idArchivo = ?';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function  preregistro_realizado($idArchivo){
        $sql= 'SELECT * FROM 
                `saaRel_Archivo_Preregistro`
                WHERE idArchivo = ?
                AND eliminacion_logica= 0';
        $query = $this->db->query($sql, array($idArchivo));
        return $query;
    }

        public function get_procesos_archivo_integracion($id){
        $sql= 'SELECT * FROM `saaHistorialBloque`
                WHERE idArchivo = ? AND Estatus = 70';
        $query = $this->db->query($sql, array($id));
        return $query;
    }
    
    public function get_bloques(){
        $this->db->order_by("id", "asc");
        return $this->db->get("saaBloqueObras");
    }
    
    
    public function get_procesos_select(){
        $estat = $this->db->get("saaTipoProceso");
        $tama = array();
        if ($estat->num_rows() > 0) {
             foreach ($estat->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->id"] = $rTPArchivo->Nombre;
             }
        }
        return $tama;
    }
    
    //#MAOC
    public  function get_Estatus_relacion($idDocumento){
        
        $this->db->where("idDocumento", $idDocumento);
        return $this->db->get("saaRel_Archivo_Documento");
    }
    
    public  function get_estatus_archivo($idDocumento){
        
        $sql ='SELECT  DISTINCT  `saaRel_Archivo_Documento`.Estatus , `sisEstatus`.`Nombre`
                FROM `saaRel_Archivo_Documento`
                INNER JOIN `sisEstatus`
                ON `sisEstatus`.`Estatus` = `saaRel_Archivo_Documento`.`Estatus`';
        $query = $this->db->query($sql);
        return $query;
        
    }
    
    public function listado_estatus_archivos(){
        $sql = 'SELECT  DISTINCT  `saaRel_Archivo_Documento`.Estatus , `sisEstatus`.`Nombre`
                FROM `saaRel_Archivo_Documento`
                INNER JOIN `sisEstatus`
                ON `sisEstatus`.`Estatus` = `saaRel_Archivo_Documento`.`Estatus`';
        $query = $this->db->query($sql);
        return $query;
        
    }

    

    public function addw_relacion() {
        $query = $this->db->get("saaRel_Archivo_Documento");
        $addw = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->id] = $row->Estatus;
            }
        }
        return $addw;
    }
    
    public function addw_Estatus_Bloque() {
        $this->db->where("Modulo = 1");
        $query = $this->db->get("sisEstatus");
        $addw = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[$row->Estatus] = $row->Nombre;
            }
        }
        return $addw;
    }


    public function get_subproceso_id($id_proceso){
        $this->db->select('saaSubTipoProceso.*')
            ->join('saaDocumentos', 'saaDocumentos.idSubTipoProceso=saaSubTipoProceso.id')
            ->group_by('saaSubTipoProceso.id');
        $this->db->where("idTipoProceso", $id_proceso);
        return $this->db->get("saaSubTipoProceso");
    }
    
    public function get_subprocesos(){
        return $this->db->get("saaSubTipoProceso");
    }
    public function get_subprocesos_select(){
        $estat = $this->db->get("saaSubTipoProceso");
        $tama = array();
        if ($estat->num_rows() > 0) {
             foreach ($estat->result() as $rTPArchivo) {
                 $tama["$rTPArchivo->idTipoProceso"] = $rTPArchivo->Nombre;
             }
        }
        return $tama;
    }
    
    public function get_relacion_id_archivo($idArchi = null){
        $this->db->where("idArchivo", $idArchi);
        return $this->db->get("saaRel_Archivo_Documento");
    }
    
    public function get_Ejercicio_id($idejer = null){
        $this->db->where("id", $idejer);
        return $this->db->get("Ejercicios");
    }
    
    public function alta($data) {
        $this->db->insert('saaArchivo', $data);
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();

       
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaArchivo', 'Data' => $data, 'id' => $registro));
        }
        
        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "id_registro" => $registro);
        }
    }
        
    public function newArchivo($data = null){
        $this->db->insert('saaArchivo', $data);
        $registro = $this->db->insert_id();
        $aff = $this->db->affected_rows();
        $registro = $this->db->insert_id();
        
        
         if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaArchivo', 'Data' => $data, 'id' => $registro));
        }
        
        if($aff < 1) {
            return false;
        } else {
            return $registro;
        }
    }
    
    public function updateArchivo($data = null, $id = null){
        $this->log_save(array('Tabla' => 'saaArchivo', 'Data' => $data, 'id' => $id));
        $this->db->update('saaArchivo', $data, array("id" => $id));
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    public function crear_Ubicaciones_fisicas_individuales($data = null){
        $this->db->insert('saaArea_ubicacion_fisica', $data);
        $aff = $this->db->affected_rows();
        
        
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaArea_ubicacion_fisica', 'Data' => $data, 'id' => $registro));
        }
        
        
        if($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    public function update_Ubicaciones_fisicas_individuales($data = null, $id = null){
        $this->log_save(array('Tabla' => 'saaArea_ubicacion_fisica', 'Data' => $data, 'id' => $id));
        
        $this->db->update('saaArea_ubicacion_fisica', $data, array("id" => $id));
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    
    
    public function get_ArchivoUbicaFisica($id_archivo = null){
        $this->db->select('saaArea_ubicacion_fisica.*')
            ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.id=saaArea_ubicacion_fisica.idRel_Archivo_Documento')
            ->group_by('saaArea_ubicacion_fisica.id');
        $this->db->where("saaRel_Archivo_Documento.idArchivo", $id_archivo);
        return $this->db->get('saaArea_ubicacion_fisica', 1);
    }
    
    
    
    public function get_rel(){
        return $this->db->get("saaRel_Plantilla_Documento");
    }
    public function update_rel($data = null, $id = null){
        $this->log_save(array('Tabla' => 'saaRel_Plantilla_Documento', 'Data' => $data, 'id' => $id));
        $this->db->update('saaRel_Plantilla_Documento', $data, array("id" => $id));
        $aff = $this->db->affected_rows();

        if($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    
    
    
    public function get_Documentos_totales(){
        return $Tipos_Arch = $this->db->get("saaDocumentos");
    }
    
    public function get_Documentos_totales_por_plantilla($id_plantilla = null){
        
        if($id_plantilla){
            $this->db->select('saaDocumentos.*, saaRel_Plantilla_Documento.ordenar ')
                ->join('saaRel_Plantilla_Documento', 'saaRel_Plantilla_Documento.idDocumento=saaDocumentos.id')
                ->join('saaPlatillas', 'saaPlatillas.id=saaRel_Plantilla_Documento.idPlantilla')
                ->group_by('saaRel_Plantilla_Documento.id');
            $this->db->where("saaRel_Plantilla_Documento.idPlantilla", $id_plantilla);
            return $this->db->get('saaDocumentos');

        }else{
            return false;
        }
        
    }
    
    public function get_info_docs_subtipo($id_archivo = null, $id_subtipo = null){
        if($id_subtipo){
            $this->db->select('saaDocumentos.*, saaRel_Archivo_Documento.Ordenar ')
                ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idDocumento=saaDocumentos.id')
                ->group_by('saaDocumentos.id');
            $this->db->where("saaRel_Archivo_Documento.idArchivo", $id_archivo);
            $this->db->where("saaDocumentos.idSubTipoProceso", $id_subtipo);
            $this->db->order_by("saaRel_Archivo_Documento.Ordenar", "adc");
            return $this->db->get('saaDocumentos');
        }else{
            return false;
        }       
        
    }
    public  function buscar_area($idArea){
        $this->db->where('id',$idArea);
        $query=  $this->db->get_where('saaAreasUbicacionTrabajo');
        

        $row = $query->row_array();

        
        return $row;
    }
    
    public function insert_plantilla_en_Relaciones($idDocumento = null, $id_new_archivo = null, $ordenar = null){
        
        $sql = 'SELECT  saaSubTipoProceso.* FROM (saaDocumentos inner join saaSubTipoProceso 
            on saaDocumentos.idSubTipoProceso = saaSubTipoProceso.id )
          Where saaDocumentos.id= ?';
        $query = $this->db->query($sql,array($idDocumento));
       
        
        
        if ($query->num_rows()>0){
         $aquery=$query->row_array();
            $data  = array(
                'idTipoProceso' => $aquery["idTipoProceso"],
                'idSubTipoProceso' => $aquery["id"],
                'idArchivo' => $id_new_archivo,
                'idDocumento' => $idDocumento,
                'ordenar' => $ordenar,
                'Estatus' => 10
            );
            $this->db->insert('saaRel_Archivo_Documento', $data);
            $aff = $this->db->affected_rows();
            
           
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();

            if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data, 'id' => $registro));
            }
            
            
            if($aff < 1) {
                return false;
            } else {
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function documentos_idP_json($term = null, $id = null, $id_Plantilla = null){
        $aRow = array();
        $return_arr = array();
        if (!empty($term) || !empty($id)){
            if ($id > 0){
                $this->db->select("saaDocumentos.id, saaDocumentos.Nombre")
                    ->join('saaRel_Plantilla_Documento', 'saaRel_Plantilla_Documento.idDocumento = saaDocumentos.id')
                    ->join('saaPlatillas', 'saaPlatillas.id = saaRel_Plantilla_Documento.idPlantilla')
                    ->group_by('saaDocumentos.id');
                $this->db->where("saaDocumentos.id", $id);
                $this->db->where("saaRel_Plantilla_Documento.idPlantilla", $id_Plantilla);
                $query = $this->db->get("saaDocumentos", 100);
            } else {
                $this->db->select("saaDocumentos.id, saaDocumentos.Nombre")
                    ->join('saaRel_Plantilla_Documento', 'saaRel_Plantilla_Documento.idDocumento = saaDocumentos.id')
                    ->join('saaPlatillas', 'saaPlatillas.id = saaRel_Plantilla_Documento.idPlantilla')
                    ->group_by('saaDocumentos.id');
                $this->db->where("saaRel_Plantilla_Documento.idPlantilla", $id_Plantilla);
                $this->db->like("saaDocumentos.Nombre", $term);
                $query = $this->db->get("saaDocumentos",100);
            }
            
            if ($query->num_rows() > 0 ){
                foreach ($query->result() as $row ){
                    $aRow["id"] = $row->id;
                    $aRow["text"] = $row->Nombre;
                    $return_arr["results"][] = $aRow;
                }
            }else{
                $aRow["id"] = "sindoc";
                $aRow["text"] = 'No se encontraron Documentos';
                $return_arr["results"][] = $aRow;
            }
        }  else {
            $aRow["id"] = "";
            $aRow["text"] = "";
            $return_arr["results"][] = $aRow;
        }
        return $return_arr;
    }
    
    public function documentos_json($term = null, $id = null){
        $aRow = array();
        $return_arr = array();
        if (!empty($term) || !empty($id)){
            if ($id > 0){
                $this->db->select("id, Nombre");
                $query = $this->db->get_where("saaDocumentos",array("id" => $id),100);
            } else {
                $this->db->select("id, Nombre");
                $this->db->like("Nombre", $term);
                $query = $this->db->get("saaDocumentos",100);
            }
            if ($query->num_rows() > 0 ){
                foreach ($query->result() as $row ){
                    $aRow["id"] = $row->id;
                    $aRow["text"] = $row->Nombre;
                    $return_arr["results"][] = $aRow;
                }
            }else{
                $aRow["id"] = "sindoc";
                $aRow["text"] = 'No se encontraron Documentos';
                $return_arr["results"][] = $aRow;
            }
        }  else {
            $aRow["id"] = "";
            $aRow["text"] = "";
            $return_arr["results"][] = $aRow;
        }
        return $return_arr;
    }
        
    public function docs_id($id = null){
        $this->db->where("id", $id);
        $query = $this->db->get('saaDocumentos');
       
        if ($query->num_rows() > 0 ){
            foreach ($query->result() as $row ){
                $addw = $row;
            }
            return $addw;     
        }
        return false;              
    }
    public function doc_id($id = null){
        $this->db->where("id", $id);
        $query = $this->db->get('saaDocumentos');
        if ($query->num_rows() > 0 ){
            return $query;     
        }
        return false;              
    }
        
    public function subdocs_idDoc($idDoc = null){
        $this->db->where("idDocumento", $idDoc);
        $query = $this->db->get('saaSubDocumentos');
        if ($query->num_rows() > 0 ){
            return true;     
        }
        return false;              
    }
    
    public function crear_relacion($idArchi = null, $iddoc = null){
        $data_adjunto = array(
            'idDocumento' => $iddoc,
            'idArchivo' => $idArchi,
            'Estatus' => 0
        );
        $this->db->insert('saaRel_Archivo_Documento', $data_adjunto);
        $aff = $this->db->affected_rows();
        $idRegistro = $this->db->insert_id();
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data_adjunto, 'id' => $registro));
        }
        
        if ($aff < 1) {
            return 0;
        } else {
            return $idRegistro;
        }
    }
      
    public function agregar_ubicacion($data_adjunto = null, $idrel = null){
        $this->db->insert('saaArea_ubicacion_fisica', $data_adjunto);
        $aff = $this->db->affected_rows();
        $idRegistro = $this->db->insert_id();
        
        $registro = $this->db->insert_id();
        
        if (!empty($registro)) {
                $this->log_new(array('Tabla' => 'saaArea_ubicacion_fisica', 'Data' => $data_adjunto, 'id' => $registro));
        }

        
        
        if ($aff < 1) {
            return 0;
        } else {
            return $idRegistro;
        }
    }
       
    public function verifica_relacion($idArchi = null, $iddoc = null){
        $this->db->select("id");
        $this->db->where("id", $iddoc);
        $this->db->where("idArchivo", $idArchi);
        $idRel = $this->db->get('saaRel_Archivo_Documento');
        if($idRel->num_rows() > 0){
            foreach($idRel->result() as $idRelid){
               return $idRelid->id;
            }
        }else{
            return false;
        }
    }
    
    public function verifica_ubicacion_global($idArchi = null){
        $this->db->where("id", $idArchi);
        $archivo = $this->db->get('saaArchivo');
        if($archivo->num_rows() > 0){
            return $archivo;
        }else{
            return false;
        }
    }
    public function get_Archivo_id($idArchi = null){
        $this->db->where("id", $idArchi);
        $archivo = $this->db->get('saaArchivo');
        if($archivo->num_rows() > 0){
            return $archivo;
        }else{
            return false;
        }
    }
    
    public function get_estatus_rel_id($id = null){
        $this->db->where("id", $id);
        $query = $this->db->get('saaRel_Archivo_Documento');
        if($query->num_rows() > 0){
               return $query;
        }else{
            return false;
        }
    }
    
    public function get_id_estatus($id = null){
        $this->db->where("id", $id);
        $query = $this->db->get('sisEstatus');
        if($query->num_rows() > 0){
            foreach($query->result() as $id){
               return $id->Estatus;
            }
        }else{
            return 0;
        }
    }
    
    public function get_estatus_Est($Estatus = null){
        $this->db->where("Estatus", $Estatus);
        $query = $this->db->get('sisEstatus');
        if($query->num_rows() > 0){
            foreach($query->result() as $id){
               return $id->id;
            }
        }else{
            return false;
        }
    }
    public function get_estatus_Est_all($Estatus = null){
        $this->db->where("Estatus", $Estatus);
        $query = $this->db->get('sisEstatus');
        if($query->num_rows() > 0){
            return $query;
        }else{
            return 0;
        }
    }
    
    public function getUbicacionFisica($id = null){
        $this->db->where("idRel_Archivo_Documento", $id);
        $query = $this->db->get('saaArea_ubicacion_fisica');
       
        if ($query->num_rows() > 0 ){
            return $query;     
        }
        return false;              
    }
    
    public function update_relacion($data_adjunto = null, $idrel = null){
        
        $this->log_save(array('Tabla' => 'saaRel_Archivo_Documento', 'Data' => $data_adjunto, 'id' => $idrel));
        
        $this->db->update('saaRel_Archivo_Documento', $data_adjunto, array("id" => $idrel));
        $aff = $this->db->affected_rows();
        if ($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    public function get_tipo_plantilla($modalidad = null, $normatividad = null){
        $this->db->where("idModalidad", $modalidad);
        $this->db->where("Normatividad", $normatividad);
        $query = $this->db->get('saaPlatillas');
        if ($query->num_rows() > 0 ){
            return $query;
        }
        return false;
    }
    
    public function agregar_documento_digital($data_adjunto = null, $idEjercicio = null){
       
        switch ($idEjercicio) {
            case 2010:
                $this->db->insert('saaDocumentosAnexos_2010', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2011:
                $this->db->insert('saaDocumentosAnexos_2011', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2012:
                $this->db->insert('saaDocumentosAnexos_2012', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2013:
                $this->db->insert('saaDocumentosAnexos_2013', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2014:
                $this->db->insert('saaDocumentosAnexos_2014', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2015:
                $this->db->insert('saaDocumentosAnexos_2015', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2016:
                $this->db->insert('saaDocumentosAnexos_2016', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2017:
                $this->db->insert('saaDocumentosAnexos_2017', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
            case 2018:
                $this->db->insert('saaDocumentosAnexos_2018', $data_adjunto);
                $aff = $this->db->affected_rows();
                break;
        }
        if($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    public  function get_Historia_tpDoc($id_archivo = null, $idTpDoc = null, $idEjercicio = null){
        
        $Anyo_Anexo = 'saaDocumentosAnexos_'.$idEjercicio;
        
        $this->db->select("saaDocumentos.*, $Anyo_Anexo.*, $Anyo_Anexo.id as idDocAdj, saaRel_Archivo_Documento.*")
            ->join("saaRel_Archivo_Documento", "saaRel_Archivo_Documento.idArchivo = saaArchivo.id")
            ->join("$Anyo_Anexo", "$Anyo_Anexo.idRel_Archivo_Documento = saaRel_Archivo_Documento.id")
            ->group_by("$Anyo_Anexo.id");
        $this->db->where("saaArchivo.id", $id_archivo);
        $this->db->where("saaDocumentos.id", $idTpDoc);
        $this->db->where("$Anyo_Anexo.eliminacion_logica", 0);
        $reult = $this->db->get("saaDocumentos");
                
    }
    
    function get_proceso_suproc($idTpDoc = null){
        
        $this->db->select('saaDocumentos.Nombre as NomDoc, saaSubTipoProceso.id as idSubTipPro, saaSubTipoProceso.Nombre as NomSubTP, saaTipoProceso.id as idTipPro, saaTipoProceso.Nombre as NomTP')
            ->join('saaSubTipoProceso', 'saaSubTipoProceso.id = saaDocumentos.idSubTipoProceso')
            ->join('saaTipoProceso', 'saaTipoProceso.id = saaSubTipoProceso.idTipoProceso')
            ->group_by('saaDocumentos.id');
        $this->db->where("saaDocumentos.id", $idTpDoc);
        $query = $this->db->get("saaDocumentos");
        
        if($query->num_rows() > 0){
            $idSP = 0; $NSP = ''; $idP = 0; $NP = '';
            foreach ($query->result() as $Procesos){
                $NomDoc = $Procesos->NomDoc;
                $idSP = $Procesos->idSubTipPro;
                $NSP = $Procesos->NomSubTP;
                $idP =$Procesos->idTipPro;
                $NP =$Procesos->NomTP;
            }
            return array($idSP, $NSP, $idP, $NP, $NomDoc);
        }
        return false;
        
    }
    
    public  function get_Historia($id_archivo = null){
        $darch = $this->datos_Archivo($id_archivo)->row();
        $ejer = $this->get_Ejercicio_id($darch->idEjercicio);
        $ejercicios = $ejer->row();
        
        switch ($ejercicios->Anyo) {
            case 2010:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2010.*, saaDocumentosAnexos_2010.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2010', 'saaDocumentosAnexos_2010.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2010.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2010.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2011:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2011.*, saaDocumentosAnexos_2011.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2011', 'saaDocumentosAnexos_2011.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2011.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2011.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2012:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2012.*, saaDocumentosAnexos_2012.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2012', 'saaDocumentosAnexos_2012.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2012.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2012.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2013:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2013.*, saaDocumentosAnexos_2013.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2013', 'saaDocumentosAnexos_2013.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2013.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2013.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2014:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2014.*, saaDocumentosAnexos_2014.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2014', 'saaDocumentosAnexos_2014.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2014.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2014.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2015:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2015.*, saaDocumentosAnexos_2015.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2015', 'saaDocumentosAnexos_2015.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2015.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2015.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2016:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2016.*, saaDocumentosAnexos_2016.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2016', 'saaDocumentosAnexos_2016.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2016.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2016.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2017:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2017.*, saaDocumentosAnexos_2017.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2017', 'saaDocumentosAnexos_2017.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2017.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2017.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2018:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2018.*, saaDocumentosAnexos_2018.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2018', 'saaDocumentosAnexos_2018.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2018.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaDocumentosAnexos_2018.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            default: return false;
        }
        return $reult;
    }
    
    public  function get_Historia_idtpdoc_new($id_archivo = null, $idTpDoc = null, $idEjercicio = null){
        $Estim = false; $Prorr = false;
        $ejer = $this->get_Ejercicio_id($idEjercicio);
        $ejercicios = $ejer->row();
        
        $Anyo_Anexo = 'saaDocumentosAnexos_'.$ejercicios->Anyo;
        $this->db->select("saaArchivo.*, $Anyo_Anexo.*, $Anyo_Anexo.id as idDocAdj, saaRel_Archivo_Documento.*")
            ->join("saaRel_Archivo_Documento", "saaRel_Archivo_Documento.idArchivo = saaArchivo.id")
            ->join("$Anyo_Anexo", "$Anyo_Anexo.idRel_Archivo_Documento = saaRel_Archivo_Documento.id")
            ->group_by("$Anyo_Anexo.id");
        $this->db->where("saaArchivo.id", $id_archivo);
        $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
        $this->db->where("$Anyo_Anexo.eliminacion_logica", 0);
        $this->db->order_by("$Anyo_Anexo.Numero_Estimacion", "asc");
        $this->db->order_by("$Anyo_Anexo.Numero_Prorroga", "asc");
        $reult = $this->db->get('saaArchivo');
            if($reult->num_rows() > 0){
                foreach($reult->result() as $docsTp){
                    if($docsTp->Es_Estimacion == 1){
                        $Estim = true;
                        //$Prorr = false;
                    }
                    if($docsTp->Es_Prorroga == 1){
                        $Prorr = true;
                        //$Estim = false;
                    }
                }
            }
        return array($reult, $Estim, $Prorr);
    }
     
    public  function get_Historia_idtpdoc($id_archivo = null, $idTpDoc = null){
        $darch = $this->datos_Archivo($id_archivo)->row();
        $ejer = $this->get_Ejercicio_id($darch->idEjercicio);
        $ejercicios = $ejer->row();
        $Estim = false; $Prorr = false;
        
        switch ($ejercicios->Anyo) {
            case 2010:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2010.*, saaDocumentosAnexos_2010.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2010', 'saaDocumentosAnexos_2010.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2010.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2010.eliminacion_logica", 0);
                $this->db->order_by("saaDocumentosAnexos_2010.Numero_Estimacion", "asc");
                $this->db->order_by("saaDocumentosAnexos_2010.Numero_Prorroga", "asc");
                $reult = $this->db->get('saaArchivo');
                
                if($reult->num_rows() > 0){
                    foreach($reult->result() as $docsTp){
                        if($docsTp->Es_Estimacion == 1){
                            $Estim = true;
                            //$Prorr = false;
                        }
                        if($docsTp->Es_Prorroga == 1){
                            $Prorr = true;
                            //$Estim = false;
                        }
                    }
                }
                
                break;
            case 2011:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2011.*, saaDocumentosAnexos_2011.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2011', 'saaDocumentosAnexos_2011.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2011.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2011.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2012:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2012.*, saaDocumentosAnexos_2012.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2012', 'saaDocumentosAnexos_2012.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2012.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2012.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2013:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2013.*, saaDocumentosAnexos_2013.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2013', 'saaDocumentosAnexos_2013.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2013.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2013.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2014:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2014.*, saaDocumentosAnexos_2014.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2014', 'saaDocumentosAnexos_2014.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2014.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2014.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2015:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2015.*, saaDocumentosAnexos_2015.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2015', 'saaDocumentosAnexos_2015.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2015.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2015.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2016:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2016.*, saaDocumentosAnexos_2016.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2016', 'saaDocumentosAnexos_2016.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2016.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2016.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2017:
                $this->db->select('saaArchivo.*, saaDocumentosAnexos_2017.*, saaDocumentosAnexos_2017.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2017', 'saaDocumentosAnexos_2017.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2017.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2017.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            case 2018:
               $this->db->select('saaArchivo.*, saaDocumentosAnexos_2018.*, saaDocumentosAnexos_2018.id as idDocAdj, saaRel_Archivo_Documento.*')
                    ->join('saaRel_Archivo_Documento', 'saaRel_Archivo_Documento.idArchivo = saaArchivo.id')
                    ->join('saaDocumentosAnexos_2018', 'saaDocumentosAnexos_2018.idRel_Archivo_Documento = saaRel_Archivo_Documento.id')
                    ->group_by('saaDocumentosAnexos_2018.id');
                $this->db->where("saaArchivo.id", $id_archivo);
                $this->db->where("saaRel_Archivo_Documento.idDocumento", $idTpDoc);
                $this->db->where("saaDocumentosAnexos_2018.eliminacion_logica", 0);
                $reult = $this->db->get('saaArchivo');
                break;
            default: return false;
        }
        return array($reult, $Estim, $Prorr);
    }
    
    public function get_doc_adjunto($id_doc = null, $idEjercicio = null){
       
        $query = false;
        switch ($idEjercicio) {
            case 2010: $query = $this->db->get_where("saaDocumentosAnexos_2010", array("id" => $id_doc)); break;
            case 2011: $query = $this->db->get_where("saaDocumentosAnexos_2011", array("id" => $id_doc)); break;
            case 2012: $query = $this->db->get_where("saaDocumentosAnexos_2012", array("id" => $id_doc)); break;
            case 2013: $query = $this->db->get_where("saaDocumentosAnexos_2013", array("id" => $id_doc)); break;
            case 2014: $query = $this->db->get_where("saaDocumentosAnexos_2014", array("id" => $id_doc)); break;
            case 2015: $query = $this->db->get_where("saaDocumentosAnexos_2015", array("id" => $id_doc)); break;
            case 2016: $query = $this->db->get_where("saaDocumentosAnexos_2016", array("id" => $id_doc)); break;
            case 2017: $query = $this->db->get_where("saaDocumentosAnexos_2017", array("id" => $id_doc)); break;
            case 2018: $query = $this->db->get_where("saaDocumentosAnexos_2018", array("id" => $id_doc)); break;
            default: return false;
        }
       return $query;
    }
    
    public function update_doc_adjunto($data = null, $id_doc = null, $idEjercicio = null){
        $ejer = $this->get_Ejercicio_id($idEjercicio);
        $ejercicios = $ejer->row();
        switch ($ejercicios->Anyo) {
            case 2010:
                $this->db->update('saaDocumentosAnexos_2010', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2011: 
                $this->db->update('saaDocumentosAnexos_2011', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2012: 
                $this->db->update('saaDocumentosAnexos_2012', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2013: 
                $this->db->update('saaDocumentosAnexos_2013', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2014: 
                $this->db->update('saaDocumentosAnexos_2014', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2015: 
                $this->db->update('saaDocumentosAnexos_2015', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2016: 
                $this->db->update('saaDocumentosAnexos_2016', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2017: 
                $this->db->update('saaDocumentosAnexos_2017', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            case 2018: 
                $this->db->update('saaDocumentosAnexos_2018', $data, array("id" => $id_doc));
                $aff = $this->db->affected_rows();
                break;
            default: return false;
        }
        
        if ($aff < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    
    
    
    
            
            
            
    public function alta_comentario($data) {
        $this->db->insert('movHelpDeskComentarios', $data);

        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();
        $registro = $this->db->insert_id();

        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $registro);
        }
    }
    
   
    
    public function datos_Archivo($id) {
        $query = $this->db->get_where("saaArchivo", array("id" => $id));
        return $query;
    }
    
    public function datos_bloque($id) {
        $query = $this->db->get_where("saaBloqueObras", array("id" => $id));
        return $query;
    }
    
    
    public function datos_Archivo_contrato($idContrato) {
        $query = $this->db->get_where("saaArchivo", array("idContrato" => $idContrato));
        return $query;
    }
    
    public function datos_archivo_update($data, $id){
        
        $this->db->update('saaArchivo', $data, array('id' => $id));
        $e = $this->db->_error_message();
        $aff = $this->db->affected_rows();
        $last_query = $this->db->last_query();

        $this->log_save(array('Tabla' => 'saaArchivo', 'Data' => $data, 'id' => $id));
        
        
        if ($aff < 1) {
            if (empty($e)) {
                $e = "No se realizaron cambios";
            }
            // si hay debug
            $e .= "<pre>" . $last_query . "</pre>";
            return array("retorno" => "-1", "error" => $e);
        } else {
            return array("retorno" => "1", "registro" => $id);
        }
    
    }

    public function get_estatus($id) {
        $query = $this->db->get_where("movHelpDesk", array("id" => $id));
        return $query->row()->Estatus;
    }
    
    public function datos_comentarios($id) {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("movHelpDeskComentarios", array("idHelpDesk" => $id));
        return $query;
    }

    public function datos_pantallas($id) {
        $query = $this->db->get_where("movHelpDeskPantallas", array("idHelpDesk" => $id));
        return $query;
    }
    
    public function foto_insert($data){
			// pendiente
			// si el setting de codigo numerico automatico esta activo se numera el cliente automaticamente
			//
            //$data['Consecutivo'] = $this->consecutivo();
            $this->db->insert('movHelpDeskPantallas', $data); 
            
            $e = $this->db->_error_message(); 
            $aff = $this->db->affected_rows();
            $last_query = $this->db->last_query();
            $registro = $this->db->insert_id();
            
            if($aff < 1) {
                if (empty($e)){
                    $e = "No se realizaron cambios";
                }
                // si hay debug
                $e .= "<pre>".$last_query."</pre>";
                return array("retorno" =>"-1", "error" =>$e);
            } else {
                return array("retorno" =>"1", "registro"=>$registro);
            }   
        }

        
        public function foto_borrar($id){
			// pendiente
			// si el setting de codigo numerico automatico esta activo se numera el cliente automaticamente
			//
            //$data['Consecutivo'] = $this->consecutivo();
            $this->db->delete('movHelpDeskPantallas', array("id" => $id)); 
            
           
        }
        public function avance_borrar($id){
			// pendiente
			// si el setting de codigo numerico automatico esta activo se numera el cliente automaticamente
			//
            //$data['Consecutivo'] = $this->consecutivo();
            $this->db->delete('movHelpDeskComentarios', array("id" => $id)); 
            
           
        }
//        public function datos_reporte_insert($data){
//            $this->db->insert('catHelpDesk', $data); 
//            
//            $e = $this->db->_error_message(); 
//            $aff = $this->db->affected_rows();
//            $last_query = $this->db->last_query();
//            $registro = $this->db->insert_id();
//            
//            if($aff < 1) {
//                if (empty($e)){
//                    $e = "No se realizaron cambios";
//                }
//                // si hay debug
//                $e .= "<pre>".$last_query."</pre>";
//                return array("retorno" =>"-1", "error" =>$e);
//            } else {
//                return array("retorno" =>"1", "registro"=>$registro);
//            }   
//        }

//        public function baja($id){
//            $data = array("Estatus" => 0);
//            $this->db->update('catHelpDesk', $data, array("id" => $id)); 
//            $e = $this->db->_error_message(); 
//            $aff = $this->db->affected_rows();
//            $last_query = $this->db->last_query();
//            //$this->db->db_debug = $oldv; 
//            
//            if($aff < 1) {
//                if (empty($e)){
//                    $e = "No se realizaron cambios";
//                }
//                // si hay debug
//                $e .= "<pre>".$last_query."</pre>";
//                return array("retorno" =>"-1", "error" =>$e);
//            } else {
//                return array("retorno" =>"1","registro"=>$id);
//            }
//        }
//
//       
//
//        

    public function sistemas_txt() {
        $addw = array();

        $addw[] = "SECIP_INTRANET";
        $addw[] = "SECIP CONTRATISTAS";
        $addw[] = "GEO-REFERENCIA";
        $addw[] = "DEPENDENCIAS";
        $addw[] = "TRANSPARENCIA";
        $addw[] = "PORTAL";
        $addw[] = "SINCRONIZACION-SEFIN";

        $sql = 'SELECT TRIM(Sistema) AS sistema FROM movHelpDesk Where Estatus <> 0 and Sistema is not NULL';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $addw[] = strtoupper(trim($row->sistema));
            }
        }

        
        $addw = array_unique($addw);
        $addw = array_values($addw);

        return $addw;
    }

    
     public function log_save($cambios) {
            $this->load->model("control_usuarios_model");
            return $this->control_usuarios_model->log_save($cambios);
    }
    
    public function log_new($cambios) {
            $this->load->model("control_usuarios_model");
            return $this->control_usuarios_model->log_new($cambios);
    }
    
    public function filtrar_archivos($filtro){
        $sql = "SELECT DISTINCT `saaRel_Archivo_Documento`.`idArchivo`,`saaArchivo`.*
        FROM `saaRel_Archivo_Documento` 
        INNER JOIN `saaArchivo`
        ON `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`
        WHERE `saaRel_Archivo_Documento`.`Estatus`=? AND `saaArchivo`.`eliminacion_logica` = 0";
        
        $query = $this->db->query($sql, array($filtro));
        return $query;
    }
    
     public function filtrar_archivos_736($filtro){
        $sql = "SELECT DISTINCT `saaRel_Archivo_Documento`.`idArchivo`,`saaArchivo`.*
        FROM `saaRel_Archivo_Documento` 
        INNER JOIN `saaArchivo`
        ON `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`
        WHERE `saaRel_Archivo_Documento`.`Estatus`=? AND 
        (idBloqueObra = 1 OR idBloqueObra = 2 OR idBloqueObra = 3)AND
        `saaArchivo`.`eliminacion_logica` = 0  ";
        
        $query = $this->db->query($sql, array($filtro));
        return $query;
    }
    public function buscar_responsable_documento($idRel){
         $sql = " SELECT `saaRel_Archivo_Documento`.id, `saaDocumentos`.`idDireccion_responsable` 
                FROM `saaRel_Archivo_Documento`
                INNER JOIN `saaDocumentos`
                ON `saaRel_Archivo_Documento`.`idDocumento` = `saaDocumentos`.id
                WHERE `saaRel_Archivo_Documento`.id= ?   
                 ";
        
        $query = $this->db->query($sql, array($idRel));
        return $query;
    }
    
    public function buscar_ejecutora($idArchivo){
         $sql = "SELECT `saaArchivo`.`Direccion` 
                FROM `saaArchivo`

                WHERE id=  ?";
        
        $query = $this->db->query($sql, array($idArchivo));
        return $query;
    }
    
    
    public function buscar_id_ejecutora($direccion){
         $sql = "SELECT id FROM `catDirecciones`
                    WHERE `catDirecciones`.`Nombre` LIKE ? ";
        
        $query = $this->db->query($sql, array($direccion));
        return $query;
    }
    
    
    public function filtrar_archivos_direccion($filtro){
        $sql = " SELECT DISTINCT `saaArchivo`.id,
	`saaArchivo`.`OrdenTrabajo`,
	`saaArchivo`.`Obra`,
	`saaArchivo`.`Contrato`,
	`saaArchivo`.`Descripcion`,
	`saaArchivo`.`Normatividad`,
	`saaArchivo`.`idEjercicio`,
	`saaArchivo`.`EstatusObra`,
	`saaArchivo`.`Direccion`,
	`saaArchivo`.`Supervisor`,
	`saaArchivo`.`FechaInicio`,
	`saaArchivo`.`ImporteContratado`,
	`saaArchivo`.`ImporteEjercido`,
	`saaArchivo`.`idModalidad`,
	`saaArchivo`.`EjercidoSiop`,
	`saaArchivo`.`Finiquitada`, `saaRel_Archivo_Preregistro`.`idDireccion_responsable`
                FROM `saaArchivo`
                INNER JOIN `saaRel_Archivo_Preregistro`
                ON `saaArchivo`.`id` = `saaRel_Archivo_Preregistro`.`idArchivo`
                INNER JOIN `saaRel_Archivo_Documento`
                ON `saaRel_Archivo_Documento`.`id` = `saaRel_Archivo_Preregistro`.`id_Rel_Archivo_Documento`
                
                WHERE `saaRel_Archivo_Documento`.`Estatus`=10 
                AND `saaArchivo`.`eliminacion_logica` = 0  
                AND `saaRel_Archivo_Preregistro`.idDireccion_responsable = ?
                AND `saaRel_Archivo_Preregistro`.preregistro_aceptado = 0   
                 ";
        
        $query = $this->db->query($sql, array($filtro));
        return $query;
    }
    
    
    public function filtrar_archivos_grupo($filtro){
        $sql = "SELECT DISTINCT `saaRel_Archivo_Documento`.`idArchivo`, `saaArchivo`.*,((SELECT
                IF(ISNULL (`saaArchivo`.`eliminacion_logica`) , ' ', `saaArchivo`.`eliminacion_logica`)

                FROM `saaArchivo` WHERE `saaArchivo`.`eliminacion_logica` = 0 AND `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`)) AS eliminacion
        FROM `saaRel_Archivo_Documento` 
        INNER JOIN `saaArchivo`
        ON `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`
        WHERE `saaArchivo`.`eliminacion_logica` = 0  AND `saaArchivo`.`idBloqueObra` = ?";
        
        $query = $this->db->query($sql, array($filtro));
        return $query;
    }
    
    public function filtrar_archivos_grupo_736($filtro){
        $sql = "      SELECT DISTINCT `saaRel_Archivo_Documento`.`idArchivo`, `saaArchivo`.*,((SELECT
                            IF(ISNULL (`saaArchivo`.`eliminacion_logica`) , ' ', `saaArchivo`.`eliminacion_logica`)

                            FROM `saaArchivo` WHERE `saaArchivo`.`eliminacion_logica` = 0 AND `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`)) AS eliminacion
                    FROM `saaRel_Archivo_Documento` 
                    INNER JOIN `saaArchivo`
                    ON `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`
                    WHERE `saaArchivo`.`eliminacion_logica` = 0  AND 
                    (idBloqueObra = 1 OR idBloqueObra = 2 OR idBloqueObra = 3)AND
                    `saaArchivo`.`idBloqueObra` = ?";
        
        $query = $this->db->query($sql, array($filtro));
        return $query;
    }
    
    
    
    public function get_grupos(){
        $this->db->where("Estatus", 1);
        return $this->db->get("saaBloqueObras");
    }
    
    
    public function mostrar_archivos_verificar(){
        /*$sql = "SELECT DISTINCT `saaArchivo`.`id`,`saaArchivo`.*
                FROM `saaRel_Archivo_Documento` 
                INNER JOIN `saaArchivo`
                ON `saaArchivo`.`id` = `saaRel_Archivo_Documento`.`idArchivo`
                WHERE `saaRel_Archivo_Documento`.`Estatus`=10 
                AND `saaArchivo`.`eliminacion_logica` = 0  
                AND preregistro_aceptado = 1"; */
        $sql = "SELECT DISTINCT `saaArchivo`.`id`,`saaArchivo`.*
                FROM `saaRel_Archivo_Preregistro`
                INNER JOIN `saaArchivo`
                ON `saaArchivo`.`id` = `saaRel_Archivo_Preregistro`.`idArchivo`
                WHERE `saaArchivo`.`eliminacion_logica` = 0  
                AND `saaRel_Archivo_Preregistro`.preregistro_aceptado = 1 
                AND `saaRel_Archivo_Preregistro`.`recibido_cid` =0";
        
        $query = $this->db->query($sql);
        return $query;
    }
    
    
    
    
    
}

?>
