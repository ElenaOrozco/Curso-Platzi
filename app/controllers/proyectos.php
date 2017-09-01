<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proyectos extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('datos_model');
        $this->load->model('usuarios_model');
        $this->load->library('ferfunc');
        //$this->load->helper('form');
    }

    public function index() {
        
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Proyectos","P")==false ){
            header("Location:" . site_url('principal'));
        }
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Versión: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, estimaciones, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );

        $data['usuario'] = $this->session->userdata('nombre');
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        
        $this->load->model("proyectos_model");
        $data["qProyectos"] = $this->proyectos_model->listado();
       
        $data["preregistro"]=$this->session->userdata('preregistro');
          
        if ($data["preregistro"]== 0){
        $this->load->view('v_pant_proyectos.php', $data);
            
            
        }else {
            $this->load->view('v_pant_principal', $data);
        }
            
        
        
    }
    
    
    public function ot_json() {
        $term = $this->input->post("term");
        $id = $this->input->post("id");
        $this->load->model('proyectos_model');
       
        $aRemitente = $this->proyectos_model->ot_json($term,$id);
        
        //print_r($aRemitente);
        
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($aRemitente, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    
    public function asignar_ubicacion(){
        $this->load->model('proyectos_model');
        $this->load->model('ubicacion_proyectos_model');
        
        $idArchivo =  $this->input->post("idArchivo");
        $carpeta   =  $this->input->post("carpeta");
        $cm        =  $this->input->post("cm");
        
        //buscar ubicaciones disponibles
        $ubicacion  = $this->proyectos_model->buscar_ubicacion_disponible($cm)->row_array();
        $e = "";
        $resultado = "";
        
        if ($ubicacion < 0){                                             //error ubicacion
          $e = "No hay ubicaciones Disponibles";
          
          
        } else { 
            $data = array (
                "cm_utilizados"  => $ubicacion["cm_utilizados"] + $cm,
               
            );
            
            $actualizacion  = $this->ubicacion_proyectos_model->actualizar_cm($ubicacion["id"], $data);      //marcar los cm ocupado
            
            
            if ($actualizacion['retorno'] < 0){                                //error actualizacion
                $e = "No se pudo actualizar la base de datos";
            } else {
                
                $data = array(
                    "idArchivo"             => $idArchivo,
                    "idUbicacion"           => $ubicacion["id"],
                    'fecha_ingreso'         => date('Y-m-d H:i:s'),
                    "carpeta"               => $carpeta,
                    "cm"                    => $cm
                );

                $retorno = $this->proyectos_model->asignar_ubicacion($data);
                if ($retorno['retorno'] < 0){                                //error asignacion
                    $e = "No se pudo actualizar la base de datos al asignar";
                } else {
                    $resultado = $ubicacion["id"];
                    //proyectos en la misma ubicacion
                    $no_proyectos_anaquel = $this->proyectos_model->no_proyectos_anaquel($ubicacion["id"])->num_rows();
                }
            }
            
            
            
           
        }
        
        $data =array();
        $data['error']= $e;
        $data['ubicacion']= $ubicacion['id'] . "." . $ubicacion['columna'] . "." .$ubicacion['fila'] . "." . $no_proyectos_anaquel;
        $data['Ubicacion']= $ubicacion['id'] ;
        $data['Isla']= $ubicacion['no_isla'] ;
        $data['Columna'] = $ubicacion['columna'];
        $data['Fila'] = $ubicacion['fila'] ;
        $data['numero'] =  $no_proyectos_anaquel;
        echo json_encode($data);
        
        
        
    }
    
    public function importa_ubicaciones_base_db( $debug = 0) {
       

        
        
        $this->load->model('ubicacion_proyectos_model');
      
        $config['upload_path'] = 'temp/';
        $config['allowed_types'] = 'xls|xlsx|XLS|XLSX';
        $config['file_name'] = md5(microtime());
        


        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);      

        
        
       

        if (!$this->upload->do_upload()) {
            echo "Error al cargar la base de datos"; 
            exit;
        } else {
           
            
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
            //$data['upload_data']['file_name'];
            $nombre_definitivo = $data['upload_data']['full_path'];
            chmod($nombre_definitivo, 0776);

            $binario_tipo = $data['upload_data']['file_type'];
            $file_ext = $data['upload_data']['file_ext'];
            $versionExcel = "";
            $extension = "";

            if ($file_ext == ".xlsx") {
                $versionExcel = "Excel2007";
                $extension = "xlsx";
            } else if ($file_ext == ".xls") {
                $versionExcel = "Excel5";
                $extension = ".xls";
            } else {
                die("No es excel<br>".$binario_tipo.$file_ext);
                die("No es excel<br>" . $file_ext);
            }

            $hojaactiva = 0;

            echo $nombre_definitivo;
            echo "Hasta aqui";
            $this->load->library("excel");
            echo "Cargo excel";
            $this->excel->load($nombre_definitivo, $versionExcel);
            $objWorksheet = $this->excel->setActiveSheetIndex($hojaactiva);


            $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
            //$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5

            


            $row_Inicia = 3;
            /*
              for ($row = 1; $row <= $highestRow; ++$row) {
              if ($objWorksheet->getCellByColumnAndRow(0, $row)->getValue()=="Código") {
              $row_Inicia=$row+1;
              break;
              }
              }
             */
            $contador = 1;
            $numero = 0;
            
           
            
           
            
            
            for ($row = $row_Inicia; $row <= $highestRow; ++$row) {
                // Leer siempre la columna 0
                //$guia = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                

                
                
                if (($objWorksheet->getCellByColumnAndRow(1, $row)->getValue() != "") && ($objWorksheet->getCellByColumnAndRow(2, $row)->getValue() != "") && ($objWorksheet->getCellByColumnAndRow(3, $row)->getValue() != "") ) {
                   
                  

                        $Isla = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $Columna = $objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $Fila = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                        //$Posicion = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                        
                       
                       
                       
                        
                        // sacarconcepto
                        $sqldata = array();
                        $sqldata['no_isla'] = $Isla;
                        $sqldata['columna'] = $Columna;
                        $sqldata['fila'] = $Fila;
                       
                        echo $Isla;
                        echo "-";
                        echo $Columna;
                       
                        echo "-";
                        echo $Fila;
                        
                       
                        echo $row;
                       
                       
                        
                        
                       
                        
                        $this->ubicacion_proyectos_model->insert_ubicacion($sqldata);
                    
                }






               
            }
            
            if ($debug != 1) {
            header('Location: ' . site_url("proyectos"));
            }
        }
        
       
        
    }
    
    
    public function actualizar_tabla(){
        $this->load->model("proyectos_model");
        $qProyectos = $this->proyectos_model->listado(); 
        $pregunta ="¿Desea liberar ubicación?";
        $tabla = '<table class="table table-responsive table-striped table-hover table-bordered" id="t_listado">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1">
                                                Acción
                                            </th>
                                            
                                            <th class="col-md-2">
                                                Orden de Trabajo
                                            </th>
                                            <th class="col-md-2">
                                                Contrato
                                            </th>
                                            <th class="col-md-2">
                                                Obra
                                            </th>                               
                                            <th class="col-md-2">
                                                Datos
                                            </th>

                                            <th class="col-md-1">
                                                Ubicación
                                            </th> 


                                        </tr>
                                    </thead>
                                    <tbody> ';
                                        
                                        if (isset($qProyectos)) {
                                            if ($qProyectos->num_rows() > 0) {
                                                $i=1;
                                                $isla_aux="";
                                                $fila_aux="";
                                                $columna_aux="";
                                                foreach ($qProyectos->result() as $rProyectos) {
                                                    /*echo $rProyectos->OrdenTrabajo . "</br>" ;
                                                    echo $rProyectos->no_isla . "- Isla " .$isla_aux;
                                                    echo $rProyectos->columna . "- Col " .$columna_aux;
                                                    echo $rProyectos->fila . "- Fila " .$fila_aux . "</br>";
                                                    echo $rProyectos->cm ;*/
                                                    
                                                    
                                                    if ($rProyectos->fila != $fila_aux){
                                                        $i=1;
                                                    }
                                                    if ( ($rProyectos->no_isla == $isla_aux) && ($rProyectos->fila == $fila_aux) && ($rProyectos->columna == $columna_aux) ){
                                                        
                                                        $i++;
                                                    }
                                                    
                                                    
                        $tabla .=                   '<tr>';
                        $tabla .=                    '<td> 
                                                        <a href="#" class="btn btn-success btn-sm" title="Modificar Asignación"  data-toggle="modal" data-target="#modal-modificar-cat" role="button" onclick="uf_modificar_asignacion('. $rProyectos->id . ",'". $rProyectos->OrdenTrabajo ."'" .')"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                                                        <a class="btn btn-danger btn-sm del_documento" title="Liberar Ubicación" onclick="return confirm('. "'". $pregunta . "'".');" target="_self" href="'. site_url('proyectos/eliminar_ubicacion/' . $rProyectos->id .'/' . $rProyectos->cm .'/'. $rProyectos->idUbicacion) .'" ><span class="glyphicon glyphicon-remove" ></span></a>
                                                     </td>';                                
                        $tabla .=                    '<td> '. $rProyectos->OrdenTrabajo . '</td>';
                        $tabla .=                    '<td> '. $rProyectos->Contrato . '</td>';
                        $tabla .=                    '<td> '. $rProyectos->Obra . '</td>';
                        
                        $tabla .=                    '<td> '. $rProyectos->carpeta. '</br>' . $rProyectos->cm .'</td>';
                        $tabla .=                    '<td> '. $rProyectos->no_isla . "." . $rProyectos->columna . "." . $rProyectos->fila . "." . $i  . '</td>';
                        
                                                        
                                                    $isla_aux = $rProyectos->no_isla ;
                                                    $fila_aux = $rProyectos->fila;
                                                    $columna_aux = $rProyectos->columna ;
                                                } // foreach
                                            } // if numrows
                                        } // if isset
                                        
                        $tabla .=      '</tbody>';
                        $tabla .=    '</table>';
                        
                        
        $data=array();
        $data["tabla"]=$tabla;
                                
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);  
    }
    
    public function eliminar_ubicacion($id, $cm_registro, $idUbicacion){
        $this->load->model('proyectos_model');
        $this->load->model('ubicacion_proyectos_model');
        $data = array();
        $data["eliminacion_logica"] = 1;
        
        $retorno = $this->proyectos_model->datos_ubicacion_update($id, $data);
        
        //si se pudo borrar 
        if($retorno['retorno'] > 0){
            $actualizar_cm = $this->actualizar_cm($cm_registro, $idUbicacion);
            if ($actualizar_cm){
                header('Location:'.site_url('proyectos/')); 
            } else {
                
                $e = "No se pudieron guardar cambios";
                header('Location:'.site_url('proyectos/index/' .$e ));
            }
        } else{
            header('Location:'.site_url('proyectos/index/' . $retorno['error']));
        }
        
    }
    
    public function traer_cm($id){
        $this->load->model('ubicacion_proyectos_model');
        $cm = $this->ubicacion_proyectos_model->traer_cm($id);
        return $cm;
        
    }
    
    public function modificar_asignacion(){
        
        $this->load->model('proyectos_model');
        $this->load->model('ubicacion_proyectos_model');
        $data_retorno = array();
        $data_retorno["error"] = false;
        
        $id            =  $this->input->post("id");
        $cm            =  $this->input->post("cm");
        $cm_anteriores =  $this->input->post("cm_anteriores");
        $idUbicacion   =  $this->input->post("idUbicacion");
        $fecha         =  $this->input->post("fecha_ingreso");
        
        
        if ($cm == $cm_anteriores){
            //echo $cm ."== ". $cm_anteriores;
            $data = array(
                'idArchivo'  =>    $this->input->post("idArchivo"),
                'carpeta'    =>    $this->input->post("carpeta"),
                );
            
            $retorno = $this->proyectos_model->datos_ubicacion_update($id, $data);
            //si se pudo actualizar
            if($retorno['retorno'] < 0){
              $data_retorno["error"] = $retorno['error'];
            }
            
            
        } else {
            
            //echo $cm ."!= ". $cm_anteriores;
            //liberar _espacio
            $data = array();
            $data["eliminacion_logica"] = 1;
        
            $retorno = $this->proyectos_model->datos_ubicacion_update($id, $data);
        
       
            $actualizar_cm = $this->actualizar_cm($cm_anteriores, $idUbicacion);
            
            
            if ($actualizar_cm){
                //buscar ubicaciones disponibles
                $ubicacion  = $this->proyectos_model->buscar_ubicacion_disponible($cm)->row_array();
                

                if ($ubicacion < 0){                                             //error ubicacion
                 $data_retorno["error"] =  "No hay ubicaciones Disponibles";


                } else { 
                    //actualizar cm utilizados
                    $data = array (
                        "cm_utilizados"  => $ubicacion["cm_utilizados"] + $cm,

                    );

                    $actualizacion  = $this->ubicacion_proyectos_model->actualizar_cm($ubicacion["id"], $data);      //marcar los cm ocupado


                    if ($actualizacion['retorno'] < 0){                                //error actualizacion
                        $data_retorno["error"] = "No se pudo actualizar la base de datos";
                    } else {

                        $data = array(
                            'idArchivo'  =>    $this->input->post("idArchivo"),
                            'carpeta'    =>    $this->input->post("carpeta"),
                            'cm'         =>    $cm,
                            'idUbicacion'=>    $ubicacion["id"],
                            'fecha_ingreso' => $fecha,
                        );

                        $retorno = $this->proyectos_model->asignar_ubicacion( $data);
                        if ($retorno['retorno'] < 0){                                //error asignacion
                            $data_retorno["error"] = "No se pudo actualizar la base de datos al asignar";
                        } else {
                            $resultado = $ubicacion["id"];
                            //proyectos en la misma ubicacion
                            $no_proyectos_anaquel = $this->proyectos_model->no_proyectos_anaquel($ubicacion["id"])->num_rows();
                            $data_retorno['ubicacion']= $ubicacion['id'] . "." . $ubicacion['columna'] . "." .$ubicacion['fila'] . "." . $no_proyectos_anaquel;
                            $data_retorno['Ubicacion']= $ubicacion['id'] ;
                            $data_retorno['Isla']= $ubicacion['no_isla'] ;
                            $data_retorno['Columna'] = $ubicacion['columna'];
                            $data_retorno['Fila'] = $ubicacion['fila'] ;
                            $data_retorno['numero'] =  $no_proyectos_anaquel;
                        }
                        
                        
                    }




                }

               
                
               
        
            } else {
                
                $e = "No se pudieron guardar cambios";
                
            }
            
        } //si no son ogual los cm
         echo json_encode($data_retorno);
        
    }

    
    public function actualizar_cm($cm_anteriores, $idUbicacion){
        $cm = $this->traer_cm($idUbicacion);
        $cm_actualizados = $cm - $cm_anteriores;
        
        $data = array (
                "cm_utilizados"=> $cm_actualizados,
               
            );
            
        $actualizacion  = $this->ubicacion_proyectos_model->actualizar_cm($idUbicacion, $data);
        if($actualizacion['retorno'] < 0){
            return false;
        } else {
            return true;
        }
            
    }

    public function datos_asignacion($id){
       
        $this->load->model('proyectos_model');
        $query = $this->proyectos_model->datos_asignacion($id);
        echo json_encode($query->row_array());
    
    }
    
}