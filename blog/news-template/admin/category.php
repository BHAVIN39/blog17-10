<?php

    include "header.php";

    if($_SESSION['user_role'] == "0"){
        header("location:{$headername}/admin/post.php");
     }

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                            include "config.php";
                            $limit = 2;
                            

                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }
                            else{
                                $page = 1;
                            }

                            $offset = ($page-1)*$limit;

                            $sql = "SELECT * FROM category ORDER BY category_id ASC LIMIT {$offset},{$limit}"; 
                            // echo $sql;
                            // die();
                            
                            $result = mysqli_query($conn,$sql) or die("fetch user");

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){

                                // echo "<pre>";
                                //     print_r($row);
                                // echo "</pre>";
                        ?>
                        <tr>
                            <td class='id'><?php echo $row['category_id'] ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['post'] ?></td>
                            <?php
                                    // if($row['role'] == 1){
                                    //     echo "Admin";
                                    // }
                                    // else{
                                    //     echo "User";
                                    // }
                                ?>
                            <td class='edit'><a href='update-category.php'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
                <?php
                        }

                        $sql1 = "SELECT * FROM category";
                        $result1 = mysqli_query($conn,$sql1) or die("failed limit");

                        if(mysqli_num_rows($result1) > 0){
                            $total_record = mysqli_num_rows($result1);

                            $total_page = ceil($total_record / $limit); 
                            echo "<ul class='pagination admin-pagination'>";
                            
                            if($page > 1){
                                echo '<li><a href="users.php?page='.($page-1).'">prev</li>';
                            }

                            for($i=1; $i<=$total_page; $i++){
                                if($i == $page){
                                    $active = "active";
                                }
                                else{
                                    $active = "";
                                }
                                echo "<li class='$active'><a href='users.php?page=$i'>$i</a></li>";
                            }
                                if($total_page > $page){
                                    echo '<li><a href="users.php?page='.($page+1).'">Next</a></li>';
                            }
                                echo "</ul>";
                        }
                  ?>
                <!-- <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
