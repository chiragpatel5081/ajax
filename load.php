<?php
	include 'connect.php';
	$sel="select * from student";
	$exe=$con->query($sel);
?>
<html>
<head>
	<title>Load Data using Ajax</title>
	<script>
	$(document).ready(function()
	{
		$('.delete').click(function(e){
			
    	var did= $(this).attr('id');
    	    $.ajax({
	            type: "GET",
	            url: "delete.php",
	            data: { did },
	            success: function(data){
	                 alert(data);
	                $.ajax({
                        type: "POST",
                        url: "load.php",
      
                        success: function(data){
                            //alert(data);
                            $('#view').html(data);
                        },
	            });
	            
	            },
	        });
	                return false;
	   })
	})
//----------update------------------			
$(function(){

	$('#update').show();
	$('#insert').hide();
		$('.update').click(function(e){
			//e.preventDefault();
			var eid=$(this).attr('id');
			//alert(eid);

			$.ajax({

				type:"GET",
				url:'update.php',
				data:{eid},
				success:function(data)
				{
					alert(data);
					//alert(eid);
					var decode_data = jQuery.parseJSON(data);
					$('#userid').val(decode_data.id);
					$('#fname').val(decode_data.fname);
					$('#lname').val(decode_data.lname);

					if(decode_data.gender == 'male')
					{
						$('input:radio[name=gender]')[0].checked=true;
					}
					else
					{
						$('input:radio[name=gender]')[1].checked=true;
					}

					if(decode_data.edu=='bba')
					{
						$('#edu').find('option:selected').text(decode_data.edu);
					}
					else if(decode_data.edu=='mca')
					{
						$('#edu').find('option:selected').text(decode_data.edu);
					}
					else if(decode_data.edu=='bca')
					{
						$('#edu').find('option:selected').text(decode_data.edu);
					}

					var arr = new Array();
					var arr = decode_data.hob.split(',');
					if($.inArray( "song", arr ) !== -1)
					{
						$("#song").prop('checked', true);
					}else{
						$("#song").prop('checked', false);
					}
					if($.inArray( "game", arr ) !== -1)
					{
						$("#game").prop('checked', true);
					}else{
						$("#game").prop('checked', false);
					}
					if($.inArray( "driving", arr ) !== -1)
					{
						$("#driving").prop('checked', true);
					}else{
						$("#driving").prop('checked', false);
					}
					$('#image').html('<img width="10%" height="10%" src="gallary/' + decode_data.pro + '" />');

					var img_array = decode_data.mgal.split(',');
					$('#multifile').empty();
					for(i=0;i < img_array.length;i++)
					{
						//$('#multifile').html('<img width="10%" height="10%" src="gallary/' + img_array[i] + '" />');
						$('#multifile').append('<img width="10%" height="10%" src="gallary/' + img_array[i] + '" />');
					}				
							
				}
			});
		});

});
</script>
</head>
<body>
<table border="2" cellpadding="5" cellspacing="5" align="center">
	
	<tr>
		<th>id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Education</th>
		<th>Hobby</th>
		<td>Profile</td>
			<td>Gallery</td>

		<th>Edit</th>
		<th>Delete</th>
	</tr>
			<?php		
				while($fet=$exe->fetch_object())
				{
					$gal=explode(',',$fet->mgal);
			?>
	<tr>
		<td><?php echo $fet->id; ?></td>
		<td><?php echo $fet->fname; ?></td>
		<td><?php echo $fet->lname; ?></td>
		<td><?php echo $fet->gender; ?></td>
		<td><?php echo $fet->edu; ?></td>
		<td><?php echo $fet->hob; ?></td>
		<td>
			<img src="gallary/<?php echo $fet->pro; ?>" width="35" height="35">
		</td>
		<td>
				<?php 
					for ($i=0;$i<count($gal);$i++)	
					{ 
					?>
					<img src="gallary/<?php echo $gal[$i] ?>" width="50" height="50">
					<?php 
					}

				?>					
				</td>

		<td><a href="#" id="<?php echo $fet->id; ?>" class="update">Edit</a></td>
		<td><a href="#" id="<?php echo $fet->id; ?>" class="delete">Delete</a></td>
	</tr>
	<?php  } ?>
</table>
<div>
	<p id="data"></p>
</div>
</body>
</html>