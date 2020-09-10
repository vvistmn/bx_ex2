<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<b>Каталог:</b>
<ul>
    <?foreach ($arResult['FIRM'] as $firm):?>
        <?
        $this->AddEditAction($firm['ID'], $firm['ADD_LINK'], $firm['ADD_LINK_TEXT']);
        $this->AddEditAction($firm['ID'], $firm['EDIT_LINK'], $firm['EDIT_LINK_TEXT']);
        $this->AddDeleteAction($firm['ID'], $firm['DELETE_LINK'], $firm['DELETE_LINK_TEXT'], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
    <li id="<?=$this->GetEditAreaId($firm['ID']);?>"><b><?=$firm['NAME'] ?></b></li>
    <ul>
        <?foreach ($firm['ELEMENTS'] as $elem):?>
        <li><?=$elem['NAME']?> - <?=$elem['PROPERTY_PRICE_VALUE']?> - <?=$elem['PROPERTY_MATERIAL_VALUE']?></li>
        <?endforeach;?>
    </ul>
    <?endforeach;?>
</ul>
<?=$arResult['NAV_STRING'];?>