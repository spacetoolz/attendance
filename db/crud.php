<?php 

    class crud{
        // private database object
        private $db;

        //constructior to initialise private variable to the database connection
        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertAttendees( $fname, $lname, $dob, $email, $contact, $Specialization)
        {
            try 
            {
             $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialization_id)
             VALUES (:fname, :lname, :dob, :email, :contact, :Specialization) ";
             $statement = $this->db->prepare($sql);
             $statement->bindparam (':fname', $fname);
             $statement->bindparam (':lname', $lname);
             $statement->bindparam (':dob', $dob);
             $statement->bindparam (':email', $email);
             $statement->bindparam (':contact', $contact);
             $statement->bindparam (':Specialization', $Specialization);

             $statement->execute();
             return true;

            }catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $Specialization){

            try{
                $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,
                `contactnumber`=:contact,`specialization_id`=:Specialization WHERE attendee_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam (':id', $id);
                $statement->bindparam (':fname', $fname);
                $statement->bindparam (':lname', $lname);
                $statement->bindparam (':dob', $dob);
                $statement->bindparam (':email', $email);
                $statement->bindparam (':contact', $contact);
                $statement->bindparam (':Specialization', $Specialization);

                $statement->execute();
                return true;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees()
        {
            $sql = "SELECT * FROM `attendee` a inner join specializations s on a.specialization_id = s.specialization_id";
            $result= $this->db->query($sql);
            return $result;
      
        }

        public function getAttendeeDetails($id){
            $sql = "select * from attendee a inner join specializations s on a.specialization_id = s.specialization_id where attendee_id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':id', $id);
            $statement->execute();
            $result=$statement->fetch();
            return $result;
        }

        public function getSpecializations(){
            $sql = "SELECT * FROM `specializations`";
            $result= $this->db->query($sql);
            return $result;
        }

        public function deleteAttendee($id){

            try{
                
                $sql = "delete from attendee where attendee_id = :id";
                $statement= $this->db->prepare($sql);
                $statement->bindparam (':id', $id);
                $statement->execute();
                return true;
            }
            catch (PDOException $e) { 

                echo $e->getMessage();
                return false;

                

            }
           
            

        }
        




    }

?>