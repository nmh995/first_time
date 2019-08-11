      <div class='col-xs-12'>
                           <table class="table table-bordered table-reponsive">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>User Name</th>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Email</th>
                                       <th>Role</th>
                                       <th>Image</th>
                                       <th>Approve</th>
                                       <th>Unapprove</th>
                                       <th>Delete</th>  
                                       <th>Update</th>
                                   </tr>
                               </thead>
                               <tbody>
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $result = mysqli_query($connect,$query);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $userid= $row['userid'];
                                        $username = $row['username'];
                                        $firstname = $row['firstname'];
                                        $lastname = $row['lastname'];
                                        $user_password = $row['user_password'];
                                        $user_email= $row['user_email'];
                                        $user_role = $row['user_role'];
                                        $user_image = $row['user_image'];

                                        echo "<tr>";
                                        echo "<td>{$userid}</td>";
                                        echo "<td>{$username}</td>";
                                        echo "<td>{$firstname}</td>";
                                        echo "<td>{$lastname }</td>";
                                        echo "<td>{$user_email}</td>";
                                        echo "<td>{$user_role}</td>";
                                        echo "<td><img class='img-responsive' width=100px src='../image/{$user_image}' alt=''></td>";
                                        echo "<td><a href='user.php?admin=$userid'>Admin</a></td>";
                                        echo "<td><a href='user.php?subscriber=$userid'>Subscriber</a></td>";

                                        echo "<td><a onclick=\"javaScript: return confirm('Are You Sure You Want To Delete');\" href='user.php?delete=$userid'>Delete</a></td>";
                                        echo "<td><a href='user.php?source=edit_user&edit=$userid'>Update</a></td>";
                                        echo "</tr>";
                                      }
                                 ?>
                               </tbody>
                           </table>
                         </div>
                         <?php 
                                if (isset($_GET['admin'])) {
                                  $user_id = $_GET['admin'];
                                  $query = "UPDATE users SET user_role= 'admin'  WHERE userid =$user_id";
                                  $result = mysqli_query($connect,$query);
                                  header('location:user.php');
                                }

                          ?>

                              <?php 
                                if (isset($_GET['subscriber'])) {
                                  $user_id = $_GET['subscriber'];
                                  $query = "UPDATE users SET user_role= 'subscriber'  WHERE userid =$user_id";
                                  $result = mysqli_query($connect,$query);
                                  header('location:user.php');
                                }

                          ?>

                           <?php 
                                  if (isset($_GET['delete'])) {
                                    $delete_user_id = $_GET['delete'];
                                    $query = "DELETE FROM `users` WHERE  userid=$delete_user_id";
                                    $result = mysqli_query($connect,$query);
                                    if (!$result) {
                                      die('Query Fail'.mysqli_error($result));
                                    }
                                    header('location:user.php');
                                  }
                            ?>