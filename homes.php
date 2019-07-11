<?php
include "links.php";
?>
 

 <style type="text/css">
    .sizing{width: 50%;}
    .bors{border-radius: 15px 50px 30px;}
    .bors2{border-radius: 15px;
         width: 50%;}

    
 </style>
 <br>
<body >
  <div class="circle" id="loaderDiv" style="display:none;"><!--spiner-->

           <img id="spinImg" src="spinner.gif" />
     </div> 
    <div class="container" style="background-color: #F5FFFA;">
        <h1>SmS Dashboard</h1>
        <form  class="form-horizontal" method="post" >
                        
                        <div id="div_id_username" class="form-group required sizing">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Date From<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="date" class=" form-control" id="date_from" maxlength="30" name="date_from" placeholder="date from" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required sizing" style="margin-left: 360px;margin-top: -8%;" >
                            <label for="id_email" class="control-label col-md-4  requiredField"> Date To<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="date" class="form-control" id="date_to" name="date_to" placeholder="put a date" style="margin-bottom: 10px" />
                            </div>     
                        </div> 
                        <hr>
                        <input class="btn btn-success" type="button" name="sub" value="submit" onclick="getMovies();"> 
                        <hr> 
                    </form>

                    <div class="total_entries text-center mb-5 bors2" style="background-color:blue;margin-left: 20%;">
                        <p id="totals"><b>Total Entries:</b>
       

                        </p>
                    </div>

                    <!------------------------------------------------------------------------------->
                    <div class="row">
                        <div class="col-sm-3 bors" style="background-color:blue;">
                    
                                 <p id="valids"><b>Valid</b></p>
                            
                        </div>
                        <div class="col-sm-3 bors" style="background-color:red;">
                    
                            <p id="inValids"><b>Invalid:</b></p>
                        
                        </div>

                        <div class="col-sm-3 bors" style="background-color:yellow;">
                        
                            <p id="inDuplicant"><b>Duplicates</b></p>
                        
                        </div>

                        <div class="col-sm-3 bors" style="background-color:#808000;">
                    
                            <p id="inDistinct"><b>Distinct</b></p>
                
                    
                    </div>
                   

    </div>
    
</body>

<script type="text/javascript">


    function getMovies(){
        
        
        var date_from=$('#date_from');
       var date_to=$('#date_to');
       console.log(date_from.val());
       console.log(date_to.val());

      $.ajax({
       
        url: "db_class.php", //your php script url here
        method:'POST',
         beforeSend: function()
          {
            console.log("loading .......");
            $('#loaderDiv').show();
          }
          ,
        data:{action:"myResults",
              date_from:date_from.val(),
               date_to:date_to.val()
          },
         
       async: true,
        success: function (response) {
             //alert(response);
            ///asyncronise renders results while still loading
            var ret = JSON.parse(response);//we convert json to javaScript
            $('#loaderDiv').hide();
            $('#totals').html("Total Entries: "+ret.TotalEntries);
            $('#inValids').html("Invalid: "+ret.Invalid);
            $('#valids').html("Valid: "+ret.Valid);
            $('#inDuplicant').html("Duplicates: "+ret.Duplicates);
            $('#inDistinct').html("Distints: "+ret.Distints);

           console.log("Total Entries: "+ret.TotalEntries);
            console.log("Invalid: "+ret.Invalid);
            console.log("Valid: "+ret.Valid);
            console.log("Duplicates: "+ret.Duplicates);
            console.log("Distints: "+ret.Distints);
            console.log(ret);


                }
            });
    }

    


    $(document).ready(function(){
     //getMovies();
    //document.getElementById('button').addEventListener('click',getMovies,false);
    });

    // data: {Title:"maze"}, // your post data here 
    //   dataType: "json",
</script>
