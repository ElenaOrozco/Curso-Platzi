<?php


class Control_usuarios extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($error='') {
        $this->load->library('ferfunc');
        
        if ($this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Usuarios","P")==false){
            header("Location:" . site_url('principal'));
        }
         
//        $this->load->model('usuarios_model');
        $data['meta'] = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => $this->config->item('titulo_ext') . " - " . $this->config->item('titulo') . " Version: " . $this->config->item('version')),
            array('name' => 'AUTHOR', 'content' => 'Luis Montero Covarrubias'),
            array('name' => 'keywords', 'content' => 'tramites, transparencia, memorias, generadores, siop'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'CACHE-CONTROL', 'content' => 'NO-CACHE', 'type' => 'equiv'),
            array('name' => 'EXPIRES', 'content' => 'Mon, 26 Jul 1997 05:00:00 GMT', 'type' => 'equiv')
        );
        $data['error']=$error;
        //$data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'), 'procesos');
        $data['usuario'] = $this->session->userdata('nombre');
        
      
        
        $this->load->model('control_usuarios_model');
        $this->load->model('direcciones_model');
        
        $data['qListado']=$this->control_usuarios_model->listado();
        $data['qAreas']=$this->control_usuarios_model->listado_areas();
        $data['qDirecciones']=$this->direcciones_model->listado_catDirecciones();
        
        /*
        $this->load->model('funcionarios_model');
        $data['qFuncionarios']=$this->funcionarios_model->listado_solicitudes();
        $data['aFuncionarios']=$this->funcionarios_model->addw_funcionarios();
        
        $this->load->model('UnidadEjecutoraGasto_model');
        $data['aDirecciones']=$this->UnidadEjecutoraGasto_model->addw_direcciones();
        $data['qDirecciones']=$this->UnidadEjecutoraGasto_model->listado_solicitudes();
        
        $this->load->model('direcciones_generales_model');
        $data['qDireccionesGenerales']=$this->direcciones_generales_model->listado_solicitudes();
        */
        //$data['qDirecciones']=$this->ferfunc->get_permiso_edicion_lectura($this->session->userdata('id'),"Usuarios","C");
        
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
      
        
        $this->load->view('v_pant_usuarios', $data);
    }

    

   

    public function datos_usuario($id) {
        $this->load->model('control_usuarios_model');
        $query = $this->control_usuarios_model->datos_usuario($id);
        echo json_encode($query->row_array());
    }
    
    public function datos_area($id) {
        $this->load->model('control_usuarios_model');
        $query = $this->control_usuarios_model->datos_area($id);
        echo json_encode($query->row_array());
    }
    
    public function datos_direccion($id) {
        $this->load->model('control_usuarios_model');
        $query = $this->control_usuarios_model->datos_area($id);
        echo json_encode($query->row_array());
    }

   
    
    public function agregar_cat() {
         $this->load->model('control_usuarios_model');
         if (isset($_REQUEST['txtRecibe'])) { $Recibe=1; }  
         else { $Recibe=0; } 
         if (isset($_REQUEST['txtReviso'])){ $Reviso =1; }
         else{ $Reviso=0; }
         if (isset($_REQUEST['txtFoliar'])){ $Foliar =1; }
         else{ $Foliar=0; }
         if (isset($_REQUEST['txtValidar'])){ $Validar =1; }
         else{ $Validar=0; }
         if (isset($_REQUEST['txtDigitalizar'])){ $Digitalizar =1; }
         else{ $Digitalizar=0; }
        if (isset($_REQUEST['txtEditar'])){ $Editar =1; }
         else{ $Editar=0; }
          if (isset($_REQUEST['txtIntegracion'])){
          $Integracion =1; }
         else{
         $Integracion=0;}
         if (isset($_REQUEST['txtPreregistro'])){
         $Preregistro =1; }
         else{
         $Preregistro=0;}
         $data=array(
            'Nombre'=> strtoupper($this->input->post('Nombre')),
            'Usuario'=>  $this->input->post('txtUsuario'),
            'Password'=> sha1($this->input->post('txtPassword')),
            'recibe' => $Recibe,
            'reviso' => $Reviso,
            'Foliar' => $Foliar,
            'Validar' => $Validar,
            'digitalizar' => $Digitalizar,
            'Editar' => $Editar,
            'idArea_ubicacion_trabajo' => $this->input->post('idArea'),
            'integracion' => $Integracion,
            'preregistro' => $Preregistro,
            'idDireccion_responsable' => $this->input->post('idDireccion_responsable'),
        );
         
        $retorno=  $this->control_usuarios_model->datos_usuario_insert($data);
        
        header("Location:" . site_url('control_usuarios/cambios/'.$retorno['registro']));
        /*
        if($retorno['retorno']<0)
            header('Location:'.site_url('usuarios/index/'.$retorno['error']));
        else
            $this->crear_perfil($retorno['registro']);
            header('Location:'.site_url('usuarios')); 
        */    
    }
    public function modificar_cat() {
         $this->load->model('control_usuarios_model');
         $ejercicio = $this->session->userdata('ejercicio');
         $id=$this->input->post('idCatalogo');
         $this->load->model('control_usuarios_model');
         if (isset($_REQUEST['txtRecibe_mod']))
            $e = 1;
         else
             $e=0;
         if (isset($_REQUEST['txtReviso_mod']))
             $p =1; 
         else
             $p=0;
         if (isset($_REQUEST['txtFoliar_mod']))
             $Foliar =1; 
         else
             $Foliar=0;
         if (isset($_REQUEST['txtValidar_mod']))
             $Validar =1; 
         else
             $Validar=0;
         if (isset($_REQUEST['txtDigitalizar_mod']))
             $d =1; 
         else
             $d=0;
         if (isset($_REQUEST['txtEditar_mod']))
             $Editar =1; 
         else
             $Editar=0;
         if (isset($_REQUEST['txtIntegracion_mod']))
             $Integracion =1; 
         else
             $Integracion=0;
         if (isset($_REQUEST['txtPreregistro_mod']))
             $Preregistro =1; 
         else
             $Preregistro=0;
         if (isset($_REQUEST['txtEditar_ubicacion_mod']))
             $Editar_ubi =1; 
         else
             $Editar_ubi=0;
        #MAOC Si no hay cambios en contraseña
         if ($this->input->post('Password')==-1){
              $data=array(
                'Nombre'=> strtoupper($this->input->post('Nombre')),
                'Usuario'=>  $this->input->post('Usuario'),
                //'Password'=> sha1($this->input->post('Password')),
                'recibe' => $e,
                'reviso' => $p,
                'Foliar' => $Foliar,
                'Validar' => $Validar,
                'digitalizar' => $d,
                'Editar' => $Editar,
                'idArea_ubicacion_trabajo' => $this->input->post('idArea_mod'),
                'integracion' => $Integracion,
                'preregistro' => $Preregistro,
                'editar_ubicacion' => $Editar_ubi,
                'idDireccion_responsable' => $this->input->post('idDireccion_responsable_mod'),
                        
                
              );
         }else{
            $data=array(
                'Nombre'=> strtoupper($this->input->post('Nombre')),
                'Usuario'=>  $this->input->post('Usuario'),
                'Password'=> sha1($this->input->post('Password')),
                'recibe' => $e,
                'reviso' => $p,
                'Foliar' => $Foliar,
                'Validar' => $Validar,
                'digitalizar' => $d,
                'Editar' => $Editar,
                'idArea_ubicacion_trabajo' => $this->input->post('idArea_mod'),
                'integracion' => $Integracion,
                'preregistro' => $Preregistro,
                'editar_ubicacion' => $Editar_ubi,
                'idDireccion_responsable' => $this->input->post('idDireccion_responsable_mod'),
            );
        
         }
        $retorno=  $this->control_usuarios_model->datos_usuario_update($data,$id);
        
        header("Location:" . site_url('control_usuarios/cambios/'.$id));
        /*
        if($retorno['retorno']<0)
            header('Location:'.site_url('usuarios/index/'.$retorno['error']));
        else
            header('Location:'.site_url('usuarios')); 
         * 
         */
    }
    
    public function eliminar_cat($id) {
        $this->load->model('control_usuarios_model');
         
        //$retorno=  $this->control_usuarios_model->datos_usuario_delete($id);
        
         $data=array(
                'Estatus'=> 0,
         );
       
        $retorno=  $this->control_usuarios_model->datos_usuario_update($data,$id);
        
        if($retorno['retorno']<0)
            header('Location:'.site_url('control_usuarios/index/'.$retorno['error']));
        else
            header('Location:'.site_url('control_usuarios')); 
    }
    
     public function cambios($id) {
        
         $this->actualiza_perfil($id);
         
        //$data['permiso'] = $this->ferfunc->get_permiso($this->session->userdata('id'), 'procesos');
        $data['usuario'] = $this->session->userdata('nombre');
        
        $this->load->model('control_usuarios_model');
        $this->load->model('direcciones_model');
        $data['qUsuario']=$this->control_usuarios_model->datos_usuario($id)->row_array();
        $data["addw_areas"]= $this->control_usuarios_model->addw_areas();
        $data["addw_direcciones"]= $this->direcciones_model->addw_catDireccion();
        $data['qAreas']=$this->control_usuarios_model->listado_areas();
        $data["aWidgets"]["widget_menu"] = $this->load->view('widget_menu.php', $data, TRUE);
        $data['qDirecciones']=$this->direcciones_model->listado_catDirecciones();
        $tModulos = $this->control_usuarios_model->menu_usuarios();
        
        $data['menu'] = '';
            foreach($tModulos->result() as $itemM):
                $data['menu'] .= '<label class="text-success">MODULO: '.$itemM->Modulo.'</label><br />';
                    $tSubModulos = $this->control_usuarios_model->menu_usuarios_sub($itemM->id);
                    foreach ($tSubModulos->result() as $itemSM):
                        $data['menu'] .= '<label class="text-primary">SUB MODULO: '.$itemSM->Permiso.'</label><br />';
                            $tPU = $this->control_usuarios_model->permiso_especifico($id, $itemSM->Permiso);
                            if($tPU->num_rows() > 0){
                                $ps = $tPU->row();
                                $paqPermisos= $ps->Permisos;
                                $pid = $ps->id;
                                $data['menu'] .= '<form name="form" action="'.site_url('control_usuarios/guardar_permisos/').'" method="post">';
                                    if($ps->Estatus == 0){
                                        $checkedP = '';
                                        $checkedC = '';
                                        $checkedE = '';
                                        $checkedN = '';
                                        $checkedR = '';
                                    }
                                    else{
                                        $explodePermisos = explode(',',$paqPermisos);
                                        if($explodePermisos[0]=='P'){
                                            $checkedP = 'checked';
                                        }else{
                                            $checkedP = '';
                                        }
                                        if($explodePermisos[1]=='C'){
                                            $checkedC = 'checked';
                                        }else{
                                            $checkedC = '';
                                        }      
                                        if($explodePermisos[2]=='E'){
                                            $checkedE = 'checked';
                                        }else{
                                            $checkedE = '';
                                        }                                         
                                        if($explodePermisos[3]=='N'){
                                            $checkedN = 'checked';
                                        }else{
                                            $checkedN = '';
                                        }
                                        if($explodePermisos[4]=='R'){
                                            $checkedR = 'checked';
                                        }else{
                                            $checkedR = '';
                                        } 
                                        
                                        
                                    }
                                    
                                    
                                    if($ps->Estatus == 0){
                                        $checked_enviar='';
                                    }else{
                                        if($ps->enviar_solicitud==1){
                                            $checked_enviar = 'checked';
                                        }else{
                                            $checked_enviar = '';
                                        } 
                                    }
                                    
                                    $data['menu'] .= '<div id="radios'.$id.'"><input type="radio" name="todo" id="radioTodo" onclick="marcar(check'.$pid.')"; ><label class="text-primary">Habilitar todo</label>';
                                    $data['menu'] .= '<input type="radio" name="todo" id="radioNada" onclick="desmarcar(check'.$pid.')"><label class="text-default">Deshabilitar</label></div><br />';
                                    $data['menu'] .= '<input type="hidden" name="identificador" value="'.$ps->id.'" size="1">';
                                    $data['menu'] .= '<input type="hidden" name="idUsuario" value="'.$id.'" size="1">'; 
                                    $data['menu'] .= 'PRESENTAR:<input id="check'.$pid.'" type="checkbox" name="checkP" value="P" '.$checkedP.'> ';
                                    $data['menu'] .= 'CREAR:<input id="check'.$pid.'" type="checkbox" name="checkC" value="C" '.$checkedC.'> ';
                                    $data['menu'] .= 'EDITAR:<input id="check'.$pid.'" type="checkbox" name="checkE" value="E"'.$checkedE.'> ';
                                    $data['menu'] .= 'ELIMINAR:<input id="check'.$pid.'" type="checkbox" name="checkN" value="N"'.$checkedN.'> ';
                                    $data['menu'] .= 'REPORTES:<input id="check'.$pid.'" type="checkbox" name="checkR" value="R"'.$checkedR.'>';
                                    $data['menu'] .= 'ENVIAR SOLICITUD:<input id="check_enviar" type="checkbox" name="check_enviar" value="1"'.$checked_enviar.'>';
                                    $data['menu'] .= '<input type="submit" class="btn btn-primary btn-xs">';
                                $data['menu'] .= '</form>';
                            }
                        $data['menu'] .= '<hr>';
                    endforeach;
            endforeach;
        /*   
            
        $this->load->model('funcionarios_model');
        $data['qFuncionarios']=$this->funcionarios_model->listado_solicitudes();
        $data['aFuncionarios']=$this->funcionarios_model->addw_funcionarios();
        
        $this->load->model('UnidadEjecutoraGasto_model');
        $data['aDirecciones']=$this->UnidadEjecutoraGasto_model->addw_direcciones();
        $data['qDirecciones']=$this->UnidadEjecutoraGasto_model->listado_solicitudes();
        
        $this->load->model('direcciones_generales_model');
        $data['qDireccionesGenerales']=$this->direcciones_generales_model->listado_solicitudes();
        $data['addw_direccion_general']=$this->direcciones_generales_model->addw_direccion_general();
        
       
        $this->load->model('direcciones_area_model');
        $data['qDireccionesArea']=$this->direcciones_area_model->listado_solicitudes();
        $data['addw_direccion_area']=$this->direcciones_area_model->addw_direccion_area();
        
        */
      
        
        $this->load->view('v_pant_usuarios_edicion', $data);
    }
    
    
    public function crear_perfil($idUsuario){
        $this->load->model('control_usuarios_model');
        $tSubModulos = $this->control_usuarios_model->menus_subs();
            foreach ($tSubModulos->result() as $keyS):
                $permisos =array(
                    'idUsuario' => $idUsuario,
                    'Permiso' => $keyS->Permiso,
                    'Estatus' => 0,
                    'Permisos' => 'O,O,O,O,O'
                );
            $this->control_usuarios_model->insert_permisos_nuevo($permisos);
            endforeach;
    }

    
    public function guardar_permisos(){
        
        $this->load->model('control_usuarios_model');
        
        $identificador =  $this->input->post('identificador');
        $idUsuario = $this->input->post('idUsuario');
        if($this->input->post('checkP') == 'P'){
            $per[]=$this->input->post('checkP');
        }else{
            $per[]= 'O';
        }
        if($this->input->post('checkC') == 'C'){
            $per[]=$this->input->post('checkC');
        }else{
            $per[]= 'O';
        }
        if($this->input->post('checkE') == 'E'){
            $per[]=$this->input->post('checkE');
        }else{
            $per[]= 'O';
        }
        if($this->input->post('checkN') == 'N'){
            $per[]=$this->input->post('checkN');
        }else{
            $per[]= 'O';
        }
        if($this->input->post('checkR') == 'R'){
            $per[]=$this->input->post('checkR');
        }else{
            $per[]= 'O';
        }
        $permisos = implode(',',$per);
        if($permisos == 'O,O,O,O,O'){
            $estatus =0;
        }else{
            $estatus =1;
        }
        
        
        
        if($this->input->post('check_enviar') == 1){
            $check_enviar=$this->input->post('check_enviar');
        }else{
            $check_enviar= 0;
        }
        
        
        $paquete = array(
            'enviar_solicitud' => $check_enviar,
            'Estatus' => $estatus,
            'Permisos' => $permisos
        );
        $this->control_usuarios_model->update_permisos($identificador,$paquete);
        $this->cambios($idUsuario);
    }
    
    /*
     * CUANDO SE AGREGUE UN NUEVO MODULO O SUBMODULO DEL SISTEMA
     * ESTA FUNCION CREARA LOS PERMISOS POR DEFECTO EN TODOS LOS USUARIOS
     * usuarios/nuevo_menu/Nombre_permiso
     */
    
    public function nuevo_menu($Permiso){
        $this->load->model('control_usuarios_model');
        $tUsuarios = $this->control_usuarios_model->todos_los_usuarios();
        foreach($tUsuarios->result() as $keyUser):
            $paquete = array(
                'idUsuario' => $keyUser->id,
                'Permiso' => $Permiso,
                'Estatus' => 0,
                'Permisos' => 'O,O,O,O,O'
            );
        $this->control_usuarios_model->insert_permisos_nuevo($paquete);
        endforeach;
        
    }
    
    
     public function actualiza_perfil($idUsuario){
        $this->load->model('control_usuarios_model');
        $tSubModulos = $this->control_usuarios_model->menus_subs();
            foreach ($tSubModulos->result() as $keyS):
                $qPermiso=$this->control_usuarios_model->permiso_especifico($idUsuario,$keyS->Permiso);
                if ($qPermiso->num_rows()==0){    
                    $permisos =array(
                        'idUsuario' => $idUsuario,
                        'Permiso' => $keyS->Permiso,
                        'Estatus' => 0,
                        'Permisos' => 'O,O,O,O,O'
                    );
                    $this->control_usuarios_model->insert_permisos_nuevo($permisos);
                }
            endforeach;
    }
    
    
    
    
    
}

