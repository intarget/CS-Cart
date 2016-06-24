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

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([.$?*|{}()[]\/+^])/g, '\$1') + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : 'N';
    }

    var intarget_add = getCookie('INTARGET_ADD');
    if(intarget_add && intarget_add == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('add-to-cart');
                console.log('add-to-cart');
            });
        })(window, 'inTargetCallbacks');
        document.cookie = 'INTARGET_ADD=N; path=/;';
    }

    var intarget_del = getCookie('INTARGET_DELETE');
    if(intarget_del && intarget_del == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('del-from-cart');
                console.log('del-from-cart');
            });
        })(window, 'inTargetCallbacks');
        document.cookie = 'INTARGET_DELETE=N; path=/;';
    }

    var intarget_iview = getCookie('INTARGET_IVIEW');
    if(intarget_iview && intarget_iview == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('item-view');
                console.log('item-view');
            });
        })(window, 'inTargetCallbacks');
        document.cookie = 'INTARGET_IVIEW=N; path=/;';
    }

    var intarget_sorder = getCookie('INTARGET_SORDER');
    if(intarget_sorder && intarget_sorder == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('success-order');
                console.log('success-order');
            });
        })(window, 'inTargetCallbacks');
        document.cookie = 'INTARGET_SORDER=N; path=/;';
    }

    var intarget_reg = getCookie('INTARGET_REG');
    if(intarget_reg && intarget_reg == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('user-reg');
                console.log('user-reg');
            });
        })(window, 'inTargetCallbacks');
        document.cookie = 'INTARGET_REG=N; path=/;';
    }
    //]]>
</script>