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
			$query = "SELECT p.nr_matricol, u.nume, u.prenume, p.saptamana FROM tw.prezente p join tw.users u on p.nr_matricol = u.nr_matricol where p.categorie=1";

			$arr = array('prezente_curs'=>array());
			$prezenteCurs = array();

			$stmt = $this->db->getConn()->prepare($query);
			$stmt->execute();
			$stmt->bind_result($nr_matr,$sapt);

			while($stmt->fetch()){
				array_push($prezenteCurs,array($nr_matr, $sapt));
			}
			$arr['prezente_curs'] = $prezenteCurs;

		}
			else{
			$query = "SELECT p.nr_matricol, u.first_name, u.last_name, p.saptamana FROM tw.prezente p join tw.users u on p.nr_matricol=u.nr_matricol where p.categorie=1 and u.id=?";

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
			$query = "SELECT nr_matricol, saptamana FROM tw.prezente where categorie=2";

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
			$query = "SELECT p.nr_matricol, p.saptamana FROM tw.prezente p join tw.prezente u on p.nr_matricol=u.nr_matricol where p.categorie=2 and u.id=?";

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
			$query = "SELECT u.nr_matricol, u.first_name, u.last_name, n.valoare, n.saptamana FROM tw.note n join tw.users u on n.nr_matricol = u.nr_matricol where n.categorie=2";
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
	public function insertPrezentaCurs($nr_matricol, $saptamana){
		$Q = "SELECT id from prezente order by id desc limit 1";
		$s = $this->db->getConn()->prepare($Q);
		$s->execute();
		$s->bind_result($id);
		while($s->fetch());
		$id=$id+1;

        $query = "INSERT INTO prezente(nr_matricol,categorie,saptamana) VALUES (?,1,?)";
        $sth = $this->db->getConn()->prepare($query);
        $sth->bind_param("sd", $nr_matricol, $saptamana);
        return $sth->execute();
	}
	public function insertPrezentaLab($nr_matricol, $saptamana){
		$Q = "SELECT id from prezente order by id desc limit 1";
		$s = $this->db->getConn()->prepare($Q);
		$s->execute();
		$s->bind_result($id);
		while($s->fetch());
		$id=$id+1;

		$query = "INSERT INTO prezente(id,nr_matricol,categorie,saptamana) VALUES (?,?,2,?)";
        $sth = $this->db->getConn()->prepare($query);
        $sth->bind_param("dsd", $id, $nr_matricol, $saptamana);
        return $sth->execute();
	}

	public function insertNotaLab($nr_matricol, $nota, $data_notare, $saptamana){
		$Q = "SELECT id from note order by id desc limit 1";
		$s = $this->db->getConn()->prepare($Q);
		$s->execute();
		$s->bind_result($id);
		while($s->fetch());
		$id=$id+1;

		$query = "INSERT INTO note(id,nr_matricol,categorie,valoare,data_notare,saptamana) VALUES (?,?,2,?,?,?)";
        $sth = $this->db->getConn()->prepare($query);
        $sth->bind_param("dsdsd", $id, $nr_matricol, $nota,$facebookAccount,$data_notare,$saptamana);
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
}
