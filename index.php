<?php
require_once ('config.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>FOrm</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7fI1qyGHXEe46HjB8J1iPfjw5Qn8_nPM&libraries=places"></script>

    </head>
    <body>
        <div>
            <form action="index.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
 
             
                    <label> Place :</label>
                    <input  id="searchTextField" class="form-control" type="text" name="placename" placeholder="Place name" required="" autocomplete="on">
                    <script>
                        var input = document.getElementById('searchTextField');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                      </script>
                    
                    <label> Month :</label>
                    <select class="form-control" name="monthName" required="">
                        <option>---Month----</option>
                        <option value="jan">January</option>
                        <option value="feb">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="aug">August</option>
                        <option value="sep">September</option>
                        <option value="oct">October</option>
                        <option value="nov">November</option>
                        <option value="dec">December</option>          
                    </select>
                    
                    <label>City :</label>
                    <input id="autocomplete" class="form-control" type="text" name="cityname" placeholder="CIty name" required="">
                    <script>
                        var input = document.getElementById('autocomplete');
                        var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});
                        google.maps.event.addListener(autocomplete, 'place_changed', function(){
                           var place1 = autocomplete.getPlace();
                        });
                      </script>
                    
                    <br>
                    
                    <label>time :</label>
<!--                    <input type="time" class="form-control" value="<?php echo date("h:i:s:a"); ?>" id="until_t" name="timestamp" />-->
                    <input type="time" class="form-control" value="<?php $time=date("h:i:s A",strtotime("now"));
                    echo $time;
                        ?>" id="until_t" name="timestamp" />
                    <button class="btn btn-primary" type="submit" name="create" value="submit"> submit</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
        
        <?php
        
        
        if(isset($_POST['create']))
        {
            $placename = $_POST['placename'];
            $monthName = $_POST['monthName'];
            $cityname  = $_POST['cityname'];
            $timestamp      =$_POST['timestamp'];
            
            $sql= "INSERT INTO  dataTable(placename,monthName,cityname, timestamp) VALUES(?,?,?,?)";
            $stmtinsert =$db->prepare($sql);
            $result =$stmtinsert->execute([$placename, $monthName, $cityname, $timestamp]);
            if($result){
                echo 'successfully saved';
            }
            else
            {
                echo 'not working';
            }
        }
        // put your code here
        ?>
    </body>
</html>
