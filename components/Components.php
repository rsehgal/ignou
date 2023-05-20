<?php
class Components{
  public $fid;
  public $fname;
  public $fclass;
  public $fvalue;
  public $fuploadLoc;

  
    function __construct(){}

    //function __construct($id, $name, $class, $value) {
    public function Set($id, $name, $class, $value) {
    $this->fid = $id;
    $this->fname = $name;
    $this->fclass = $class;
    $this->fvalue = $value;
    $this->fuploadLoc = "";
    }
   
     
  public function RenderFileUpload($id='uploadFile',$name='uploadFile',$class='uploadFile',$value='Upload',$loc='/var/www/html/Symposia/Uploads/'){
 	$this->fuploadLoc = $loc;
    	return '<div class="form-group">
	        <input type="file" id="'.$id.'" class="'.$class.'" form-control-file border" name="'.$name.'" value="'.$value.'" loc="'.$this->fuploadLoc.'"></div>';//.$this->RenderButton();
    }

    public function RenderSubmitButton($id='submit',$name='submit',$class='submit',$value='Submit'){
	return '<button type="submit" class="btn btn-primary '.$class.'">'.$value.'</button>';
}
  public function RenderButton(){
	return '<button type="button" class="btn btn-primary">Submit</button>';
}

}

function AuthorList(){
	$authList = '<div id="original">
			<table class="table">
			<tr>
			<td><input type="text"class="form-control" placeholder="Author Name"/></td>
			<td><input type="email" class="form-control" placeholder="Author Email"/></td>
		        <td><button id="remove" class="remove btn btn-danger">Remove</button></td>
			</tr>
			</table>
		    </div>
		    <button id="copy" class="btn btn-success">Add Author</button>';

		   $authList.='<script>
			$(document).ready(function() {
				$("#copy").on("click", function() {
					var copy = $("#original").clone();
					copy.insertBefore("#copy");
				});
			});
		    </script>';
	return $authList;
}

?>
