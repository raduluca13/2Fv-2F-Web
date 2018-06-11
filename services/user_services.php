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
        $sth = $this->db->GetConn()->prepare("SELECT id,user_type FROM tw.users WHERE username = ? AND password = ?");
        $sth->bind_param("ss", $username,$password);
        $sth->execute();

        $count=null;
        $user_type=null;
        $sth->bind_result($count,$user_type);
        while ($sth->fetch())
        {
        }
        if ($count > 0) //login
            return array($count,$user_type);
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
        $sth = $this->db->GetConn()->prepare("INSERT INTO tw.Users(username,password,first_name,last_name,github_account,facebook_account,gender,user_type) VALUES (?,?,?,?,?,?,?,?)");
        $sth->bind_param("ssssssss", $username, $password, $firstname, $lastname,$githubAccount,$facebookAccount,$gender,$user_type);
        return $sth->execute();
    }

    public function profile($firstName, $lastName,$githubAccount,$facebookAccount,$password )
    {
        $password = md5($password);
        $sth = $this->db->GetConn()->prepare("UPDATE tw.users SET first_name = ?, last_name = ?, github_account = ?, facebook_account = ?, password = ? WHERE id = 18");
        $sth->bind_param("sssss",$firstName, $lastName,$githubAccount,$facebookAccount, $password);
        return $sth->execute();
    }

    public function deleteAccount($mail)//only admin can see this
    {
        return 'UNIMPLEMENTED';
    }
    //    function xhrInsert()
    //    {
    //        $text = $_POST['text'];
    //
    //        $sth = $this->db->prepare('INSERT INTO DATA(TEXT) VALUES (:text)');
    //        $sth->execute(array(':text' => $_POST['text']));
    //
    //
    //        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
    //        echo json_encode($data);
    //    }
    //
    //    function xhrGetListings()
    //    {
    //        $sth = $this->db->prepare("SELECT * FROM DATA");
    //        $sth->setFetchMode(PDO::FETCH_ASSOC);
    //        $sth->execute();
    //        $data = $sth->fetchAll();
    //
    //        echo json_encode($data);
    //    }
}
