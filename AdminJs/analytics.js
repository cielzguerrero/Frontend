// MOBILE--------------------------- TOGGLE DISPLAY
var nav = document.querySelector('#nav');
var contents = document.querySelector('#contents');
$('.mobileToggler').click(function(){
   
    if ($(this).hasClass('open'))
    {
        $(this).removeClass('open');
        contents.style.marginLeft = "100px";
        nav.style.display = "block";
        nav.style.opacity = "1";

    }
    else 
    {
        $(this).addClass('open');
        nav.style.opacity = "0";
        nav.style.display = "none";
        contents.style.marginLeft = "0px";
        
    }

});


// CLOCK DISPLAY
function startTime() {
    const today = new Date();
    let h = today.getHours()-12;
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =  h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
  }
  
  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }
// bar chart

am5.ready(function() {

    var root = am5.Root.new("chartdiv");
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    // chart.dataSource.url = "./AdminJs/data.php";
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX:true
    }));
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);
    var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
    xRenderer.labels.template.setAll({
      rotation: -90,
      centerY: am5.p50,
      centerX: am5.p100,
      paddingRight: 15
    });
    
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      maxDeviation: 0.3,
      categoryField: "country",
      renderer: xRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      maxDeviation: 0.3,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: "Series 1",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      sequencedInterpolation: true,
      categoryXField: "country",
      tooltip: am5.Tooltip.new(root, {
        labelText:"{valueY}"
      })
    }));
    
    series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
    series.columns.template.adapters.add("fill", function(fill, target) {
      return chart.get("colors").getIndex(series.columns.indexOf(target));
    });
    
    series.columns.template.adapters.add("stroke", function(stroke, target) {
      return chart.get("colors").getIndex(series.columns.indexOf(target));
    });
    
    
    // Set data
    var data = [{
      country: "Doy Pack",
      value: 1231
    }, {
      country: "Glass Bottle",
      value: 1882
    }, {
      country: "Plastic Bottle",
      value: 1809
    }, {
      country: "Aluminum",
      value: 1322
    }];
    
    
    xAxis.data.setAll(data);
    series.data.setAll(data);
    

    series.appear(1000);
    chart.appear(1000, 100);
  

  }); // end am5.ready()

  $(document).ready(function(){
    $.ajax({
      url: "../AdminJs/totalpointsbrgy.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var brgy = [];
        var totalp = [];
  
        for(var i in data) {
          brgy.push(data[i].Barangay);
          totalp.push(data[i].total_points);
        }
  //  DONUT CHART FOR TOTAL POINTS PER BRGY
const pointsDoughnut = {
    labels: brgy,
    datasets: [
      {
        label: "My First Dataset",
        data: totalp,
        backgroundColor: [
          "#67b7dc",
          "#6794dc",
          "#6771dc",
          "#8974de",
          "#4722dc",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configpointsDoughnut = {
    type: "doughnut",
    data: pointsDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("DoughnutAnalytics1"),
    configpointsDoughnut
  );

}
});
});
$(document).ready(function(){
  $.ajax({
    url: "../AdminJs/totaluserbrgy.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var brgy = [];
      var totalu = [];

      for(var i in data) {
        brgy.push(data[i].Barangay);
        totalu.push(data[i].total_user);
      }
  //  DONUT CHART FOR TOTAL POINTS PER BRGY
const membersDoughnut = {
    labels: brgy,
    datasets: [
      {
        label: "My First Dataset",
        data: totalu,
        backgroundColor: [
          "#67b7dc",
          "#6794dc",
          "#6771dc",
          "#8974de",
          "#4722dc",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configmembersDoughnut = {
    type: "doughnut",
    data: membersDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("DoughnutAnalytics2"),
    configmembersDoughnut
  );

}
});
});
  
