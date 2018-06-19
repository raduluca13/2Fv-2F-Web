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

	function post() {
        if($_POST['cat']=='curs'){
            if (!Utils::requiredArguments('POST', array('cat','nr_matricol','data_notare','id_prof','saptamana'))){
                return;
            }
            else{
                $nr_matricol = $_POST['nr_matricol'];
                
                $date = strtotime($_POST['data_notare']);
                $data_notare = date('Y-m-d', $date);

                $data_notare = $_POST['data_notare'];
                $id_prof = $_POST['id_prof'];
                $week = $_POST['saptamana'];
                echo json_encode($this->catalogService->insertPrezentaCurs($nr_matricol, $data_notare, $id_prof, $week));
            }
        }else if($_POST['cat']=='lab'){
            if (!Utils::requiredArguments('POST', array('cat','nr_matricol','nota','data_notare','saptamana'))){
                return;
            }
            else {
                $nr_matricol = $_POST['nr_matricol'];
                $nota = $_POST['nota'];
                $data_notare = date('Y-m-d', strtotime($_POST['data_notare']));
                $saptamana = $_POST['saptamana'];
            
                echo json_encode($this->catalogService->insertNotaLab($nr_matricol, $nota, $data_notare, $saptamana));
            }
        }else if($_POST['cat']=='eveniment'){
            if (!Utils::requiredArguments('POST', array('cat','title','descriere'))){
                return;
            }
            else {
                $title = $_POST['title'];
                $descriere = $_POST['descriere'];
        
                echo json_encode($this->catalogService->insertEveniment($title, $descriere));
            }
        }else if($_POST['cat']=='file'){
            if($_POST['csvDestination']=='curs'){
                // $x = base64_decode($_POST["data"]);
                // $x = rawurldecode ($_POST["data"]);
                $records = utf8_decode($_POST["data"]);
                // if($this->catalogService->insertPrezenteCSV($records,'curs')==)
                echo json_encode($this->catalogService->insertPrezenteCSV($records, 'curs'));
            }
            else if($_POST['csvDestination']=='lab'){
                $records = utf8_decode($_POST["data"]);
                echo json_encode($this->catalogService->insertPrezenteCSV($records, 'lab'));
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