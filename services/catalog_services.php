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

			$stmt->bind_param('i',$id);
			$stmt->execute();
			$stmt->bind_result($nr_mat, $sapt);
			while ($stmt->fetch()){
				array_push($prezenteLab, array($nr_mat, $sapt));
			}
			$arr['prezente_lab'] = $prezenteLab;
		}

		return $arr;
	}//-------------NOT USED-----------
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
	// public function insertPrezentaLab($nr_matricol, $saptamana){
	// 	// $Q = "SELECT id from prezente order by id desc limit 1";
	// 	// $s = $this->db->getConn()->prepare($Q);
	// 	// $s->execute();
	// 	// $s->bind_result($id);
	// 	// while($s->fetch());
	// 	// $id=$id+1;

	// 	$query = "INSERT INTO prezente (id,nr_matricol,categorie,week) VALUES (?,?,2,?)";
 //        $sth = $this->db->getConn()->prepare($query);
 //        $sth->bind_param("iss", $id, $nr_matricol, $saptamana);
 //        return $sth->execute();
	// }
	public function insertNotaLab($nr_matricol, $nota, $data_notare, $id_prof, $saptamana){
		$Q = "SELECT id from note order by CONVERT(SUBSTRING(id,1), SIGNED INTEGER) desc limit 1";
		$s = $this->db->getConn()->prepare($Q);
		$s->execute();
		$s->bind_result($id);
		while($s->fetch());
		$id = intval($id)+1;
		$id = strval($id);
		$query = "INSERT INTO tw.note(id,nr_matricol,categorie,valoare,data_notare,id_prof, saptamana) VALUES (?,?,?,?,?,?,?)";
        $sth = $this->db->getConn()->prepare($query);
        
        $categorie = '2';
        echo var_dump($id);
        echo var_dump($nr_matricol);
        echo var_dump($nota);
        echo var_dump($data_notare);
        echo var_dump($id_prof);
        echo var_dump($saptamana);
        $sth->bind_param('sssssii', $id, $nr_matricol, $categorie, $nota, $data_notare, $id_prof, $saptamana);
        if($sth->execute()){
        	return true;
        }
        else{
        	return $sth->error;
        }
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
		$arr = explode( '\n', $records);
		$flag=1;

		// if($destination == 'lab'){
		// 	$Q = "SELECT id from tw.note order by id desc limit 1";
		// 	$s = $this->db->getConn()->prepare($Q);
		// 	$s->execute();
		// 	$s->bind_result($idL);
		// 	while($s->fetch()){};
		// 	$s->close();
		// 	$idL = intval($idL);
		// 	$idL = $idL + 1;
		// 	$idL = strval($idL);
		// }
		foreach ($arr as $item){
			$line = explode(',',$item);		
			
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
					echo $stmt->error;
					$flag=0;
				}
				$stmt->close();
			}else if($destination == 'lab'){
				$query = "INSERT INTO tw.note (`nr_matricol`,`categorie`, `valoare`, `data_notare`,`id_prof`,`saptamana`) VALUES (?,?,?,?,?,?)";
				$stmt = $this->db->getConn()->prepare($query);
				$nrm = $line[0];
				$cat = $line[1];	//intval($line[1]);
				$val = intval($line[2]);
				$dn = date('Y-m-d', strtotime($line[3]));
				$idp = intval($line[4]);
				$wk = intval($line[5]);
				$stmt->bind_param('ssisii', $nrm, $cat, $val, $dn, $idp, $wk);
				if(!$stmt->execute()){
					echo $stmt->error;
					$flag=0;
				}
			}
		}
		if($flag==1){
			return true;
		}
		else{
			return false;
		}
	}
	public function existsPrezentaCurs($record){
		$query = "SELECT count(nr_matricol) from tw.prezente where nr_matricol=? and data_notare=? and id_prof = ? and week=? and categorie=1";
		$stmt = $this->db->getConn()->prepare($query);
		$stmt->bind_param('sssi',$record[0],$record[1],$record[2],$record[3]);
		$stmt->execute();
		$stmt->bind_result($count);
		while($stmt->fetch()){}
		if($count==0){
			return false;	
		}
		else{
			return true;
		}
	}
	public function existsNotaLab($record){
		$query = "SELECT count(nr_matricol) from tw.note where nr_matricol=? and valoare=? and data_notare=? and id_prof = ? and saptamana=? and categorie='2'";
		$stmt = $this->db->getConn()->prepare($query);
		echo var_dump($record);
		$stmt->bind_param('sssii',$record[0],$record[1],$record[2],$record[3],$record[4]);
		$stmt->execute();
		$stmt->bind_result($count);
		while($stmt->fetch()){}
		if($count==0){
			return false;	
		}
		else{
			return true;
		}
	}
}
