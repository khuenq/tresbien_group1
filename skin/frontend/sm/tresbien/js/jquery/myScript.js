var jq = jQuery.noConflict();
jq(document).ready(function(){
    jq("input:radio[name='shipping_method']").click(function(){
        alert('lalalal');
    });
});