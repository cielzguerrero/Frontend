<script type="text/javascript">
$(document).ready(function() {
 setInterval(runningTime, 1000);
});
function runningTime() {
  $.ajax({
    url: 'timescript.php',
    success: function(data) {
       $('#runningTime').html(data);
     },
  });
}
</script>