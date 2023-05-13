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
        </div>';//.$this->RenderButton();
    }

    public function RenderSubmitButton($id='submit',$name='submit',$class='submit',$value='Submit'){
	return '<button type="submit" class="btn btn-primary '.$class.'">'.$value.'</button>';
}
  public function RenderButton(){
	return '<button type="button" class="btn btn-primary">Submit</button>';
}

}

?>
