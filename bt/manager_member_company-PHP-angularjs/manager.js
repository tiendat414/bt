var app=angular.module("myapp",[]);
app.controller('control',function($scope,$http){
	$scope.user={};
	$scope.edit={};
	//------------ Get Manager in Database -------------
	$http.post("/php/basic/get_manager.php")
  		.then(function(response) {
      	$scope.manager = response.data.result;
  		});

  	//---------- Get Divison in Database -------------
  	$http.post("/php/basic/get_divison.php")
  		.then(function(response) {
      	$scope.divison = response.data.result;
  		}); 

  	//-------- Search -------------
	$scope.bt_search=function(){
		$scope.bl=false;
		$scope.stt={};
		var sendata = $scope.search;
		console.log(sendata);
		console.log(sendata.divison);
		$http.post("/php/basic/search.php",sendata)
  		.then(function(response) {
  			console.log(response.data.query);
      	if (response.data.dat==null) {
      		$scope.bl=true;
      	}
      	else{
      		$scope.stt= response.data.dat;     		
      	}
  		});
	};

	//-------- Reset_search -----------
	$scope.reset_search = function(){
		$scope.search={"divison":"--All--","manager":"--All--","status":"--All--","user":"--All--"};
	}

	//---------- Add Member Form ------------
	$scope.add_mem = function(){
		$http.post("/php/basic/get_max_id.php")
  		.then(function(response) {
  			console.log(response.data);
      	 $scope.add = response.data;
  		});
	};

	//------------ Add Mem Button Click ---------
	$scope.click_add = function() {	
		//-----------Get Time Birthday ---------
		var datetime = new Date($scope.birthday_new);
	    var day = datetime.getDate();
	    var month = datetime.getMonth();
	    var year = datetime.getFullYear();
	    var time_birthday = day + "/" + month + "/" + year;

	    // ------------- Get Time Start Work ----------
	    var timestart = new Date($scope.start_new);
	    var day_start = timestart.getDate();
	    var month_start = timestart.getMonth();
	    var year_start = timestart.getFullYear();
	    var time_start = day_start + "/" + month_start + "/" + year_start;

	    // ---------Get Infor Member --------------------
	    var code = $scope.add.code;
	    var name = $scope.add.name;
	    var username = $scope.add.username;
	    var manager = $scope.add.manager;
	    var divison = $scope.add.divison;
	    var email = $scope.add.email;
	    var user = $scope.add.user;
	    var address = $scope.add.addr;
	    var send = {"code":code,"name":name,"username":username,"manager":manager,"email":email,"divison":divison,"birthday":time_birthday,"startwork":time_start,"user":user,"address":address};
	    // console.log(send);
	    $http.post("/php/basic/add_mem.php",send)
	  		.then(function(response) {
	  			alert(response.data);
	  		});
	};

	//----------Clear Form Add ---------
	$scope.clear=function(){
		$http.post("/php/basic/get_max_id.php")
  		.then(function(response) {
  			console.log(response.data);
      	 $scope.add = response.data;
      	 $scope.birthday_new="";
      	 $scope.start_new="";
  		});
	};

	// ----------- Open Edit -----------
	$scope.openmodal=function(id_member){		
		id_send={"id":id_member};
		$http.post("/php/basic/modaldata.php",id_send)
  		.then(function(response) {
  		 console.log(response.data);
      	$scope.edit= response.data;
      	var birthday = response.data.birthday.split("/");
      	var start = response.data.start.split("/");  
      	$scope.birthday = new Date(birthday[2],birthday[1]-1,birthday[0]);
      	$scope.start = new Date(start[2],start[1]-1,start[0]);

  		});
	};

	// -----------Submit Edit -------------
	$scope.submit=function(){
		// -------- Get Time Birthday -----------------
		var datetime = new Date($scope.birthday);
	    var day = datetime.getDate();
	    var month = datetime.getMonth();
	    var year = datetime.getFullYear();
	    var time_birthday = day + "/" + month + "/" + year;

	    // ------------- Get Time Start Work ----------
	    var timestart = new Date($scope.start);
	    var day_start = timestart.getDate();
	    var month_start = timestart.getMonth();
	    var year_start = timestart.getFullYear();
	    var time_start = day_start + "/" + month_start + "/" + year_start;

	    // ---------Infor Member --------------------
	    var code = $scope.edit.code;
	    var name = $scope.edit.name;
	    var user = $scope.edit.username;
	    var manager = $scope.edit.manager;
	    var divison = $scope.edit.divison;
	    var email = $scope.edit.email;
	    var status = $scope.edit.status;
	    var address = $scope.edit.addr;
	    var send = {"code":code,"name":name,"username":user,"manager":manager,"email":email,"divison":divison,"birthday":time_birthday,"startwork":time_start,"status":status,"address":address};
	    console.log($scope.edit.name);
	    if(name==undefined||user==undefined){
	    	alert("Hay nhap du lieu vao cac truong bat buoc (*)");	
	    }
	    else {
	    	$http.post("/php/basic/save_member.php",send)
	  		.then(function(response) {
	  		alert('Update Info Success ! Click Exit to come back Home');
	  		});
	    }
	};
});
