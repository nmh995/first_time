<?php include_once "include/header.php";?>
<?php include_once "include/navigation.php"; ?>
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 
                if (isset($_GET['category'])) {
                    $cat_id = $_GET['category'];
               
                    $query = "SELECT * FROM post WHERE post_category_id=$cat_id";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row ['post_image'];
                        $post_content = $row['post_content'];
                        ?>
                
                <h1 class="page-header">
                    <?php echo $post_title ?>
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php $post_title; ?><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="Image/<?php echo $post_image; ?>" alt=""></a>
                
                <hr>
               

                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-righht"></span></a>
                 <?php
                    }
                     }
                 ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <?php include_once "include/sidebar.php" ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include_once "include/footer.php" ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
