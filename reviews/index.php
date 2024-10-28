<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;

$APPLICATION->SetTitle("Отзывы компаний");
?>

<form id="reviewForm" method="POST" action="">
    <label for="name">Ваше имя:</label>
    <input type="text" id="name" name="name" required>

    <label for="company">Компания:</label>
    <input type="text" id="company" name="company" required>

    <label for="review">Ваш отзыв:</label>
    <textarea id="review" name="review" required></textarea>

    <button type="submit">Отправить отзыв</button>
</form>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['review'])) {
    // Подключаем модуль инфоблоков
    Loader::includeModule("iblock");

    // ID инфоблока, куда будут сохраняться отзывы
    $iblockId = 5; // Укажите ID вашего инфоблока

    // Массив данных для создания элемента
    $arFields = array(
        "IBLOCK_ID" => $iblockId,
        "NAME" => htmlspecialchars($_POST['name']),
        "PROPERTY_VALUES" => ["company" => htmlspecialchars($_POST['company'])],
        "PREVIEW_TEXT" => htmlspecialchars($_POST['review']),
        "ACTIVE" => "N", // Отзыв неактивен, пока администратор не подтвердит
    );

    $el = new CIBlockElement;
    if ($elementId = $el->Add($arFields)) {
        echo "Ваш отзыв отправлен на модерацию!";
    } else {
        echo "Ошибка отправки отзыва: " . $el->LAST_ERROR;
    }
}
?>



<?$APPLICATION->IncludeComponent(
	"reviews.list", 
	".default", 
	array(
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "reviews",
		"COMPONENT_TEMPLATE" => ".default",
		"ADMIN" => "N"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>