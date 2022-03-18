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
$id=$_GET["id"];
$res=mysqli_query($conn,"select * from exam_catagory where id=$id");
while($row= mysqli_fetch_array($res))
{
    $exam_catagory=$row["catagory"];
    $exam_time=$row["exam_time_min"];
}
?>
<!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Exam Category</h1>
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
                            <div class="card-header"><strong>Edit Exam Category</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">New Exam Catagory</label><input type="text" name="examname" placeholder="Enter Exam catagory" class="form-control" value="<?php echo  $exam_catagory; ?>"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Exam Time in min</label>
                                        <input type="text" name="examtime" id="vat" placeholder=" Enter time for this exam" class="form-control" value="<?php echo  $exam_time; ?>"></div>
                                <div class="form-group"> 
                                <input type="submit" name="submit1" value="Update exam" class="btn btn-success">
                                </div>
                                                    
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
    
 mysqli_query($conn,"update exam_catagory set catagory='$_POST[examname]',exam_time_min='$_POST[examtime]' where id=$id")or die(mysqli_error($conn)) ;
    ?>
<script type="text/javascript"> 

    window.location="exam_catagory.php";
</script>
<?php

}
?>
