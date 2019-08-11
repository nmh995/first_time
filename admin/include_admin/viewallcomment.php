      <div class='col-xs-12'>
                           <table class="table table-bordered table-reponsive">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Author</th>
                                       <th>Comment</th>
                                       <th>Email</th>
                                       <th>Status</th>
                                       <th>Comment Post Title</th>
                                       <th>Date</th>
                                       <th>Approve</th>
                                       <th>Unapprove</th>
                                       <th>Delete</th>  
                                   </tr>
                               </thead>
                               <tbody>
                                <?php 
                                    $query = "SELECT * FROM comments";
                                    $result = mysqli_query($connect,$query);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $comment_id= $row['comment_id'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_content = $row['comment_content'];
                                        $comment_email = $row['comment_email'];
                                        $comment_status= $row['comment_status'];
                                        $comment_date = $row['comment_date'];
                                        echo "<tr>";
                                        echo "<td>{$comment_id}</td>";
                                        echo "<td>{$comment_author}</td>";
                                        echo "<td>{$comment_content}</td>";
                                        echo "<td>{$comment_email }</td>";
                                        echo "<td>{$comment_status}</td>";
                                        // echo "<td>{}</td>";
                                        $query = "SELECT * FROM `post` WHERE post_id=$comment_post_id";
                                        $select_result = mysqli_query($connect,$query);
                                        while($row = mysqli_fetch_assoc($select_result))
                                        {
                                          $post_id=$row['post_id'];
                                          $post_title = $row['post_title'];
                                          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                        }
                                        echo "<td>{$comment_date}</td>";
                                        echo "<td><a href='comment.php?approve=$comment_id'>Approve</a></td>";
                                        echo "<td><a href='comment.php?unapprove=$comment_id'>Unapprove</a></td>";
                                        echo "<td><a href='comment.php?delete=$comment_id'>Delete</a></td>";
                                        echo "</tr>";
                                      }
                                 ?>
                               </tbody>
                           </table>
                         </div>
                         <?php 
                                if (isset($_GET['approve'])) {
                                  $comment_id = $_GET['approve'];
                                  $query = "UPDATE `comments` SET `comment_status`= 'approved'  WHERE comment_id =$comment_id";
                                  $result = mysqli_query($connect,$query);
                                  header('location:comment.php');
                                }

                          ?>

                              <?php 
                                if (isset($_GET['unapprove'])) {
                                  $comment_id = $_GET['unapprove'];
                                  $query = "UPDATE `comments` SET `comment_status`= 'unapproved'  WHERE comment_id =$comment_id";
                                  $result = mysqli_query($connect,$query);
                                  header('location:comment.php');
                                }

                          ?>

                           <?php 
                                  if (isset($_GET['delete'])) {
                                    $delete_comment_id = $_GET['delete'];
                                    $query = "DELETE FROM `comments` WHERE comment_id=$delete_comment_id";
                                    $result = mysqli_query($connect,$query);
                                    if (!$result) {
                                      die('Query Fail'.mysqli_error($result));
                                    }
                                    header('location:comment.php');
                                  }
                            ?>