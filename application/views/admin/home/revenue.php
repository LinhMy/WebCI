<div class="revenue">
<div class="content" id="content_mount" style="">
	<div class="left" style="float: left; border-bottom: 2px solid #003399; ">
		<canvas id="myChart" width="500" height="400"></canvas>
	</div>
	<div class="right" style="float: right; border-bottom: 2px solid #003399;">
		<canvas id="myChartline" width="500" height="400"></canvas>
	</div>

</div>
<!-- theo thang -->
<div class="contenty" style="" id="content_year">
	<div class="left" style="float: left; border-bottom: 2px solid #003399; ">
		<canvas id="myChart_year" width="500" height="400"></canvas>
	</div>
	<div class="right" style="float: right; border-bottom: 2px solid #003399;">
		<canvas id="myChartline_year" width="500" height="400"></canvas>
	</div>

</div>
<!-- theo tuan -->
<div class="contentw" style="" id="content_week">
	<div class="left" style="float: left; border-bottom: 2px solid #003399; ">
		<canvas id="myChart_week" width="500" height="400"></canvas>
	</div>
	<div class="right" style="float: right; border-bottom: 2px solid #003399;">
		<canvas id="myChartline_week" width="500" height="400"></canvas>
	</div>

</div>
<div class="button_select" style="margin-left: 200px;">
	<button style="color:#2E8B57" id="week">Thống kê theo tuần</button>
	<button style="color:#2E8B57" id="year">Thống kê theo năm</button>
	<button style="color:#2E8B57" id="mount">Thống kê theo tháng</button>
	
</div>
<?php
    $data_week = array();
    $data_month = array();
    $data_year = array();

    //lay doanh so theo tuan
    foreach ($week as $value) :
        $label_week[]=substr($value->day ,0,3);
        $data_week[] = $value->total_sum;
       // $label[] = $value->year;
    endforeach;

    //lay doanh so theo thang
      foreach ($month as $value) :
        $label_month[]=substr($value->label_m ,0,3);
        $data_month[] = $value->total_sum;
       // $label[] = $value->year;
    endforeach;

    //lay doanh so theo nam
    foreach ($year as $value) :
        $label_year[]=$value->label_y;
        $data_year[] = $value->total_sum;
       // $label[] = $value->year;
    endforeach;

?>
</div>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
         labels: <?php echo json_encode($label_month);  ?>,
         datasets: [{
            label: 'Doanh thu theo tháng ',
            data: <?php echo json_encode($data_month);  ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
//chart theo tuan
var ctxw = document.getElementById("myChart_week").getContext('2d');
var myChart_week = new Chart(ctxw, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label_week);  ?>,
         datasets: [{
            label: 'Doanh thu theo tuần',
            data: <?php echo json_encode($data_week);
           
             ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(220, 185, 234, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(220, 185, 234,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
//char theo thang

var ctxy = document.getElementById("myChart_year").getContext('2d');
var myChart_year = new Chart(ctxy, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label_year);  ?>,
         datasets: [{
            label: 'Doanh thu theo năm',
            data: <?php echo json_encode($data_year);
           
             ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(220, 185, 234, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(220, 185, 234, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

//chart theo tuan
new Chart(document.getElementById("myChartline"), {
  type: 'line',
  data: {
    labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
    datasets: [{ 
        data: [86,114,106,106,107,11],
        label: "Áo",
        borderColor: "#3e95cd",
        fill: true
      }, { 
        data: [282,350,411,502,635,809],
        label: "Quần",
        borderColor: "#8e5ea2",
        fill: true
      }, {  
        data: [40,20,10,16,24,38],
        label: "Túi xách",
        borderColor: "#e8c3b9",
        fill: true
      }, { 
        data: [6,3,2,2,7,26,],
        label: "Giày",
        borderColor: "#c45850",
        fill: true
      }
    ]
  },
  options: {
    title: {
      display: true,
      /*text: 'World population per region (in millions)'*/
    }
  }
});
//chart theo tuan
new Chart(document.getElementById("myChartline_week"), {
  type: 'line',
  data: {
    labels: ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
    datasets: [{ 
        data: [86,114,106,106,107,111,112],
        label: "Áo",
        borderColor: "#3e95cd",
        fill: true
      }, { 
        data: [282,350,411,502,635,809,113],
        label: "Quần",
        borderColor: "#8e5ea2",
        fill: true
      }, { 
        data: [168,170,178,190,203,276,114],
        label: "Kính mắt",
        borderColor: "#3cba9f",
        fill: true
      }, { 
        data: [40,20,10,16,24,38,25],
        label: "Túi xách",
        borderColor: "#e8c3b9",
        fill: true
      }, { 
        data: [6,3,2,2,7,26,2],
        label: "Giày",
        borderColor: "#c45850",
        fill: true
      }
    ]
  },
  options: {
    title: {
      display: true,
      /*text: 'World population per region (in millions)'*/
    }
  }
});
//chart theo thang
new Chart(document.getElementById("myChartline_year"), {
  type: 'line',
  data: {
    labels: ["1","2","3","4","5","6","7","8","9","10"],
    datasets: [{ 
        data: [86,114,106,106,107,111,112],
        label: "Áo",
        borderColor: "#3e95cd",
        fill: true
      }, { 
        data: [282,350,411,502,635,809,113],
        label: "Quần",
        borderColor: "#8e5ea2",
        fill: true
      }, { 
        data: [40,20,10,16,24,38,25],
        label: "Túi xách",
        borderColor: "#e8c3b9",
        fill: true
      }, { 
        data: [6,3,2,2,7,26,2],
        label: "Giày",
        borderColor: "#c45850",
        fill: true
      }
    ]
  },
  options: {
    title: {
      display: true,
      /*text: 'World population per region (in millions)'*/
    }
  }
});

	$(document).ready(function(){
    $("#week").click(function(){
        document.getElementById("content_year").style.display = "none";      
        document.getElementById("content_mount").style.display = "none";
        document.getElementById("content_week").style.display = "block";
    });
    $("#year").click(function(){ 
    	document.getElementById("content_year").style.display = "block";     
        document.getElementById("content_mount").style.display = "none";
        document.getElementById("content_week").style.display = "none";
    });
    $("#mount").click(function(){
         document.getElementById("content_year").style.display = "none";       
        document.getElementById("content_mount").style.display = "block";      
        document.getElementById("content_week").style.display = "none";
    });
        document.getElementById("content_year").style.display = "none";       
        document.getElementById("content_mount").style.display = "block";        
        document.getElementById("content_week").style.display = "none";
});

</script>