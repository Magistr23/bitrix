<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php if (isset($_SESSION['result'])):?>
        <div class="result">
            <?=$_SESSION['result'];?>
            <a href="reviews/">Назад</a>
        </div>
        <?php unset($_SESSION['result']); ?>
<? else: ?>
<form id="reviewForm" method="POST" action="">
    <label for="name">Ваш никнейм или должность:</label>
    <input type="text" id="name" name="name" required>

    <label for="company">Компания:</label>
    <input type="text" id="company" name="company" required>

    <label for="review">Ваш отзыв:</label>
    <textarea id="review" name="review" required></textarea>

    <button type="submit">Отправить отзыв</button>
</form>
<? endif; ?>

<style>
    #reviewForm {
        display: grid;
        justify-content: space-around;
        justify-items: center;
        grid-template-columns: 200px;
    }

    #reviewForm textarea {
    resize: vertical;
    width: 400px;
    height: 150px;
}
    #reviewForm input {
        width: 300px;
    }

</style>