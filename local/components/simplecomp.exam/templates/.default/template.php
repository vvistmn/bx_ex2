<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<b>Каталог:</b>
<ul>
    <?foreach ($arResult['FIRM'] as $firm):?>
    <li><b><?=$firm['NAME'] ?></b></li>
    <ul>
        <?foreach ($firm['ELEMENTS'] as $elem):?>
        <li><?=$elem['NAME']?> - <?=$elem['PROPERTY_PRICE_VALUE']?> - <?=$elem['PROPERTY_MATERIAL_VALUE']?></li>
        <?endforeach;?>
    </ul>
    <?endforeach;?>
</ul>