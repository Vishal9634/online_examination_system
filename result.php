<?php
session_start();
include "connection.php";
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
include "header.php";
?>



    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
<!-- Hello -->
            <div class="col-lg-6 col-lg-push-3" style="..">
        
             <?php
                $correct=0;
                $wrong=0;
                
                if(isset($_SESSION["answer"]))
                {
                    for($i=0;$i<=sizeof($_SESSION["answer"]);$i++)
                    {
                        $answer="";
                        $res=mysqli_query($conn,"select * from questions where catagory='$_SESSION[exam_catagory]'&& question_no=$i");
                        while($row=mysqli_fetch_array($res))
                        {
                            $answer=$row["answer"];
                        }
                        if(isset($_SESSION["answer"][$i]))
                        {
                            if($answer==$_SESSION["answer"][$i]){
                                $correct=$correct+1;
                            }
                            else{
                               $wrong=$wrong+1;
                            }
                    
                        }
                        else{
                           $wrong=$wrong+1;
                        }
                    }
                }
                
                ///here we disply result
                $count=0;
                $res=mysqli_query($conn,"select * from questions where catagory='$_SESSION[exam_catagory]'");
                $count=mysqli_num_rows($res);
               $wrong=$count-$correct;
                echo "<br>"; echo "<br>";
                echo "<center>";
                
                echo "Total Question =".$count;
                 echo "<br>";
                echo "Correct answer =".$correct;
                 echo "<br>";
                echo "Wrong Answer =".$wrong;
                echo "</center>";
                
                
                ?>
        </div>
        
        <?php
        if(isset($_SESSION["exam_start"]))
        {
            $date=date("Y-m-d"); 
            
          mysqli_query($conn,"insert into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)values(NULL,'$_SESSION[username]','$_SESSION[exam_catagory]','$count','$correct','$wrong',' $date')")or die(mysqli_error($conn));  
        }
        
        if(isset($_SESSION["exam_start"]))
        {
            unset($_SESSION["exam_start"]);
            
            ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        
        </script>
        <?php
        }
        ?>
            <!-- start editing question display-->
            
            
            <!---------->
</div>
<?php
 include "footer.php";

?>