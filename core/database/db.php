<?php
class Db
{
    protected $connection;
    static protected $instance;

    static public function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "social_menya";
        $dbport = "3306";
        // $conn = new mysqli( 'localhost','fayzo','fayzo123','retrieve_data','3306');
        $this->connection = new Mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$dbport);

        if (mysqli_connect_errno()) {
            die("database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
        } else {
            // echo "is OK";
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeDb()
    {
        if (isset($this->connection)) {
            $this->connection->close();
            unset($this->connection);
        }
    }
}
$dbase = new Db();
$db= $dbase->getConnection();
global $db;
?>