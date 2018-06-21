<?php

class User_Services extends Services
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $password = md5($password);
        $sth = $this->db->GetConn()->prepare("SELECT id,user_type,github_account FROM tw.users WHERE username = ? AND password = ?");
        $sth->bind_param("ss", $username,$password);
        $sth->execute();

        $count=null;
        $user_type=null;
        $githubAccount=null;
        $sth->bind_result($count,$user_type,$githubAccount);
        while ($sth->fetch())
        {
        }
        if ($count > 0) //login
            return array($count,$user_type,$githubAccount);
        return null;
    }

    public function isAdmin($mail)
    {
        $sth = $this->db->prepare("SELECT COUNT(*) FROM TW.USERS WHERE MAIL = :mail AND RATING = -1");
        $sth->execute(array(
            ':mail' => $mail
        ));

        $count = $sth->fetchColumn();
        if ($count > 0)
            return true;
        return false;
    }

    public function mailExists($username)
    {
        $sth = $this->db->GetConn()->prepare("SELECT COUNT(*) FROM tw.Users WHERE username = ?");
        $sth->bind_param("s", $username);
        $sth->execute();
        $count=0;
        $sth->bind_result($count);
        while ($sth->fetch())
        {
        }
        if ($count > 0)
            return true;
        return false;
    }

    public function register($username, $password, $firstname, $lastname,$githubAccount,$facebookAccount,$gender)
    {
        if ($this->mailExists($username))
            return false;
        $password = md5($password);
        $user_type = "stud";

        $value=1000000;
        $sth = $this->db->GetConn()->prepare("SELECT MAX(CAST((substr(nr_matricol,2,length(nr_matricol))) as SIGNED)) FROM tw.Users;");
        $sth->execute();
        $sth->bind_result($value);
        while ($sth->fetch())
        {
        }
        if ($value==0) $value=1000000;
        else $value = (int)$value + 1 ;
        $nr_matricol = "S" . (string)$value;
        $sth = $this->db->GetConn()->prepare("INSERT INTO tw.Users(nr_matricol,username,password,first_name,last_name,github_account,facebook_account,gender,user_type) VALUES (?,?,?,?,?,?,?,?,?)");
        $sth->bind_param("sssssssss",$nr_matricol, $username, $password, $firstname, $lastname,$githubAccount,$facebookAccount,$gender,$user_type);
        return $sth->execute();
    }

    public function profile($id, $firstName, $lastName,$githubAccount,$facebookAccount,$password ) /*Marius Cretu*/
    {

        $sth = $this->db->GetConn()->prepare("SELECT password FROM tw.users WHERE id = ?");
        $sth->bind_param("i",$id);
        $sth->execute();
        $pwd = null;
        $sth->bind_result($pwd);
        while ($sth->fetch())
        {
        }
        /*
        */
        $sth = $this->db->GetConn()->prepare("UPDATE tw.users SET first_name = ?, last_name = ?, github_account = ?, facebook_account = ?, password = ? WHERE id = ?");
        if($password !== "")
        {
            $password = md5($password);
            $sth->bind_param("sssssi",$firstName, $lastName,$githubAccount,$facebookAccount, $password, $id);
        }
        else
        {
            $sth->bind_param("sssssi",$firstName, $lastName,$githubAccount,$facebookAccount, $pwd, $id);
        }
        return $sth->execute();
    }

    public function retrieve_profile_info($id) /*Marius Cretu*/
    {

        $sth = $this->db->GetConn()->prepare("SELECT first_name, last_name, github_account, facebook_account, password FROM tw.users WHERE id = ?");
        $sth->bind_param("i", $id);
        $sth->execute();

        $firstName = null;
        $lastName = null;
        $githubAccount = null;
        $facebookAccount = null;
        $password = null;

        $sth->bind_result($firstName,$lastName,$githubAccount,$facebookAccount, $password);
        while ($sth->fetch())
        {
        }
        if ($firstName !== null) //all good
            return array($firstName,$lastName,$githubAccount,$facebookAccount, $password);
        return null;
    }

    public function deleteAccount($mail)//only admin can see this
    {
        return 'UNIMPLEMENTED';
    }

    private function GetNrMatricol($id)
    {
      $nr_matricol=null;
      $sth = $this->db->GetConn()->prepare("SELECT nr_matricol FROM tw.users WHERE id = ?");
      $sth->bind_param("s", $id);
      $sth->bind_result($nr_matricol);
      $sth->execute();
      while ($sth->fetch())
      {
      }
      return $nr_matricol;
    }

    private function ComputeCoursesAttendances($id)
    {
        $suma=0;
        $nr =0;
        $nr_matricol = $this->GetNrMatricol($id);
        $sth = $this->db->GetConn()->prepare("SELECT valoare FROM tw.note WHERE (categorie = ?) AND (nr_matricol = ?)");
        $categorie = "1";
        $sth->bind_param("ss", $categorie , $nr_matricol);
        $valoare=0;
        $sth->bind_result($valoare);
        $sth->execute();
        while ($sth->fetch())
        {
            $suma = $suma + $valoare;
            $nr= $nr +1;
        }
        return $nr/14;
    }

    private function ComputeLaboratoriesAttendances($id)
    {
        $suma=0;
        $nr = 0;
        $nr_matricol = $this->GetNrMatricol($id);
        $sth = $this->db->GetConn()->prepare("SELECT valoare FROM tw.note WHERE (categorie = ?) AND (nr_matricol = ?)");
        $categorie = "2";
        $sth->bind_param("ss", $categorie , $nr_matricol);
        $valoare=0;
        $sth->bind_result($valoare);
        $sth->execute();
        while ($sth->fetch())
        {
            $suma = $suma + $valoare;
            $nr = $nr + 1;
        }
        return $nr / 14;
    }

    private function ComputeProjectSituation($id)
    {
      $suma=0;
      $nr_matricol = $this->GetNrMatricol($id);
      $sth = $this->db->GetConn()->prepare("SELECT valoare FROM tw.note WHERE (categorie = ?) AND (nr_matricol = ?)");
      $categorie = "3";
      $sth->bind_param("ss", $categorie , $nr_matricol);
      $valoare=0;
      $sth->bind_result($valoare);
      $sth->execute();
      while ($sth->fetch())
      {
          $suma = $suma + $valoare;
      }
      return ($suma / 3) /10;
    }

    public function getevents($id)
    {
        $eveniment=null;
        $e_id = null;
        $eveniment_array= array();
        $sth = $this->db->GetConn()->prepare("SELECT id, eveniment FROM evenimente WHERE id not in
        (
                SELECT e_id
                FROM evidenta_evenimente
                where s_id = ?

        )");
        $sth->bind_param("i",$id);
        $sth->bind_result($e_id, $eveniment);
        $sth->execute();
        while ($sth->fetch())
        {
            array_push($eveniment_array,$e_id,$eveniment);
        }
        return $eveniment_array;
    }

    public function check_event($e_id, $s_id, $valid_key) /*Marius Cretu*/
    {
        $result = null;
        $valid_key = md5($valid_key);

        $sth = $this->db->GetConn()->prepare("SELECT count(*)
        from evenimente
        where validation_key like ? and id = ?;");

        $sth->bind_param("si", $valid_key, $e_id);
        $sth->bind_result($result);
        $sth->execute();
        while ($sth->fetch()){   }

        if ($result !== 0){
        $sth = $this->db->GetConn()->prepare("INSERT into evidenta_evenimente (e_id,s_id) values(?,?);");
        $sth->bind_param("ii",$e_id, $s_id);
        return $sth->execute();
        }
        return false;
    }

    private function ComputeEventsAttendances($id)
    {
        $sth = $this->db->GetConn()->prepare("SELECT COUNT(id) FROM evidenta_evenimente WHERE s_id=?");
        $sth->bind_param("i",$id);
        $eveniments_nr=0;
        $sth->bind_result($eveniments_nr);
        $sth->execute();
        while ($sth->fetch())
        {
        }

        $sth = $this->db->GetConn()->prepare("SELECT COUNT(id) FROM evenimente");
        $total_nr=0;
        $sth->bind_result($total_nr);
        $sth->execute();
        while ($sth->fetch())
        {
        }
        return $eveniments_nr/$total_nr;
    }


    public function computechanches($id)
    {
        $courses_attendances=$this->ComputeCoursesAttendances($id);
        $laboratories_attendances = $this->ComputeLaboratoriesAttendances($id);
        $web_events = $this->ComputeEventsAttendances($id);
        $project_situation = $this->ComputeProjectSituation($id);
        $promovability_chance = ($courses_attendances+$laboratories_attendances+$web_events+$project_situation)/4;
        return array($courses_attendances,$laboratories_attendances,$web_events,$project_situation,$promovability_chance);
    }

    public function retrieve_c_s($id) /*Marius Cretu*/
    {
        $rows = array();
        /*array to store the info that we want to retrieve*/

        $sth = $this->db->GetConn()->prepare("SELECT date from tw.sugestii where date >= STR_TO_DATE(SYSDATE(),'%Y-%m-%d') and s_id = 1 order by 1 asc limit 1;");
        $sth->execute();
        $next_date = null;
        $sth->bind_result($next_date);
        while($sth->fetch()){
            array_push($rows, $next_date);
        }
        /*retrieve the very next date event*/

        $sth = $this->db->GetConn()->prepare("SELECT description, associated, date from tw.sugestii s inner join tw.s_types st on s.s_id = st.id where st.id = 1 and s.date >= STR_TO_DATE(SYSDATE(),'%Y-%m-%d') order by s.date asc limit 3;");
        $sth->execute();

        $desc = null;
        $asc = null;
        $dt = null;
        $sth->bind_result($desc, $asc, $dt);
        while($sth->fetch()){
            array_push($rows, $desc, $asc, $dt);
        }

        $sth = $this->db->GetConn()->prepare("SELECT date from tw.sugestii where date >= STR_TO_DATE(SYSDATE(),'%Y-%m-%d') and s_id = 2 and description like 'Laboratory%' order by 1 asc limit 1;");
        $sth->execute();
        $next_date = null;
        $sth->bind_result($next_date);
        while($sth->fetch()){
            array_push($rows, $next_date);
        }

        $sth = $this->db->GetConn()->prepare("SELECT description, associated, date from tw.sugestii s inner join tw.s_types st on s.s_id = st.id where st.id = 2 and s.date >= STR_TO_DATE(SYSDATE(),'%Y-%m-%d') order by s.date asc limit 3;");
        $sth->execute();

        $desc = null;
        $asc = null;
        $dt = null;
        $sth->bind_result($desc, $asc, $dt);
        while($sth->fetch()){
            array_push($rows, $desc, $asc, $dt);
        }

        /*retrieve the description, associated links and the date*/

        if ($rows !== null) //all good
            return $rows;
        return null;
    }
    public function retrieve_note($id) /*Marius Cretu*/
        {
            $rows = array();


            $sth = $this->db->GetConn()->prepare("SELECT s.nume, s.prenume, t.denumire, ev.valoare, ev.saptamana
            from studenti s
            join ev_note ev on s.nr_matricol = ev.nr_matricol
                    join types t on t.id = ev.categorie
            where id_prof = ? and updated_at < SYSDATE() and ev_type = 'add_nota'
            order by updated_at desc limit 2;");
            $sth->bind_param("i", $id);
            $sth->execute();


            $nume = null;
            $prenume = null;
            $cat = null;
            $val = null;
            $week = null;

            $sth->bind_result($nume, $prenume, $cat, $val, $week);
            while($sth->fetch()){
                array_push($rows, $nume, $prenume, $cat, $val, $week);
            }

            $sth = $this->db->GetConn()->prepare("SELECT s.nume, s.prenume, t.denumire, ev.saptamana
            from studenti s
            join ev_note ev on s.nr_matricol = ev.nr_matricol
                    join types t on t.id = ev.categorie
            where id_prof = ? and updated_at < SYSDATE() and ev_type = 'prez' and t.denumire = 'laborator'
            order by updated_at desc limit 3;");
            $sth->bind_param("i", $id);
            $sth->execute();


            $nume = null;
            $prenume = null;
            $cat = null;
            $week = null;

            $sth->bind_result($nume, $prenume, $cat, $week);
            while($sth->fetch()){
                array_push($rows, $nume, $prenume, $cat, $week);
            }

            $sth = $this->db->GetConn()->prepare("SELECT s.nume, s.prenume, t.denumire, ev.valoare, ev.saptamana
            from studenti s
            join ev_note ev on s.nr_matricol = ev.nr_matricol
                    join types t on t.id = ev.categorie
            where id_prof = ? and updated_at < SYSDATE() and ev_type = 'bonus'
            order by updated_at desc limit 1;");
            $sth->bind_param("i", $id);
            $sth->execute();


            $nume = null;
            $prenume = null;
            $val = null;
            $cat = null;
            $week = null;

            $sth->bind_result($nume, $prenume, $val, $cat, $week);
            while($sth->fetch()){
                array_push($rows, $nume, $prenume, $val, $cat, $week);
            }


             $sth = $this->db->GetConn()->prepare("SELECT s.nume, s.prenume, t.denumire, ev.saptamana
            from studenti s
            join ev_note ev on s.nr_matricol = ev.nr_matricol
                    join types t on t.id = ev.categorie
            where id_prof = ? and updated_at < SYSDATE() and ev_type = 'prez' and t.denumire = 'curs'
            order by updated_at desc limit 2;");
            $sth->bind_param("i", $id);
            $sth->execute();


            $nume = null;
            $prenume = null;
            $cat = null;
            $week = null;

            $sth->bind_result($nume, $prenume, $cat, $week);
            while($sth->fetch()){
                array_push($rows, $nume, $prenume, $cat, $week);
            }

            if ($rows !== null) //all good
                return $rows;
            return null;
        }

        public function PutCookieHash($id,$user_type,$github_account,$username)
        {
              $hash = $id.$user_type.$github_account.$username;
              $hash = md5($hash);
              $sth = $this->db->GetConn()->prepare("UPDATE tw.users SET hash=? WHERE id=?");
              $sth->bind_param("ss",$hash,$id);
              return $sth->execute();
        }

        public function GetUserCookieHash($id,$username)
        {
          $sth = $this->db->GetConn()->prepare("SELECT hash FROM tw.users WHERE id = ? AND username = ?");
          $sth->bind_param("ss", $id,$username);
          $sth->execute();
          $hash=null;
          $sth->bind_result($hash);
          while ($sth->fetch())
          {
          }
          return $hash;
        }
}
