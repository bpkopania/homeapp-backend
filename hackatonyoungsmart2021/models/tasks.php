<?php
    class Task
    {
        // DB stuff
    private $conn;
    private $table = 'tasks';

    // budget Properties
    public $id;
    public $name;
    public $data;
    public $description;
    public $priority;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // // Get budget
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // //get signle budget
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
        $this->data = $row['data'];
        $this->description = $row['description'];
        $this->priority = $row['priority'];
        //$this->category_name = $row['category_name'];
    }

    //Create budget
    public function create()
    {
        //create query
        $query = 'INSERT INTO ' . $this->table . 
        ' SET 
        name = :name, 
        data = :data,
        description = :description, 
        priority = :priority';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->data = htmlspecialchars(strip_tags($this->data));
          $this->description = htmlspecialchars(strip_tags($this->description));
          $this->priority = htmlspecialchars(strip_tags($this->priority));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':data', $this->data);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':priority', $this->priority);

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
