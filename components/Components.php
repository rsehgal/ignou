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

?>
