    <?php include_once "include_admin/header.php"; ?>
    <?php include_once "include_admin/function.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
      <?php include_once "include_admin/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author Name</small>
                        </h1>
                        
                    </div>
                    <div class="col-xs-6">
                        <?php 
                         insert_category();
                         ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title" class="control-label">Add Category:</label>
                                <input type="text" class="form-control" name="cat_title" required="required">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" name="submit" value="Add Category">
                            </div>
                        </form><br>
                       <?php
                       if (isset($_GET['edit'])) {
                            $cat_id=$_GET['edit'];
                            include_once "include_admin/update_category.php";
                        } 

                        ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $query="SELECT * FROM category";
                                  $result=mysqli_query($connect,$query);
                                  if(!$result){
                                    die("failed!".mysqli_error($connect));
                                  }
                                  while ($row=mysqli_fetch_assoc($result)) {
                                       $cat_id=$row['catid'];
                                       $cat_title=$row['cattitle'];
                                       ?>
                                 
                                <tr>
                                    <td><?php echo $cat_id; ?></td>
                                    <td><?php echo $cat_title; ?></td>
                                    <td><a href="add_categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
                                    <td><a href="add_categories.php?edit=<?php echo $cat_id; ?>">Update</a></td>
                                </tr>
                                 <?php 
                                    }
                                  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

           <?php include_once "include_admin/footer.php" ?>
        <?php 
        delete_category();
        
         ?>