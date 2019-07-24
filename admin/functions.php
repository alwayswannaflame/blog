<?php

function users_online(){
if(isset($_GET['onlineusers'])){
    global $connection;
    if(!$connection){
        session_start();
        include ("../includes/db.php");
        $session=session_id();
        $time=time();
        $time_out_in_seconds=05;
        $time_out=$time-$time_out_in_seconds;
        $query="SELECT * FROM users_online WHERE session_id='$session'";
        $send_query=mysqli_query($connection, $query);
        $count=mysqli_num_rows($send_query);
        if($count==NULL){
            mysqli_query($connection, "INSERT INTO users_online (session_id, time_) VALUES ('$session', $time)");
        } else{
            mysqli_query($connection, "UPDATE users_online SET time_=$time WHERE session_id='$session'");
        }
        $users_online=mysqli_query($connection, "SELECT * FROM users_online WHERE time_>$time_out");
        $count_user=mysqli_num_rows($users_online);
        echo $count_user;
    }
} // get request isset()
}
users_online();
function confirm($result){
    global $connection;
    if(!$result) {
        die("QUERY FAILED ." . mysqli_error($connection));

    }



}






function insert_categories(){
if(isset($_POST['submit'])){
    global $connection;
    $cat_title=$_POST['cat_title'];   
    if(strlen($cat_title)==0){
        echo "This field should not be empty" ;   
    }    
    else{
        $query="INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
        $create_category= mysqli_query($connection,$query);
        if (!$create_category){
            die('QUERY Failed'.mysqli_error($connection));    
        }
    }    

    }    

    
    
}

function findallcategories(){
    global $connection;
    $query="SELECT * FROM categories";
    $select_categories=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_categories)){
        $cat_id=$row['cat_id'];    
        $cat_title=$row['cat_title'];
        echo "<tr>";
        echo"<td>{$cat_id}</td>";
        echo"<td>{$cat_title}</td>";
        echo"<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo"<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
        }    
}

function deletecategory(){
    global $connection;
    if(isset($_GET['delete'])){
    $the_cat_id=$_GET['delete'];
    $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
    $result=mysqli_query($connection, $query);
    header("Location: categories.php");

    }        
}











?>