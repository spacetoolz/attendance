<?php 

    require_once 'db/conn.php'; 
    
    if(!$_GET['id']){
        include 'includes/errormessage.php';
        include 'includes/errormessage.php';

    }
    else
    {
        $id = $_GET['id'];

        //call delete function

        //redirecto to list

        $result = $crud->deleteAttendee($id);

     
        if($result) {
            
            header("Location: viewrecords.php");
        }
        else{

            include 'includes/errormessage.php';
        }


    }
    
    
    ?>