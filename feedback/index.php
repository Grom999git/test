<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <title>Форма обратной связи</title>
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
							    	<label for="name" class="form-label">Имя пользователя</label>
							    	<input required type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
							    	<div id="nameHelp" class="form-text">Введите свое имя.</div>
								</div>
								<div class="mb-3">
							    	<label for="email" class="form-label">Email address</label>
							    	<input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
							    	<div id="emailHelp" class="form-text">Введите e-mail для обратной связи.</div>
								</div>
								<div class="mb-3">
									<label for="text" class="form-label">Ваше сообщение</label>
									<textarea required class="form-control" name="text" id="text" rows="3"></textarea>
								</div>
								<div class="mb-3">
									<label for="file" class="form-label">Прикрепите файл в формате jpg или png</label>
									<input class="form-control" type="file" name="user_file" id="file">
								</div>
								<button id="send" class="btn btn-primary">Отправить</button>
							</form>
						</div>
					</div>
					<div id="result"></div>
				</div>

				<div class="col">
    			</div>
    		</div>
    	</div>
    </body>
</html>

<script type="text/javascript">
        $("#send").click(function(event) {
            // Предотвращаем обычную отправку формы
            event.preventDefault();
            
        var formData = new FormData();
        formData.append('name', $("#name").val());
        formData.append('email', $("#email").val());
        formData.append('text', $("#text").val());
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
				console.log(data);
				$('#result').html(data);
			}
		});
	});

        </script>

