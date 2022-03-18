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
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Select exam catagory for add and edit question</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           
                            <div class="card-body">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                             <th scope="col">Select</th>
                                            
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
                                            <td><a href="add_edit_questions.php?id=<?php echo $row["id"];  ?>">Select</a></td>
                                           
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div> <!-- .card -->

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
