<script type="text/javascript">
    //<![CDATA[
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('user-reg');
                console.log('user-reg');
            });
        })(window, 'inTargetCallbacks');
    //]]>
</script>