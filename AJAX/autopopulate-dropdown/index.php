<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>How to auto populate dropdown with AJAX PDO and PHP</title>

	<script type="text/javascript" src='jquery-3.4.1.min.js'></script>
</head>
<body>
	
	<table>
		<tr>
		    <td>Country</td>
		    <td>
		    	<!-- Country dropdown -->
		        <select id='sel_country' >
		          	<option value='0' >Select Country</option>
		          	<?php 
		          	## Fetch countries
					$stmt = $conn->prepare("SELECT * FROM countries ORDER BY name");
					$stmt->execute();
					$countriesList = $stmt->fetchAll();

					foreach($countriesList as $country){
						echo "<option value='".$country['id']."'>".$country['name']."</option>";
					}
		          	?>
		        	</select>
		      	</td>
		    </tr>

		    <tr>
		      	<td>State</td>
		      	<td>
			        <select id='sel_state' >
			          	<option value='0' >Select State</option>
			          	
			        </select>
		      	</td>
		    </tr>

		    <tr>
		      	<td>City</td>
		      	<td>
			        <select id='sel_city' >
			          	<option value='0' >Select City</option>
			          	
			        </select>
		      	</td>
		</tr>
	</table>

	<!-- Script -->
	<script type="text/javascript">
	$(document).ready(function(){

		// Country
		$('#sel_country').change(function(){

			var countryid = $(this).val();
			
			// Empty state and city dropdown
			$('#sel_state').find('option').not(':first').remove();
			$('#sel_city').find('option').not(':first').remove();

			// AJAX request
			$.ajax({
				url: 'ajaxfile.php',
				type: 'post',
				data: {request: 1, countryid: countryid},
				dataType: 'json',
				success: function(response){
					
					var len = response.length;

		            for( var i = 0; i<len; i++){
		                var id = response[i]['id'];
		                var name = response[i]['name'];
		                    
		                $("#sel_state").append("<option value='"+id+"'>"+name+"</option>");

		            }
				}
			});
			
		});


		// State
		$('#sel_state').change(function(){
			var stateid = $(this).val();
			
			// Empty city dropdown
			$('#sel_city').find('option').not(':first').remove();

			// AJAX request
			$.ajax({
				url: 'ajaxfile.php',
				type: 'post',
				data: {request: 2, stateid: stateid},
				dataType: 'json',
				success: function(response){
					
					var len = response.length;

		            for( var i = 0; i<len; i++){
		                var id = response[i]['id'];
		                var name = response[i]['name'];
		                    
		                $("#sel_city").append("<option value='"+id+"'>"+name+"</option>");

		            }
				}
			});
		});
	});
	</script>
</body>
</html>









