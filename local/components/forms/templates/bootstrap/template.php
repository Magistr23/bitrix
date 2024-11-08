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
<style>
    #reviewForm div {
  margin-top: 1rem;
}

#reviewForm label,
#reviewForm input,
#reviewForm textarea,
#reviewForm button
{
    font-size: 1.3rem;
    line-height: 1.2
}

#reviewForm {
    width: 30em;
    max-width: 90%;
    margin: 0 auto;
}

#reviewForm label {
    margin-bottom: 0.4rem;
    display: block;
}

#reviewForm input,
#reviewForm textarea {
    padding: 0.4rem;
    width: 100%;
}

#reviewForm textarea {
    resize: vertical;
    width: 400px;
    height: 150px;
}

#reviewForm button {
    margin-top: 2rem;
}
</style>