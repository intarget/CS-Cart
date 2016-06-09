{script src="js/addons/intarget/func.js"}
<script type="text/javascript">
    //<![CDATA[
    {if $intarget}
    {$intarget nofilter}
    {/if}

    {if isset($intarget_cview)}
    {$intarget_cview nofilter}
    {/if}

    {if isset($intarget_iview)}
    {$intarget_iview nofilter}
    {/if}

    {if isset($intarget_sorder)}
    {$intarget_sorder nofilter}
    {/if}

    {if isset($intarget_del)}
    {$intarget_del nofilter}
    {/if}

    {if isset($intarget_reg)}
    {$intarget_reg nofilter}
    {/if}
    //]]>
</script>