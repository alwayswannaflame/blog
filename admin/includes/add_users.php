<?php
if (isset($_POST['create_user'])){ 
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

    $query="INSERT INTO users(firstname, lastname, role, username, email, password) VALUES('{$firstname}', '{$lastname}', '{$role}', '{$username}', '{$email}', '{$password}')";
    $create_user_query=mysqli_query($connection,$query);

    confirm($create_user_query);
    echo "User Created: " . " " . "<a href='users.php'> View Users</a>";
}







?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">    
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="form-group">    
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>   
    <div class="form-group">    
        <select name="role" id=""> 
            <option value='subscriber'>Select Options</option> 
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
        </select>
    </div>
    <div class="form-group">    
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <!-- <div class="form-group">    
        <label for="title">Post image</label>
        <input type="file"  name="image">
    </div> -->
    <div class="form-group">    
        <label for="title">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">    
        <label for="title">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div
>        <input type="submit" name="create_user" value="Add User">
    </div>
    
    
</form>