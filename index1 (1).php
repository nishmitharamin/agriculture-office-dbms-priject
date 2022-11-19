<?php

include_once('connection.php');
    $sql = "SELECT farm_no,area,farmer_id FROM fields";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
	   $dataPoints[] = array("fields"=>$row['area'], "y"=>$row['farmer_id']);
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() 
 {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        
        data: [{
            type: "pie",  // bar,doughnut,funnel,pyramid
            yValueFormatString: "#,##0.\"\"",
            indexLabel: "{fields}  ( {y} )",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
  chart.render();
 }
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>         
<?php 
include_once('connection.php');
$query = "SELECT * FROM inputs";
$result = mysqli_query($con, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ pesticide_fertiliser_name:'".$row["pesticide_fertiliser_name"]."', sup_id:".$row["sup_id"].", price:".$row["price"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>chart</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   
   <h1 align="center"> Inputs Details</h1>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:['sup_id'],
 ykeys:[ 'price'],
 labels:['pesticide_fertiliser_name', 'sup_id', 'price'],
 hideHover:'auto',
 stacked:true
});
</script>


   




