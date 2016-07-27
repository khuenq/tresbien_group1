document.observe('dom:loaded', function() {
    $('checkout-shipping-method-load').on('change','input:radio',function(event){
        // Check baybanbua shipping method is checked
        //alert('kakaka');
        if('custom_custom' == event.target.value)
        {
            //alert('kakaka');
            $('customshipping').show();
            // Baybanbua shipping method is checked and already exists
            // if($$('.baybanbua_term').length)
            // {
            //     $$('.baybanbua_term').each(Element.show);
            //     return;
            // }
            // return;

        }
        else {
            $('customshipping').hide();
        }

        // Another shipping method checked
        // if($$('.baybanbua_term').length)
        // {
        //     $$('.baybanbua_term').each(Element.hide);
        // }

    });
    $('shipping-method-buttons-container').on('click',function(event){

        // Check baybanbua_term which customer agreed
        if(!$('cb_baybanbua_term').getAttribute('checked'))
        {
            alert('Must be agree term to continue');
            return;
        }
        shippingMethod.save();
    });
    // $$('input[type="radio"][id="s_method_custom_custom"]').each(function(el){
    //     Event.observe(el, 'click', function(){
    //         alert('kakaka');
    //     });
    // });
});

// $j('document').ready(function(){
//     //alert(1);
//     $j('#s_method_custom_custom').on('click',function(){
//         alert(1);
//     });
// });
