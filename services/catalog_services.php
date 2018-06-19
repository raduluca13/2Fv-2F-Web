<?php

class catalog_services extends Services
{
	public function __construct(){
		parent::__construct();
	}

	public function getElements($url){
        $sql = $this->db->prepare($url);
        $sql->execute();
        $tempResults = $sql->fetch();

        return $tempResults;
    }

	public function getAll($id=null){
		$result=array();
		if($id==null){
			$result=array_merge($result,$this->getPrezenteCurs());
        	$result=array_merge($result,$this->getPrezenteLab());
        	$result=array_merge($result,$this->getNoteLab());
		}else{
			$result=array_merge($result,$this->getPrezenteCurs($id));
       		$result=array_merge($result,$this->getPrezenteLab($id));
        	$result=array_merge($result,$this->getNoteLab($id));
		}

        // $result=array_merge($result,$this->getPrezenteEv());
        return $result;
	}

	public function getPrezenteCurs($id=null){
		if($id==null){
			$query = "SELECT p.nr_matricol, u.first_name, u.last_name, p.week FROM tw.prezente p join tw.users u on p.nr_matricol = u.nr_matricol where p.categorie=1";

			$arr = array('prezente_curs'=>array());
			$prezenteCurs = array();

			$stmt = $this->db->getConn()->prepare($query);
			$stmt->execute();
			$stmt->bind_result($nr_matr, $fn, $ln, $sapt);

			while($stmt->fetch()){
				array_push($prezenteCurs,array($nr_matr, $fn, $ln, $sapt));
			}
			$arr['prezente_curs'] = $prezenteCurs;

		}
			else{
			$query = "SELECT p.nr_matricol, u.first_name, u.last_name, p.week FROM tw.prezente p join tw.users u on p.nr_matricol=u.nr_matricol where p.categorie=1 and u.id=?";

			$arr = array('prezente_curs'=>array());
			$prezenteCurs = array();

			$stmt = $this->db->getConn()->prepare($query);
			$stmt->bind_param('i',$id);
			$stmt->execute();
			$stmt->bind_result($nr_matr,$nume, $prenume, $sapt);

			while($stmt->fetch()){
				array_push($prezenteCurs,array($nr_matr, $nume, $prenume, $sapt));
			}
			$arr['prezente_curs'] = $prezenteCurs;
		}
		// $stmt->close();

		return $arr;
	}
	public function getPrezenteLab($id=null){
		if($id==null){
			$query = "SELECT nr_matricol, week FROM tw.prezente where categorie=2";

			$arr = array('prezente_lab'=>array());
			$prezenteLab = array();

			$stmt = $this->db->getConn()->prepare($query);
			$stmt->execute();
			$stmt->bind_result($nr_mat, $sapt);
			while ($stmt->fetch()){
				array_push($prezenteLab, array($nr_mat, $sapt));
			}
			$arr['prezente_lab'] = $prezenteLab;
		}else{
			$query = "SELECT p.nr_matricol, p.week FROM tw.prezente p join tw.prezente u on p.nr_matricol=u.nr_matricol where p.categorie=2 and u.id=?";

			$arr = array('prezente_lab'=>array());
			$prezenteLab = array();

			$stmt = $this->db->getConn()->prepare($query);
			$stmt->bind_param('d',$id);
			$stmt->execute();
			$stmt->bind_result($nr_mat, $sapt);
			while ($stmt->fetch()){
				array_push($prezenteLab, array($nr_mat, $sapt));
			}
			$arr['prezente_lab'] = $prezenteLab;
		}

		return $arr;
	}
	public function getPrezenteEv(){
		//from external
		return null;
	}

