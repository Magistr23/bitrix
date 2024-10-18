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
        // $this->arResult['SECTIONS'] = 123;
        // if (empty($this->arParams["TEMPLATE_FOR_DATE"])) {
        //     $this->arResult['DATE'] = date('Y/m/d');
        // } else {
        //     $this->arResult['DATE'] = date($this->arParams["TEMPLATE_FOR_DATE"]);
        // }
        // if ($this->arParams['SHOW_TITLE'] === "Y") {
        //     $this->arResult['TEST'] = "Картинка включёна";
        //     $this->arResult['UPLOAD_FILE'] = "<img src=". $this->arParams['UPLOAD_FILE'] ." alt=''>";
        // } else {
        //     $this->arResult['TEST'] = "Картинка выключена";
        // }
        // $this->arResult['COLOR'] = $this->arParams['COLOR'];
        $iblockId = $this->arParams['IBLOCK_ID'];

        if (CModule::IncludeModule("iblock")) {
            $arSections = [];

            // Шаг 1. Получаем все разделы инфоблока
            $sectionRes = CIBlockSection::GetList(
                ['SORT' => 'ASC'], // Сортировка по порядку
                ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'], // Фильтр: инфоблок и активные разделы
                false,
                ['ID', 'NAME']
            );

            // Шаг 2. Проходим по каждому разделу
            while ($section = $sectionRes->Fetch()) {
                $arSections[$section['ID']] = [
                    'ID' => $section['ID'],
                    'NAME' => $section['NAME'],
                    'ELEMENTS' => []
                ];
            }

            // Шаг 3. Получаем элементы инфоблока, сгруппированные по разделам
            $elementRes = CIBlockElement::GetList(
                ['SORT' => 'ASC'], // Сортировка
                ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'], // Фильтр по инфоблоку и активным элементам
                false,
                false,
                ['ID', 'IBLOCK_SECTION_ID', 'NAME', 'DETAIL_PAGE_URL', "DETAIL_TEXT"]
            );

            // Шаг 4. Распределяем элементы по разделам
            while ($element = $elementRes->GetNext()) {
                if (isset($arSections[$element['IBLOCK_SECTION_ID']])) {
                    $arSections[$element['IBLOCK_SECTION_ID']]['ELEMENTS'][] = $element;
                }
            }

            $this->arResult['SECTIONS'] = $arSections;

        }
    }
}