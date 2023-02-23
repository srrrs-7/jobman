<?php
    class Demo {
        private $query = "";
        private $todos = array();
        public function __construct() {
            $conn = new mysqli("localhost", "root", "root" , "todo");
            if ($conn->connect_error) {
                throw new Exception("connection failed: " .$conn->connect_error);
            }
            $this->query = "SELECT * FROM todo ORDER BY position ASC";
            $result = $conn->query($this->query);
            // fetch per row
            while($row = $result->fetch_assoc()) {
                $this->todos = new TODO($row);
            }
            $conn->close();
        }
        public function printAll() {
            foreach($this->todos as $todo) {
                echo $todo;
            }
        }


    }
;