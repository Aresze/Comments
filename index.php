<?php
session_start();
include ("helper.php");
$db = new DB();
$authorized = true;

if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    $authorized = !$db->validate($login,$password);
}

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>

<div class="comments_wrap">
    <ul class="list-group">
        <?php echo printComments($db->getCommentsBD());?>
    </ul>
</div>
</br>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="sendmessage.php" method="post" class = "comments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" readonly class="form-control" name = "parrent" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name=comments id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <input type="submit" name = "submit" class="btn btn-primary" value="Отправить">
            </div>
        </div>
    </div>
    </form>
</div>

<?php
    if ($authorized) {
        print <<<HERE
    <form action="testreg.php" method="post" class="form-inline">
    	<div class="form-group mb-2">
    		<label for="staticEmail2" class="sr-only">Email</label>
    		<input type="text" class="form-control" name = "login" placeholder="Логин">
    	</div>
    	<div class="form-group mx-sm-3 mb-2">
    		<label for="inputPassword2" class="sr-only">Password</label>
    		<input type="password" class="form-control" name="password" placeholder="Пароль">
    	</div>
      <button type="submit" class="btn btn-primary mb-2">Войти</button>
    </form>
    <a href="reg.php">Зарегистрироваться</a>
    Вы вошли на сайт, как гость</p>
HERE;
}

else {
    print <<<HERE
    Вы вошли на сайт, как $_SESSION[login] (<a href='exit.php'>выход</a>)</br>
    
    <form action="sendmessage.php" method="post" class = "comments">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Новый комментарий:</span>
            </div>
            <textarea name=comments class="form-control" aria-label="With textarea"></textarea>
            <input type="submit" name = "submit" class="btn btn-outline-primary" value="Отправить">
        </div>
        
        <input type="hidden" id="parrent" name = "parrent" value ="0">
    </form>
    
HERE;

}
?>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })</script>
</body>
</html>