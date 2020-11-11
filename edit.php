
<?php 
    $title = 'Edit Record';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $result = $crud->getSpecializations();


    if(!isset($_GET['id']))
    {

        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }

    else
    {

        $id=$_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    
    
?>
    <h1 class = "text-center" >Edit Record</h1>
    <!-- Firtname
    lastname
    date of birth
    specialty
    email address
    contact number    
    -->

        <form method="post" action= "editpost.php">
            <input type = "hidden" name = "id" value="<?php echo $attendee['attendee_id'] ?>" />
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="FirstName" name="FirstName">
                <!-- <small id="FirstName" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="Last Name">Last Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="LastName " name="LastName">
                
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label for="Specialization">Specialization </label >
                <select class="form-control" value="<?php echo $attendee['specialization_id'] ?>" id="Specialization" name="Specialization">
                    <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $r['specialization_id'] ?>" <?php if ($r['specialization_id'] == 
                        $attendee['specialization_id']) echo 'selected'?>>
                            <?php echo $r['name']; ?>
                        </option>

                    <?php 

                    }?>

                    <!-- <option value="1">Database Administrator</option>
                    <option>Software Developer</option>
                    <option>Systems Engineer</option>
                    <option>Website Administrator</option>
                    <option>Other</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Contact Number</label>
                <input type="PhoneNumber" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="PhoneNumber" name="PhoneNumber">
                <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            </div>

            <button type="submit" name= "submit" class=" btn btn-success btn-block">Save Changes</button>
        
    </form>

     <?php } ?>

    <br/>
    <br/>
    <br/>

    <?php require_once 'includes/footer.php'; ?>

    