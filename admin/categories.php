<?php include "includes/header.php" ?>
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
                        <div class="col-xs-6">
                        <?php insert_categories(); ?>   
                            <form action="" method="post">
                                <label for="cat=title">Add Category</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        <?php // UPDATE and INCLUDE
                            if (isset($_GET['edit'])){
                                $cat_id=$_GET['edit']; 
                                include "includes/update_categories.php";
                            }    
                            
                            
                        ?>    
                        </div>
                        <?php
                            $query="SELECT * FROM categories";
                            $select_categories=mysqli_query($connection, $query);
                        ?>        

                           
                           
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php findallcategories();  ?>
                                <?php deletecategory();     ?>
                                </tbody>
                            </table>
                        </div>
                    
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>