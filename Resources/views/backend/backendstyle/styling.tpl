{block name="backend/base/header/css"}
    {$smarty.block.parent}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style type="text/css">
        {if $backgroundImage}{strip}

        {if $hideMenuLogo == true}
        .shopware-menu .x-box-inner {
            background: none;
        }

        .shopware-menu .x-main-logo-container {
            background: none !important;
        }

        {/if}

        .x-viewport .x-body {
            background: linear-gradient(165deg, #c6eaf6 5%, #dff1f6 45%, #daedf5 55%, #abc8ee 100%)
        }

        .x-viewport .x-body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url({$backgroundImage}) center no-repeat;
        {if $backgroundSize} background-size: {$backgroundSize}%;
        {/if} filter: {if isset($backgroundTransparency)} opacity({$backgroundTransparency}%){/if}
             {if isset($backgroundGrayScale)} grayscale({$backgroundGrayScale}%){/if};
        }

        {/strip}{/if}
    </style>
{/block}