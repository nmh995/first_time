<?php include_once "db.php"; ?>
                <!-- Blog Search Well -->
                <div class="well">
      
                     <form action="search.php" method="post">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Login Well -->
                <div class="well">
      
                     <form action="include/login.php" method="post">
                    <h4>Login Form</h4>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">
                                Login
                            </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
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
                        
                         <li><a href="category.php?category=<?php echo $catid; ?>"><?php echo $cattitle ?></a></li>
                    <?php 
                        }
                    ?>                            </ul>
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>