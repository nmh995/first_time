<?php include_once "include/header.php";?>
<?php include_once "include/navigation.php"; ?>
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                if (isset($_GET['p_id'])) {
                    $p_id = $_GET['p_id'];
                    $post_count_query = "UPDATE `post` SET view_count=view_count+1 WHERE post_id=$p_id";
                    $post_count = mysqli_query($connect,$post_count_query);
                }
                    $query = "SELECT * FROM post WHERE post_id=$p_id";
                    $result = mysqli_query($connect, $query);
                    if (!$result) {
                        die('query Fail'.mysqli_error($result));
                    }
                    while($row = mysqli_fetch_assoc($result)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row ['post_image'];
                        $post_content = $row['post_content'];
                 ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php $post_title; ?><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="Image/<?php echo $post_image; ?>" alt="">
                <hr>
                             <p><?php echo $post_content ?></p>
                <?php
                    }
                 ?>
                 <!-- Blog Comments -->
                 <?php 
                    if (isset($_POST['create_comment'])) {
                        $p_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content= $_POST['comment_content'];

                        $query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ($p_id,'$comment_author','$comment_email','$comment_content','Unapprove',now())"; 
                        $result = mysqli_query($connect,$query);
                        if (!$result) {
                            die('Query Fail' . mysqli_error($result));
                        }
                        $query = "UPDATE post SET post_comment_count=post_comment_count+1 where post_id= $p_id";
                        $update_result = mysqli_query($connect,$query);
                    }
                  ?>
                  
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="comment_author" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="comment_email" class="form-control" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" class="form-control" rows="3" placeholder="Enter Your Comment"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 
                    if (isset($_GET['p_id'])) {
                        $post_id = $_GET['p_id'];
                    }
                    $query = "SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='approved' order by comment_id DESC";
                    $result = mysqli_query($connect,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                    
                 ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                         <?php echo $comment_content; ?>
                    </div>
                </div>

                <?php 
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