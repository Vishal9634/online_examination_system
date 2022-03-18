<?php
session_start();

include "header.php";
include "connection.php";

if(!isset($_SESSION["admin"])){
   
    ?>
<script type="text/javascript">
    window.location="index.php";
    </script>
    <?php
}

?>
<!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Exam Category</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <form name="form1" action="" method="post">
                        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Add Exam Category</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">New Exam Catagory</label><input type="text" name="examname" placeholder="Enter Exam catagory" class="form-control"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Exam Time in min</label>
                                        <input type="text" name="examtime" id="vat" placeholder=" Enter time for this exam" class="form-control"></div>
                                <div class="form-group"> 
                                <input type="submit" name="submit1" value="add exam" class="btn btn-success">
                                </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                        
                         <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Categories</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                             <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=0;
                                        $res= mysqli_query($conn,"select * from exam_catagory");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $count=$count+1;
                                           ?>
                                            <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row["catagory"]; ?></td>
                                            <td><?php echo $row["exam_time_min"]; ?></td>
                                            <td><a href="edit_exam.php?id=<?php echo $row["id"];  ?>">Edit</a></td>
                                            <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </form>

                    </div>
                    <!--/.col-->

                </div>
            </div>
        </div>
    </div>
        
                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php
if(isset($_POST["submit1"])){
    
 mysqli_query($conn,"insert into exam_catagory value(NULL,'$_POST[examname]','$_POST[examtime]')")or die(mysqli_error($conn)) ;
    ?>
<script type="text/javascript"> 
alert("exam added succfully");
    window.location.href=window.location.href;
</script>
<?php

}
?>
