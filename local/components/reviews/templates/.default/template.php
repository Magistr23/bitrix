<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

?>
<?php if ($_GET['SECTION_ID'] == 9) {

Loader::includeModule("iblock");

// ID инфоблока и ID раздела "Проверка"
$iblockId = 5;
$checkSectionId = 9;

// Получаем список разделов для перемещения
$sections = SectionTable::getList([
    'filter' => ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', '!ID' => $checkSectionId],
    'select' => ['ID', 'NAME'],
    'order' => ['NAME' => 'ASC']
]);
?>
<form action="" method="POST">
    <?= bitrix_sessid_post() ?>
        <div class="sections-wrapper">
            <div class="review-detail">
                <h3>Автор отзыва: <input type="text" name="name" value="<?= htmlspecialchars($arResult['SECTIONS']['NAME']) ?>"></h3>
                <p>Компания: <?=$arResult['SECTIONS']['company']?></p>
                <p> Текст Отзыва: <br><textarea name="DESCRIPTION"><?= htmlspecialchars($arResult['SECTIONS']['DETAIL_TEXT']) ?></textarea></p>
                <label for="section_<?= $arResult['SECTIONS']['ID'] ?>">Переместить в раздел:</label>
                <select name="section[<?= $arResult['SECTIONS']['ID'] ?>]" id="section_<?= $arResult['SECTIONS']['ID'] ?>">
                    <?php foreach ($sections as $section): ?>
                        <option value="<?= $section['ID'] ?>"><?= htmlspecialchars($section['NAME']) ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input type="hidden" name="IBLOCK_ID" value="<?=$iblockId?>">
                <input type="hidden" name="ELEMENT_ID" value="<?=$arResult['SECTIONS']['ID']?>">
                <button type="submit" name="delete">Удалить этот отзыв</button>
                <button type="submit" name="moderate">Подтвердить и переместить</button>
            </div>
        </div>
</form>

<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        $elementId = intval($_POST['ELEMENT_ID']);
        if ($elementId > 0) {
            if (CIBlockElement::Delete($elementId)) {
                $_SESSION['result'] = "элемент успешно удален";
                header("Location: http://bitrix/proverit/");
            } else {
                echo "Ошибка при удалении элемента";
            }
        } else {
            echo "Некорректный ID элемента";
        }
        // CIBlockElement::Delete($_GET['ID']);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['moderate']) && check_bitrix_sessid()) {
        $el = new CIBlockElement;

        foreach ($_POST['section'] as $elementId => $newSectionId) {
            // Обновляем элемент, перемещая его в указанный раздел
            $el->Update($elementId, [
                "NAME"           => htmlspecialchars(trim($_POST['name'])),
                "ACTIVE"         => "Y", // Активность элемента
                "DETAIL_TEXT"    => htmlspecialchars(trim($_POST['DESCRIPTION'])),
                'IBLOCK_SECTION_ID' => (int)$newSectionId,
            ]);
        }

        $_SESSION['result'] =  "Элементы успешно перемещены!";
        header("Location: http://bitrix/proverit/");
    }
 } else { ?>
<div class="sections-wrapper">
    <div class="review-detail">
        <h2><?= htmlspecialchars($arResult['SECTIONS']['NAME']) ?></h2>
        Компания: <?= htmlspecialchars($arResult['SECTIONS']['company']) ?>
        <p>Текст отзыва: <?= htmlspecialchars($arResult['SECTIONS']['DETAIL_TEXT']) ?></p>
    </div>
</div>
<?php } ?>


<style>
    .review-detail div {
  margin-top: 1rem;
}

.review-detail label,
.review-detail input,
.review-detail textarea
{
    font-size: 1.3rem;
    line-height: 1.2
}

.review-detail {
    width: 30em;
    max-width: 90%;
    margin: 0 auto;
}

.review-detail label {
    margin-bottom: 0.4rem;
    display: block;
}

.review-detail input,
.review-detail textarea {
    padding: 0.4rem;
    width: 100%;
}

.review-detail textarea {
    resize: vertical;
    width: 400px;
    height: 150px;
}

.review-detail button {
    margin-top: 2rem;
}
</style>