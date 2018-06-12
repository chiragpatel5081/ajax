<html>
<head>
	<title>Ajax</title>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
			
$(document).ready(function()
{
   $("#submit").click(function(e)
    {
        e.preventDefault();
        var form = $('form')[0];                
        var formData = new FormData(form);
    
        $.ajax
        ({
            type: "POST",
            url: "insert.php",
            cache: false,
            contentType: false,
            processData: false,                    
            data: formData,
            success: function(data)
            {                                              
                alert("Record Successfully Inserted");
            }
        });
    });   
}); 
$(function(){
    $("#submit").show();
$("#update").click(function(e)
             {
                //var eid = $(this).attr('id');
                e.preventDefault();
                var form = $('form')[0];
                var formData = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "edit.php",
                    cache: false,
                    contentType: false,
                    processData: false, 
                    data: formData,
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
                    }

                });
        });
    });

</script>
</head>
<body>
<form name="form" method="post" enctype="multipart/form-data">
	<table border="1" align="center" cellpadding="5" cellspacing="5">
	<input type="text" name="userid" id="userid" hidden="">
		<h3 align="center">Ajax_Form</h3>
        <tr>
			<td>First Name</td>
			<td><input type="text" name="fname" id="fname"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="lname" id="lname"></td>
		</tr>
		<tr> 
			<td>Gender</td>
			<td><input type="radio" name="gender" value="male" id="gender">Male
				<input type="radio" name="gender" value="female" id="gender">Female
			</td>
		</tr>
		<tr>
			<td>Education</td>
			<td>
				<select name="edu" id="edu">
				<option value="">select</option>
				<option value="bba">BBA</option>
				<option value="mca">MCA</option>
				<option value="bca">BCA</option>
				</select>
			</td>
		</tr>
        <tr>
                <td>Hobby:</td>
                <td>
                <input type="checkbox" name="hob[]" id="song" value="song">Song<br>
                <input type="checkbox" name="hob[]" id="game" value="game">Game<br>
                <input type="checkbox" name="hob[]" id="driving" value="driving">Driving<br>
                </td>
            </tr>
		<tr>
            <tr>
                <td>Profile</td>
                <td>
                    <input type="file" name="pro" id="pro">
                    <div id="image"></div>
                </td>
            </tr>
            <tr>
                <td>Gallery</td>
                <td>
                    <input type="file" name="mgal[]" id="mgal" multiple>
                    <div id="multifile"></div>
                </td>
            </tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Submit" id="submit">
				<input type='submit' name='update' value='UPDATE' id="update" hidden="">
			</td>
		</tr>
	</table>
</form>
</div>
	<div id="view"></div>
</body>
</html>