<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

?>
<?php if ($_GET['SECTION_ID'] == 9):?>
    <?php
Loader::includeModule("iblock");

// ID инфоблока и ID раздела "Проверка"
$iblockId = 5;
$checkSectionId = 9;

// Получаем элементы из раздела "Проверка"
$elements = CIBlockElement::GetList(
    ['SORT' => 'ASC'], // Сортировка
    ['IBLOCK_ID' => $iblockId, 'ID' => $_GET['ID'], 'ACTIVE' => "Y"], // Фильтр по инфоблоку и активным элементам
    false,
    false,
    ['ID', 'IBLOCK_SECTION_ID', 'NAME', 'DETAIL_PAGE_URL', "PREVIEW_TEXT"]
);

// Получаем список разделов для перемещения
$sections = SectionTable::getList([
    'filter' => ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', '!ID' => $checkSectionId],
    'select' => ['ID', 'NAME'],
    'order' => ['NAME' => 'ASC']
]);

$elementRes = CIBlockElement::GetList(
    ['SORT' => 'ASC'], // Сортировка
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => $active], // Фильтр по инфоблоку и активным элементам
    false,
    false,
    ['ID', 'IBLOCK_SECTION_ID', 'NAME', 'DETAIL_PAGE_URL', "PREVIEW_TEXT"]
);

?>

<form action="" method="POST">
    <?= bitrix_sessid_post() ?>
    <?php while ($element = $elements->GetNext()): ?>
        <div>
            <h3>Автор отзыва: <input type="text" name="name" value="<?= htmlspecialchars($element['NAME']) ?>"></h3>
            <p> Текст Отзыва: <textarea name="DESCRIPTION"><?= htmlspecialchars($element['PREVIEW_TEXT']) ?></textarea></p>
            <label for="section_<?= $element['ID'] ?>">Переместить в раздел:</label>
            <select name="section[<?= $element['ID'] ?>]" id="section_<?= $element['ID'] ?>">
                <?php foreach ($sections as $section): ?>
                    <option value="<?= $section['ID'] ?>"><?= htmlspecialchars($section['NAME']) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="IBLOCK_ID" value="<?=$iblockId?>">
            <input type="hidden" name="compa" value="comp">
        </div>
    <?php endwhile; ?>
    <button type="submit" name="moderate">Подтвердить и переместить</button>
</form>

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['moderate']) && check_bitrix_sessid()) {
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

    echo "Элементы успешно перемещены!";
}

?>

<?php else:?>

    <form action="" method="POST">
    <input type="text" name="NAME" placeholder="Название элемента" required>
    <textarea name="DESCRIPTION" placeholder="Описание элемента"></textarea>
    <input type="hidden" name="IBLOCK_ID" value="ID_ВАШЕГО_ИНФОБЛОКА">
    <input type="hidden" name="SECTION_ID" value="ID_РАЗДЕЛА">
    <button type="submit" name="submit">Сохранить</button>
</form>

<div class="sections-wrapper">
    <div class="review-detail">
        <?php foreach ($arResult['SECTIONS'] as $value): ?>
        <h2><?= htmlspecialchars($value['NAME']) ?></h2>
        Компания: <?= htmlspecialchars($value['company']) ?>
        <p>Текст отзыва: <?= htmlspecialchars($value['PREVIEW_TEXT']) ?></p>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>