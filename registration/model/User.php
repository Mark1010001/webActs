<?php
    class User {
        private $conn;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $stmt = $this->conn->prepare("CALL GetUsers()");
            $stmt->execute();
            return $stmt;
        }

        public function create($lastname, $firstname) {
            $stmt = $this->conn->prepare("CALL InsertUser(:lname, :fname)");
            $stmt->bindParam(":lname", $lastname);

            $stmt->bindParam(":fname", $firstname);
            return $stmt->execute();
        }

        public function update($id, $lastname, $firstname) {
            $stmt = $this->conn->prepare("CALL UpdateUser(:id, :lname, :fname)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":lname", $lastname);
            $stmt->bindParam(":fname", $firstname);
            return $stmt->execute();
        }

        public function delete($id) {
            $stmt = $this->conn->prepare("CALL DeleteUser(:id)");
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>