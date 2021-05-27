<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <title>Вывод таблицы из csv файла</title>
    </head>
    <body>
    	<div class="container">
			<div class="row">
    			<div class="col">
    			</div>
    			
    			<div class="col">
    				<div class="card">
						<div class="card-body">
					        <form id="form" method="Post" enctype="multipart/form-data">
								<div class="mb-3">
									<label for="file" class="form-label">Укажите файл CSV</label>
									<input class="form-control" type="file" name="user_file" id="file">
								</div>
								<button id="send" class="btn btn-primary">Загрузить файл</button>
							</form>
						</div>
					</div>
					<div id="result"></div>
				</div>

				<div class="col">
    			</div>
    		</div>

    		<?php if(file_exists('files/file.csv')): ?>
    		<div class="row">
    			<div class="col">
    			</div>
    			
    			<div class="col">
    				<table class="table">
						<thead>
					    	<tr>
						      	<th scope="col">#</th>
						      	<th scope="col">Фамилия</th>
						      	<th scope="col">Имя</th>
						      	<th scope="col">Отчество</th>
					    	</tr>
					  	</thead>
					  	<tbody>
					  		<?php
					  			$csvData = file_get_contents('files/file.csv');
								$lines = explode(PHP_EOL, $csvData);
							?>
							<?php foreach ($lines as $line): {
									$row = explode(";", $line);	
								}
							?>
						    <tr>
							    <th scope="row"><?php echo($row[0]) ?></th>
							    <td><?php echo($row[1]) ?></td>
							    <td><?php echo($row[2]) ?></td>
							    <td><?php echo($row[3]) ?></td>
							</tr>
						    <?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="col">
    			</div>
    		</div>
    		<?php endif; ?>
    	</div>
    </body>
</html>

<script type="text/javascript">
        $("#send").click(function(event) {
            // Предотвращаем обычную отправку формы
            event.preventDefault();
            
        var formData = new FormData();
		formData.append('user_file', $("#file")[0].files[0]);
 
		$.ajax({
			type: "POST",
			url: '/ajax.php',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType : 'html',
			success: function(data){
				$('#result').html(data);
				location.reload();
			}
		});
	});
</script>

