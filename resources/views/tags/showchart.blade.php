<?php
 $current_month=date('M');
 $current_last_one_month=date('M',strtotime('-1 month'));
 $current_last_two_month=date('M',strtotime('-2 month'));

 $current_last_three_month=date('M',strtotime('-3 month'));
 $current_last_four_month=date('M',strtotime('-4 month'));
 $current_last_five_month=date('M',strtotime('-5 month'));
 $current_last_six_month=date('M',strtotime('-6 month'));
 $current_last_seven_month=date('M',strtotime('-7 month'));
 $current_last_eight_month=date('M',strtotime('-8 month'));
 $current_last_nine_month=date('M',strtotime('-9 month'));
 $current_last_ten_month=date('M',strtotime('-10 month'));
 $current_last_eleven_month=date('M',strtotime('-11 month'));
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
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Tags"
	},
	axisY: {
		title: "Numbers of tag"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Tag = All numbers of tag",
		dataPoints: [      

      
      { y: <?php echo $current_last_eleven_tag; ?>, label: "<?php echo $current_last_eleven_month; ?>" },
      { y: <?php echo $current_last_ten_tag; ?>, label: "<?php echo $current_last_ten_month; ?>" },
      { y: <?php echo $current_last_nine_tag; ?>, label: "<?php echo $current_last_nine_month; ?>" },
      { y: <?php echo $current_last_eight_tag; ?>, label: "<?php echo $current_last_eight_month; ?>" },
      { y: <?php echo $current_last_seven_tag; ?>, label: "<?php echo $current_last_seven_month; ?>" },
      { y: <?php echo $current_last_six_tag; ?>, label: "<?php echo $current_last_six_month; ?>" },
      { y: <?php echo $current_last_five_tag; ?>, label: "<?php echo $current_last_five_month; ?>" },
      { y: <?php echo $current_last_four_tag; ?>, label: "<?php echo $current_last_four_month; ?>" },
      { y: <?php echo $current_last_three_tag; ?>, label: "<?php echo $current_last_three_month; ?>" },

			{ y: <?php echo $current_last_two_tag;?>, label: "<?php echo $current_last_two_month; ?>" },
			{ y: <?php echo $current_last_one_tag; ?>,  label: "<?php echo $current_last_one_month;?>" },
      { y: <?php echo $currrent_month_tag; ?>, label: "<?php echo $current_month; ?>" }

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
                  Total Tag
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