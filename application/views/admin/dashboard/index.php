<?php
	$now = strtotime(date("d-M-Y"));
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"><?php  echo date('F d,Y', $now); ?></p>
                      <p class="card-title"><?php echo $total_this_day->count; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  Visitors
                </div>
              </div>
            </div>
          </div>
		  <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"><?php  echo date('F', $now); ?></p>
                      <p class="card-title"><?php echo $total_this_month->total; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  Visitors
                </div>
              </div>
            </div>
          </div>
		  <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"><?php  echo date('Y', $now); ?></p>
                      <p class="card-title"><?php echo $total_this_year->total; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   Visitors
                </div>
              </div>
            </div>
          </div>
		  <div class="col-lg-3 col-md-6 col-sm-6">
            <!--<div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacity</p>
                      <p class="card-title">150GB
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Update Now
                </div>
              </div>
            </div>-->
          </div>
		   <div class="col-md-12">
             <canvas id="bar-chart" width="1400" height="450"></canvas>
          </div>
		 
    </div>
	
	<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Jan", "February", "March", "April", "May", "June", "July" , "August", "September" , "October" , "November" , "December"],
      datasets: [
        {
          label: "Site Visit",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2"],
          data: [
			0,0,0,0,0,0,0,0,0,0,0,<?php echo $total_this_month->total; ?>
			]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Site Visit 2019'
      }
    }
});
	</script>
	