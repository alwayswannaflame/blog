<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                
                                <!-- <th>Approve</th>
                                <th>Unapprove</th>                        
                                <th>Delete</th> -->
                            </tr>
                        </thead>
                     <tbody>
                        
                        <?php 
                            $query="SELECT * FROM users";
                            $select_users=mysqli_query($connection, $query);
                            while ($row=mysqli_fetch_assoc($select_users)){
                                $user_id=$row['user_id'];     
                                $username=$row['username'];
                                $password=$row['password'];
                                $firstname=$row['firstname'];
                                $lastname=$row['lastname'];
                                $email=$row['email'];
                                $image=$row['image'];
                                $role=$row['role'];
                                
                                echo "<tr>";
                                echo"<td>{$user_id}</td>";
                                echo"<td>{$username}</td>";
                                echo"<td>{$firstname}</td>";
                                

                                // $query="SELECT * FROM categories WHERE cat_id= $post_category_id";
                                // $select_categories_id=mysqli_query($connection, $query);
                                // while ($row=mysqli_fetch_assoc($select_categories_id)){
                                //     $cat_id=$row['cat_id'];    
                                //     $cat_title=$row['cat_title'];
                                // }
                                // echo"<td>$cat_title</td>";
                                


                                echo"<td>{$lastname}</td>";
                                echo"<td>{$email}</td>";
                                
                                // $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                // $select_post_id_query=mysqli_query($connection, $query);
                                // while($row=mysqli_fetch_assoc($select_post_id_query)){
                                //     $post_id=$row['post_id'];
                                //     $post_title=$row['post_title'];

                                

                                // echo"<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                
                                // }


                                echo"<td>{$role}</td>";
                                echo"<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                                echo"<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
                                echo"<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                                echo"<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                echo "</tr>";
                            }?>
                        </tbody>   
                    </table>



<?php
if (isset($_GET['change_to_admin'])){
    $the_user_id=$_GET['change_to_admin'];
    $query="UPDATE users SET role='admin' WHERE user_id=$the_user_id";
    $unnaprove_comment_query=mysqli_query($connection, $query);
    header("Location: users.php");



}
if (isset($_GET['change_to_subscriber'])){
    $the_user_id=$_GET['change_to_subscriber'];
    $query="UPDATE users SET role='subscriber' WHERE user_id=$the_user_id";
    $change_subscriber_query=mysqli_query($connection, $query);
    header("Location: users.php");



}
if (isset($_GET['delete'])){
    $the_user_id=$_GET['delete'];
    $query="DELETE FROM users WHERE user_id={$the_user_id}";
    $delete_query=mysqli_query($connection, $query);
    header("Location: users.php");



}


?>