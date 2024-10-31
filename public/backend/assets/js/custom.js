/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

$('#confirm_password').on('keyup',function(){
    $(this).css('border', 'solid 1px red');
    var password =$('#new_password').val();
    var confirm_password =$(this).val();
    if(password===confirm_password){
        $(this).css('border', 'solid 1px green');
    }
});
function submitChangePassword(){
    var password =$('#new_password').val();
    var confirm_password =$('#confirm_password').val();
    if(password===confirm_password){
        $('#change_password_form').submit();
    }
}




