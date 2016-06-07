$(document).ready(function(){
    $("#edit").click(function(){
        var id=$('#book_id').val();
        var name= $('#book_name').val();
        var kind=$('#book_kind').val();
        var author=$('#author').val();
        var price=$('#book_price').val();
        var decri=$('#decription').val();
        var total=$('#total').val();
        var url='edit_book.php?id='+id+"&kind="+kind+"&author="+author+"&name="+name+"&price="+price+"&decription="+decri+"&total="+total;
//        console.log(url);
        window.location.href = url;
    });
});

