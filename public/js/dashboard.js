$(document).ready(function(){
	$('#calendar').fullCalendar({
		dayClick: function(e) {
			changeStatus(this);
		}
	});

	$('#save').click(function(){
		$('#inputs').empty();
		getDates('available');
		getDates('unavailable');
		//$('#saveDates').submit();
	});
});


function getDates(status){

	var dates = [];
	$('.'+status).each(function(){
		dates.push(this.getAttribute('data-date'));
	});

	var inputs = $('#inputs');	

	for (var i = dates.length - 1; i >= 0; i--) {
		var group = $(document.createElement('div'));

		var dateInput = $(document.createElement('input'));
		dateInput.attr('class',dates[i]);
		dateInput.attr('name','date');
		dateInput.attr('type','hidden');
		dateInput.attr('value',dates[i]);

		var motivInput = $(document.createElement('input'));
		motivInput.attr('class',dates[i]);
		motivInput.attr('name','motiv');
		motivInput.attr('type','hidden');
		motivInput.attr('value',status);

		inputs.append(dateInput,motivInput);	
	}
}

function changeStatus(object){
	if($(object).is('.available')){
		$(object).removeClass("available");
		$(object).addClass("unavailable");
		$(object).css({'backgroundColor':'darksalmon'});
	} else if($(object).is('.unavailable')){
		$(object).removeClass('unavailable');
		$(object).css({'backgroundColor':'rgba(0, 0, 0, 0)'});
	} else {
		$(object).addClass('available');
		$(object).css({'backgroundColor':'lightgreen'})
	}
}