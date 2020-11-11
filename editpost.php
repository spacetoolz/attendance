<?php 

    require_once 'db/conn.php';
    // get values from the post operation
    if(isset($_POST['submit'])) 
    {
        $id = $_POST['id'];
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['PhoneNumber'];
        $Specialization = $_POST['Specialization'];

        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $Specialization);

        if($result)
        {
            header("Location: viewrecords.php");
        }
        else
        {
            include 'includes/errormessage.php';
        }
    }

    else
    {
        include 'includes/errormessage.php';
    }



?>