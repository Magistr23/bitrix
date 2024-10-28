<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзыв об компаний");

$APPLICATION->IncludeComponent(
	"reviews", 
	".default", 
	array(
		"IBLOCK_TYPE" => "reviews",
		"IBLOCK_ID" => $_GET["ID"],
		"ELEMENT_CODE" => $_GET["ID"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"COMPANY" => "MTS",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>