<html>
    <head></head>
    <body>
        <h1>total number of question </h1>
    <p id="total"><p>
        
        <script type="text/javascript">
              setInterval(function(){
                total();
            },1000);
             function total() 
             {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    
                    document.getElementById("total").innerHTML=xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
    }
            </script>
    
    </body>
</html>