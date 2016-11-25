<!DOCTYPE html>
<?php 
global $val;
?>
<html>
<head>
    
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
  <style type="text/css">
  	*{
  		margin:0;
  		padding: 0;
  	}
  	.ftLs{
  		font-size:20px;
  	}
  </style>

</head>
<body>
<div class="col-lg-12">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <div class="col-lg-5">
                <select id="sl0" style="width:100%;min-height:250px;max-height:250px;" size="5">
                    <option value="1" style="cursor:pointer;">Paula</option>
                    <option value="2" style="cursor:pointer;">Lucas</option>
                    <option value="3" style="cursor:pointer;">Matheus</option>
                    <option value="4" style="cursor:pointer;">Julia</option>
                    <option value="5" style="cursor:pointer;">Vitor</option>
                </select>
                </div>
                <div class="col-lg-1"  style="margin-top:20%">
                <samp class="glyphicon glyphicon-transfer text-center"></samp>                
                </div>
              <div class="col-lg-5">
                <select id="sl1" style="width:100%;min-height:250px;max-height:250px;" size="5">
                </select>
                <br>
                </div>
          </div>
            </div>
           
        <div class="col-lg-4"></div>
        
    
</div>
     
    <script type="text/javascript">
    $(document).ready(function(){     
          //------------------------------
    	$('#sl0').on('change',add);
        $('#sl1').on('change',rem);
        function add(){
            var id = $('#sl0').val();
            var e = document.getElementById("sl0");
            var nome = e.options[e.selectedIndex].text;
            $("#sl1").append($("<option>",{
                  		value: id,
                  		text: nome,
                                style:"cursor:pointer;"
            		}));
        $("#sl0 option[value='"+id+"']").remove();
        };
        
         function rem(){
            var id = $('#sl1').val();
            var e = document.getElementById("sl1");
            var nome = e.options[e.selectedIndex].text;
            $("#sl0").append($("<option>",{
                  		value: id,
                  		text: nome,
                                style:"cursor:pointer;"
            		}));
        $("#sl1 option[value='"+id+"']").remove();
        };
        
});
    </script>
</body>
</html>