<?php 

    $title = "View Records";
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    
    

    //get all attendess from the database
    $results = $crud->getAttendees();

?>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialization</th>
            <th>Actions</th>

        </tr>
        
        <!--  -->
        <?php 
        
        while ($r = $results->fetch(PDO::FETCH_ASSOC)) 
        {
        ?>
        <tr>
            <td> <?php echo $r['attendee_id']?> </td>
            <td> <?php echo $r['firstname']?> </td>
            <td> <?php echo $r['lastname']?> </td>
            <td> <?php echo $r['name']?> </td>
            <td> 
                <a href="view.php?id= <?php echo $r['attendee_id']?> " class="btn btn-success">View</a>
                <a href="Edit.php?id= <?php echo $r['attendee_id']?> " class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record ?')" href="Delete.php?id= <?php echo $r['attendee_id']?> " class="btn btn-danger">Delete</a>
            </td>
            
        </tr>
        
        <?php 
        
        }?>

    </table>


<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>