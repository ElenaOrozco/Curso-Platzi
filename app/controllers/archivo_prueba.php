<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivo_prueba extends MY_Controller {

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
        $data["Tipos_Arch"] = $this->datos_model->get_Tipos_Arch_select();
        $data["Tam_Norm"] = $this->datos_model->get_Tam_Norm_select();
        $data["Tipos_uni"] = $this->datos_model->get_Tipos_uni_select();
        $data["Titularidades"] = $this->datos_model->get_Titularidades_select();
        $data["Direcciones"] = $this->datos_model->get_Direcciones_select();
        $data["Ejercicios"] = $this->datos_model->get_Ejercicio_select();
        $data["Modalidades"] = $this->datos_model->get_Modalidades_select();
        /*
        $data["aCategorias"] = array(0 => "N/D", 1 => "Falla (bug)", 2 => "Modificación", 3 => "Rediseño", 4 => "Proceso de Datos", 5 => "Sistema Nuevo");
        $data["aPrioridad"] = array(0 => "N/D", 1 => "Baja", 2 => "Media", 3 => "Alta", 4 => "Urgente");
        $data["aEstatus"] = array(0 => "Baja", 1 => "Nueva", 2 => "Atendiendo", 3 => "Terminada", 4 => "Re Abierta",  5 => "Atendiendo - En Pruebas",  6 => "Atendiendo - Liberada");
        */
        $this->load->view('v_listado.php', $data);
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
        
        
        /*
        if ($id_archivo != 0) {
            
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
         * 
         * 
         * 
         */
        
        $data['usuario'] = $this->session->userdata('nombre');
        
        $this->load->library('ferfunc');
        
        $data["idArchivo"] = $id_archivo;
        $data["idProceso"] = $idProceso;
        $data["idSubProceso"] = $idSubProceso;
        $data["idDocumento"] = $idDocumento;
        $data["Numero_Estimacion"] = $Numero_Estimacion;
       
        
        $data["aArchivo"] = $this->datos_model->datos_Archivo($id_archivo)->row_array();
        $data["qProcesos"] = $this->datos_model->get_procesos();
      
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        $this->load->view('v_pant_archivo_documentos.php', $data);
        
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
                            $data_adjunto["Numero"] = ' Numero';
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
                if($this->input->post('Es_Estimacion')){
                    $Es_Estim = 1;
                    $Numero_Estimacion = $this->input->post('Numero_Estimacion');
                    $Documento = $this->input->post('Documento_est');
                }else{
                    $Es_Estim = 0;
                    $Numero_Estimacion = 0;
                }
                if($this->input->post('Es_Prorroga')){
                    $Es_Prorr = 1;
                    $Numero_Prorroga = $this->input->post('Numero_Prorroga');
                    $Documento = $this->input->post('Documento_prorr');
                }else{
                    $Es_Prorr = 0;
                    $Numero_Prorroga = 0;
                }
                    
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
                            $data_adjunto["Descripcion"] = 'Descripcion'; //$this->input->post('Descripcion')
                            $data_adjunto["FechaHora"] = date('Y-m-d G:i:s');
                            $data_adjunto["Mime"] = $mime;
                            $data_adjunto["Estatus"] = 10;
                            $data_adjunto["Extension"] = $extension;
                            $data_adjunto["Datos"] = base64_encode(bzcompress($Datos));
                            $data_adjunto["Firma"] = $firma;
                            $data_adjunto["nombrearchivo"] = $nom;
                            $data_adjunto["Es_Estimacion"] = $Es_Estim;
                            $data_adjunto["Numero_Estimacion"] = $Numero_Estimacion;
                            $data_adjunto["Documento"] = $Documento;
                            $data_adjunto["Es_Prorroga"] = $Es_Prorr;
                            $data_adjunto["Numero_Prorroga"] = $Numero_Prorroga;

                            if($this->datos_model->agregar_documento_digital($data_adjunto, $idEjercicio)){
                                $data_a = array('Estatus' => 10);
                                $resp = $this->datos_model->update_relacion($data_a, $idRel);
                            }
                            unlink($filen);
                        }
                    }
                //redirect(site_url("archivo/estado_de_carga/".$idArchi."/".$idTpDoc."/".$idEjercicio));
                //redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
                
                header("Location:" . site_url('archivo_prueba/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/'.$Numero_Estimacion.'#section_'.$idTpDoc));
            
                    
            }else{
                //redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
                 header("Location:" . site_url('archivo_prueba/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'#section_'.$idTpDoc));
          
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
            
            header("Location:" . site_url('archivo_prueba/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));
            
            
            
        }else if($action == 5){// Definicion del Estatus de la Categoria y Titulaeidad
                
                $idArchi = $this->input->post('idArchivo');
                $idTpDoc = $this->input->post('idTpDocub');
                $idProceso = $this->input->post('idProceso_uf');
                $idSubProceso = $this->input->post('idSubProceso_uf');
           
                
                $idRel = $this->datos_model->verifica_relacion($idArchi, $idTpDoc);
                if($idRel){
                    //$idRel = $this->datos_model->crear_relacion($idArchi, $idTpDoc);
                    $data = array(
                        'Estatus' => $this->datos_model->get_id_estatus($this->input->post("idEstatus")),
                        'idTitularidad' => $this->input->post("idTitularidad")
                    );
                    $resp = $this->datos_model->update_relacion($data, $idRel);
                }
            //    redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'archivo');
                
                header("Location:" . site_url('archivo_prueba/cambios/'. $idArchi.'/'.$idProceso.'/'.$idSubProceso.'/'.$idTpDoc.'/-1'.'#section_'.$idTpDoc));
            

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
    
    public function new_archivo(){
        
        if($this->input->post("id_user")){
           
            $data = array(
                'idUsuario' => $this->input->post("id_user"),
                'OrdenTrabajo' => $this->input->post("OrdenTrabajo"),
                'Contrato' => $this->input->post("Contrato"),
                'Obra' => $this->input->post("Obra"),
                'Descripcion' => $this->input->post("Descripcion"),
                'FechaRegistro' => date("Y-m-d G:i:s"),
                'Estatus' => 10,
                'FondodePrograma' => $this->input->post("FondodePrograma"),
                'Normatividad' => $this->input->post("Normatividad"),
                'idModalidad' => $this->input->post("idModalidad"),
                'idEjercicio' => $this->input->post("idEjercicio")
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

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
