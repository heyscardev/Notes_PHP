<?php
//modificar para tareas aun no esta listo
include_once("models/Tasks.php");
include_once("models/crud/CRUDTasks.php");
include_once("models/AcademicData.php");
include_once("models/crud/CRUDAcademicData.php");
include_once("controllers/tools/Validacion.php");
include_once("models/crud/CRUDPeriods.php");
include_once("models/crud/CRUDSubjects.php");

class TaskController{
    public function inicio(){
       $adata = LoginController::getAcademicData();
       $periodos_disponibles = CRUDPeriods::ReadByIdUser(LoginController::getIdUser());
       $materias_disponibles = CRUDAPSubjects::ReadAll();
       $datos = CRUDTasks::ReadByIdUser(LoginController::getIdUser());
       
        $head_principal["carrer"] = strtoupper($adata->getProfession());
        //aqui
        $head_principal["completado"]= "hello";
        $head_principal["state"]= "por reprobar";
        $head_principal["period"] = "2-2020";
        
        function entregado($id_task){
            
        }
        /*
        $this->register();
       
        function cursado($id_period){
            return $id_period;

        }
        
       
        */
        require_once('views/tasks/index.php');
    }
 
    private function register(){
        if(LoginController::getSesionState()){
            if(isset($_POST["codigo"])&&isset($_POST["start_date"])&&isset($_POST["end_date"])){
                CRUDPeriods::Create(new Periods(LoginController::getIdUser(),1,strtoupper($_POST["codigo"]),$_POST["start_date"],$_POST["end_date"]));
                header("location: ./?controlador=Periods&accion=inicio");}
    
        }
        else{
        ErrorControl::appNoLoginRedirect();
        }
      
        
       
    }
    public function editar(){
        if(LoginController::getSesionState()){
        if(isset(($_POST["editar"]))){
            CRUDPeriods::update(new Periods(1,$_GET["id"],$_POST["cod_period"],$_POST["start_date"],$_POST["end_date"]));
            header("location: ./?controlador=Periods&accion=inicio");
        }
        }
        else{
        ErrorControl::appNoLoginRedirect();
        }
        
        
      
    }
    public function borrar(){
        if(LoginController::getSesionState()){
         if(isset($_GET["id"])){
            if(is_numeric($_GET["id"])){
                CRUDPeriods::Delete(intval($_GET["id"]));
                header("location: ./?controlador=Periods&accion=inicio");
            }else{
                echo "el id no es numero";
            }
        
        }
        }
        else{
        ErrorControl::appNoLoginRedirect();
        }
       

    }
}
?>