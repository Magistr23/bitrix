<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
class formComponent extends CBitrixComponent
{

    public function executeComponent()
    {

        $this->doAction();
        $this->includeComponentTemplate();
        return parent::executeComponent(); // TODO: Change the autogenerated stub
    }

    public function doAction()
    {
        // Проверяем, была ли отправлена форма
        if ($_SERVER["REQUEST_METHOD"] === "POST" && check_bitrix_sessid()) {
            // Здесь происходит обработка данных формы
            $formData = $_POST;
        
            // Выполните необходимые действия, например, сохранение данных в инфоблок или отправку на почту
            // ...
        
            // Перенаправление на ту же страницу для предотвращения повторной отправки данных
            LocalRedirect($APPLICATION->GetCurPageParam("", array("form_submitted")));
        }



        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['review'])) {
            // Подключаем модуль инфоблоков
            Loader::includeModule("iblock");
        
            // ID инфоблока, куда будут сохраняться отзывы
            $iblockId = 5; // Укажите ID вашего инфоблока
            $sectionId = 9; // Укажите ID вашего инфоблока
        
            // Массив данных для создания элемента
            $arFields = array(
                "IBLOCK_ID" => $iblockId,
                'IBLOCK_SECTION_ID' => $sectionId,
                "NAME" => htmlspecialchars($_POST['name']),
                "PROPERTY_VALUES" => ["company" => htmlspecialchars($_POST['company'])],
                "DETAIL_TEXT" => htmlspecialchars($_POST['review']),
                "ACTIVE" => "Y",
            );
        
            $el = new CIBlockElement;
            if ($elementId = $el->Add($arFields)) {
                echo '<div class="result">Ваш отзыв отправлен на модерацию!</div>';
                // header("Location: http://bitrix/reviews/");
            } else {
                echo  "Ошибка отправки отзыва: " . $el->LAST_ERROR;
            }
        }
        return true;
    }
}