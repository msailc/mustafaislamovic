<?php
require_once __DIR__ . '/../config.php';

class MidtermDao {

    private $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {

        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */
        $host = Config::$host;
        $username = Config::$username;
        $password = Config::$password;
        $schema = Config::$database;
        $port = Config::$port;
        /*options array neccessary to enable ssl mode - do not change*/
        $options = array(
        	PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );
        /** TODO
        * Create new connection
        * Use $options array as last parameter to new PDO call after the password
        */
        $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$schema", $username, $password, $options);

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /** TODO
    * Implement DAO method used to get cap table
    */
    public function cap_table(){
      $cap_table = "cap_table";
      $stmt = $this->conn->prepare("SELECT * FROM $cap_table");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** TODO
    * Implement DAO method used to get summary
    */
    public function summary(){  
      $cap_table = "cap_table";
      $investors = "investors";
      $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_investors, SUM(ct.total_shares) AS total_shares
      FROM investors i
      JOIN (
        SELECT investor_id, SUM(diluted_shares) AS total_shares
        FROM cap_table
        GROUP BY investor_id
      ) ct ON i.id = ct.investor_id");

      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** TODO
    * Implement DAO method to return list of investors with their total shares amount
    */
    public function investors(){
      $cap_table = "cap_table";
      $investors = "investors";
      $stmt = $this->conn->prepare("SELECT investors.first_name, SUM(diluted_shares) AS total_shares
      FROM investors
      JOIN cap_table ON investors.id = cap_table.investor_id
      GROUP BY investors.first_name;
      ");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
