<?php

class db_connection {

    public function create_connection() {
        $host = 'localhost'; //'my73b.sqlserver.se';
        $db   = 'biljettsystem'; //'236969-biljettsystem';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $user = 'root'; //'236969_gl70572';
        $pass =  '';//'keyncat2';

        try {
            $pdo = new PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }
}

class admin {
    public $username;
    public $password;

    function __construct() {
        $db_con = new db_connection;
        $pdo = $db_con->create_connection();
    }

    public function get_admin_by_username() {
        
        $sql = "SELECT * FROM admins WHERE username = " .  $this->username;

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    public function admin_login() {
        
        $sql = "SELECT * FROM admins WHERE username = " .  $this->username;

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

        if($result != NULL) {
            if($this->password === $result['password']) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }
}

class user {
    public $customerNumber;
    public $username;
    public $password;

    function __construct() {
        $db_con = new db_connection;
        $pdo = $db_con->create_connection();
    }
    
    public function client_login() {
        
        $sql = "SELECT * FROM customer_login WHERE username = " .  $this->username;

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

        if($result != NULL) {
            if($this->password === $result['password']) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }
    
    public function change_password() {
        
        $sql = "SELECT * FROM customer_login WHERE username = " .  $this->username;

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

        if($result != NULL) {
            if($this->password === $result['password']) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }
    
    public function customer_adresses() {
        
        $sql = "SELECT * FROM adresses WHERE customerNumber = " .  $this->customerNumber;

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }
}

class adress {
    public $adressID;
    
    function __construct() {
        $db_con = new db_connection;
        $pdo = $db_con->create_connection();
    }
    
    public function get_adress() {
        
        $sql = "SELECT * FROM customer_login WHERE username = " .  $this->username;

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

        if($result != NULL) {
            if($this->password === $result['password']) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }
}

class event {
    public $eventID;
    private $pdo;

    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_all_events() {

        $sql = "SELECT * FROM events"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_event() {

        $sql = "SELECT * FROM events WHERE eventID = '". $this->eventID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
        
    }
}

class venue {
    public $venueID;
    
    function __construct() {
        $db_con = new db_connection;
        $pdo = $db_con->create_connection();
    }
}

class ticket {
    public $ticketID;
    
    function __construct() {
        $db_con = new db_connection;
        $pdo = $db_con->create_connection();
    }
}

?>