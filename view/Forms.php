<?php
require "../controller/helpers.php";
class Forms{


	function __construc(){
	
	}

	public function Signup(){
	return '<br/><div class="container">
		<h2>User Account Creation Form</h2>
		      <form method="POST" id="signup" class="symposiaForms">
			<div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control signupForm" id="firstname" name="firstname" required>
                        </div>
			<div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control signupForm" id="lastname" name="lastname" required>
                        </div>

			<div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control signupForm" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control signupForm" id="username" name="username" required>
                        </div>
                                               <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control signupForm" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary sympFormSubmit">Create Account</button>
		</form>
		<script>
		$(".symposiaForms").on("submit",function(event){
			alert("Finally called......");
			event.preventDefault();
			var funcName="";
			var data={};
		
			$(".signupForm").each(function() {
			console.log($(this).val());
			data[$(this).attr("id")]=$(this).val();
			var funcName="ServeSignup";
			data["function_name"]=funcName;
			});
			console.log(data);


			$.ajax({
			    url: "../controller/func.php",
			    method: "POST",
			    data : data,
			    success: function(response) {
			      console.log(response);
			      $("#result").html(response);
			    }
			});	
		});


		</script>


        </div>';
	}


	public function Login(){
	return '<br/><div class="container">
                <h2>User Login Form</h2>
                <form method="POST" id="login" class="symposiaForms">
                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control loginForm" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control loginForm" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary sympFormSubmit">Login</button>
		</form>
		<script>
		$(".symposiaForms").on("submit",function(event){
		//alert("Finally called......");
		event.preventDefault();
		var funcName="";
		var data={};
	
		$(".loginForm").each(function() {
		//alert($(this).val())
                console.log($(this).val());
                data[$(this).attr("id")]=$(this).val();
		});

		var funcName="ServeLogin";
                data["function_name"]=funcName;
		console.log(data);
		
		$.ajax({
                        url: "../controller/func.php",
                        method: "POST",
                        data : data,
                        success: function(response) {
                          console.log(response);
                          $("#result").html(response);
                        }
		    });
		});
		</script>
        </div>';
	
	}

/*	public function AddSubEntries($subEntries,$mainEntry){

	$main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu">';
        for($i= 0 ; $i < count($subEntries) ; $i++){

           $subMenu.='<a class="dropdown-item topic" id="'.$subEntries[$i].'" name="'.$subEntries[$i].'">'.$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';
        return $main.$subMenu."</div>";
}


	public function GetTopicDropDown(){
		//return "Hello Raman";
		$obj = new DB();
		$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
		$obj->Connect();
		$valArray = $obj->GetColumnArray("topics","Topic");	
		return $this->AddSubEntries($valArray,"Topic");
		//return $valArray[0];
	}
*/
	public function NewSubmission($fieldNames){
	//return 
		$formContent='<br/><div class="container">
                <h2>Upload new contribution</h2>
                <form method="POST" id="login" class="symposiaForms">';

		for($i=0 ; $i<count($fieldNames) ; $i++){
			if($fieldNames[$i]=="uname"){
			}else{
			$formContent.='<div class="form-group">
                                <label for="'.$fieldNames[$i].'">'.$fieldNames[$i].':</label>';
			if($fieldNames[$i]=="Topic"){
				$formContent.=GetDropDown("topics","Topic");
				$formContent.='<input type="text" id="topicText" class="form-control"/>';
			}
			elseif($fieldNames[$i]=="Category"){
				$formContent.='<div id="Category"></div>';
				$formContent.='<input type="text" id="categoryText" class="form-control"/>';
			}
			else
				$formContent.='
                                <input type="text" class="form-control newSubmissionForm" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" required>
                        </div>';
}

		}
                 $formContent.='<button type="submit" class="btn btn-primary sympFormSubmit">Login</button>
		</form>
		<script>
		$(".symposiaForms").on("submit",function(event){
		//alert("Finally called......");
		event.preventDefault();
		var funcName="";
		var data={};
	
		$(".loginForm").each(function() {
		//alert($(this).val())
                console.log($(this).val());
                data[$(this).attr("id")]=$(this).val();
		});

		var funcName="ServeLogin";
                data["function_name"]=funcName;
		console.log(data);
		
		$.ajax({
                        url: "../controller/func.php",
                        method: "POST",
                        data : data,
                        success: function(response) {
                          console.log(response);
                          $("#result").html(response);
                        }
		    });
		});


		$(".topic").on("click",function(event){
		alert("Topic clicked.......");
		$("#topicText").val($(this).attr("id"));
		event.preventDefault();
		var funcName="FillCategory";
		var data={};
		//var funcName=$(this).attr("id");
		//alert(funcName);
		data["function_name"]=funcName;
		data["topic"]=$(this).attr("id");
		console.log(data);
		$.ajax({
		    url: "../controller/func.php",
		    method: "POST",
		    data : data,
		    success: function(response) {
		    $("#Category").html(response);
		    }
		  });

		
});
		</script>
        </div><br/>';

	return $formContent;	
	}



	public function Contact(){
	$tableName='contactus';
	$obj = new DB();
        $obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
        $obj->Connect();
	$result = "<h2><br/>Contact Us<br/></h2>";
        return $result.$obj->GetTableData($tableName);

	/*return '<div class="container">
		<div class="w-50 p-3" style="background-color: #eee;">
		Raman Sehgal <br/>
		Scientific Secretary <br/>
		</div>		
                        </div>';*/
	
	}

	
	public function ServeSignup(){
		return "<div>ServeSignup function called..........</div>";
	}

	public function ServeLogin(){
		return "<div>ServeLogin function called..........</div>";
	}
       


}
?>
