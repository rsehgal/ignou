<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
	alert("Document loaded.......");
  $.ajax({
    url: "file.php",
    method: "POST",
    //dataType: "json",
    success: function(response) {
      console.log(response);
      //var data = response.data;
      //alert(response.cand);
      //$("#target-div").html(data);
      $("#target-div").html(response);
    }
  });
});
</script>
</head>
<body>
<div id="target-div"></div>
</body>
</html>

