<?php

class catalog_api {
	public function __construct(){
        $this->catalogService = new catalog_services();
	}

	public function index(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            echo json_encode($this->catalogService->getAll($id));
        }
        else{
            echo json_encode($this->catalogService->getAll());
        } 
	}

	function post()
    {
        if($_POST['cat']=='prezenta'){
            if (!Utils::requiredArguments('POST', array('cat','nr_matricol','saptamana'))){
                return;
            }
            else{
                $nr_matricol=$_POST['nr_matricol'];
                $saptamana = $_POST['saptamana'];
                
                echo json_encode($this->catalogService->insertPrezentaCurs($nr_matricol, $saptamana));
            }
        }
        if($_POST['cat']=='nota'){
            if (!Utils::requiredArguments('POST', array('cat','nr_matricol','nota','data_notare','saptamana'))){
                return;
            }
            else {
                $nr_matricol = $_POST['nr_matricol'];
                $nota = $_POST['nota'];
                $data_notare = $_POST['data_notare'];
                $saptamana = $_POST['saptamana'];
            
                echo json_encode($this->catalogService->insertNotaLab($nr_matricol, $nota, $saptamana));
            }
        }
        if($_POST['cat']=='eveniment'){
            if (!Utils::requiredArguments('POST', array('cat','title','descriere'))){
                return;
            }
            else {
                $title = $_POST['title'];
                $descriere = $_POST['descriere'];
        
                echo json_encode($this->catalogService->insertEveniment($title, $descriere));
            }
        }
        
        

        

        
    }
    function delete()
    {

    }

    function update()
    {

    }
}