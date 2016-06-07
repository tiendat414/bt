$(document).ready(function(){
    $('#login').click(function (){
        var name=$('#name').val();
        var pass=$('#pwd').val();
        var url="authentication.php?name="+name+"&pass="+pass;
        window.location.href = url;
    });
});


