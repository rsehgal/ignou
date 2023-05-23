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
                //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
                //$obj->Connect();
                //$valArray = $obj->GetColumnArray("topics","Topic");     
                //$valArray = $obj->GetColumnArray($tablename,$mainEntry);     
                $valArray = $obj->GetAssociativeArray($tablename);     
                //return AddSubEntries($valArray[$mainEntry],$mainEntry);
                return AddSubEntries($valArray,$mainEntry);
                //return $valArray[0];
        }

 function AddDecisionEntries($associativeSubEntries,$mainEntry,$buttonId){
	$subEntries = $associativeSubEntries[$mainEntry];
	$catEntries = $associativeSubEntries["code"];
        $main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu">';
        for($i= 0 ; $i < count($subEntries) ; $i++){
           
           $subMenu.='<a class="dropdown-item '.$mainEntry.'" id="'.$subEntries[$i].'" buttonid="'.$buttonId.'" value="'.$subEntries[$i].'" name="'.$subEntries[$i].'" catid="'.$catEntries[$i].'">'.$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';
        return $main.$subMenu."</div>";
}

function HomeNASI(){

return "<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
<h3>The <raman class='text-primary font-weight-bold'>National Academy of Sciences, India </raman> (initially called “The Academy of Sciences of United Provinces of Agra and Oudh”) was founded in the year 1930, with the objectives to provide a national forum for the publication of research work carried out by Indian scientists and to provide opportunities for exchange of views among them. 
<br/><br/><p><raman class='text-primary font-weight-bold'>93<sup>rd</sup></raman> Annual Session  along with the scientific sessions on Physical and Biological sciences will be held from <raman class='text-primary font-weight-bold'>03 Dec. to 05 Dec 2023</raman> at  
<raman class='font-weight-bold'>DAE Convention Centre, Bhabha Atomic Research Centre, Mumbai.</raman>
<br/>
<br/>
The Scientific Sessions will be held in two sections. The scientific papers are presented by selected researchers/scientists in scientific sessions, for which prior submission of the Abstract(s)/Paper(s) is necessary .
</h3>
</div></div>
";
}

?>
