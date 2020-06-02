$(document).ready(function(){
		GetSummaryList();
		
		$("#js-summary-form").on('submit', function(e) {
			e.preventDefault();
			var form = $(this);
			var url = form.attr('action');
			console.log(url);
				$.ajax({
				   type: "POST",
				   url: url,
				   data: form.serialize(),
				   success: function(response)
				   {
					   console.log(response);
					   $('#exampleModal').hide();
					   $('.modal-backdrop').removeClass('show');
					   GetSummaryList();
				   }
			});			
		});	
		
		$('#js-salary').mask("#,##0.00", {reverse: true});
	});
	
	function GetSummaryList(){
			$.ajax({
				type: "GET",
				url: 'GetSummaryList.php',
				dataType:"html",
				success: function(data){
					$('.content').html(data);	 
				}
			});	
		}