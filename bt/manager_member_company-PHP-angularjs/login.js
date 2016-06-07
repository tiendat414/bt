var app=angular.module("login",[]);
app.controller("login_control",function($scope,$http){
	$scope.user={};
	$scope.login1=function(){
		$scope.dk=false;
		var sendata=$scope.user;
		console.log($scope.user);
		$http.post("/php/basic/check_login.php",sendata)
  		.then(function(response) {
  			console.log(response.data);	
      	if (response.data=="Login success"){
      		window.location.href = 'http://localhost/php/basic/manager.html';
      	}
      	else {
      		$scope.dk=true;
      	}
  		}); 
	}
});