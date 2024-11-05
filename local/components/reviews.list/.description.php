<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
    "NAME" => GetMessage("IBLOCK_DATE_NAME"),
    "DESCRIPTION" => GetMessage("Выводим отзывы"),
    "PATH" => array(
        "ID" => "Отзывы о компаниях",
        "CHILD" => array(
			"ID" => "публичная версия",
		)
    ),
);
?>