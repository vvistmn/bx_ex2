<?php

// [ex2-50] Проверка при деактивации товара

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("ChangeElementCatalog", "OnBeforeIBlockElementUpdateHandler"));
class ChangeElementCatalog
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields["ACTIVE"] !== "Y") {
            $filter = array(
                "ID" => $arFields["ID"],
            );
            $select = array(
                "ID", "NAME", "SHOW_COUNTER", "ACTIVE"
            );

            $element = CIBlockElement::GetList(array(), $filter, false, false, $select)->GetNext();

            if (!$element || $element["ACTIVE"] === $arFields["ACTIVE"]) {
                return true;
            }

            if ($element["SHOW_COUNTER"] > 2) {
                global $APPLICATION;
                $APPLICATION->ThrowException("Товар невозможно деактивировать у него ".$element["SHOW_COUNTER"]." просмотров");
                return false;
            }
            return true;
        }
    }
}

// [ex2-93] Записывать в Журнал событий открытие не существующих страниц сайта

AddEventHandler("main", "OnEpilog", Array("ErrorPage404", "OnEpilogHandler"));
class ErrorPage404
{
    function OnEpilogHandler () {
        if (defined("ERROR_404") && ERROR_404 === "Y") {
            global $APPLICATION;
            $curPage = $APPLICATION->GetCurUri();
            CEventLog::Add(array(
                "SEVERITY" => "INFO",
                "AUDIT_TYPE_ID" => "ERROR_404",
                "MODULE_ID" => "main",
                "DESCTIPTION" => $curPage,
            ));
        }
    }
}

// [ex2-94] Супер инструмент SEO специалиста

AddEventHandler("main", "OnPageStart", Array("IBlockMetatags", "onPageStartHandler"));
class IBlockMetatags
{
    function onPageStartHandler()
    {
        global $APPLICATION;

        $curPage = $APPLICATION->GetCurPage();

        if (!CModule::IncludeModule('iblock')) {
            return false;
        }

        $filter = ['BLOCK_ID' => 5, "NAME" => $curPage];

        $select = array("ID", "PROPERTY_TITLE", "PROPERTY_DESCRIPTION");

        $metaTags = CIBlockElement::GetList(array(), $filter, false, false, $select);

        while ($metaTag = $metaTags->GetNext()) {
            $APPLICATION->SetPageProperty("title", $metaTag["PROPERTY_TITLE_VALUE"]);
            $APPLICATION->SetPageProperty("description", $metaTag["PROPERTY_DESCRIPTION_VALUE"]);
        }
    }
}
