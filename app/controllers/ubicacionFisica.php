<?php


class ubicacionFisica extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        
        /*
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"direcciones","P")==false){
            header("Location:" . site_url('principal'));
        }*/
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Fernando Chavez Villalobos'),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Luis Alfredo Chavez Balvaneda'),
            array('name' => 'AUTHOR', 'content' => 'Gabriel Hans Gonzalez Peña'),
            array('name' => 'AUTHOR', 'content' => 'Virginia Leonila Ezquivel Garduño'),
            array('name' => 'AUTHOR', 'content' => 'Pedro Joaquin Ponce Garcia'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, memorias, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
        //$data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'), 'procesos');
        $data['usuario'] = $this->session->userdata('nombre');
        //$data['ejercicio'] = $this->session->userdata('ejercicio');
        
        $this->load->model('ubicacion_fisica_model');
        $data['qListado']=$this->ubicacion_fisica_model->listado_ubicacion();
        
        //$data['infouser'] = $this->infouser($this->session->userdata('id'));
       
        $data['qUbicaciones']=$data['qListado'];        
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        
         $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        
        $this->load->view('v_pant_ubicacionFisica', $data);
    }

    /*public function infouser($iduser = null){
        
        $this->db->select('catUsuarios.*, Direcciones.id as iddir, Direcciones.Nombre as nomdir, Direcciones.Nivel as lvldir,')
            ->join('Direcciones', 'Direcciones.id=catUsuarios.idDireccion', 'left')
            ->group_by('catUsuarios.id');
        $this->db->where("catUsuarios.id", $iduser);
        $query = $this->db->get('catUsuarios');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }*/

    
    
    public function ubicaciones_archivo($error = '') {
        
        /*
        $this->load->library('ferfunc');
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"direcciones","P")==false){
            header("Location:" . site_url('principal'));
        }*/
        
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
          
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'AUTHOR', 'content' => 'Maria Elena Orozco Chavarria'),
            
            array('name' => 'keywords', 'content' => 'tramites, transparencia, memorias, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
        
        $data['usuario'] = $this->session->userdata('nombre');
       
        
        $this->load->model('ubicacion_fisica_model');
        $this->load->model('procesos_model');
        $data['qListado']=$this->ubicacion_fisica_model->listado_ubicaciones_archivo();
        $data['aProcesos']=$this->procesos_model->addw_procesos();
        //$data['infouser'] = $this->infouser($this->session->userdata('id'));
       
               
        $data['urlanterior']= isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'principal';
        
        
         $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        
        //$this->load->view('v_pant_ubicaciones_archivo', $data);
        
        $preregistro=$this->session->userdata('preregistro');
        
        
        if($preregistro==0){
            $this->load->view('v_pant_ubicaciones_archivo', $data);
        } else{
            $this->load->view('v_pant_principal.php', $data);
        }
         
    }

    
    public function datos_ubicacion($id) {
        $this->load->model('ubicacion_fisica_model');
        $query = $this->ubicacion_fisica_model->datos_ubicacion($id);
        echo json_encode($query->row_array());
    }
    
    
    

    public function agregar_ubicacion() {
         $this->load->model('ubicacion_fisica_model');
         
         
         $data=array(
            'Columna'=> strtoupper($this->input->post('Columna')),
            'Fila'=> $this->input->post('Fila'),
            'Caja'=>  $this->input->post('Caja'),
            'Apartado'=>  strtoupper($this->input->post('Apartado')),
            'Posicion'=>  strtoupper($this->input->post('Posicion')),
        );
         
        $retorno = $this->ubicacion_fisica_model->datos_ubicacion_insert($data);
        //printf($retorno);

        if($retorno['retorno'] < 0)
            header('Location:'.site_url('ubicacionFisica/index/' . $retorno['error']));
        else
            header('Location:'.site_url('ubicacionFisica')); 
    }
    
    
    public function datos_relacion_ubicacion($id){
        $this->load->model('ubicacion_fisica_model');
        $query = $this->ubicacion_fisica_model->datos_relacion_ubicacion($id);
        echo json_encode($query->row_array());
    }
    
    
    

    






    public function modificar_ubicacion() {
         $this->load->model('ubicacion_fisica_model');
         
         //$aDireccion_Padre=  $this->direcciones_model->datos_direccion($this->input->post('idDireccion_mod'))->row_array();
         
         $id = $this->input->post('idCatalogo');
         $data=array(
            'Columna'=> strtoupper($this->input->post('Columna_mod')),
            'Fila'=> $this->input->post('Fila_mod'),
            'Caja'=>  $this->input->post('Caja_mod'),
            'Apartado'=>  strtoupper($this->input->post('Apartado_mod')),
            'Posicion'=>  strtoupper($this->input->post('Posicion_mod')),
        );

        $retorno =  $this->ubicacion_fisica_model->datos_ubicacion_update($data, $id);
        if($retorno['retorno']<0)
            header('Location:'.site_url('ubicacionFisica/index/'.$retorno['error']));
        else
            header('Location:'.site_url('ubicacionFisica')); 
    }
    
    
    
    
    public function eliminar_ubicacion($id) {
        $this->load->model('ubicacion_fisica_model');
        
        $this->ubicacion_fisica_model->datos_ubicacion_delete($id);
       
        if($retorno['retorno'] < 0)
            header('Location:'.site_url('ubicacionFisica/index/' . $retorno['error']));
        else
            header('Location:'.site_url('ubicacionFisica')); 

    }
    
    
    public function importa_ubicaciones_base_db( $debug = 0) {
       

        
        
        $this->load->model('ubicacion_fisica_model');
      
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
                //die("No es excel<br>".$binario_tipo.$file_ext);
                die("No es excel<br>" . $file_ext);
            }

            $hojaactiva = 0;

            //echo $nombre_definitivo;

            $this->load->library("excel");
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
                

                
                
                if (($objWorksheet->getCellByColumnAndRow(1, $row)->getValue() != "") && ($objWorksheet->getCellByColumnAndRow(2, $row)->getValue() != "") && ($objWorksheet->getCellByColumnAndRow(3, $row)->getValue() != "") && ($objWorksheet->getCellByColumnAndRow(4, $row)->getValue() != "")) {
                   
                  

                       
                        $Columna = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $Fila = $objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
                        //$Posicion = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $Caja = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $Apartado = $objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
                       
                       
                        
                        // sacarconcepto
                        $sqldata = array();
                        $sqldata['Columna'] = $Columna;
                        $sqldata['Fila'] = $Fila;
                        //$sqldata['Posicion'] = $Posicion;
                        $sqldata['Caja'] = $Caja;
                        $sqldata['Apartado'] = $Apartado;
                        
                        echo $Columna;
                       
                        echo "-";
                        echo $Fila;
                        
                        //echo $Posicion;
                        echo "-";
                        echo $Caja;
                        echo "-";
                        echo $Apartado;
                        echo "-";
                        echo $row;
                       
                       
                        
                        
                       
                        
                        $this->ubicacion_fisica_model->datos_ubicacion_insert($sqldata);
                    
                }






               
            }
            
            if ($debug != 1) {
            header('Location: ' . site_url("ubicacionFisica"));
            }
        }
        
       
        
    }
 
  
    
    
    
}
