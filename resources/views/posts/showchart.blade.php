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
	animationEnabled: true,
	title:{
		text: "Last Three month posts",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} {y} post",
		toolTipContent: "<b>{label}:</b> {y}",
		dataPoints: [
      { y: <?php echo $current_last_two_post;?>, label: "<?php echo $current_last_two_month;?>" },
			{ y: <?php echo $current_last_one_post;?>, label: "<?php echo $current_last_one_month;?>" },
			{ y: <?php echo $currrent_month_post;?>, label: "<?php echo $current_month;?>" }
			


		]
	}]
});
chart.render();

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
                  Total Posts
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