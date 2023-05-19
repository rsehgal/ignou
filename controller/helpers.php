<?php
 //function AddSubEntries($subEntries,$mainEntry){
 function AddSubEntries($associativeSubEntries,$mainEntry){
	$subEntries = $associativeSubEntries[$mainEntry];
	$catEntries = $associativeSubEntries["code"];
        $main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu">';
        for($i= 0 ; $i < count($subEntries) ; $i++){
           
           $subMenu.='<a class="dropdown-item '.$mainEntry.'" id="'.$subEntries[$i].'" name="'.$subEntries[$i].'" catid="'.$catEntries[$i].'">'.$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';
        return $main.$subMenu."</div>";
}

 function GetDropDown($tablename,$mainEntry){
                //return "Hello Raman";
                $obj = new DB();
                $obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
                $obj->Connect();
                //$valArray = $obj->GetColumnArray("topics","Topic");     
                //$valArray = $obj->GetColumnArray($tablename,$mainEntry);     
                $valArray = $obj->GetAssociativeArray($tablename);     
                //return AddSubEntries($valArray[$mainEntry],$mainEntry);
                return AddSubEntries($valArray,$mainEntry);
                //return $valArray[0];
        }


?>
