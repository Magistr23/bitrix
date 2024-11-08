<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?$APPLICATION->SetTitle("Отзывы компаний");?>

<?$APPLICATION->IncludeComponent(
	"forms", 
	"bootstrap", 
	array(
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "reviews",
		"COMPONENT_TEMPLATE" => "bootstrap"
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"reviews.list", 
	"flex", 
	array(
		"COMPONENT_TEMPLATE" => "flex",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "reviews"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>