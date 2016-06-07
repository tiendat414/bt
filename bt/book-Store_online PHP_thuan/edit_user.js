$(document).ready(function(){
    $('#edit_user').click(function (){
        var id= $('#user_id').val();
        var pass= $('#pass').val();
        var email= $('#email').val();
        var address= $('#address').val();
        var user= $('#user_name').val();
        var name= $('#name').val();
        var type=$('#type').val();
        var phone=$('#phone').val();
        var send_data={'id':id,'pass':pass,'email':email,'address':address,'user':user,'name':name,'type':type,'phone':phone};
        console.log(send_data);
//        var url='edit_user.php?id='+id+"&type="+type+"&phone="+phone+"&user="+user+"&address="+address+"&email="+email+"&pass="+pass+"&name="+name
//        window.location.href = url;
       $.ajax({
            url: 'edit_user.php',
            data: send_data,
            type: "GET",
            success: function (result){
               alert(result);            
            }            
         });
    });
});
