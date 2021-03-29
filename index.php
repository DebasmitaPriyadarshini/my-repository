<!DOCTYPE html>
<html>
	<head>
		<title>MasterCity Pagination</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
		<br/><br/>
		<div class="container">
			<h3>Master City</h3><br/>
			<div align = "right">
					<button type="submit" class="btn" name="add_city" id="add">Add City</button><br/>
			</div>
			<div class="table_responsive" id="pagination_data">
			</div>
		</div>
	</body>
</html>
<script>
		$(document).ready(function(){
			load_data();
			function load_data(page){
				$.ajax({
					url:"pagination.php",
					method:"POST",
					data:{page:page},
					success:function(data){
						$('#pagination_data').html(data);
					},
					error:function(error){
						alert("pagination.php not found");
					}
			})
			}
			
			$(document).on('click','.pagination_link', function(){
				var page= $(this).attr("id");
				load_data(page);
				$(this).css("background-color", "gray");
			});
			$('#add').click(function(){
				var html='<label id=l1></label>';
					html+= '<input type="text" name="cityname" id="mastercity"/>';
					html+= '<button type="submit" class="btn" name="Submit" id="insert">Input City</button>';
					$('#pagination_data').prepend(html);
				});
			$(document).on('click', '#insert', function(){
				var cityname= $('#mastercity').val();
				$.ajax({
				url:"insert.php",
				method:"POST",
				data: {cityname:cityname},
				success:function(data){
					$('#pagination_data').html(data);
					load_data();
				}
				});
			});
			
			$(document).on('click','.cls_delete', function(){
				var id = $(this).closest("tr").find('td:eq(0)').text();
				console.log(id);
				//var id= $(this).attr("id");
				$.ajax({
					url:"delete.php",
					method:"POST",
					data: {id:id},
					success:function(data){
						$('#pagination_data').html(data);
						load_data();
					}
				});
						
				
			});
			/*$('#id1').click(function(){
				var html='<label id=l2></label>';
					html+= '<input type="text" name="updatecityname" id="updatemastercity"/>';
					$('#pagination_data').prepend(html);
				});*/
			$(document).on('click','.cls_update', function(){
				//var html = "<tr>";
				//html += '<td contenteditable id="data1"></td>';
				//html += '<td contenteditable id="data2"></td>';
				var tbl_row = $(this).closest('tr');
				tbl_row.find('#pagination_data').attr('contenteditable', 'true');
				var id = $(this).closest("tr").find('td:eq(0)').text();
				//var updatecityname = $(this).closest("tr").find('td:eq(1)').text();
				
				console.log(id);
				//var id= $(this).attr("id");
				$.ajax({
					url:"update.php",
					method:"POST",
					data: {id:id, updatecityname:updatecityname},
					success:function(data){
						$('#pagination_data').html(data);
						load_data();
					}
				});
				
						
				
			});
			
		});
		
			
</script>