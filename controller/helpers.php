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

 function AddDecisionEntries($associativeSubEntries,$mainEntry,$buttonId,$status,$filename,$allotmenType,$id=0){
	$subEntries = $associativeSubEntries[$mainEntry];
	$catEntries = $associativeSubEntries["code"];
	$str='<table class="table">
		<tr>
		<td>';
        $main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu">';
        for($i= 0 ; $i < count($subEntries) ; $i++){
           
           $subMenu.='<a class="dropdown-item '.$mainEntry.'" functionName="'.$allotmenType.'" filename="'.$filename.'" refnum="ref'.$id.'" id="'.$subEntries[$i].'" buttonid="'.$buttonId.'_'.$id.'" value="'.$subEntries[$i].'" refid="'.$id.'" name="'.$subEntries[$i].'" catid="'.$catEntries[$i].'">'.$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';

	$str.=$main.$subMenu.'</td></tr>';
	$str.='<tr></td><input type="text" id="decisionText_'.$buttonId.'_'.$id.'" value="'.$status.'" class="form-control decisionText"/></td></tr>';

	if($allotmenType=="AllotReferee"){
	$obj = new DB();
	$query = 'select marks, remarks from refereeAllotment where refereeName="'.$status.'" and Filename="'.$filename.'"';
	$result = $obj->GetQueryResult($query);
	if($result){
	$row=$result->fetch_assoc();
	$remarksArea='<tr><td> <textarea class="form-control" id="remarks_'.$buttonId.'_'.$id.'">'.$row["marks"].' : '.$row["remarks"].'</textarea></td></tr>';
	$str.=$remarksArea;
	}

	}
	$str.='</table>';

	$associatedJs = '<script>
			$(".decisionText").change(function(){
				alert($(this).attr("id"));
			});
			 </script>
			';

	return $str.$associatedJs;
        //return $main.$subMenu."</div>";
}

function GetArray($allotmenType){
$obj=new DB();
$query="";
if($allotmenType=="Referee")
$query='select * from refereeList where 1';

if($allotmenType=="Coordinator")
$query='select * from coordinatorList where 1';

$result = $obj->GetQueryResult($query);

$coordinatorsArray = array();
$counter=0;
while($row = $result->fetch_assoc()){
 $coordinatorsArray[$counter]=$row["uname"];
 $counter++;
}
return $coordinatorsArray;
}


function GetScore(){
	$fileName = $_POST["filename"];
	$obj = new DB();
	$query = 'select sum(marks) as total from refereeAllotment where Filename="'.$fileName.'"';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$total = $row["total"];

	$query = 'select count(marks) as num from refereeAllotment where Filename="'.$fileName.'" and marks <> 0';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$num = $row["num"];

	return ($total/$num);

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
