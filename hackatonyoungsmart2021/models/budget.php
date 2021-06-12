<?php
    class Budget
    {
        // DB stuff
    private $conn;
    private $table = 'budget';

    // Post Properties
    public $id;
    public $name;
    public $amount;
    public $in;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
      
      return $stmt;
    }

    // //get signle post
    public function read_single()
    {
        $query = 'SELECT *
        FROM ' . $this->table . '
        WHERE
          id = ?
        LIMIT 0,1';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind id
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->name = $row['name'];
        $this->amount = $row['amount'];
        //$this->author = $row['author'];
        //$this->category_id = $row['category_id'];
        //$this->category_name = $row['category_name'];
    }

    // //Create post
    public function create()
    {
        //create query
        $query = 'INSERT INTO ' . $this->table . 
        ' SET 
        name = :name, 
        amount = :amount';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->amount = htmlspecialchars(strip_tags($this->amount));
          //$this->in = htmlspecialchars(strip_tags($this->in));
          //$this->category_id = htmlspecialchars(strip_tags($this->category_id));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':amount', $this->amount);
          //$stmt->bindParam(':in', $this->in);
          //$stmt->bindParam(':category_id', $this->category_id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    public function delete()
    {
        $query = 'DELETE FROM '.$this->table.' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind id
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) 
          {
            return true;
          }

          // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
}
?>