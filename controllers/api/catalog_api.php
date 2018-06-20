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
                if(empty($_POST['cat'])){
                    $msg['cat']='categorie nula';
                }
                if(empty($_POST['nr_matricol'])){
                    $msg['nr_matricol']='nr_matricol este null';
                }
                if(empty($_POST['data_notare'])){
                    $msg['data_notare']='data_notare nula';
                }
                if(empty($_POST['id_prof'])){
                    $msg['id_prof']='id_prof null';
                }
                if(empty($_POST['saptamana'])){
                    $msg['saptamana']='saptamana este nula';
                }

                if(empty($_POST['cat']) || empty($_POST['nr_matricol']) || empty($_POST['data_notare']) || empty($_POST['id_prof']) || empty($_POST['saptamana'])){
                    ECHO 'prost';
                    echo json_encode($msg);
                }
                else{
                    $nr_matricol = $_POST['nr_matricol'];
                
                    $date = strtotime($_POST['data_notare']);
                    $data_notare = date('Y-m-d', $date);

                    $data_notare = $_POST['data_notare'];
                    $id_prof = $_POST['id_prof'];
                    $week = $_POST['saptamana'];

                    $recordToCheck = array($nr_matricol, $data_notare, $id_prof, $week);
                    if ($this->catalogService->existsPrezentaCurs($recordToCheck)){
                        echo json_encode('Prezenta existenta');
                    }
                    else{
                       echo json_encode($this->catalogService->insertPrezentaCurs($nr_matricol, $data_notare, $id_prof, $week));    
                    }

                 }
                
            }
        }else if($_POST['cat']=='lab'){
            if (!Utils::requiredArguments('POST', array('cat','nr_matricol','nota','data_notare', 'id_prof', 'saptamana'))){
                return;
            }
            else {
                $nr_matricol = $_POST['nr_matricol'];
                $nota = $_POST['nota'];
                $data = strtotime($_POST['data_notare']);
                $data_notare = date('Y-m-d', $data);
                $id_prof = intval($_POST['id_prof']);
                $saptamana = intval($_POST['saptamana']);
                $recordToCheck = array($nr_matricol, $nota, $data_notare, $id_prof, $saptamana);
                echo var_dump($recordToCheck);
                    if ($this->catalogService->existsNotaLab($recordToCheck)){
                        echo json_encode('Nota existenta');
                    }
                    else{
                        echo json_encode($this->catalogService->insertNotaLab($nr_matricol, $nota, $data_notare, $id_prof, $saptamana));    
                    }
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