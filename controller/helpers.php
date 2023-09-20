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

$homeMsg="<h2><b class='text-danger'>Welcome</b> to <b class='text-primary'>[Conference Name]</b></h2>

<br/>

<h3><b class='text-info'>About [Conference Name]</b></h3>
<h4><b class='text-dark'>[Conference Name]</b> is an annual gathering of professionals, experts, and enthusiasts from various fields who come together to share knowledge, collaborate, and inspire innovation. Our conference is a platform for thought leaders and visionaries to discuss the latest trends, research findings, and industry insights.
<br/><br/>
<b class='text-info'>Why Attend [Conference Name]?</b>

<br/><br/>
    <b>Networking:</b> Connect with like-minded individuals, industry peers, and potential collaborators.
    Knowledge Sharing: Gain insights from leading experts through keynote speeches, panel discussions, and workshops.
    Professional Development: Enhance your skills and stay up-to-date with the latest advancements in your field.
    Inspiration: Be inspired by success stories and visionary leaders.
    Exposure: Showcase your work, research, or products to a diverse audience.

<br/><br/>
<b class='text-info'>Key Features</b>

<br/><br/>
    <b>Diverse Topics:</b> Our conference covers a wide range of topics, ensuring there's something for everyone.
    World-Class Speakers: Learn from renowned experts and thought leaders.
    Interactive Workshops: Participate in hands-on workshops and gain practical skills.
    Networking Opportunities: Connect with professionals in your field and expand your network.
    Exhibition Area: Explore the latest innovations and products from industry leaders.
    Social Events: Enjoy social gatherings, receptions, and entertainment.
</h4>
";

return $homeMsg;
}


function GetTime($timestr,$start=1){

	if($start==1){
		return strtotime($timestr);
	}else{
		return strtotime($timestr)+(24*60*60);
	}

}

function GetStartTime($timestr){
	return GetTime($timestr,1);
}

function GetEndTime($timestr){
	return GetTime($timestr,0);
}

function GetLastDate($type="reg"){
	$obj = new DB();
	$queryField=$type."_end_date";
        $query = "select ".$queryField." from symposium";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $end_date = $row[$queryField];
	return date("d-M-Y",strtotime($end_date));
}
function GetStartDate($type="reg"){
	$obj = new DB();
	$queryField=$type."_start_date";
        $query = "select ".$queryField." from symposium";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $start_date = $row[$queryField];
	return date("d-M-Y",strtotime($start_date));
}

?>
