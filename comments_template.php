<li class ="list-group-item">
    <div class="comment">
        <div class="author">
            <?php echo $comment['login'];?>         
		</div>
		<div class="id">#
            <?php echo $comment['id'];?>
		</div>
		<div class="comment_text">
            <textarea name="comments" readonly class="form-control"><?php echo $comment['comment'];?></textarea>
            <?php
            if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='{$comment['id']}'>Ответить</button>";
            }
           ?>
        </div>
    </div>

    <?php if(!empty($comment['childs'])):?>
    <ul>
        <?php echo getCommentsTemplate($comment['childs']);?>
    </ul>   
    <?php endif;?>
</li>