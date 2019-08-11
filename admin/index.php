    <?php include_once "include_admin/header.php" ?>
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
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  

                   <?php 
                    $public_query = "SELECT * FROM post WHERE post_status='public'";
                    $public_result = mysqli_query($connect,$public_query);
                    if(!$public_result){
                        die("Failed");
                    }
                    $public_post_count = mysqli_num_rows($public_result);
                    ////=============
                    $draft_query = "SELECT * FROM post WHERE post_status='draft'";
                    $draft_result = mysqli_query($connect,$draft_query);
                    if(!$draft_result){
                        die("Failed");
                    }
                    $draft_post_count = mysqli_num_rows($draft_result);
                    ////==============
                    $total_post_count = $public_post_count+$draft_post_count;
                    echo "<div class='huge'>{$total_post_count}</div>";
                    ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <!-- <?php 
                    $query = "SELECT * FROM comments";
                    $result = mysqli_query($connect,$query);
                    $comment_count = mysqli_num_rows($result);
                    echo "<div class='huge'>{$comment_count}</div>";
                   ?> -->

                   <?php 
                    $approved_query = "SELECT * FROM comments WHERE comment_status='approved'";
                    $approved_result = mysqli_query($connect,$approved_query);
                    if(!$approved_result){
                        die("Failed");
                    }
                    $apporved_comment_count = mysqli_num_rows($approved_result);

                    $unapproved_query = "SELECT * FROM comments WHERE comment_status='unapproved'";
                    $unapproved_result = mysqli_query($connect,$unapproved_query);
                    if(!$unapproved_result){
                        die("Failed");
                    }
                    $unapporved_comment_count = mysqli_num_rows($unapproved_result);

                    $total_comment_count = $apporved_comment_count+$unapporved_comment_count;
                    echo "<div class='huge'>{$total_comment_count}</div>";
                    ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <!--   <?php 
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($connect,$query);
                    $user_count = mysqli_num_rows($result);
                    echo "<div class='huge'>{$user_count}</div>";
                   ?> -->
                    <?php 
                        $admin_query = "SELECT * FROM users WHERE user_role='admin'";
                        $admin_result = mysqli_query($connect,$admin_query);
                        if(!$admin_result){
                            die("Failed");
                        }
                        $admin_count = mysqli_num_rows($admin_result);

                        $subscriber_query = "SELECT * FROM users WHERE user_role='subscriber'";
                        $subscriber_result = mysqli_query($connect,$subscriber_query);
                        if(!$subscriber_result){
                            die("Failed");
                        }
                        $subscriber_count = mysqli_num_rows($subscriber_result);

                        $total_user = $admin_count + $subscriber_count;
                        echo "<div class='huge'>{$total_user}</div>";
                     ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($connect,$query);
                    $category_count = mysqli_num_rows($result);
                    echo "<div class='huge'>{$category_count}</div>";
                   ?>
                        <!-- <div class='huge'>13</div> -->
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="add_categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
</div>

    <div class="row">
        <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawStuff);

          function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
              ['Move', 'Counts'],
              ["Public Posts",<?php echo $public_post_count; ?>],
              ["Draft Posts",<?php echo $draft_post_count; ?>],
              ["Approved Comments", <?php echo $apporved_comment_count; ?>],
              ["Unapproved Comments",<?php echo $unapporved_comment_count; ?>],
              ["Admin", <?php echo $admin_count; ?>],
              ["Subscriber", <?php echo $subscriber_count; ?>],
              ['Categories', <?php echo $category_count ?>]
            ]);

            var options = {
              width: 800,
              legend: { position: 'none' },
              chart: {
                title: 'Chess opening moves',
                subtitle: 'popularity by counts' },
              axes: {
                x: {
                  0: { side: 'top', label: 'CMS Project'} // Top x-axis.
                }
              },
              bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
          };
        </script>
        <div id="top_x_div" style="width: 800px; height: 600px;"></div>
    </div>

           <?php include_once "include_admin/footer.php" ?>