	public function getNoteLab($id=null){

		if($id==null){
			$query = "SELECT n.nr_matricol, u.first_name, u.last_name, n.valoare, n.saptamana FROM tw.note n join tw.users u on n.nr_matricol = u.nr_matricol where n.categorie=2";
			// $query = "select nr_matricol, valoare, saptamana from tw.note where categorie=2";
			$arr = array('note_lab'=>array());
			$noteLab = array();

			$stmt = $this->db->getConn()->prepare($query);
			$stmt->execute();
			$stmt->bind_result($nrMat, $fn, $ln, $val, $sapt);
			while ($stmt->fetch()){
				array_push($noteLab, array($nrMat, $fn, $ln, $val, $sapt));
			}
			$arr['note_lab'] = $noteLab;
		}else{
			$query = "SELECT u.nr_matricol, u.first_name, u.last_name, n.valoare, n.saptamana FROM tw.note n join tw.users u on n.nr_matricol = u.nr_matricol where n.categorie=2 and u.id=?";
			// $query = "select nr_matricol, valoare, saptamana from tw.note where categorie=2";
			$arr = array('note_lab'=>array());
			$noteLab = array();


			$stmt = $this->db->getConn()->prepare($query);
			$stmt->bind_param('d',$id);
			$stmt->execute();
			$stmt->bind_result($nrMat, $fn, $ln, $val, $sapt);
			while ($stmt->fetch()){
				array_push($noteLab, array($nrMat, $fn, $ln, $val, $sapt));
			}
			$arr['note_lab'] = $noteLab;
		}

		return $arr;
	}
	public function insertPrezentaCurs($nr_matricol, $data_notare, $id_prof, $week){
		$Q = "SELECT id,nr_matricol,categorie,data_notare,id_prof,week from prezente order by id desc limit 1";
		$s = $this->db->getConn()->prepare($Q);
		$s->execute();
		$s->bind_result($id,$nrm,$cat,$dn,$idp,$wk);
		while($s->fetch());
		// return var_dump(array($id,$nrm,$cat,$dn,$idp,$wk));
		// return var_dump(array($nr_matricol, $data_notare, $id_prof, $week));
		$query = "INSERT INTO tw.prezente (`nr_matricol`,`categorie`,`data_notare`,`id_prof`,`week`) VALUES (?,?,?,?,?)";
        $sth = $this->db->getConn()->prepare($query);
        $id_prof = intval($id_prof);
        $cat = 1;
        $sth->bind_param("sisis", $nr_matricol, $cat, $data_notare, $id_prof, $week);
       	return $sth->execute();

	}
	public function insertPrezentaLab($nr_matricol, $saptamana){
		// $Q = "SELECT id from prezente order by id desc limit 1";
		// $s = $this->db->getConn()->prepare($Q);
		// $s->execute();
		// $s->bind_result($id);
		// while($s->fetch());
		// $id=$id+1;

		$query = "INSERT INTO prezente (id,nr_matricol,categorie,week) VALUES (?,?,2,?)";
        $sth = $this->db->getConn()->prepare($query);
        $sth->bind_param("iss", $id, $nr_matricol, $saptamana);
        return $sth->execute();
	}

	public function insertNotaLab($nr_matricol, $nota, $data_notare, $saptamana){
		// $Q = "SELECT id from note order by id desc limit 1";
		// $s = $this->db->getConn()->prepare($Q);
		// $s->execute();
		// $s->bind_result($id);
		// while($s->fetch());

		$query = "INSERT INTO tw.note(nr_matricol,categorie,valoare,data_notare,week) VALUES (?,2,?,?,?)";
        $sth = $this->db->getConn()->prepare($query);
        $sth->bind_param("siss", $nr_matricol, $nota, $data_notare, $saptamana);
        return $sth->execute();
	}
	public function insertEveniment($title, $descriere){
		$Q = "SELECT id from evenimente order by id desc limit 1";
		$s = $this->db->getConn()->prepare($Q);
		$s->execute();
		$s->bind_result($id);
		while($s->fetch());
		$id=$id+1;

		$query = "INSERT INTO evenimente(id,title,descriere) VALUES (?,?,?)";
        $sth = $this->db->getConn()->prepare($query);
        $sth->bind_param("dss", $id, $title, $descriere);
        return $sth->execute();
	}

	public function insertPrezenteCSV($records, $destination){
		$arr = preg_split( '/\r\n/', $records);

		if($destination == 'curs'){
			$Q = "SELECT id from tw.prezente order by id desc limit 1";
			$s = $this->db->getConn()->prepare($Q);
			$s->execute();
			$s->bind_result($id);
			while($s->fetch()){};
		}else if($destination == 'lab'){
			$Q = "SELECT id from tw.note order by id desc limit 1";
			$s = $this->db->getConn()->prepare($Q);
			$s->execute();
			$s->bind_result($id);
			while($s->fetch()){};
		}
		$id = (int)$id+1;
		foreach($arr as $item){
			$line = preg_split('/,/',$item);
			echo var_dump($line);
			$id = (int)$id+1;
			$id = (string)$id;
			if($destination == 'curs'){
				$query = "INSERT INTO tw.prezente (`nr_matricol`,`categorie`, `data_notare`,`id_prof`,`week`) VALUES (?,?,?,?,?)";
				$stmt = $this->db->getConn()->prepare($query);
				$nrm = $line[0];
				$cat = intval($line[1]);
				$dn = date('Y-m-d', strtotime($line[2]));
				$idp = intval($line[3]);
				$wk = $line[4];
				$stmt->bind_param('sisis', $nrm, $cat, $dn, $idp, $wk);
				if(!$stmt->execute()){
					echo 'error';
				}
			}else if($destination == 'lab'){
				$query = "INSERT INTO tw.note (`id`,`nr_matricol`,`categorie`, `valoare`, `data_notare`,`id_prof`,`saptamana`) VALUES (?,?,?,?,?,?,?)";
				$stmt = $this->db->getConn()->prepare($query);
				$nrm = $line[0];
				$cat = intval($line[1]);
				$val = intval($line[2]);
				$dn = date('Y-m-d', strtotime($line[3]));
				$idp = intval($line[4]);
				$wk = $line[5];
				$stmt->bind_param('ssiisis', $id, $nrm, $cat, $dn, $idp, $wk);
				if(!$stmt->execute()){
					echo 'error';
				}
			}
			
			$line = '';
		}
		// return $arr;
		// $arr = str_split($records, 5)
	}
}
