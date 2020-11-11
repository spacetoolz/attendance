<?php 
    $title = 'Success';

    require_once 'includes/header.php';
    require_once 'db/conn.php'; 

    if(isset ($_POST['submit'])) 
    {
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['PhoneNumber'];
        $Specialization = $_POST['Specialization'];

        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $Specialization);

        if($isSuccess) 
        {
            include 'includes/successmessage.php';
        }
        else 
        {
            include 'includes/errormessage.php';
        }
    }
    
    ?>

    <!-- This code was  used to print out the result of data enterned into a form using the get action .-->

    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class= "card title"> <?php //echo $_GET ['FirstName'] . ' '. $_GET['LastName'] ?> 
            </h5> 
            <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET ['Specialization'] ?> </h6>
            <h7 class="card-text">Email Address : <?php //echo $_GET ['email'] ?> </h7>
            <br/>
            <h7 class="card-text">Contact Number : <?php //echo $_GET ['PhoneNumber'] ?> </h7>
            <br/>
            <h7 class="card-text">Date of Birth : <?php //echo $_GET ['dob'] ?> </h7>
        

       
        </div>
    </div> -->
    <!-- POST  is a little bit more secure than get. Plain text data is not passed in the url. Which begs the question, why does developers use get -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class= "card title"> <?php echo $_POST ['FirstName'] . ' '. $_POST['LastName'] ?> </h5> 
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST ['Specialization'] ?> </h6>
            <h7 class="card-text">Email Address : <?php echo $_POST ['email'] ?></h7>
            <br/>
            <h7 class="card-text">Contact Number : <?php echo $_POST ['PhoneNumber'] ?> </h7>
            <br/>
            <h7 class="card-text">Date of Birth : <?php echo $_POST ['dob'] ?> </h7>
    
        </div>
  </div>

    <?php 
        // // array/function on steroids
        // echo $_GET['FirstName'];
        // echo $_GET['LastName'];
        // echo $_GET['dob'];
        // echo $_GET['Specialization'];
        // echo $_GET['email'];
        // echo $_GET['PhoneNumber'];
       
    ?>


    <br/>
    <br/>
    <br/>
    <br/>

    <?php require_once 'includes/footer.php'; ?>
