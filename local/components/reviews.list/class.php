<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class testComponent extends CBitrixComponent
{

    public function executeComponent()
    {

        $this->doAction();
        $this->includeComponentTemplate();
        return parent::executeComponent(); // TODO: Change the autogenerated stub
    }

    public function doAction()
    {
        $iblockId = $this->arParams['IBLOCK_ID'];

        if (CModule::IncludeModule("iblock")) {
            $arSections = [];

            if($this->arParams['NUMBER'] > 0)
            {
                $number = $this->arParams['NUMBER'];
            } else {
                $number = 3;
            }
            $arNavParams = array("nPageSize" => $number);
            // Шаг 1. Получаем все разделы инфоблока
            $sectionRes = CIBlockSection::GetList(
                ['SORT' => 'ASC'], // Сортировка по порядку
                ['IBLOCK_ID' => $iblockId, 'ACTIVE' => "Y"], // Фильтр: инфоблок и активные разделы
                false,
                ['ID', 'NAME'],
                $arNavParams
            );

            // $sectionRes->NavStart(2);

            // Шаг 2. Проходим по каждому разделу
            while ($section = $sectionRes->Fetch()) {
                $arSections[$section['ID']] = [
                    'ID' => $section['ID'],
                    'NAME' => $section['NAME'],
                    'ELEMENTS' => []
                ];
            }

            if (isset($_GET["SECTION_ID"])) {
                $elementRes = CIBlockElement::GetList(
                    ['SORT' => 'ASC'], // Сортировка
                    ['IBLOCK_ID' => $iblockId,"SECTION_ID"=>$_GET['SECTION_ID'],  'ACTIVE' => "Y"], // Фильтр по инфоблоку и активным элементам
                    false,
                    false,
                    ['ID', 'IBLOCK_SECTION_ID', 'NAME', 'DETAIL_PAGE_URL', "DETAIL_TEXT"]
                );
            } else {
            // Шаг 3. Получаем элементы инфоблока, сгруппированные по разделам
            $elementRes = CIBlockElement::GetList(
                ['SORT' => 'ASC'], // Сортировка
                ['IBLOCK_ID' => $iblockId, 'ACTIVE' => "Y"], // Фильтр по инфоблоку и активным элементам
                false,
                false,
                ['ID', 'IBLOCK_SECTION_ID', 'NAME', 'DETAIL_PAGE_URL', "DETAIL_TEXT"]
            );
        }

            // Шаг 4. Распределяем элементы по разделам
            while ($element = $elementRes->GetNext()) {
                if (isset($arSections[$element['IBLOCK_SECTION_ID']])) {
                    if (!empty($element)) {
                        $arSections[$element['IBLOCK_SECTION_ID']]['ELEMENTS'][] = $element;
                    }
                    // $arSections[$element['IBLOCK_SECTION_ID']]['ELEMENTS'][] = $element;
                }
            }
            echo $sectionRes->NavPrint("Страницы", true);
            $this->arResult['SECTIONS'] = $arSections;

        }
    }
}