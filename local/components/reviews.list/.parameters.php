<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;

if (!Loader::includeModule("iblock")) {
    return;
}
// Список типов инфоблока
$arIBlockTypes = CIBlockParameters::GetIBlockTypes();

// Шаг 2. Если выбран тип инфоблока, получаем инфоблоки этого типа
$arIBlocks = [];
if (!empty($arCurrentValues['IBLOCK_TYPE'])) {
    $rsIBlocks = CIBlock::GetList(
        ['SORT' => 'ASC'], // Сортировка по возрастанию
        ['TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y'] // Фильтр по типу инфоблока и только активные инфоблоки
    );
    while ($arr = $rsIBlocks->Fetch()) {
        $arIBlocks[$arr['ID']] = '[' . $arr['ID'] . '] ' . $arr['NAME'];
    }
}
$arComponentParameters = [
    "GROUPS" => [],
    "PARAMETERS" => [
        "IBLOCK_TYPE" => [
            "PARENT" => "DATA_SOURCE",
            "NAME" => "Тип инфоблока",
            "TYPE" => "LIST",
            "VALUES" => $arIBlockTypes,
            "DEFAULT" => '',
            "REFRESH" => "Y", // Обновление формы при изменении типа инфоблока
        ],
        "IBLOCK_ID" => [
            "PARENT" => "DATA_SOURCE",
            "NAME" => "Выберите инфоблок",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '',
            "REFRESH" => "Y", // Обновление параметров формы при изменении
        ],
    ],
];
?>