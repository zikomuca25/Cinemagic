<?php 
class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "moviedatabase";
    private $port = "3307";
    private $conn;
    
    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);
    
        // Check connection
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function getAllEntries() {
        $sql = "SELECT MovieID, Title,Description,Genre,UpcomingDate,date_showing,end_date,Ratings,Category,Language,photo_link FROM movie";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            throw new Exception("Error retrieving entries: " . $this->conn->error);
        }
    
        return $result;
    }
    
    public function close() {
        $this->conn->close();
    }
    
    public function __destruct() {
        $this->close();}
}
?>