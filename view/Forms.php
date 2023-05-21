<?php
require "../controller/helpers.php";
require "../components/Components.php";
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
                <form method="POST" id="login" class="">';

		for($i=0 ; $i<count($fieldNames) ; $i++){
			if($fieldNames[$i]=="uname" || $fieldNames[$i]=="status" || $fieldNames[$i]=="author_names_list" ||$fieldNames[$i]=="author_emails_list"){
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
			elseif($fieldNames[$i]=="Filename"){

   $fileComponent='<div class="custom-file mb-3">
      <input type="file" class="custom-file-input uploadFile" id="uploadFile" loc="/var/www/html/Symposia/Uploads/" name="uploadFile">
      <label class="custom-file-label" for="uploadFile">Choose file</label>
    </div>';
    $formContent.=$fileComponent;
				//$uploadObj = new Components();
				//$formContent.=$uploadObj->RenderFileUpload();
			}else
				$formContent.='
                                <input type="text" class="form-control" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" required >
                        </div>
<div id="uploadStatus"></div>
';
}

		}

		 $formContent.=AuthorList().'<br/><hr/>'; 
                 $formContent.='<button type="submit" class="btn btn-primary" id="uploadAndSubmit">Submit</button>
		</form>
		<script>

		$(".custom-file-input").on("change",function(e){
			//alert("file selected...");
			var fileName = e.target.files[0].name;
			//alert(fileName);
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});	
	
		var dataUp=new FormData();
		$("#uploadFile").on("change",function(){
		//alert("Symp for submit clicke....");
		var fileInput = document.getElementById($(this).attr("id"));
		alert(fileInput.files[0].name); 
		console.log(fileInput);
		dataUp.append("file",fileInput.files[0]);
		dataUp.append("loc",$(this).attr("loc"));
		dataUp.append("function_name","Upload");
		});

		$("#uploadAndSubmit").on("click",function(e){

			e.preventDefault();

		//Lets try to get the author names and email list.
		//$("#testUploadAndSubmit").click(function(e){
                                var authorNameTextBoxValues = $(".authorName").map(function() {
                                return $(this).val();
                                }).get();
                                var authorEmailTextBoxValues = $(".authorEmail").map(function() {
                                return $(this).val();
                                }).get();
				dataUp.append("authornameslist",authorNameTextBoxValues);
				dataUp.append("authoremailslist",authorEmailTextBoxValues);
                               alert(authorNameTextBoxValues+" : "+authorEmailTextBoxValues);
                 //});


			if($("#Title").val()==""){
				alert("Please fill the paper title.");
				return;
			}if($("#topicText").val()==""){
				alert("Please select the paper topic.");
				return;
			}if($("#categoryText").val()==""){
				alert("Please select the paper category.");
				return;
			}


			dataUp.append("title",$("#Title").val());
			alert("Upload and Submit clicked...");
			console.log(dataUp);
			$.ajax({
				url: "../controller/func.php",
				method: "POST",
				data : dataUp,
				processData : false,
				contentType : false,
				success: function(response) {
					$("#uploadStatus").html(response);
				}
			});

		});
	
		
		$(".topic").on("click",function(event){
		//alert("Topic clicked.......");
		$("#topicText").val($(this).attr("id"));
		dataUp.append("topicid",$(this).attr("catid"));
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
        //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
        //$obj->Connect();
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
