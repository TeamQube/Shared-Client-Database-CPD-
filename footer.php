    <script src="js/jquery.min.js"></script>
   <script src="vendors/jquery/dist/jquery.min.js"></script>
   <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
   
  
  
  
 <!-- 
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
   
      <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    
    
   
      <!--  Chart js 
    <script src="assets/js/init-scripts/chart-js/chartjs-init.js"></script>
    <script src="vendors/peity/jquery.peity.min.js"></script>
    <!-- scripit init
    <script src="assets/js/init-scripts/peitychart/peitychart.init.js"></script>
    <!-- scripit init-->
   <!--  flot-chart js 
    <script src="vendors/flot/excanvas.min.js"></script>
    <script src="vendors/flot/jquery.flot.js"></script>
    <script src="vendors/flot/jquery.flot.pie.js"></script>
    <script src="vendors/flot/jquery.flot.time.js"></script>
    <script src="vendors/flot/jquery.flot.stack.js"></script>
    <script src="vendors/flot/jquery.flot.resize.js"></script>
    <script src="vendors/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/js/init-scripts/flot-chart/curvedLines.js"></script>
    <script src="assets/js/init-scripts/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="assets/js/init-scripts/flot-chart/flot-chart-init.js"></script>

    <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
    <script src="vendors/chosen/chosen.jquery.min.js"></script>
       <!-- Gmaps 
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>
    <script src="vendors/gmaps/gmaps.min.js"></script>
    <script src="assets/js/init-scripts/gmap/gmap.init.js"></script>
    
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    
    
 
  
    
    -->
      <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
     <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
	  <script type="text/javascript">
		$(document).ready(function(){
			$('#internship').prop("disabled", true);
				$(".internship").click(function(){
					if($(this).prop("checked") == true){
						$('#internship').prop("disabled", false);
					}
					else if($(this).prop("checked") == false){
						$('#internship').prop("disabled", true);
					}
				});
			});
		  
		  $(document).ready(function(){
			$('#industry').prop("disabled", true);
				$(".industry").click(function(){
					if($(this).prop("checked") == true){
						$('#industry').prop("disabled", false);
					}
					else if($(this).prop("checked") == false){
						$('#industry').prop("disabled", true);
					}
				});
			});
		 
   </script>
		
    </script>
  <script>
	  function search(obj){
		if(obj.value!=""){
			$.ajax({
				type: "POST",
				url: "Search.php",
				data: {
					'Search': obj.value
				},
				success: function (data) {
					$("#search_result").html(data);
				}
			});
		}else{
			$("#search_result").html("");
		}
	}
		
	   
		
    </script>
 
</body>

</html>