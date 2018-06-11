<?php

class admin_services extends Services
{
    public function __construct()
    {
        parent::__construct();
    }
    public function deleteMagneticTape($id)
    {
        $sth = $this->db->prepare("SELECT COUNT(*) FROM TW.MAGNETICTAPES WHERE ID=:id ");
        $sth->execute(array(
            ':id' => $id
        ));
        $count = $sth->fetchColumn();
        if ($count == 0)
            return 0;
        $sql = $this->db->prepare("DELETE FROM TW.MAGNETICTAPES WHERE ID=:id");
        $sql->execute(array(
            ':id' => $id
        ));
        return 1;

    }
    public function deleteTicket($id)
    {

        $sth = $this->db->prepare("SELECT COUNT(*) FROM TW.TICKETS WHERE ID=:id ");
        $sth->execute(array(
            ':id' => $id
        ));
        $count = $sth->fetchColumn();
        if ($count == 0)
            return 0;
        $sql = $this->db->prepare("DELETE FROM TW.TICKETS WHERE ID=:id ");
        $sql->execute(array(
            ':id' => $id
        ));
        return 1;
    }
    public function deleteVinylRecord($id)
    {

        $sth = $this->db->prepare("SELECT COUNT(*) FROM TW.VINYLRECORDS WHERE ID=:id ");
        $sth->execute(array(
            ':id' => $id
        ));
        $count = $sth->fetchColumn();
        if ($count == 0)
            return 0;
        $sql = $this->db->prepare("DELETE FROM TW.VINYLRECORDS WHERE ID=:id ");
        $sql->execute(array(
            ':id' => $id
        ));
        return 1;
    }
    public function getAll(){
        $result=array();
        $result=array_merge($result,$this->getTickets());
        $result=array_merge($result,$this->getMagneticTapes());
        $result=array_merge($result,$this->getVinylRecords());
        return $result;
    }
    public function getMagneticTapes()
    {
        $sql = $this->db->prepare("SELECT 'MAGNETICTAPE' as TYPE,TW.MAGNETICTAPES.ID,FIRSTNAME||' '||LASTNAME AS OWNERNAME,DESCRIPTION,TITLE,AUTHOR,GENRE,LENGTH,MAGNETICSUPPORT,CONDITION,STEREOPHONY,FORFIELD,SPEED,SOURCEOFIMAGE FROM TW.MAGNETICTAPES JOIN TW.USERS ON TW.USERS.ID=TW.MAGNETICTAPES.OWNERID ");
        $sql->execute();
        $tempResults = $sql->fetchAll();
        return $tempResults;
    }
    public function getVinylRecords()
    {
        $sql = $this->db->prepare("SELECT 'VINYLRECORD' as TYPE,TW.VINYLRECORDS.ID,DESCRIPTION,FIRSTNAME||' '||LASTNAME AS OWNERNAME,TITLE,AUTHOR,CONDITION,GENRE,FORMAT,STEREOPHONY,SPEED,SOURCEOFIMAGE FROM TW.VINYLRECORDS JOIN TW.USERS ON TW.USERS.ID=TW.VINYLRECORDS.OWNERID");
        $sql->execute();
        $tempResults = $sql->fetchAll();
        return $tempResults;
    }
    public function getTickets()
    {
        $sql = $this->db->prepare("SELECT 'TICKET' as TYPE,TW.TICKETS.ID,FIRSTNAME||' '||LASTNAME AS OWNERNAME,TITLE,AUTHOR,PRICE,DATAHOUR,CITY,LOCATION,RESERVEDSEAT,SPECIALGUEST,SOURCEOFIMAGE FROM TW.TICKETS JOIN TW.USERS ON TW.USERS.ID=TW.TICKETS.OWNERID");
        $sql->execute();
        $tempResults = $sql->fetchAll();
        return $tempResults;
    }
}
