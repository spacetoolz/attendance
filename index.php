
<?php 
    $title = 'Home';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $result = $crud->getSpecializations()

    ?>
   

    <h1 class = "text-center" >Registration for IT Conference!</h1>
    <!-- Firtname
    lastname
    date of birth
    specialty
    email address
    contact number    
    -->

        <form method="post" action= "success.php">
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input required type="text" class="form-control" id="FirstName" name="FirstName">
                <!-- <small id="FirstName" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="Last Name">Last Name</label>
                <input required type="text" class="form-control" id="LastName " name="LastName">
                
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label for="Specialization">Specialization </label >
                <select class="form-control" id="Specialization" name="Specialization">
                    <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $r['specialization_id'] ?>"><?php echo $r['name']; ?></option>

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
                <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Contact Number</label>
                <input type="PhoneNumber" class="form-control" id="PhoneNumber" name="PhoneNumber">
                <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            </div>

            <button type="submit" name= "submit" class=" btn btn-primary btn-block">Submit</button>
        
    </form>

    <br/>
    <br/>
    <br/>

    <?php require_once 'includes/footer.php'; ?>

    