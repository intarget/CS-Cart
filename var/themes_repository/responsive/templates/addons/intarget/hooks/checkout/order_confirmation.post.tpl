<script type="text/javascript">
    //<![CDATA[
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('success-order');
                console.log('success-order');
            });
        })(window, 'inTargetCallbacks');
    //]]>
</script>