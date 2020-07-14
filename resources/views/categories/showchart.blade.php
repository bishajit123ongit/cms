<?php
 $current_month=date('M');
 $current_last_one_month=date('M',strtotime('-1 month'));
 $current_last_two_month=date('M',strtotime('-2 month'));
?>

@extends('layouts.admin')

@section('content')
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2",
	exportFileName: "Doughnut Chart",
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Last three months category"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "doughnut",
		innerRadius: 90,
		showInLegend: true,
		toolTipContent: "<b>{name}</b>: ${y}",
		indexLabel: "{name}  {y} category",
		dataPoints: [
      { y: <?php echo $current_last_two_category;?>, name: "<?php echo $current_last_two_month;?>" },
			{ y: <?php echo $current_last_one_category;?>, name: "<?php echo $current_last_one_month;?>" },
			{ y: <?php echo $currrent_month_category;?>, name: "<?php echo $current_month;?>" }
		]
	}]
});
chart.render();
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();
}

}


</script>
    </head>
    <body>
    <section class="content">
    <div class="row" style="margin-bottom:55px;">
          <!-- Left col -->
          <section class="col-lg-10 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Total Catgory of last three month
                </h3>
              </div>

              <div class="card-body">
                <div class="tab-content p-0">
                	<div id="chartContainer" style="height: 330px; "></div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
    </div>
    </section>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
</html>

@endsection