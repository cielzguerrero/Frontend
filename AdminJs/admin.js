
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

//  DONUT CHART FOR BARANGAY MEMBERS
const memberDoughnut = {
    labels: ["Nueva", "San Antonio", "San Vicente","San Roque","Landayan"],
    datasets: [
      {
        label: "My First Dataset",
        data: [300, 50, 100, 400, 300],
        backgroundColor: [
          "#003f5c",
          "#58508d",
          "#bc5090",
          "#ff6361",
          "#ffa600",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configmemberDoughnut = {
    type: "doughnut",
    data: memberDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartDoughnut"),
    configmemberDoughnut
  );

//  DONUT CHART FOR BARANGAY MEMBERS
const pointsDoughnut = {
    labels: ["Nueva", "San Antonio", "San Vicente","San Roque","Landayan"],
    datasets: [
      {
        label: "My First Dataset",
        data: [4800, 18150, 19500, 5700, 79748],
        backgroundColor: [
          "#003f5c",
          "#58508d",
          "#bc5090",
          "#ff6361",
          "#ffa600",
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
    document.getElementById("chartDoughnut2"),
    configpointsDoughnut
  );