<?php

/**
 * Class DB_Functions
 */
class DB_Functions
{
    private $db;

    // constructor
    function __construct()
    {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->con = $this->db->connect();
    }

    // destructor
    function __destruct()
    {
    }

    public function StoreContact($fname, $lname, $p_home, $p_mobile, $p_work, $email, $a_home, $a_work, $birthday, $job)
    {
        $uuid = uniqid('', false);
        $stmt = $this->con->prepare("INSERT INTO contacts(unique_id,fname,lname,phone_home,phone_work,phone_mobile,job,email,address_work,address_home,birthday)VALUES(:f1,:f2,:f3,:f4,:f5,:f6,:f7,:f8,:f9,:f10,:f11)");
        $stmt->execute(array(
            ':f1' => $uuid,
            ':f2' => $fname,
            ':f3' => $lname,
            ':f4' => $p_home,
            ':f5' => $p_work,
            ':f6' => $p_mobile,
            ':f7' => $job,
            ':f8' => $email,
            ':f9' => $a_work,
            ':f10' => $a_home,
            ':f11' => $birthday
        ));
        $affected_rows = $stmt->rowCount();
        if ($affected_rows > 0)
            return true;
        else
            return false;
    }

    public function UpdateContact($id, $fname, $lname, $p_home, $p_mobile, $p_work, $email, $a_home, $a_work, $birthday, $job)
    {
        $stmt = $this->con->prepare("UPDATE contacts SET fname=?, lname=?, phone_home=?, phone_mobile=?, phone_work=?, email=?, job=?, birthday=?, address_home=?, address_work=? WHERE unique_id=?");
        try {
            $stmt->execute(array($fname, $lname, $p_home, $p_mobile, $p_work, $email, $job, $birthday, $a_home, $a_work, $id));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function GetContact($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM contacts WHERE unique_id=?");
        $stmt->execute(array($id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row)
            return $row;
        else
            return false;
    }

    public function AllContacts()
    {
        $contacts = array();
        $stmt = $this->con->query('SELECT * FROM contacts');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contact = array();
            $contact["id"] = $row["unique_id"];
            $contact["fname"] = $row["fname"];
            $contact["lname"] = $row["lname"];
            $contact["p_home"] = $row["phone_home"];
            $contact["p_work"] = $row["phone_work"];
            $contact["p_mobile"] = $row["phone_mobile"];
            $contact["job"] = $row["job"];
            $contact["email"] = $row["email"];
            $contact["a_w"] = $row["address_work"];
            $contact["a_h"] = $row["address_home"];
            $contact["birthday"] = $row["birthday"];
            array_push($contacts, $contact);
        }
        return $contacts;
    }

    public function DeleteContact($id)
    {
        $stmt = $this->con->prepare("DELETE FROM contacts WHERE unique_id=?");
        try {
            $stmt->execute(array($id));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function SearchContact($query)
    {
        $contacts = array();
        $sql = "SELECT * FROM contacts WHERE fname LIKE :keyword OR lname LIKE :keyword OR phone_work LIKE :keyword OR phone_home LIKE :keyword OR phone_mobile LIKE :keyword OR email LIKE :keyword;";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $query . '%');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contact = array();
            $contact["id"] = $row["unique_id"];
            $contact["fname"] = $row["fname"];
            $contact["lname"] = $row["lname"];
            $contact["p_home"] = $row["phone_home"];
            $contact["p_work"] = $row["phone_work"];
            $contact["p_mobile"] = $row["phone_mobile"];
            $contact["job"] = $row["job"];
            $contact["email"] = $row["email"];
            $contact["a_w"] = $row["address_work"];
            $contact["a_h"] = $row["address_home"];
            $contact["birthday"] = $row["birthday"];
            array_push($contacts, $contact);
        }
        return $contacts;
    }
}