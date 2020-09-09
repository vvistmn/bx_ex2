<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "84600",
		"CACHE_TYPE" => "A",
		"CAT_IBLOCK_ID" => "",
		"FIRM_IBLOCK_ID" => "",
		"PROPERTY_CAT_CODE" => "",
		"TEMPLATE_DATEIL_LINK" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>