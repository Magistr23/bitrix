<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?$APPLICATION->SetTitle("Отзывы компаний");?>
<p>Оставь свой отзыв</p>
<?$APPLICATION->IncludeComponent(
	"forms", 
	"grid", 
	array(
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "reviews",
		"COMPONENT_TEMPLATE" => "grid"
	),
	false
);?>
<p>Список отзывов</p>
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
<script>
	    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>