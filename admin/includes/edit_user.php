<?php
if (isset($_GET['edit_user'])){
    $the_user_id=$_GET['edit_user'];   
    $query="SELECT * FROM users WHERE user_id=$the_user_id";
    $select_users_query=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_users_query)){
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

    $query="SELECT randSalt FROM users";
    $select_randsalt_query=mysqli_query($connection, $query);
    if(!$select_randsalt_query){
        die('QUERY FAILED' . mysqli_error($connection));
    }
    $row=mysqli_fetch_array($select_randsalt_query);
    $salt=$row['randSalt'];
    $hashed_password=crypt($password, $salt);


    $query="UPDATE users SET firstname='{$firstname}', lastname='{$lastname}', role='{$role}', username='{$username}', email='{$email}', password='{$hashed_password}' WHERE user_id={$the_user_id} ";

    $update_user_query=mysqli_query($connection, $query);
    
    confirm($update_user_query);
}







?>
   

   
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
           <option value='<?php echo $role; ?>'><?php echo $role; ?></option>  
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
>        <input type="submit" name="edit_user" value="Update User">
    </div>
    
    
</form>