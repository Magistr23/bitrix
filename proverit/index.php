<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Проверить");
global $USER;

if (!$USER->IsAuthorized()) {
    // Проверка на наличие прав администратора
		if (!$USER->IsAdmin()) {
			header("Location: http://bitrix/");
		}
	} 

?><?$APPLICATION->IncludeComponent(
	"reviews.list.admin", 
	".default", 
	array(
		"ADMIN" => "Y",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "reviews",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>