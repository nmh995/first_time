<?php include_once "include/header.php";?>
<?php include_once "include/navigation.php"; ?>
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 
                    $par_page = 5;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = '';
                    }
                    if($page == '' || $page ==1){
                        $page_one = 0;
                    }else{
                        $page_one = ($page * 5) - 5;
                    }

                    $post_count_query = "SELECT * FROM post WHERE post_status ='public'";
                    $find_count = mysqli_query($connect,$post_count_query);
                    $count = mysqli_num_rows($find_count);
                    $count = ceil($count/5);


                    $query = "SELECT * FROM post WHERE post_status ='public' LIMIT $page_one,$par_page";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row ['post_image'];
                        $post_content = substr($row['post_content'],0,500) . "...";
                ?>
                  
                <!-- First Blog Post -->

                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php $post_title; ?><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="Image/<?php echo $post_image; ?>" alt=""></a>
                
                <hr>
               

                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-righht"></span></a>
                 <?php
                    }
                 ?>
                <!-- Pager -->
                <ul class="pager">
                    <?php 
                        for($i=1 ; $i<=$count; $i++){
                            echo "<li><a href='#'>$i</a></li>";
                        }
                     ?>
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
