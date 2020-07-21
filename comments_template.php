<li class ="list-group-item">
    <div class="comment">
        <div class="author">
            <?php echo $comment[ModuleEnum::login];?>
		</div>
		<div class="id">#
            <?php echo $comment[ModuleEnum::id];?>
		</div>
		<div class="comment_text">
            <textarea name="comments" readonly class="form-control"><?php echo $comment[ModuleEnum::comment];?></textarea>
            <?php
            if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='{$comment[ModuleEnum::id]}'>Ответить</button>";
            }
           ?>
        </div>
    </div>

    <?php if(!empty($comment[ModuleEnum::childs])):?>
    <ul>
        <?php echo getCommentsTemplate($comment[ModuleEnum::childs]);?>
    </ul>   
    <?php endif;?>
</li>