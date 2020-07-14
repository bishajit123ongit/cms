<?php
 $current_month=date('M');
 $last_month=date('M',strtotime('-1 month'));
 $last_to_last_month=date('M',strtotime('-2 month'));
$dataPoints = array(
	array("y" => $last_to_month_users, "label" => $last_to_last_month),
	array("y" => $last_month_users, "label" => $last_month),
	array("y" => $current_month_users, "label" => $current_month)
);
 
?>
@extends('layouts.admin')

@section('content')
<script>
window.onload = function () {
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
	title: {
		text: "User Reporting"
	},
	axisY: {
		title: "Number of users"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "Total posts categories and tags reporting"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php echo (($posts->count()*100)/($posts->count()+$categories->count()+$tags->count()));?>, label: "Posts"},
			{y: <?php echo (($categories->count()*100)/($posts->count()+$categories->count()+$tags->count()));?>, label: "Categories"},
			{y: <?php echo (($tags->count()*100)/($posts->count()+$categories->count()+$tags->count()));?>, label: "Tags"}
		]
	}]
});
chart1.render();
chart2.render();
}
</script>


    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section style="margin-top:10px;" class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$posts->count()}}</h3>

                <p>@lang('translateproperties.totalposts')</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('posts.index')}}" class="small-box-footer">@lang('translateproperties.moreinfo') <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$categories->count()}}</h3>

                <p>@lang('translateproperties.totalcat')</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('categories.index')}}" class="small-box-footer">@lang('translateproperties.moreinfo') <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @if(auth()->user()->isAdmin())
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$users->count()}}</h3>

                <p>@lang('translateproperties.userreg')</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('users.index')}}" class="small-box-footer">@lang('translateproperties.moreinfo') <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$tags->count()}}</h3>

                <p>@lang('translateproperties.totaltag')</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('tags.index')}}" class="small-box-footer">@lang('translateproperties.moreinfo') <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row" style="margin-bottom:55px;">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Users
                </h3>
              </div>

              <div class="card-body">
                <div class="tab-content p-0">
                	<div id="chartContainer1" style="height: 330px; "></div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Total posts,categories and tag reporting
                </h3>
            
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                	<div id="chartContainer2" style="height: 330px; "></div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

  
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection