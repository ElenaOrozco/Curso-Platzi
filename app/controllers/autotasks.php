<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Autor: Luis Fernando Chavez Villalobos (Derechos Reservados © 2015)
 * Para uso exclusivo de la Secretaria de Infraestructura y Obra Publica
 * Licancia no transferible
 */

/**
 * @author Luis Fernando Chavez Villalobos
 */
class Autotasks extends CI_Controller {

    function __construct() {
        date_default_timezone_set("America/Mexico_City");
        parent::__construct();
    }

    public function index() {
        echo "Tareas automatizadas del sistema <br> Funciona por consola con el comando crone";
        exit;
    }
    
   
    
    public function listado_obras(){
        $this->load->model('secip_obras_model');
        $this->load->model('datos_model');
        $this->load->library('ferfunc');
        
        //datos_archivo_insert
        
        
        
        $addw_supervisores=$this->secip_obras_model->addw_supervisores();
        $addw_direcciones=$this->secip_obras_model->addw_direcciones();
        $addw_estatus=$this->secip_obras_model->addw_estatus();
        
        
       
        $qObras=$this->secip_obras_model->listado_obras();
         
       
        
        foreach ($qObras->result() as $row):
            
            
                $Normatividad="FEDERAL";
                if ($row->Normatividad=="EST"){
                    $Normatividad="ESTATAL";
                }

                $Finiquitada=0;
                if ($row->Estatus==120){
                    $Finiquitada=1;
                }

                $proyecto=0;
            
            
            $qContratista=$this->secip_obras_model->datos_contratista($row->idContratista);    
            
            $idContratista=0;
            $Contratista="";
            if ($qContratista->num_rows()>0){
                $aContratista=$qContratista->row_array();
                $idContratista=$row->idContratista;
                $Contratista=$aContratista['RazonSocial'];
            }
            
            $qArchivo=$this->secip_obras_model->datos_Archivo_contrato($row->id);
            
            $qSupervisor=$this->secip_obras_model->datos_supervisor($row->idSupervisor);
            
            $supervisor="";
            if ($qSupervisor->num_rows()>0){
                 $aSupervisor=$qSupervisor->row_array();
                 $supervisor=$aSupervisor['Supervisor'];
             }        
            
             
            $xml = $row->complementoXML;
            $data= array();
            if (strlen($xml) > 0) {
                $aXml = $this->ferfunc->xml2array($xml);
                foreach ($aXml as $key => $value) {
                    $data["aObra"][$key] = $value;
                }
            }
             
            $FechaExtincionDerechos = date('Y-m-d'); 
            if (!empty($data["aObra"]['FechaExtincionDerechos'])) {
                $FechaExtincionDerechos = $data["aObra"]['FechaExtincionDerechos'];
            }
            
          
            
            if ($qArchivo->num_rows()==0){
        
                

                $data = array(
                    'OrdenTrabajo' => $row->OrdenTrabajo,
                    'Contrato' => $row->Contrato,
                    'Obra' => $row->Obra,
                    'Descripcion' => $row->Descripcion,
                    'FechaRegistro' => $row->FechaAdjudicacion,
                    'Estatus' => 10,
                    'Normatividad' => $Normatividad,
                    'idModalidad' => $row->idModalidad,
                    'idEjercicio' => $row->Ejercicio,
                    'proyecto' => $proyecto,
                    'FechaInicio' => $row->FechaInicio,
                    'FechaTermino' => $row->FechaTerminoReal,
                    'ImporteContratado' => $row->ImporteContratado,
                    'Finiquitada' => $Finiquitada,
                    'Supervisor' =>  $supervisor,
                    'idContrato' =>  $row->id,
                    'idDireccion' =>  $row->idDireccion,
                    'ImporteEjercido' =>  $row->ImporteEjercido,
                    'Direccion' =>  $addw_direcciones[$row->idDireccion],
                    'idSupervisor' =>  $row->idSupervisor,
                    'idJefeSupervisor' =>  $row->idJefeSupervisor,
                    'idDirectorGral' =>  $row->idDirectorGral,
                    'EstatusObra' => $addw_estatus[$row->Estatus],
                    'idContratista' => $idContratista,
                    'Contratista' => $Contratista,
                    'FechaExtincionDerechos' => $FechaExtincionDerechos,
                );

 
                
                $retorno=  $this->datos_model->datos_archivo_insert($data);

                $id_new_archivo=$retorno['registro'];

                $Tp_plantilla = $this->datos_model->get_tipo_plantilla($row->idModalidad, $Normatividad);

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
            
            }else{ //Si existe hay que actualizar los datos
                
               
                $data = array(
                    'OrdenTrabajo' => $row->OrdenTrabajo,
                    'Contrato' => $row->Contrato,
                    'Obra' => $row->Obra,
                    'Descripcion' => $row->Descripcion,
                    'FechaRegistro' => $row->FechaAdjudicacion,
                    'Normatividad' => $Normatividad,
                    'idModalidad' => $row->idModalidad,
                    'idEjercicio' => $row->Ejercicio,
                    'proyecto' => $proyecto,
                    'FechaInicio' => $row->FechaInicio,
                    'FechaTermino' => $row->FechaTerminoReal,
                    'ImporteContratado' => $row->ImporteContratado,
                    'Finiquitada' => $Finiquitada,
                    'Supervisor' =>  $supervisor,
                    'idDireccion' =>  $row->idDireccion,
                    'ImporteEjercido' =>  $row->ImporteEjercido,
                    'Direccion' =>  $addw_direcciones[$row->idDireccion],
                    'idSupervisor' =>  $row->idSupervisor,
                    'idJefeSupervisor' =>  $row->idJefeSupervisor,
                    'idDirectorGral' =>  $row->idDirectorGral,
                    'EstatusObra' => $addw_estatus[$row->Estatus],
                    'idContratista' => $idContratista,
                    'Contratista' => $Contratista,
                    'FechaExtincionDerechos' => $FechaExtincionDerechos,
                );

               
                
               $aArchivo=$qArchivo->row_array();
               $this->datos_model->datos_archivo_update($data,$aArchivo['id'] );
       
            }
           
            
            
        endforeach;
        
        echo "Proceso Terminado";
        
    }

    
    
}    

