<?php include "includes/header.php" ?>
<?php

if(isset($_SESSION['username'])){
    
$username=$_SESSION['username'];
$query="SELECT * FROM users WHERE username='{$username}'";
$select_user_profile=mysqli_query($connection, $query);
while ($row=mysqli_fetch_array($select_user_profile)){
    $user_id=$row['user_id'];     
    $username=$row['username'];
    $password=$row['password'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $email=$row['email'];
    $image=$row['image'];
    $role=$row['role'];


}



}
if (isset($_POST['edit_user'])){ 
    $firstname = $_POST['firstname'];   
    $lastname = $_POST['lastname'];
    $role = $_POST['role'];  
    // $post_image = $_FILES['image']['name']; 
    // $post_image_temp = $_FILES['image']['tmp_name']; 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $post_date = date('d-m-y');
        

    // move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="UPDATE users SET firstname='{$firstname}', lastname='{$lastname}', role='{$role}', username='{$username}', email='{$email}', password='{$password}' WHERE username='{$username}' ";

    $update_user_query=mysqli_query($connection, $query);
    
    confirm($update_user_query);
}

?>    
    <div id="wrapper">

        <!-- Navigation -->
        
<?php include "includes/navigation.php" ?>       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                                Welcome to admin
                                <small>Author</small>
                        </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">    
                            <label for="title">Firstname</label>
                            <input type="text" value="<?php echo $firstname; ?>" class="form-control" name="firstname">
                        </div>
                        <div class="form-group">    
                            <label for="title">Lastname</label>
                            <input type="text" value="<?php echo $lastname; ?>" class="form-control" name="lastname">
                        </div>   
                        <div class="form-group">    
                            <select name="role" id=""> 
                               <option value='subscriber'><?php echo $role; ?></option>  
                                <?php 
                                if ($role=='admin'){
                                    echo "<option value='subscriber'>subscriber</option>";    
                                } else {
                                    echo "<option value='admin'>admin</option>";
                                }



                                ?>


                                
                            </select>
                        </div>
                        <div class="form-group">    
                            <label for="title">Username</label>
                            <input type="text" value="<?php echo $username; ?>"class="form-control" name="username">
                        </div>
                        <!-- <div class="form-group">    
                            <label for="title">Post image</label>
                            <input type="file"  name="image">
                        </div> -->
                        <div class="form-group">    
                            <label for="title">Email</label>
                            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email">
                        </div>
                        <div class="form-group">    
                            <label for="title">Password</label>
                            <input type="password" value="<?php echo $password; ?>" class="form-control" name="password">
                        </div>
                        <div
                    >        <input type="submit" name="edit_user" value="Update Profile">
                        </div>
                        
                        
                    </form>
                    </div>     
                </div>    
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>