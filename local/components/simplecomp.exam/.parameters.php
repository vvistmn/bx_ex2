<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
$arComponentParameters = array(
    "PARAMETERS" => array(
        "CAT_IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("CAT_IBLOCK_ID_NAME"),
            "TYPE" => "STRING",
        ),
        "FIRM_IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("FIRM_IBLOCK_ID_NAME"),
            "TYPE" => "STRING",
        ),
        "TEMPLATE_DATEIL_LINK" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("TEMPLATE_DATEIL_LINK_NAME"),
            "TYPE" => "STRING",
        ),
        "PROPERTY_CAT_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("PROPERTY_CAT_CODE_NAME"),
            "TYPE" => "STRING",
        ),
        "PAGE_NAVIGATION" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("PAG_NAVIGATION_NAME"),
            "TYPE" => "STRING",
        ),
        "CACHE_TIME" => array("DEFAULT" => 84600),
    ),
);