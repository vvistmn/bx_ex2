<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "84600",
		"CACHE_TYPE" => "A",
		"CAT_IBLOCK_ID" => "2",
		"FIRM_IBLOCK_ID" => "6",
		"PAGE_NAVIGATION" => "2",
		"PAG_NAVIGATION" => "1",
		"PROPERTY_CAT_CODE" => "FIRM",
		"TEMPLATE_DATEIL_LINK" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>