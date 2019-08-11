    <?php include_once "include_admin/header.php" 

        ?>
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
                 <?php 
                    if (isset($_GET['source'])) {
                        $source=$_GET['source'];
                    }else{
                        $source= '';
                    }

                    switch ($source) {
                        case 'add_post':
                        include_once "include_admin/add_post.php";
                            break;

                        case 'edit_post':
                           include_once "include_admin/edit_post.php";
                            break;

                        case '30';
                        echo 'NO 30';
                        break;

                        default:
                        include_once "include_admin/viewallcomment.php";
                    }
                  ?>
                       </div> 
                </div>
                <!-- /.row -->

           <?php include_once "include_admin/footer.php" ?>
