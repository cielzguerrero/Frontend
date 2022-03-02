<script type="text/javascript">
    let myChart = document.getElementById('totalpointchart').getContext('2d');
    let barChart = new Chart(myChart, {
        type:'bar',
        data:{
        labels:['Bro', 'Vro','Momento'],
        datasets:[{
            label:'Points',
            data:[
                600,
                900,
                1200,
            ]
        }]
        },
        options:{},
    });
</script>