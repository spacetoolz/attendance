<?php

    class user{

        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($username, $password){

            try 
            {
                $result = $this->getUserbyUsername($username);
                if($result['num']>0) {
                    return false;
                }
                else {
                    $new_password = md5($password.$username);
                    $sql = "INSERT INTO users (username, password)
                    VALUES (:username, :password) ";
                    $statement = $this->db->prepare($sql);
                    $statement->bindparam (':username', $username);
                    $statement->bindparam (':password', $new_password);
                    $statement->execute();
                    return true;
                }
             

            }catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
            }

        }

        public function getUser($username, $password){
            try{
            $sql = "select * from users where username = :username AND password = :password";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':username', $username);
            $statement->bindparam(':password', $password);
            $statement->execute();
            $result=$statement->fetch();
            return $result;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;

            }

        }

        public function getUserbyUsername($username){

            try{
                $sql = "select count(*) as num from users where username = :username";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':username', $username);
                $statement->execute();
                $result=$statement->fetch();
                return $result;
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
    
                }
        }


    }

?>