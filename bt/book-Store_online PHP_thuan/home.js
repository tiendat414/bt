$(document).ready(function(){
    $("#search").click(function(){
        var name= $('#name').val();
        var kind=$('#kind').val();
        var author=$('#author').val();
        var url='search_book_for_mem.php?id='+name+"&kind="+kind+"&author="+author;
        window.location.href = url;
    });
});

