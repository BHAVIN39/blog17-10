<?php
     include "header.php";
    include "config.php";

    if(isset($_POST['save'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $user = $_POST['user'];
        $password = md5($_POST['password']);
        $user_role = $_POST['role'];

        $sql = "SELECT username FROM user WHERE username = '{$user}' ";
        $result = mysqli_query($conn,$sql) or die("username error");

        if(mysqli_num_rows($result) > 0){
           echo "username already use";
        }
        else{
            $sql = "INSERT INTO user (first_name, last_name, username, password, role)
             VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$user_role}')";
             
             if(mysqli_query($conn,$sql)){
                header("location: {$headername}/admin/users.php");
             }
        }
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
