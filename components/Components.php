<?php
class Components{
  public $fid;
  public $fname;
  public $fclass;
  public $fvalue;

  
    function __construct(){}

    //function __construct($id, $name, $class, $value) {
    public function Set($id, $name, $class, $value) {
    $this->fid = $id;
    $this->fname = $name;
    $this->fclass = $class;
    $this->fvalue = $value;
    }
   
     
    public function RenderFileUpload(){
    	return '<div class="form-group">
	        <input type="file" class="form-control-file border" name="file">
        </div>
	<button type="submit" class="btn btn-primary">Submit</button>';
    }
  
}

?>
