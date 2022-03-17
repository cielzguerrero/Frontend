$(document).ready(function(){
    $.ajax({
      url: "js/data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var garbage = [];
        var count = [];
  
        for(var i in data) {
          garbage.push("Garbage: " + data[i].garbage_Name);
          count.push(data[i].garbage_Count);
        }
  
        var chartdata = {
          labels: garbage,
          datasets : [
            {
              label: 'Total Garbage Count',
              backgroundColor: 'rgba(70,130,180)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(72,209,204)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: count
            }
          ]
        };
  
        var ctx = $("#mycanvas");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });