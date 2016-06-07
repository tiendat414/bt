$(document).ready(function(){
    $("#purchase").click(function(){
        var id= $('#book_name').attr('keyid');
        var total=$('#total').val();
        var send_data={'id':id,'total':total};
       $.ajax({
            url: 'cart.php',
            data: send_data,
            type: "GET",
            success: function (result){
               alert('Purchase Success ! Please Come back Home');
            }            
        });
    });
});


