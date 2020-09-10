<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if (!CModule::IncludeModule('iblock')) {
    return false;
}

global $USER;

if ($this->StartResultCache($arParams['CACHE_TIME'])) {
    $arResult['FIRM'] = [];
    $firmCount = [];

    $filterElems = ['IBLOCK_ID' => $arParams['CAT_IBLOCK_ID'],
        'CHECK_PERMISSIONS' => 'Y',
        '!PROPERTY_'.$arParams['PROPERTY_CAT_CODE'] => false,
        'ACTIVE' => 'Y'];

    $selectElems = ['ID', 'IBLOCK_ID',
        'IBLOCK_SECTION_ID', 'NAME',
        'CODE', 'PROPERTY_'.$arParams['PROPERTY_CAT_CODE'],
        'PROPERTY_PRICE', 'PROPERTY_MATERIAL'];

    $elemsList = CIBlockElement::GetList([], $filterElems, false, false, $selectElems);

    while ($elem = $elemsList->GetNext()) {
        $arResult['FIRM'][$elem['PROPERTY_FIRM_VALUE']]['ELEMENTS'][$elem['ID']] = $elem;
    }

    $filterFirms = ['IBLOCK_ID' => $arParams['FIRM_IBLOCK_ID'],
        'ID' => array_keys($arResult['FIRM']),
        'CHECK_PERMISSIONS' => 'Y',
        'ACTIVE' => 'Y' ];

    $selectFirms = ['ID', 'NAME'];
    $firmsList = CIBlockElement::GetList([], $filterFirms, false, false, $selectFirms);
    while ($firm = $firmsList->GetNext()) {
        $firmCount = $firm;
        $arResult['FIRM'][$firm['ID']] = array_merge($firm, $arResult['FIRM'][$firm['ID']]);
    }
    $arResult['COUNT'] = count($firmCount);

    $this->setResultCacheKeys(['COUNT']);
    $this->IncludeComponentTemplate();
}
$APPLICATION->SetTitle('Разделов - '.$arResult['COUNT']);
?>