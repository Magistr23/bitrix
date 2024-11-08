<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php if (isset($_SESSION['result'])):?>
        <div class="result"><?=$_SESSION['result'];?></div>
        <?php unset($_SESSION['result']); ?>
        <a href="http://bitrix/reviews/">Назад</a>
<? else: ?>
<form id="reviewForm" method="POST" action="">
    <label for="name">Ваше имя:</label>
    <input type="text" id="name" name="name" required>

    <label for="company">Компания:</label>
    <input type="text" id="company" name="company" required>

    <label for="review">Ваш отзыв:</label>
    <textarea id="review" name="review" required></textarea>

    <button type="submit">Отправить отзыв</button>
</form>
<? endif;?>