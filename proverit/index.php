<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Проверить");
?><?$APPLICATION->IncludeComponent(
	"reviews.list", 
	".default", 
	array(
		"ADMIN" => "Y",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "reviews",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>