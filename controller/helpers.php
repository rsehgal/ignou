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

$homeMsg="<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
<h3>The <raman class='text-primary font-weight-bold'>National Academy of Sciences, India </raman> (initially called “The Academy of Sciences of United Provinces of Agra and Oudh”) was founded in the year 1930, with the objectives to provide a national forum for the publication of research work carried out by Indian scientists and to provide opportunities for exchange of views among them. 
<br/><br/><p><raman class='text-primary font-weight-bold'>93<sup>rd</sup></raman> Annual Session  along with the scientific sessions on Physical and Biological sciences will be held from <raman class='text-primary font-weight-bold'>03 December to 05 December 2023</raman> at  
<raman class='font-weight-bold'>DAE Convention Centre, Bhabha Atomic Research Centre, Mumbai.</raman>
<br/>
<br/>
This year the theme of the session is <raman class='text-primary font-weight-bold'>India Secure @ 75</raman>.
<br/>
<br/>
Contributory papers in Physical & Biological Sciences can be submitted online as per the specified format, to be presented as poster.
<br/>
<br/>

Popular Scientific Lectures by Eminent Scientists: Theme “India Secure@75”<br/>
<br/>

Panel Discussions & Poster Presentations by Young Scientists & Researchers<br/>
<br/>

Visit to Bhabha Atomic Research Centre, Mumbai, for limited delegates.
<br/>
<br/>
The registration fees for the conference is Rs. 500, which needs to be deposited online. Here are the <a href='#' id='BankDetails' class='text-danger linkFromHome'><u>Bank Details</u></a>.
<br/>
<br/>

The scientific papers are presented by researchers / scientists in scientific sessions, for which prior submission of the Abstract(s) / Paper(s) is necessary.
<br/>
<br/>
Kindly <a href='#' class='linkFromHome text-danger' id='Signup'><u>signup</u></a> for account creation and <a href='#' class='linkFromHome text-danger' id='Login'><u>login</u></a> for abstracts submission.

</h3>
</div></div>
";

$associatedJS='<script>
		$(function(){
		$(".linkFromHome").on("click",function(event){
        //alert("Nasi Menu clicked.......");
        event.preventDefault();
        $("#nasifooter").hide();
        var funcName="";
        var data={};
        var funcName=$(this).attr("id");
        if(funcName=="Home"){
        $("#nasifooter").show();
        }
        //alert(funcName);
        data["function_name"]=funcName;
        console.log(data);
        $.ajax({
            url: "../controller/func.php",
            method: "POST",
            data : data,
            success: function(response) {
            $("#result").hide();
            //$("#result").delay(1000).fadeIn();
            $("#result").html(response);
            $("#result").fadeIn(100);
            }
          });

	});
});
		</script>';

return $homeMsg.$associatedJS;
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
