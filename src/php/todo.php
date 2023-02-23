<?php
    // get all todo logic
    class Todo {
        private $data;
        // set array
        public function __construct($arr) {
            if (is_array($arr)) {
                $this->data = $arr;
            }
        }
        // render task list
        public function __toString() {
            // output by "echo" statement
            return '
                <li id="todo-'.$this->data['id'].'" class="todo">
                    <div class="text">'.$this->data['text'].'</div>
                    <div class="actions>
                        <a href="" class="edit">Edit</a>
                        <a href="" class="delete">Delete</a>
                    </div>
                </li>
            ';
        }
        // escape string for XSS and SQL injection
        public static function esc($str) {
            // helper method
            if (ini_get("magic_quotes_gpc")) {
                $str = stripslashes($str);
            }
            // connect database
            $conn = mysqli_connect("localhost", "root", "root", "todo");
            // escape string
            return mysqli_real_escape_string($conn, strip_tags($str));
        }

        // update todo
        public static function edit($text, $id) {
            $text = self::esc($text);
            // validation text
            if(!$text) throw new Exception("Invalid update text ");

            $conn = new mysqli("localhost", "root", "root", "todo");
            // check connection error
            if ($conn->connect_error) {
                die("connection failed: " .$conn->connect_error);
            }
            $query = " UPDATE todo SET '".$text."' WHERE id =" .$id;
            // exec query and error handling
            if ($conn->query($query) == false) {
                throw new Exception("Could not update todo");
            }
            $conn->close();
        }

        // delete todo
        public static function delete($id) {
            $conn = new mysqli("localhost", "root", "root" , "todo");
            // check connection error
            if ($conn->connect_error) {
                throw new Exception("connection failed: " .$conn->connect_error);
            }
            $query = "DELETE FROM todo WHERE id = " .$id;
            // exec query and error handling
            if ($conn->query($query) == false) {
                throw new Exception("Could not delete todo");
            }
            $conn->close();
        }

        // database rearrange
        public static function rearrange($key_value) {
            $strQueries = array();
            foreach($key_value as $k => $v) {
                $strQueries = 'WHEN'.(int)$v.'THEN'.((int)$k+1).PHP_EOL;
            }
            // check connection error
            if (!$strQueries) throw new Exception("No data");

            $conn = new mysqli("localhost", "root", "root" , "todo");
            // check connection error
            if ($conn->connect_error) {
                throw new Exception("connection failed: " .$conn->connect_error);
            }
            // database rearrange
            $query = "UPDATE todo SET position = CASE id ".implode(" ", $strQueries)." ELSE position END";
            // exec query and error handling
            if ($conn->query($query) == false) {
                throw new Exception("Could not update position in todo table");
            }
            $conn->close();

        }

        public static function create($text) {
            // validation text
            $text = self::esc($text);
            if (!$text) throw new Exception("Invalid text data");

            $conn = new mysqli("localhost", "root", "root", "todo");
            // check connection error
            if ($conn->connect_error) {
                throw new Exception("connection failed: " .$conn->connect_error);
            }
            // obtain max id from todo table
            $posQuery = "SELECT MAX(position)+1 FROM todo";
            $position = mysqli_query($conn, $posQuery);
            if (mysqli_num_rows($position)) {
                list($position) = mysqli_fetch_array($position);
            }
            if (!$position) $position = 1;

            $insertQuery = " INSERT INTO todo SET text='".$text."', position = ".$position;
            if ($conn->query($insertQuery) == false) {
                throw new Exception("Could not insert todo");
            }

            echo (new Todo(array(
                'id' => $conn->insert_id,
                'text' => $text
            )));

            $conn->close();
        }
    }
;