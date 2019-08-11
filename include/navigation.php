   <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Project</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($connect,$sql);
                        if (!$result) {
                            die("Query Failed".mysqli_error($result));
                        }
                        while($row= mysqli_fetch_assoc($result)){
                            $catid = $row['catid'];
                            $cattitle = $row['cattitle'];
                            ?>
                        
                     <li><a href=""><?php echo $cattitle ?></a></li>
                 <?php 
                }
                     ?>
                    <li><a href="register.php">Register</a></li>

                     <li><a href="admin/index.php">Admin</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->x
    </nav>

