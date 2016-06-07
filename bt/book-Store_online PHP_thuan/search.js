$(document).ready(function(){
    $('#search').click(function (){
        var name= $('#name').val();
        var type=$('#type').val();
        var phone=$('#phone').val();
        var url='search_user.php?id='+name+"&type="+type+"&phone="+phone
        window.location.href = url;
    });
})


