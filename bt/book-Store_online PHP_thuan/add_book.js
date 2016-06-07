$(document).ready(function(){
    $("#add_book").click(function(){
        var name_book=$('#book_name').val();
        var id= $('#book_id').attr('keyid');
        var price=$('#book_price').val();
        var total=$('#total').val();
        var date_book=$('#date_book').val();
        var decri=$('#decription').val();
        var author=$('#author').val();
        var kind=$('#book_kind').val();
        var send_data={'name_book':name_book,'price':price,'total':total,'date_book':date_book,'decription':decri,'author':author,'kind':kind,'id':id};
        $.ajax({
            url: 'add_book.php',
            data: send_data,
            type: "POST",
            success: function (result){
                alert("add Success!");
            }
            
        });
    });
});


