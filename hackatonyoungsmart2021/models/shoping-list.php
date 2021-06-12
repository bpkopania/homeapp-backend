<?php
    class Shop
    {
        // DB stuff
    private $conn;
    private $table = 'shop';

    // Post Properties
    public $id;
    public $name;
    public $amount;
    public $price;
    public $endPrice;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT  * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    //c.name as category_name, p.id, p.amount, p.price, p.endPrice
    // //get signle post
    public function read_single()
    {
        $query = 'SELECT  name, id, amount, price, endPrice
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
        $this->price = $row['price'];
        $this->endPrice = $row['endPrice'];
    }

    // //Create post
    public function create()
    {
        //create query
        $query = 'INSERT INTO ' . $this->table . 
        ' SET 
        name = :name, 
        amount = :amount, 
        price = :price, 
        endPrice = amount*price';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->amount = htmlspecialchars(strip_tags($this->amount));
          $this->price = htmlspecialchars(strip_tags($this->price));
          //$this->endPrice = htmlspecialchars(strip_tags($this->endPrice));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':amount', $this->amount);
          $stmt->bindParam(':price', $this->price);
          //$stmt->bindParam(':endPrice', $this->endPrice);

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