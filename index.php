<!DOCTYPE html>

<html>
<head>
	<?php require_once("header.php"); ?>
	<title>ISL Parser</title>
<body>
	
	<div class="container">
    	<div class="row">
    		<div class="col-md-12 text-center">
    			<h2 style="font-weight:bold;">Welcome to ISL Parser</h2> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">

    				<label class="alert alert-info">Enter your sentence</label>
    				<textarea name="text_input" id="text_input" class="form-control" rows="3" required="required" autofocus></textarea><br>
					
					<div class="btn-group" data-toggle="buttons">
				  	  <label class="btn btn-primary active">
					  	<input type="radio" checked autocomplete="off" id = "eng"> English
					  </label>

					  <label class="btn btn-primary">
					    <input type="radio" autocomplete="off" id = "hindi"> Hindi  
					  </label>
					</div>
					<hr>
	     			<button type="button" class="btn btn-success" id = "button">Parse</button>
	   			
    		</div>
			<div class="col-md-3"></div>
    	<div>

    	<div class = "row">
    		<div class = "col-md-12">
    			<table class="table table-striped" id = "table">
    				<thead>
    					<tr>
    						<th>Word</th>
    						<th>Tags</th>
    						<th>Root</th>
    					</tr>
    				</thead>
    				<tbody id = "tbody">

    				</tbody>
    			</table>
    		</div>

    	</div>



    </div>  


    <?php require_once("footer.php"); ?>

    <script>
    	
    	$("document").ready(function(){

    		$("#button").click(function(){
    			var value = $('textarea#text_input').val();
    			var array = {};
    			array["key"] = value;

    			if($("#hindi").is(":checked")){
    				array["bool"] = "hindi";
    			}
    			else{
    				array["bool"] = "english";
    			}
    			$.post("parse.php",array,function(data, status){
    				s = JSON.parse(data);
    				console.log(s);
    				
   					$("#tbody").empty();
					 $.each(s, function(key, val){
					 	var tr = $('<tr></tr>');
					 	$('<td>'+val[0]+'</td> '+' <td>'+val[1]+'</td>').appendTo(tr);
					 	tr.appendTo('#tbody');
					 });  						
    				
       			});
    		});
    	});
    		  		

    </script>
</body>
<html>
