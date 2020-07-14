<html>
<head>
<title>Регистрация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<h2>Регистрация</h2>
<form action="save_user.php" method="post" enctype="multipart/form-data">

    <div class="form-group col-md-6">
        <label>Логин *</label>
		<input name="login" class="form-control" type="text" size="35" maxlength="35">
    </div>

    <div class="form-group col-md-6">
        <label>Пароль *</label>
		<input name="password" class="form-control" type="password" size="35" maxlength="35">
    </div>

    <div class="form-group col-md-6">
        <label>Почта</label>
		<input name="email" class="form-control" type="email" size="35" maxlength="35">
	</div>

    <div class="form-group col-md-6">
        <label>Фамилия</label>
		<input name="surname" class="form-control" type="text" size="35" maxlength="35">
	</div>

    <div class="form-group col-md-6">
        <label>Имя</label>
		<input name="name" class="form-control" type="text" size="35" maxlength="35">
	</div>
	<p>
		<input type="submit" name="submit" class="btn btn-primary" value="Зарегистрироваться">
	</p>
    </div>
</form>
Звездочками (*) обозначены поля, обязательные для заполнения.
</body>
</html>
