<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivo extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('datos_model');
        $this->load->model('usuarios_model');
        $this->load->library('ferfunc');
        //$this->load->helper('form');
    }

    public function index() {
        
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Archivo","P")==false){
            header("Location:" . site_url('principal'));
        }
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Miguel Venegas'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );

        $data["qArchivos"] = $this->datos_model->listado();
        $data["aUsuarios"] = $this->datos_model->get_usuarios();
        $data["Tipos_Arch"] = $this->datos_model->get_Tipos_Arch_select();
        $data["Tam_Norm"] = $this->datos_model->get_Tam_Norm_select();
        $data["Tipos_uni"] = $this->datos_model->get_Tipos_uni_select();
        $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
        $data["Direcciones"] = $this->datos_model->get_Direcciones_select();
        $data["Ejercicios"] = $this->datos_model->get_Ejercicio_select();
        $data["Modalidades"] = $this->datos_model->get_Modalidades_select();
        
        
        $this->load->model("ubicacion_fisica_model");
        
        
        $data["qUbicacionesFisicas"]=$this->ubicacion_fisica_model->listado_ubicacion_ordenada_por_columna();
       
        
        
      
                        
                        
                       

        
        
        
        
        /*
        $data["aCategorias"] = array(0 => "N/D", 1 => "Falla (bug)", 2 => "Modificación", 3 => "Rediseño", 4 => "Proceso de Datos", 5 => "Sistema Nuevo");
        $data["aPrioridad"] = array(0 => "N/D", 1 => "Baja", 2 => "Media", 3 => "Alta", 4 => "Urgente");
        $data["aEstatus"] = array(0 => "Baja", 1 => "Nueva", 2 => "Atendiendo", 3 => "Terminada", 4 => "Re Abierta",  5 => "Atendiendo - En Pruebas",  6 => "Atendiendo - Liberada");
        */
        //this->load->view('v_listado.php', $data);
        $this->load->view('v_pant_archivo.php', $data);
        
        
        
        
    }
    
    public function datos_archivo($id){
        $this->load->model('datos_model');
        $query = $this->datos_model->datos_Archivo($id);
        echo json_encode($query->row_array());
    }
    
    public function modificar_archivo(){
        if (isset($_REQUEST['Proyecto_mod'])) { 
             $proyecto=1; 
             
         }  
         else { 
             $proyecto=0; 
             
         } 
        
        
        $data = array(
                'idUsuario' => $this->session->userdata("id"),
                'OrdenTrabajo' => $this->input->post("OrdenTrabajo_mod"),
                'Contrato' => $this->input->post("Contrato_mod"),
                'Obra' => $this->input->post("Obra_mod"),
                'Descripcion' => $this->input->post("Descripcion_mod"),
                'FechaRegistro' => date("Y-m-d G:i:s"),
                'Estatus' => 10,
                'FondodePrograma' => $this->input->post("FondodePrograma_mod"),
                'Normatividad' => $this->input->post("Normatividad_mod"),
                'idModalidad' => $this->input->post("idModalidad_mod"),
                'idEjercicio' => $this->input->post("idEjercicio_mod"),
                'proyecto' => $proyecto,
            );
        $this->load->model('datos_model');
        $id=$this->input->post('idCatalogo');
        $retorno=  $this->datos_model->datos_archivo_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('archivo/index/'.$retorno['error']));
        else
            header('Location:'.site_url('archivo')); 
    }

    public function nuevo() {
        $data = array();
        $data["idUsuario"] = $this->session->userdata("id");
        $data["FechaRegistro"] = date("Y-m-d G:i:s");
        $data["Estatus"] = 10;
        $retorno = $this->datos_model->alta($data);
        if($retorno['retorno'] == 1){
            /*header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Location: ' . site_url("archivo/cambios/" . $retorno['id_registro']));*/
            $this->cambios($retorno['id_registro']);
        }else{
            $this->index();
        }
    }

    public function cambios($id_archivo = null, $idProceso = 1, $idSubProceso = 1, $idDocumento = 1, $Numero_Estimacion = "") {
        
        if ($id_archivo != 0) {
            
            
            
            /*
            $data["aArchivo"] = $this->datos_model->datos_Archivo($id_archivo)->row_array();
            $Tp_plantilla = $this->datos_model->get_tipo_plantilla($data["aArchivo"]['idModalidad'],$data["aArchivo"]['Normatividad']);
            
            if($Tp_plantilla){
                if($Tp_plantilla->num_rows() > 0){
                    foreach($Tp_plantilla->result() as $dato_p){
                        $idPlantilla = $dato_p->id;
                    }
                }
                $data["Id_Plantilla"] = $idPlantilla;
                $data["Documentos_Totales"] = $this->datos_model->get_Documentos_totales_por_plantilla($idPlantilla);
            }else{
                $data["Documentos_Totales"] = false;
                $data["Id_Plantilla"] = 0;
            }
            
            $data["aUsuarios"] = $this->datos_model->get_usuarios();
            $data["Tipos_Arch"] = $this->datos_model->get_Tipos_Arch_select();
            $data["Tam_Norm"] = $this->datos_model->get_Tam_Norm_select();
            $data["Tipos_uni"] = $this->datos_model->get_Tipos_uni_select();
            $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
            $data["Direcciones"] = $this->datos_model->get_Direcciones_select();
            $data["Ejercicios"] = $this->datos_model->get_Ejercicio_select();
            $data["Modalidades"] = $this->datos_model->get_Modalidades_select();
            $data["Estatus_select"] = $this->datos_model->get_Estatus_select();
            $data["Historia"] = $this->datos_model->get_Historia($id_archivo);
            $data["Procesos"] = $this->datos_model->get_procesos();
            $this->load->view('v_reporte_form.php', $data);
            */
            
            $data['usuario'] = $this->session->userdata('nombre');
            $this->load->library('ferfunc');
            
            $data["idArchivo"] = $id_archivo;
            $data["idProceso"] = $idProceso;
            $data["idSubProceso"] = $idSubProceso;
            $data["idDocumento"] = $idDocumento;
            $data["Numero_Estimacion"] = $Numero_Estimacion;
            $data["Estatus_select"] = $this->datos_model->get_Estatus_select();
            $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
            //$data["SubDocs"] = $this->datos_model->get_SubDocs_select();
            $data["aArchivo"] = $this->datos_model->datos_Archivo($id_archivo)->row_array();
            //
            
            
            
            $data["aUsuarios"] = $this->datos_model->get_usuarios();
            $data["qProcesos"] = $this->datos_model->get_procesos();
            $data["Ejercicios"] = $this->datos_model->get_Ejercicio_select();
            $data["Modalidades"] = $this->datos_model->get_Modalidades_select();
            $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
            
            //#MAOC
           $data["Estatus_doc"] = $this->load->datos_model->get_Estatus_relacion($idDocumento);
            //$this->load->view('v_reporte_form.php', $data);
            
           
           
           
            $this->load->model('modalidad_model');
            
            echo "prueba4";
            
            $data["addw_modalidades"]= $this->modalidad_model->addw_modalidades();
            
           
            
              
            
            $data["addw_Estatus_Bloque"]= $this->datos_model->addw_Estatus_Bloque();
            
           
            
            $data["recibe"]=$this->session->userdata('recibe');
            $data["reviso"]=$this->session->userdata('reviso');
            $data["Foliar"]=$this->session->userdata('Foliar');
            $data["Validar"]=$this->session->userdata('Validar');
            $data["digitalizar"]=$this->session->userdata('digitalizar');
            $data["Editar"]=$this->session->userdata('Editar');
             
            
            
            
            $this->load->model("ubicacion_fisica_model");
            $data["qUbicacionesFisicas"]=$this->ubicacion_fisica_model->listado_ubicacion_ordenada_por_columna();
            
            $data["qRelProcesoUbicacion"]=$this->ubicacion_fisica_model->listado_ubicacion_fisica(); 
            
           
            
            $this->load->view('v_reporte_form.php', $data);
            
        }else{
            
            $data["Direcciones"] = $this->datos_model->get_Direcciones_select(); 
            $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
            $data["Tipos_uni"] = $this->datos_model->get_Tipos_uni_select();
            $data["Tam_Norm"] = $this->datos_model->get_Tam_Norm_select();
            $data["Tipos_Arch"] = $this->datos_model->get_Tipos_Arch_select();
            $data["aUsuarios"] = $this->datos_model->get_usuarios();
            $data["Ejercicios"] = $this->datos_model->get_Ejercicio_select();
            $data["Modalidades"] = $this->datos_model->get_Modalidades_select();
            $this->load->view('v_reporte_new.php', $data);
            
        }
    }

    public function edit_recibio($idRelDoc_Archivo) {
        $this->load->model('rel_archivo_documento_model');
        
        $data=array();
        
        
        $data["recibio"]= $this->input->post("recibido");
        $data["idUsuario_recibio"]=  $this->session->userdata('id');
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update($data,$idRelDoc_Archivo);
        
        
        $aRegistro=$this->rel_archivo_documento_model->datos_relacion_archivo_documento($idRelDoc_Archivo)->row_array();
        
        
        $qSubTipoProceso_recibido=$this->rel_archivo_documento_model->listado_registros_recibido_por_sub_tipo_proceso($aRegistro["idArchivo"],$aRegistro["idSubTipoProceso"]);
        
        $qTipoProceso_recibido=$this->rel_archivo_documento_model->listado_registros_recibido_por_tipo_proceso($aRegistro["idArchivo"],$aRegistro["idTipoProceso"]);
        
        
        $qSubTipoProceso=$this->rel_archivo_documento_model->listado_registros_recibido_por_sub_tipo_proceso_total($aRegistro["idArchivo"],$aRegistro["idSubTipoProceso"]);
        
        $qTipoProceso=$this->rel_archivo_documento_model->listado_registros_recibido_por_tipo_proceso_total($aRegistro["idArchivo"],$aRegistro["idTipoProceso"]);
    
        
        $data=array();
        $data["NumSubTipoProceso_recibido"]=$qSubTipoProceso_recibido->num_rows();
        $data["NumTipoProceso_recibido"]=$qTipoProceso_recibido->num_rows();
        $data["NumSubTipoProceso"]=$qSubTipoProceso->num_rows();
        $data["NumTipoProceso"]=$qTipoProceso->num_rows();
        $data["idTipoProceso"]=$aRegistro["idTipoProceso"];
        $data["idSubTipoProceso"]=$aRegistro["idSubTipoProceso"];
        
        $data["strTipoProceso_recibido"]="Recibidos " . $qTipoProceso_recibido->num_rows() . " de " . $qTipoProceso->num_rows();
        $data["strSubTipoProceso_recibido"]="Recibidos " . $qSubTipoProceso_recibido->num_rows() . " de " . $qSubTipoProceso->num_rows();
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

        
    }
    
    
     public function edit_ubicacion_fisica($idArchivo,$idProceso) {
        $this->load->model('rel_archivo_documento_model');
        $data=array();
        $data["Ubicacion_fisica"]= $this->input->post("Ubicacion_fisica");
        //$data["idUsuario_ubicacion"]=  $this->session->userdata('id');
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update_por_proceso($data,$idArchivo,$idProceso);
        
     }    
    
    public function edit_folio_desde($idArchivo,$idProceso) {
        $this->load->model('rel_archivo_documento_model');
        $data=array();
        $data["Folio_Desde"]= $this->input->post("folio_desde");
        //$data["idUsuario_ubicacion"]=  $this->session->userdata('id');
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update_por_proceso($data,$idArchivo,$idProceso);
        
     }  
     
    
    public function edit_folio_hasta($idArchivo,$idProceso) {
        $this->load->model('rel_archivo_documento_model');
        $data=array();
        $data["Folio_Hasta"]= $this->input->post("folio_hasta");
        //$data["idUsuario_ubicacion"]=  $this->session->userdata('id');
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update_por_proceso($data,$idArchivo,$idProceso);
        
    }  
     
    
    public function edit_original_recibio($idRelDoc_Archivo) {
        $this->load->model('rel_archivo_documento_model');
        
        $data=array();
        
        
        $data["original_recibido"]= $this->input->post("original_recibido");
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update($data,$idRelDoc_Archivo);
        
    }
    
    
     public function edit_original_revisado($idRelDoc_Archivo) {
        $this->load->model('rel_archivo_documento_model');
        
        $data=array();
        
        
        $data["original_revisado"]= $this->input->post("original_revisado");
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update($data,$idRelDoc_Archivo);
        
       
        
    }
    
    
    
    
    public function edit_revisado($idRelDoc_Archivo) {
        $this->load->model('rel_archivo_documento_model');
        
        $data=array();
        
        
        $data["revisado"]= $this->input->post("revisado");
        $data["idUsuario_revisado"]=  $this->session->userdata('id');
        
        $this->rel_archivo_documento_model->datos_relacion_archivo_documento_update($data,$idRelDoc_Archivo);
        
        $aRegistro=$this->rel_archivo_documento_model->datos_relacion_archivo_documento($idRelDoc_Archivo)->row_array();
        
        
        $qSubTipoProceso_revisados=$this->rel_archivo_documento_model->listado_registros_revisados_por_sub_tipo_proceso($aRegistro["idArchivo"],$aRegistro["idSubTipoProceso"]);
        
        $qTipoProceso_revisados=$this->rel_archivo_documento_model->listado_registros_revisados_por_tipo_proceso($aRegistro["idArchivo"],$aRegistro["idTipoProceso"]);
        
        
        $qSubTipoProceso=$this->rel_archivo_documento_model->listado_registros_revisados_por_sub_tipo_proceso_total($aRegistro["idArchivo"],$aRegistro["idSubTipoProceso"]);
        
        $qTipoProceso=$this->rel_archivo_documento_model->listado_registros_revisados_por_tipo_proceso_total($aRegistro["idArchivo"],$aRegistro["idTipoProceso"]);
    
        
        $data=array();
        $data["NumSubTipoProceso_revisado"]=$qSubTipoProceso_revisados->num_rows();
        $data["NumTipoProceso_revisado"]=$qTipoProceso_revisados->num_rows();
        $data["NumSubTipoProceso"]=$qSubTipoProceso->num_rows();
        $data["NumTipoProceso"]=$qTipoProceso->num_rows();
        $data["idTipoProceso"]=$aRegistro["idTipoProceso"];
        $data["idSubTipoProceso"]=$aRegistro["idSubTipoProceso"];
        
        $data["strTipoProceso_revisado"]="Revisados " . $qTipoProceso_revisados->num_rows() . " de " . $qTipoProceso->num_rows();
        $data["strSubTipoProceso_revisado"]="Revisados " . $qSubTipoProceso_revisados->num_rows() . " de " . $qSubTipoProceso->num_rows();
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        
    }
    
    
    
    
    public function total_documentos_revisados($idArchivo,$idTipoProceso,$idSubTipoProceso) {
        $this->load->model('rel_archivo_documento_model');
        
     
        
        
        $qSubTipoProceso_revisados=$this->rel_archivo_documento_model->listado_registros_revisados_por_sub_tipo_proceso($idArchivo,$idSubTipoProceso);
        
        $qTipoProceso_revisados=$this->rel_archivo_documento_model->listado_registros_revisados_por_tipo_proceso($idArchivo,$idTipoProceso);
        
        
        $qSubTipoProceso=$this->rel_archivo_documento_model->listado_registros_revisados_por_sub_tipo_proceso_total($idArchivo,$idSubTipoProceso);
        
        $qTipoProceso=$this->rel_archivo_documento_model->listado_registros_revisados_por_tipo_proceso_total($idArchivo,$idTipoProceso);
    
        
        $data=array();
        $data["NumSubTipoProceso_revisado"]=$qSubTipoProceso_revisados->num_rows();
        $data["NumTipoProceso_revisado"]=$qTipoProceso_revisados->num_rows();
        $data["NumSubTipoProceso"]=$qSubTipoProceso->num_rows();
        $data["NumTipoProceso"]=$qTipoProceso->num_rows();
        $data["idTipoProceso"]=$aRegistro["idTipoProceso"];
        $data["idSubTipoProceso"]=$aRegistro["idSubTipoProceso"];
        
        $data["strTipoProceso_revisado"]="Revisados " . $qTipoProceso_revisados->num_rows() . " de " . $qTipoProceso->num_rows();
        $data["strSubTipoProceso_revisado"]="Revisados " . $qSubTipoProceso_revisados->num_rows() . " de " . $qSubTipoProceso->num_rows();
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        
    }
    

    
    public function total_documentos_recibidos($idArchivo,$idTipoProceso,$idSubTipoProceso) {
       
              
        
        
        $qSubTipoProceso_recibido=$this->rel_archivo_documento_model->listado_registros_recibido_por_sub_tipo_proceso($idArchivo,$idSubTipoProceso);
        
        $qTipoProceso_recibido=$this->rel_archivo_documento_model->listado_registros_recibido_por_tipo_proceso($idArchivo,$idTipoProceso);
        
        
        $qSubTipoProceso=$this->rel_archivo_documento_model->listado_registros_recibido_por_sub_tipo_proceso_total($idArchivo,$idSubTipoProceso);
        
        $qTipoProceso=$this->rel_archivo_documento_model->listado_registros_recibido_por_tipo_proceso_total($idArchivo,$idTipoProceso);
    
        
        $data=array();
        $data["NumSubTipoProceso_recibido"]=$qSubTipoProceso_recibido->num_rows();
        $data["NumTipoProceso_recibido"]=$qTipoProceso_recibido->num_rows();
        $data["NumSubTipoProceso"]=$qSubTipoProceso->num_rows();
        $data["NumTipoProceso"]=$qTipoProceso->num_rows();
        $data["idTipoProceso"]=$aRegistro["idTipoProceso"];
        $data["idSubTipoProceso"]=$aRegistro["idSubTipoProceso"];
        
        $data["strTipoProceso_recibido"]="Recibidos " . $qTipoProceso_recibido->num_rows() . " de " . $qTipoProceso->num_rows();
        $data["strSubTipoProceso_recibido"]="Recibidos " . $qSubTipoProceso_recibido->num_rows() . " de " . $qSubTipoProceso->num_rows();
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);


        
        
        
    }
    
    
    
    public function edit_archivo($action = null) {
        if($action == 1){//modificacion datos del archivo
            if($this->input->post("FechaIniciaVigenciaa")) {
                $fechaV = $this->input->post("FechaIniciaVigenciaa");
                $vigencia = 0;
            }else{
                $fechaV = $this->input->post("FechaIniciaVigencia");
                $vigencia = 1;
            }

            $data = array(
                'idUsuario' => $this->input->post("id_user"),
                'OrdenTrabajo' => $this->input->post("OrdenTrabajo"),
                'Contrato' => $this->input->post("Contrato"),
                'Obra' => $this->input->post("Obra"),
                'Descripcion' => $this->input->post("Descripcion"),
                'idTipo_archivo' => $this->input->post("idTipo_archivo"),//Continuar con la captura de tipo d earchivo
                'idTamano_normalizado' => $this->input->post("idTamano_normalizado"),//Continuar con la captura de tipo d earchivo
                'idTipo_unidad' => $this->input->post("idTipo_unidad"),
                'idTitularidad' => $this->input->post("idTitularidad"),
                'idDireccion' => $this->input->post("idDireccion"),
                'FondodePrograma' => $this->input->post("FondodePrograma")
            );
            $id_archivo = $this->input->post("id");
            $retorno = $this->datos_model->updateArchivo($data, $id_archivo);
            
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
            
        }else if($action == 2){//Nueva categoria de documento y carga de documentos para tal.
            
            if ($this->input->post('idsdocs')){
                $idArchi = $this->input->post('idArchivo');
                $idsdocs = $this->input->post('idsdocs');
                $idEjercicio = $this->input->post('idEjercicio');
                
                foreach($this->input->post('idsdocs') as $iddoc) {
                    
                    $idRel = $this->datos_model->crear_relacion($idArchi, $iddoc);
                    $total = count($_FILES['docfile'.$iddoc]['name']);
                    
                    for($i=0; $i<$total; $i++) {
                        // Convertir el archivo en cadena
                        if($_FILES['docfile'.$iddoc]['tmp_name'][$i]){
                            $filen = $_FILES['docfile'.$iddoc]['tmp_name'][$i];                        
                            $trozos = explode(".", $_FILES['docfile'.$iddoc]["name"][$i]);                        
                            $extension = '.'.end($trozos);

                            $nom = $_FILES['docfile'.$iddoc]['name'][$i];
                            $mime = $_FILES['docfile'.$iddoc]['type'][$i];
                            $Datos = file_get_contents($_FILES['docfile'.$iddoc]['tmp_name'][$i]);
                            $firma = sha1($Datos);

                            // Cargar documento
                            $data_adjunto = array();
                            $data_adjunto["idRel_Archivo_Documento"] = $idRel;
                            $data_adjunto["Tipo"] = 'Anexos';
                            $data_adjunto["Numero2"] = ' Numero';
                            $data_adjunto["Descripcion"] = 'Descripcion'; //$this->input->post('Descripcion')
                            $data_adjunto["FechaHora"] = date('Y-m-d G:i:s');
                            $data_adjunto["Mime"] = $mime;
                            $data_adjunto["Estatus"] = 10;
                            $data_adjunto["Extension"] = $extension;
                            $data_adjunto["Datos"] = base64_encode(bzcompress($Datos));
                            $data_adjunto["Firma"] = $firma;
                            $data_adjunto["nombrearchivo"] = $nom;

                            if($this->datos_model->agregar_documento_digital($data_adjunto, $idEjercicio)){
                                $data_a = array('Estatus' => 10);
                                $resp = $this->datos_model->update_relacion($data_a, $idRel);
                            }
                            unlink($filen);
                        }
                    }
                }
                redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
            }else{
                redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
            }
            
        }else if($action == 3){//Nueva carga de Documentos segun categoria seleccionada.
            
           
             if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $idArchi = $this->input->post('idArchivo_anexo');
                $idEjercicio = $this->input->post('idEjercicio_anexo');
                $idTpDoc = $this->input->post('idDocumento_anexo');
                $idProceso = $this->input->post('idProceso_anexo');
                $idSubProceso = $this->input->post('idSubProceso_anexo');
                
                $Documento = '';
                if($this->input->post('Es_Estimacion') == 1){
                    $Es_Estim = 1;
                    $Numero_Estimacion = $this->input->post('Numero_Estimacion');
                    $Documento = $this->input->post('Documento_est');
                }else{
                    $Es_Estim = 0;
                    $Numero_Estimacion = 0;
                }
                if($this->input->post('Es_Prorroga') == 1){
                    $Es_Prorr = 1;
                    $Numero_Prorroga = $this->input->post('Numero_Prorroga');
                    $Documento = $this->input->post('Documento_prorr');
                }else{
                    $Es_Prorr = 0;
                    $Numero_Prorroga = 0;
                }
                    
                $idSubDocumento=$this->input->post('idSubDocumento_mod');
                
                    //$idRel = $this->datos_model->crear_relacion($idArchi, $idTpDoc);
                    $total = count($_FILES['docfile']['name']);
                    
                    
                    
                    for($i=0; $i<$total; $i++) {
                        
                      

                        // Convertir el archivo en cadena
                        if($_FILES['docfile']['tmp_name'][$i]){
                            
                              
                            
                            $filen = $_FILES['docfile']['tmp_name'][$i];                        
                            $trozos = explode(".", $_FILES['docfile']["name"][$i]);                        
                            $extension = '.'.end($trozos);

                            $nom = $_FILES['docfile']['name'][$i];
                            $mime = $_FILES['docfile']['type'][$i];
                            $Datos = file_get_contents($_FILES['docfile']['tmp_name'][$i]);
                            $firma = sha1($Datos);

                           
                             
                            
                            
                            // Cargar documento
                            $data_adjunto = array();
                            $data_adjunto["idRel_Archivo_Documento"] = $idTpDoc;
                            $data_adjunto["Tipo"] = 'Anexos';
                            $data_adjunto["Numero"] = ' Numero';
                            //$data_adjunto["Descripcion"] = 'Descripcion'; //$this->input->post('Descripcion')
                            $data_adjunto["FechaHora"] = date('Y-m-d G:i:s');
                            $data_adjunto["Mime"] = $mime;
                            $data_adjunto["Estatus"] = 10;
                            $data_adjunto["Extension"] = $extension;
                            $data_adjunto["Datos"] = base64_encode(bzcompress($Datos));
                            $data_adjunto["Firma"] = $firma;
                            $data_adjunto["nombrearchivo"] = $nom;
                            $data_adjunto["Es_Estimacion"] = $Es_Estim;
                            $data_adjunto["Numero_Estimacion"] = $Numero_Estimacion;
                            //$data_adjunto["Documento"] = $Documento;
                            $data_adjunto["Es_Prorroga"] = $Es_Prorr;
                            $data_adjunto["Numero_Prorroga"] = $Numero_Prorroga;
                            $data_adjunto["idSubDocumento"] = $idSubDocumento;
                            
                            
                          
                            
                            if($this->datos_model->agregar_documento_digital($data_adjunto, $idEjercicio)){
                                $data_a = array('Estatus' => 10);
                                $resp = $this->datos_model->update_relacion($data_a, $idRel);
                            }
                            unlink($filen);
                        }
                    }
                //redirect(site_url("archivo/estado_de_carga/".$idArchi."/".$idTpDoc."/".$idEjercicio));
                //redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
                header("Location:" . site_url('archivo/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/'.$Numero_Estimacion.'#section_'.$idTpDoc));
            }else{
                //redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
                header("Location:" . site_url('archivo/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'#section_'.$idTpDoc));
            }
        }else if($action == 4){// Definicion de la Ubicacion Fisica de la categoria 
             
            $idArchi = $this->input->post('idArchivo');
            $idTpDoc = $this->input->post('idTpDocub');
            $idProceso = $this->input->post('idProceso_uf');
            $idSubProceso = $this->input->post('idSubProceso_uf');
            
            $idRel = $this->datos_model->verifica_relacion($idArchi, $idTpDoc);
            
            if(!$idRel){
                $idRel = $this->datos_model->crear_relacion($idArchi, $idTpDoc);
                $data_a = array('Estatus' => 10);
                $resp = $this->datos_model->update_relacion($data_a, $idRel);
            }
             
            $data = array(
                'idRel_Archivo_Documento' => $idRel,
                'Columna' => $this->input->post("Columna"),
                'Fila' => $this->input->post("Fila"),
                'Carpeta' => $this->input->post("Carpeta"),
                'Metadato' => $this->input->post("Metadato")
            );
            
            $relaciones_archivo = $this->datos_model->get_relacion_id_archivo($idArchi);
            $indicador = 0;
            foreach ($relaciones_archivo->result() as $relacion_archivo){
                $ubic_rel = $this->datos_model->getUbicacionFisica($relacion_archivo->id);
                if($ubic_rel){
                    $indicador++;
                }
            }
            if($indicador == 0){
                
                foreach ($relaciones_archivo->result() as $relacion_archivo){
                    $dataG = array(
                        'idRel_Archivo_Documento' => $relacion_archivo->id,
                        'Columna' => $this->input->post("Columna"),
                        'Fila' => $this->input->post("Fila"),
                        'Carpeta' => $this->input->post("Carpeta"),
                        'Metadato' => $this->input->post("Metadato")
                    );
                    $ubic_rel = $this->datos_model->getUbicacionFisica($relacion_archivo->id);
                    if($ubic_rel){
                        $ubic = $ubic_rel->row();
                        $result = $this->datos_model->update_Ubicaciones_fisicas_individuales($dataG, $ubic->id);
                    }else{
                        $result = $this->datos_model->crear_Ubicaciones_fisicas_individuales($dataG);
                    }
                }
                $data_a = array(
                        'Columna' => $this->input->post("Columna"),
                        'Fila' => $this->input->post("Fila"),
                        'Carpeta' => $this->input->post("Carpeta"),
                        'Metadato' => $this->input->post("Metadato")
                    );
                
                $resp = $this->datos_model->updateArchivo($data_a, $idArchi);
                
            }else{
                $ubic_rel = $this->datos_model->getUbicacionFisica($idRel);
                if($ubic_rel){
                    $ubic = $ubic_rel->row();
                    $result = $this->datos_model->update_Ubicaciones_fisicas_individuales($data, $ubic->id);
                }else{
                    $result = $this->datos_model->crear_Ubicaciones_fisicas_individuales($data);
                }
            }
            
            //redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
            
            header("Location:" . site_url('archivo/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));
            
        }else if($action == 5){ // Definicion del Estatus de la Categoria y Titulaeidad
            
            $idArchi = $this->input->post('idArchivo');
            $idTpDoc = $this->input->post('idTpDocuest');
            $idProceso = $this->input->post('idProceso_est');
            $idSubProceso = $this->input->post('idSubProceso_est');
            
            $idRel = $this->datos_model->verifica_relacion($idArchi, $idTpDoc);
            if($idRel){
                //$idRel = $this->datos_model->crear_relacion($idArchi, $idTpDoc);
                $data = array(
                    'Estatus' => $this->datos_model->get_id_estatus($this->input->post("idEstatus")),
                    'idTitularidad' => $this->input->post("idTitularidad")
                );
                $resp = $this->datos_model->update_relacion($data, $idRel);
            }
            //redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
            header("Location:" . site_url('archivo/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));
            
        }else if($action == 6){// Definicion de la Ubicaicon Global del Archivo (Proceso Eliminado en el sistema )
                $idArchi = $this->input->post('idArchivo');
                
                $data = array(
                    'UbicacionGlobal' => 1,
                    'Columna' => $this->input->post('Columna'),
                    'Fila' => $this->input->post('Fila'),
                    'Carpeta' => $this->input->post('Carpeta'),
                    'Metadato' => $this->input->post('Metadato')
                );
                
                if($this->datos_model->updateArchivo($data, $idArchi)){
                    $relaciones_archivo = $this->datos_model->get_relacion_id_archivo($idArchi);
                    foreach ($relaciones_archivo->result() as $relacion_archivo){
                        $dataUb = array(
                               'idRel_Archivo_Documento' => $relacion_archivo->id,
                               'Columna' => $this->input->post('Columna'),
                               'Fila' => $this->input->post('Fila'),
                               'Carpeta' => $this->input->post('Carpeta'),
                               'Metadato' => $this->input->post('Metadato')
                            );
                        $ubic_rel = $this->datos_model->getUbicacionFisica($relacion_archivo->id);
                        if($ubic_rel){
                            //$ubic = $ubic_rel->row();
                            //$result = $this->datos_model->update_Ubicaciones_fisicas_individuales($dataUb, $ubic->id);
                        }else{
                            $result = $this->datos_model->crear_Ubicaciones_fisicas_individuales($dataUb);
                        }
                    }
                }
                redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');

        }else{
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
        }
        
    }
    
    public function estado_de_carga($id_archivo = null, $idTpDoc = null, $idEjercicio = null){
        
        //$data["Archivo"] = $this->datos_model->datos_Archivo($id_archivo)->row_array();
        $data["idArchivo"] = $id_archivo;
        $data["idEjercicio"] = $idEjercicio;
        list($idSP, $NSP, $idP, $NP, $NomDoc) = $this->datos_model->get_proceso_suproc($idTpDoc);
        $data["idTpDoc"] = $idTpDoc;
        $data["idSubProceso"] = $idSP;
        $data["idProceso"] = $idP;
        $data["NomDocumento"] =  $NomDoc;
        $data["NomProcesos"] =  $NP;
        $data["NomSubProcesos"] =  $NSP;
        $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
        $data["Estatus_select"] = $this->datos_model->get_Estatus_select();
        //$data["Historia_Doc"] = $this->datos_model->get_Historia_tpDoc($id_archivo, $idTpDoc, $idEjercicio);
        
        $this->load->view('v_estados_carga_documentos.php', $data);
    }
    
    public function ubicacion_global($idArchivo = null){
        $idArchivo = $_POST['idArchivo'];
        $archivo = $this->datos_model->verifica_ubicacion_global($idArchivo);
        $data = array();
        if($archivo){
            $arch = $archivo->row();
            $data['Estado'] = 'Sin Ubicacion Global';
            if($arch->UbicacionGlobal == 1){
                $data['Estado'] = 'Ubicacion global';
            }
            $data['Columna'] = $arch->Columna;
            $data['Fila'] = $arch->Fila;
            $data['Carpeta'] = $arch->Carpeta;
            $data['Metadato'] = $arch->Metadato;
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        }else{
            echo 'Sin Relacion';
        }
    }
    
    public function ubicacion($idArchivo = null, $idTpDoc = null){
        $idArchivo = $_POST['idArchivo'];
        $idTpDoc = $_POST['idTpDoc'];
        $accion = $this->datos_model->verifica_relacion($idArchivo, $idTpDoc);
        $data = array();
        if($accion){
            $ubicacion = $this->datos_model->getUbicacionFisica($accion);
            foreach ($ubicacion->result() as $row ){
                $data['Columna'] = $row->Columna;
                $data['Fila'] = $row->Fila;
                $data['Carpeta'] = $row->Carpeta;
                $data['Metadato'] = $row->Metadato;
            }
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        }else{
            echo 'Sin Relacion';
        }
    }
    
    public function Tipo_Documento($idTpDoc = null){
        $idTpDoc = $_POST['idDoc'];
        $doc = $this->datos_model->doc_id($idTpDoc);
        $data = array();
        if($doc){
            if($doc->num_rows() > 0){
                foreach ($doc->result() as $row ){
                    $data['Es_Estimacion'] = $row->Es_Estimacion;
                    $data['Es_Prorroga'] = $row->Es_Prorroga;
                }
            }else{
                $data['Es_Estimacion'] = 0;
                $data['Es_Prorroga'] = 0;
            }
            
        }else{
            $data['Es_Estimacion'] = 0;
            $data['Es_Prorroga'] = 0;
        }
        
        $subdocs = $this->datos_model->subdocs_idDoc($idTpDoc);
        $SubDocselect = $this->datos_model->get_SubDocs_idDoc_select($idTpDoc);
        $data['SubDocs'] = $subdocs;
        $data['SubDocselect'] = $SubDocselect;
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function estatus($idArchivo = null, $idTpDoc = null){
        $idArchivo = $_POST['idArchivoo'];
        $idTpDoc = $_POST['idTpDocc'];
        
        $accion = $this->datos_model->verifica_relacion($idArchivo, $idTpDoc);
        $data = array();
        if($accion){
            $ubicacion = $this->datos_model->get_estatus_rel_id($accion);
            if($ubicacion){
                foreach ($ubicacion->result() as $row ){
                    $idEst = $this->datos_model->get_estatus_Est($row->Estatus);
                    if($idEst == false){
                        $idEst = 0;
                    }
                    $data['Estatus'] = $row->Estatus;
                    $data['idEstatus'] = $idEst;
                    $data['idTitularidad'] = $row->idTitularidad;
                }
            }
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        }else{
            //echo 'Sin Relacion';
        }
    }
    
    public function agregar_archivo(){
        if (isset($_REQUEST['Proyecto'])) { 
             $proyecto=1; 
             
         }  
         else { 
             $proyecto=0; 
             
         } 
        $data = array(
                'idUsuario' => $this->session->userdata("id"),
                'OrdenTrabajo' => $this->input->post("OrdenTrabajo"),
                'Contrato' => $this->input->post("Contrato"),
                'Obra' => $this->input->post("Obra"),
                'Descripcion' => $this->input->post("Descripcion"),
                'FechaRegistro' => date("Y-m-d G:i:s"),
                'Estatus' => 10,
                'FondodePrograma' => $this->input->post("FondodePrograma"),
                'Normatividad' => $this->input->post("Normatividad"),
                'idModalidad' => $this->input->post("idModalidad"),
                'idEjercicio' => $this->input->post("idEjercicio"),
                'proyecto' => $proyecto,
            );
        $retorno=  $this->datos_model->datos_archivo_insert($data);
        
        $id_new_archivo=$retorno['registro'];
        
        
            $Tp_plantilla = $this->datos_model->get_tipo_plantilla($this->input->post("idModalidad"), $this->input->post("Normatividad"));
            
            if($Tp_plantilla){
                if($Tp_plantilla->num_rows() > 0){
                    foreach($Tp_plantilla->result() as $dato_p){
                        $idPlantilla = $dato_p->id;
                    }
                }
                $Documentos_Totales = $this->datos_model->get_Documentos_totales_por_plantilla($idPlantilla);
                if($Documentos_Totales->num_rows() > 0){
                    foreach($Documentos_Totales->result() as $Documento){
                        $accion = $this->datos_model->insert_plantilla_en_Relaciones($Documento->id, $id_new_archivo, $Documento->ordenar);
                    }
                }
            }
        
        
        if($retorno['retorno']<0)
            header('Location:'.site_url('archivo/index/'.$retorno['error']));
        else
            header('Location:'.site_url('archivo')); 
    }
    
    public function new_archivo(){
         if (isset($_REQUEST['Proyecto'])) { 
             $proyecto=1; 
             
         }  
         else { 
             $proyecto=0; 
             
         } 
        
        if($this->input->post("id_user")){
        $data["idUsuario"] = $this->session->userdata("id");
            $data = array(
                'idUsuario' => $this->session->userdata("id"),
                'OrdenTrabajo' => $this->input->post("OrdenTrabajo"),
                'Contrato' => $this->input->post("Contrato"),
                'Obra' => $this->input->post("Obra"),
                'Descripcion' => $this->input->post("Descripcion"),
                'FechaRegistro' => date("Y-m-d G:i:s"),
                'Estatus' => 10,
                'FondodePrograma' => $this->input->post("FondodePrograma"),
                'Normatividad' => $this->input->post("Normatividad"),
                'idModalidad' => $this->input->post("idModalidad"),
                'idEjercicio' => $this->input->post("idEjercicio"),
                'proyecto' => $proyecto,
            );
            
            $id_new_archivo = $this->datos_model->newArchivo($data);
            $Tp_plantilla = $this->datos_model->get_tipo_plantilla($this->input->post("idModalidad"), $this->input->post("Normatividad"));
            
            if($Tp_plantilla){
                if($Tp_plantilla->num_rows() > 0){
                    foreach($Tp_plantilla->result() as $dato_p){
                        $idPlantilla = $dato_p->id;
                    }
                }
                $Documentos_Totales = $this->datos_model->get_Documentos_totales_por_plantilla($idPlantilla);
                if($Documentos_Totales->num_rows() > 0){
                    foreach($Documentos_Totales->result() as $Documento){
                        $accion = $this->datos_model->insert_plantilla_en_Relaciones($Documento->id, $id_new_archivo, $Documento->ordenar);
                    }
                }
            }
            
            redirect(site_url("archivo"));
        }else{
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
        }
    }
    
    public function delete_archivo($id_arch = null){
        if($id_arch){
            $data = array( 'eliminacion_logica' => 1 );
            $retorno = $this->datos_model->updateArchivo($data, $id_arch);
        }
        redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
    }
    
    public function delete_doc_anexo($idDocAdj = null, $idEjercicio = null){
        if($idDocAdj){
            $data = array( 'eliminacion_logica' => 1 );
            $retorno = $this->datos_model->update_doc_adjunto($data, $idDocAdj, $idEjercicio);
        }
        redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
    }
    
    public function documentos_json() {
        $aDocsTotales = $this->datos_model->documentos_idP_json($this->input->post("term"), $this->input->post("id"), $this->input->post("id_plantilla"));
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($aDocsTotales, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
        
    public function returndocdesrip($id = null){
        $id = $_POST['iddoc'];
        $doc = $this->datos_model->docs_id($id);
        if($doc){
            $do = $doc->Nombre;
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json');
            echo json_encode($do, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        }else{
           $do = 'Sin Documento';
        }
    }
    
    public function returndocid($id = null){
        $id = $_POST['iddoc'];
        $doc = $this->datos_model->docs_id($id);
        if($doc){
            $do = $doc->id;
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json');
            echo json_encode($do, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        }else{
           $do = 'Sin Documento';
        }
    }
    
     
    public function eliminarDir($carpeta){
        foreach(glob($carpeta . "/*") as $archivos_carpeta)
        {
            if (is_dir($archivos_carpeta))
            {
                $this->eliminarDir($archivos_carpeta);
            }
            else
            {
                unlink($archivos_carpeta);
            }
        }
        
        if(rmdir($carpeta))         // Eliminamos la carpeta vacia 
            return true;
        else
            return false;
    }
    
    public function verDoc($idDocDigital = null, $idEjercicio = null){
        
        if($idDocDigital){
            $idUser = $this->session->userdata('id');
            $dirUser = './js/documentos_vistas/'.$idUser.'/';
            $statcd = 0;
            //creando los directorios en el servidor para aguardar los documentos que seran vistos            
                if(!is_dir($dirUser)){
                    //crea la carpeta del usuario mediante su ID
                    @mkdir($dirUser, 0777);
                    $statcd = 1;
                }else{
                     //elimino la carpeta y su contenido para crearla nuevamente
                    if($this->eliminarDir($dirUser)){
                        //crea la carpeta del usuario mediante su ID
                        @mkdir($dirUser, 0777);
                        $statcd = 2;
                    }else{
                        $statcd = -2;
                    }
                }
            //una vez creados los directorios preparamos la url para Viwer JS donde se contrara el documento a mostrar
            if($statcd > 0){
                $newDirUser = '';
                for($i=0; $i<strlen($dirUser); $i++){
                    if($i>4){
                       $newDirUser .= $dirUser[$i];
                    }
                }
            }else{
                $newDirUser = false;
            }
            //depues pasamos a la creacion del documento extrayendolo de la base de datos
            $aDocumento = $this->datos_model->get_doc_adjunto($idDocDigital, $idEjercicio)->row_array();
            
                if ($aDocumento === FALSE) {
                   $newDirUser = false;
                }else{
                    $Nombre = "Documento".$idUser.$aDocumento["Extension"];
                    $contenido = bzdecompress(base64_decode($aDocumento["Datos"]));
                    $archivo = fopen(''.$dirUser.$Nombre, 'w');
                    fwrite($archivo, $contenido);
                    fclose($archivo);
                }
                if($newDirUser){
                   $data['carpeta_user'] = $newDirUser.$Nombre; 
                }else{
                    $data['carpeta_user'] = false; 
                }
                
            $data['idEjercicio'] = $idEjercicio;
            $data['extension'] = $aDocumento["Extension"];
            $data['idDocDigital'] = $idDocDigital;
            $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo';
            $this->load->view('v_verdoc_anexo', $data);
        }else{
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
        }
    }
    
    public function descargarDoc($idDocDigital = null, $idEjercicio = null){
        $aDocumento = $this->datos_model->get_doc_adjunto($idDocDigital, $idEjercicio)->row_array();
        if ($aDocumento === FALSE) {
            die("Error al obtener documento");
        }
        $blob = bzdecompress(base64_decode($aDocumento["Datos"]));
        header('Content-Type: ' . $aDocumento["Mime"]);
        $Nombre = "Doc_anexo_".$aDocumento["nombrearchivo"];
        header("Content-disposition: attachment; filename=\"" . $Nombre . "\"");
        echo $blob;
    }
    
    public function prueba_arbol($id_archivo = null) {
         
            $data["aUsuarios"] = $this->datos_model->get_usuarios();
            $data["Procesos"] = $this->datos_model->get_procesos();
            $data["SubProcesos"] = $this->datos_model->get_subprocesos();
            $data["SubProcesos_select"] = $this->datos_model->get_subprocesos_select();
            
            $this->load->view('v_prueba_arbol.php', $data);
       
    }


    public function act_ordenar() {
         
        $Rel = $this->datos_model->get_rel();
        if($Rel->num_rows() > 0){
            foreach($Rel->result() as $Re){
                $data = array( 'ordenar' => $Re->ordenar*10);
                $this->datos_model->update_rel($data, $Re->id);
            }
        }
            
        redirect('archivo/prueba_arbol');
       
    }

































    
    
    
        
        
        
        
    
    
    
    
    
    
    public function edit_db() {

        $data = array();


        $id = $this->input->post("id");

        $data["Categoria"] = $this->input->post("Categoria");
        $data["Titulo"] = $this->input->post("Titulo");
        $data["Prioridad"] = $this->input->post("Prioridad");
        $data["Descripcion"] = $this->input->post("Descripcion");
        $data["UsuarioReporta"] = $this->input->post("UsuarioReporta");
        $data["idAsignado"] = $this->input->post("idAsignado");
        $data["Sistema"] = $this->input->post("Sistema");
//        $data["FechaReporte"] = $this->input->post("FechaReporte");
//        $data["FechaUltimoAvance"] = $this->input->post("FechaUltimoAvance");
//        $data["FechaTerminacion"] = $this->input->post("FechaTerminacion");
        //$data["Estatus"] = $this->input->post("Estatus");

        $retorno = $this->datos_model->updateReporte($data, $id);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');


        header('Location: ' . site_url("archivo/"));
    }

    public function reabrir_db() {

        $data = array();

        $fechahora = time();

        $data["Comentario"] = htmlentities($this->input->post("Comentario"), ENT_QUOTES, "UTF-8");
        $data["idHelpDesk"] = $this->input->post("idHelpDesk");
        $data["idUsuario"] = $this->session->userdata("id");
        $data["fecha"] = $fechahora;

        // obtener el estatus actual del reporte

        $retorno = $this->datos_model->alta_comentario($data);

        $fin = $this->input->post("fin");
        $EstatusAvance = $this->input->post("EstatusAvance");

        $estatus = $this->datos_model->get_estatus($data["idHelpDesk"]);

       
        $data2["FechaTerminacion"] = $fechahora;
        $data2["Estatus"] = 4;
        $data2["FechaUltimoAvance"] = $fechahora;

        $retorno = $this->datos_model->updateReporte($data2, $data["idHelpDesk"]);


        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        header('Location: ' . site_url("archivo/cambios/" . $data["idHelpDesk"] . "#Avances"));
    }
    
    public function nuevo_archivo_previo() {
        
    }
    
    
    public function comentario_db() {

        $data = array();

        $fechahora = time();

        $data["Comentario"] = htmlentities($this->input->post("Comentario"), ENT_QUOTES, "UTF-8");
        $data["idHelpDesk"] = $this->input->post("idHelpDesk");
        $data["idUsuario"] = $this->session->userdata("id");
        $data["fecha"] = $fechahora;

        // obtener el estatus actual del reporte


        $retorno = $this->datos_model->alta_comentario($data);

        $fin = $this->input->post("fin");
        $EstatusAvance = $this->input->post("EstatusAvance");

        $estatus = $this->datos_model->get_estatus($data["idHelpDesk"]);

        if ($fin == "1") {
            $data2["FechaTerminacion"] = $fechahora;
            $data2["Estatus"] = 3;
        } else {
            //if ($estatus == 1) {
                // si el reporte es nuevo , cambiar a atendiendo
                // Registrar fecha de inicio de atencion
                $data2["FechaInicioAtencion"] = $fechahora;
                $data2["Estatus"] = $EstatusAvance;
            //}
        }

        $data2["FechaUltimoAvance"] = $fechahora;

        $retorno = $this->datos_model->updateReporte($data2, $data["idHelpDesk"]);


        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        header('Location: ' . site_url("archivo/cambios/" . $data["idHelpDesk"] . "#Avances"));
    }

    public function sistemas_text() {

        $aEjecutoras = $this->datos_model->sistemas_txt();

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($aEjecutoras, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function foto_db() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5000000';

        $id = $this->input->post('id');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            echo "<script>
                    if(confirm('" . $this->upload->display_errors('', '') . "')) {
                        window.location.href = '" . site_url('archivo/cambios/' . $id . '#Pantallas') . "';
                        } else {
                        window.location.href = '" . site_url('archivo/cambios/' . $id . '#Pantallas') . "';
                        }
                    </script>";
        } else {
            $data = array('upload_data' => $this->upload->data());


            if (!$data['upload_data']['is_image'] == 1) {
                echo "<script>
                    if(confirm('El archivo no es una imagen')) {
                        window.location.href = '" . site_url('archivo/cambios/' . $id . '#Pantallas') . "';
                        } else {
                        window.location.href = '" . site_url('archivo/cambios/' . $id . '#Pantallas') . "';
                        }
                    </script>";
            }


            // Convertir el archivo en cadena
            $file = $data['upload_data']['full_path'];
            $mime = $data['upload_data']['file_type'];
            //$extension = $data['upload_data']['file_ext'];
            // Procesar el archivo
            //$file_blob = bzcompress($this->uf_procesar_archivo($file, 800));
            $file_blob = $this->uf_procesar_archivo($file, 800);

            $fotografia['Pantalla'] = base64_encode($file_blob);
            $fotografia['idHelpDesk'] = $id;
            $fotografia['Mime'] = $mime;

            $retorno = $this->datos_model->foto_insert($fotografia);

            unlink($file);
            header('Location: ' . site_url('archivo/cambios/' . $id . '#Pantallas'));
        }
    }

    public function uf_procesar_archivo($binario_nombre_temporal, $maximo = 1600) {

        $image = new Imagick($binario_nombre_temporal);

        $maxsize = $maximo;

        // primero a RGB
        //	// Set to use jpeg compression
        $image->setImageCompression(Imagick::COMPRESSION_JPEG);
        $image->setImageCompressionQuality(95);

        if ($image->getImageColorspace() == Imagick::COLORSPACE_CMYK) {
            $profiles = $image->getImageProfiles('*', false);
            // we're only interested if ICC profile(s) exist 
            $has_icc_profile = (array_search('icc', $profiles) !== false);
            // if it doesnt have a CMYK ICC profile, we add one 
            if ($has_icc_profile === false) {
                $icc_cmyk = file_get_contents('/var/www/lib/Adobe_ICC_Profiles/CMYK/USWebUncoated.icc');
                $image->profileImage('icc', $icc_cmyk);
                unset($icc_cmyk);
            }
            // then we add an RGB profile 
            $icc_rgb = file_get_contents('/var/www/lib/Adobe_ICC_Profiles/RGB/sRGB_v4_ICC_preference.icc');
            $image->profileImage('icc', $icc_rgb);
            unset($icc_rgb);
        }

        $image->setImageColorSpace(1);
        $image->stripImage();

        // Resizes to whichever is larger, width or height
        if ($image->getImageHeight() <= $image->getImageWidth()) {
            // Resize image using the lanczos resampling algorithm based on width
            $image->resizeImage($maxsize, 0, Imagick::FILTER_LANCZOS, 1);
        } else {
            // Resize image using the lanczos resampling algorithm based on height
            $image->resizeImage(0, $maxsize, Imagick::FILTER_LANCZOS, 1);
        }

        $new_blob = $image->getImageBlob();
        // Destroys Imagick object, freeing allocated resources in the process
        $image->destroy();
        return $new_blob;
    }

    public function borrar_img($idReporte, $idFoto) {
        $this->datos_model->foto_borrar($idFoto);

        header('Location: ' . site_url('archivo/cambios/' . $idReporte . '#Pantallas'));
    }

    public function borrar_avance($idReporte, $idAvance) {
        $this->datos_model->avance_borrar($idAvance);
        header('Location: ' . site_url('archivo/cambios/' . $idReporte . '#Avances'));
    }

    
    
    
     public function listado_sub_documentos_mod($id) {
        ini_set("memory_limit","100000M");
       
        
        $this->load->model('subdocumentos_model');
        $qSubDocumentos = $this->subdocumentos_model->listado_subdocumentos_documento($id);
        
      
        
        
         $tabla='<table class="table table-striped table-bordered table-hover table-condensed" width="800" border="0" cellpadding="1" cellspacing="0" id="t_aprovisionamientos_concepto">
                                            <thead>
                                                <tr valign="top">
                                                    <th scope="col">Acci&oacute;n</th>
                                                    <th scope="col">Descripción</th>
                                                </tr>
                                            </thead>';
        
        foreach ($qSubDocumentos->result() as $rowdata) {
            $tabla.='<tr>';
            $tabla.='<td>';
            $tabla.='<a href="#" class="btn btn-default btn-xs"  id="reg'. $rowdata->id .'" onclick="modificar_sub_documento_mod('. $rowdata->id.')">Seleccionar</a>';
            $tabla.='</td>';
            $tabla.='<td>';
            $tabla.= $rowdata->Nombre; 
            $tabla.='</td>';
            $tabla.='</tr>';
        } 
         $tabla.='
        </tbody>
       </table>';
        $output= $tabla;
        
        //header('Cache-Control: no-cache, must-revalidate');
        //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        //header('Content-type: application/json');
        echo json_encode($output, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
         
    }
   
    
     public function datos_subdocumento($id) {
        $this->load->model('subdocumentos_model');
        $dSudDocumento = $this->subdocumentos_model->datos_subdocumento($id)->row_array();
        echo json_encode($dSudDocumento);
    } 
    
    
    public function no_subdocumento($id) {
        $this->load->model('subdocumentos_model');
        $dSudDocumento = $this->subdocumentos_model->listado_subdocumentos_documento($id);
        
        
        $data =array();
        $data['numero']= $dSudDocumento->num_rows();
        echo json_encode($data);
    } 
    
    
    public function cambio_estatus($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_revision");
        $idArchivo=$this->input->post("idArchivo_revision");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus($idArchivo,$idTipoProceso, $estatus);
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }


    
    public function cambio_estatus_foliado($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_foliado");
        $idArchivo=$this->input->post("idArchivo_foliado");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus($idArchivo,$idTipoProceso, $estatus);
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }

    
    public function cambio_estatus_digitalizar($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_digitalizar");
        $idArchivo=$this->input->post("idArchivo_digitalizar");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus($idArchivo,$idTipoProceso, $estatus);
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }
    
    
    
    public function cambio_estatus_validar($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_validar");
        $idArchivo=$this->input->post("idArchivo_validar");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus($idArchivo,$idTipoProceso, $estatus);
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }
    
    
    public function cambio_estatus_editar($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_editar");
        $idArchivo=$this->input->post("idArchivo_editar");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus($idArchivo,$idTipoProceso, $estatus);
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }
    
    
    
      public function cambio_estatus_finalizar($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_finalizar");
        $idArchivo=$this->input->post("idArchivo_finalizar");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus($idArchivo,$idTipoProceso, $estatus);
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }
    
    
     public function cambio_estatus_rechazar($estatus) {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_rechazar");
        $idArchivo=$this->input->post("idArchivo_rechazar");
        
       
        
        
        $retorno = $this->rel_archivo_documento_model->cambiar_estatus_rechazar($idArchivo,$idTipoProceso, $estatus,$this->input->post("motivo"));
       
        
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }

    
    
     public function agregar_observaciones_bloque() {
        $this->load->model('rel_archivo_documento_model');
        
        $idTipoProceso=$this->input->post("idTipoProceso_observacion");
        $idArchivo=$this->input->post("idArchivo_observacion");
        
        
        $retorno = $this->rel_archivo_documento_model->agregar_observaciones_bloque($idArchivo,$idTipoProceso,$this->input->post("motivo"));
       
       
        
        if ($retorno == 0) {
            die('Estatus Actual no Permitido');
        }
        
        $idSubProceso=0;
        $idTpDoc=0;
        header("Location:" . site_url('archivo/cambios/'. $idArchivo.'/'.$idTipoProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));   
        
    }
    
    public function ver_historia_bloque($idArchivo,$idTipoProceso) {
         $this->load->model('rel_archivo_documento_model');
         $this->load->model('control_usuarios_model');
         $this->load->model('datos_model');
         
         $aUsuarios=$this->control_usuarios_model->addw_Usuarios();
       
         $addw_Estatus_Bloque= $this->datos_model->addw_Estatus_Bloque();
         
         $qHistorial=$this->rel_archivo_documento_model->listado_historial_bloque($idArchivo,$idTipoProceso);
         
         
         $tabla='
         
         
          <table class="table table-striped table-hover table-condensed" id="tabla_scroll">
                            <thead>
                                <tr>                                    
                                    <th>
                                        #
                                    </th>                                    
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    <th>
                                        Estatus
                                    </th>
                                    <th>
                                        Motivo
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
         ';
         
         
                                if (isset($qHistorial)) {
                                    if ($qHistorial->num_rows() > 0) {
                                        $i = 0;
                                        foreach ($qHistorial->result() as $rHistorial) {
                                            $i++;
                                            
                                           $tabla.= "<tr>";
                                           $tabla.=  "<td>" . $i . "</td>";
                                           $tabla.= "<td class='sinwarp'>" .date("d-m-Y h:i:s", strtotime($rHistorial->Fecha)) . "</td>";
                                           $tabla.="<td>" . $aUsuarios[$rHistorial->idUsuario] . "</td>"; 
                                                        
                                                
                                           $tabla.="<td>" . $addw_Estatus_Bloque[$rHistorial->Estatus]. "</td>";
                                           $tabla.="<td class='text-justify'>" . $rHistorial->Motivo. "</td>";     
                                               
                                           $tabla.= "</tr>";
                                            
                                        }
                                    }
                                }
        
                                
        $tabla.=' </tbody>
                        </table> ';                        
                                
        $data=array();
        $data["historial"]=$tabla;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);                      
         
         
    }
   
    
    
    public function ver_observaciones_bloque($idArchivo,$idTipoProceso) {
         $this->load->model('rel_archivo_documento_model');
         $this->load->model('control_usuarios_model');
         $this->load->model('datos_model');
         
         $aUsuarios=$this->control_usuarios_model->addw_Usuarios();
       
         $addw_Estatus_Bloque= $this->datos_model->addw_Estatus_Bloque();
         
         $qHistorial=$this->rel_archivo_documento_model->listado_observaciones_bloque($idArchivo,$idTipoProceso);
         
         
         $tabla='
         
         
          <table class="table table-striped table-hover table-condensed" id="tabla_scroll">
                            <thead>
                                <tr>                                    
                                    <th>
                                        #
                                    </th>                                    
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    <th>
                                        Estatus
                                    </th>
                                    <th>
                                        Motivo
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
         ';
         
         
                                if (isset($qHistorial)) {
                                    if ($qHistorial->num_rows() > 0) {
                                        $i = 0;
                                        foreach ($qHistorial->result() as $rHistorial) {
                                            $i++;
                                            
                                           $tabla.= "<tr>";
                                           $tabla.=  "<td>" . $i . "</td>";
                                           $tabla.= "<td class='sinwarp'>" .date("d-m-Y h:i:s", strtotime($rHistorial->Fecha)) . "</td>";
                                           $tabla.="<td>" . $aUsuarios[$rHistorial->idUsuario] . "</td>"; 
                                                        
                                                
                                           $tabla.="<td>" . $addw_Estatus_Bloque[$rHistorial->Estatus]. "</td>";
                                           $tabla.="<td class='text-justify'>" . $rHistorial->Motivo. "</td>";     
                                               
                                           $tabla.= "</tr>";
                                            
                                        }
                                    }
                                }
        
                                
        $tabla.=' </tbody>
                        </table> ';                        
                                
        $data=array();
        $data["historial"]=$tabla;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);                      
         
         
    }
  
    
    
    
    public function ver_ubicaciones_libres() {
        $this->load->model("ubicacion_fisica_model");
        $qColumnas=$this->ubicacion_fisica_model->listado_ubicacion_ordenada_por_columna();
        
         
         
         $tabla='
         
         
          <table class="table table-striped table-hover table-condensed" id="tabla_scroll">
                            <thead>
                                <tr>                                    
                                                                      
       ';                                    

                  
                                                    foreach ($qColumnas->result() as $rowdata){ 
                                                        $tabla.=' <th scope="col">' .  $rowdata->Columna .'</th>';
                                                     }
                 
        $tabla.='         

                                </tr>
                            </thead>
                            <tbody>
         ';
         
         
                                for( $i= 1 ; $i <= 4 ; $i++ ){
                                     $tabla.= "<tr>";
                                    foreach ($qColumnas->result() as $rowdata){

                                               $qCajas=$this->ubicacion_fisica_model->listado_ubicacion_ordenada_por_caja($rowdata->Columna,$i);
                                               $Ubicaciones_disponibles="";
                                               foreach ($qCajas->result() as $rRow_cajas) { 
                                                   $click="uf_agregar_ubicacion_fisica(".$rRow_cajas->id.",'". $rRow_cajas->Columna .'.'. $rRow_cajas->Fila .'.'. $rRow_cajas->Posicion.'.'. $rRow_cajas->Caja.'.'. $rRow_cajas->Apartado ."')";
                                                   $Ubicaciones_disponibles.='<a href="#" onclick='.$click.'>' . $rRow_cajas->Columna .'.'. $rRow_cajas->Fila .'.'. $rRow_cajas->Posicion.'.'. $rRow_cajas->Caja.'.'. $rRow_cajas->Apartado . '</a>';
                                                   $Ubicaciones_disponibles.="<br>";
                                               }
                                               
                                                
                                                $tabla.="<td class='text-justify'>" . $Ubicaciones_disponibles .  "</td>";  
                                               
                                               
                                        }
                                    $tabla.= "</tr>";    
                                 }   
       
        $tabla.=' </tbody>
                        </table> ';                        
                                
        $data=array();
        $data["ubicacion_fisica_libre"]=$tabla;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);                      
         
         
    }
    
    public function agregar_ubicacion_fisica(){
        $this->load->model('ubicacion_fisica_model');
        $idArchivo = $this->input->post('idArchivo');
         
         $data=array(
            'idTipoProceso'=> strtoupper($this->input->post('idTipoProceso_ubicacion')),
            'idUbicacionFisica'=> $this->input->post('idUbicacionFisica'),
            'Caja'=>  $this->input->post('txtCaja'),
            'Documentos'=>  $this->input->post('documento_ubicacion'),
            'idArchivo'=>  $this->input->post('idArchivo'),
            'NoFolioInicial'=>  $this->input->post('txtFolioInicial'),
            'NoFolioFinal'=>  $this->input->post('txtFolioFinal'),
            'NoHojas'=>  $this->input->post('noHojas'),
             );
         
        $retorno = $this->ubicacion_fisica_model->agregar_ubicacion_fisica($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('archivo/cambios/' . $idArchivo));
        else
            header('Location:'.site_url('archivo/cambios/' . $idArchivo . '/' . $retorno['error']));
    }
    
    public function modificar_ubicacion_fisica(){
         $this->load->model('ubicacion_fisica_model');
         
         $idArchivo = $this->input->post('idArchivo_mod');
         $id = $this->input->post('idRel_mod');
         $data=array(
            
            'idUbicacionFisica'=> $this->input->post('idUbicacionFisica_mod'),
            'Caja'=>  $this->input->post('txtCaja_mod'),
            'Documentos'=>  $this->input->post('documento_ubicacion_mod'),
            
            'NoFolioInicial'=>  $this->input->post('txtFolioInicial_mod'),
            'NoFolioFinal'=>  $this->input->post('txtFolioFinal_mod'),
            'NoHojas'=>  $this->input->post('noHojas_mod'),
             );

        $retorno =  $this->ubicacion_fisica_model->datos_relacion_ubicacion_update($data, $id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('archivo/cambios/' . $idArchivo));
        else
            header('Location:'.site_url('archivo/cambios/' . $idArchivo . '/' . $retorno['error']));
    }
    
    public function eliminar_relacion_ubicacion($id){
        $this->load->model('ubicacion_fisica_model');
        $idArchivo = $this->input->post('idArchivoAux');
        //echo $id. 'Aqui';
       // exit();
        //$pizza  = "porción1 porción2 porción3 porción4 porción5 porción6";
        $porciones = explode(" ", $id);
        echo $porciones[0] .'idRel'; // porción1 idRelacion
        echo $porciones[1] . 'idArc'; // porción2 idArchivo
        exit();
        $Estatus=0;
        $data=array(
            
            'Estatus'=> $Estatus ,
            );
        $retorno = $this->ubicacion_fisica_model->datos_relacion_ubicacion_update($data, $porciones[0]);
        //$retorno = $this->procesos_model->datos_proceso_delete($id);
        //$query = $this->procesos_model->datos_proceso_delete($id);
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('archivo/cambios/' . $porciones[1] . $retorno['error']));
        else
            header('Location:'.site_url('archivo/cambios/' .$porciones[1])); 
    }
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
