<!--this code edits an inventory item-->
<?php
//the require_once function is used to include other files to use. In this case it is getting the database_connect.php file.
require_once "database_connect.php";
if(isset($_GET['edit'])){

    //setting variables 
    $ItemID = $_GET['edit'];
    $title = $_GET['name'];
    $date = $_GET['date'];
    $id = $_GET['id'];
    $item = $_POST['editItem'];
    $quant = $_POST['editQuant'];
    $assign = $_POST['editAssign'];
    //if(isset($_GET['note'])){
      //  $notes = $_GET['note'];
        //}
    //echo $item;

    //calls database function
    database();

    global $connect;


    //connects to database and updates the the item with the matching id from inventory table in mysql
    $edit = mysqli_query($connect, "UPDATE inventory SET Item = '$item', Quantity = '$quant', Assigned = '$assign'  WHERE ItemID = '$ItemID'");
   
    if($edit){
        //This was used to test if the item was updated successfully
        //echo 'To-Do successfully updated';

        //this redirects to events.php 
        //$url = 'events.php?title='.$title.'&date='.$date.'&id='.$id.'&note='.$notes;
        //header('location: events.php?title='.$title.'&date='.$date.'&id='.$id.'&note='.$notes);
      	
      	echo '<script type="text/javascript">
        
        var id = <?php echo $id ?>;
     
        window.location="http://eventplanner-com.stackstaging.com/events.php?id=" + id; 
        </script>';
        
     
    }
    else{
        echo mysqli_error($connect);
    }
        mysqli_close($connect);
    }

?>