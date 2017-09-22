$(document).ready(function(){
	
	var json = $('#availabilities').html();
	var availabilities = JSON.parse(json);

	$('#calendar').fullCalendar({
		dayRender: function(date,cell){
			var cellDate = cell.attr('data-date');
			for (var i = availabilities.length - 1; i >= 0; i--) {
				var userDate = moment(availabilities[i].availaDate).format('Y-MM-DD');
				if(userDate == cellDate){
					if(availabilities[i].motiv == "available"){
						cell.css('backgroundColor','lightgreen');
						cell.addClass('available');
					} else {
						cell.css('backgroundColor','darksalmon');
						cell.addClass('unavailable');
					}
				}
			}
		},
		dayClick: function(e) {
			changeStatus(this);
		},
	});

	$('#save').click(function(){
		$('#inputs').empty();
		var avail = getDates('available');
		var unavail = getDates('unavailable');

		var availInput = $(document.createElement('input')).attr('name','availableNumber').attr('type',"hidden").attr('value',avail);
		var unavailInput = $(document.createElement('input')).attr('name','unavailableNumber').attr('type',"hidden").attr('value',unavail);
		
		$('#inputs').append(availInput,unavailInput);

		$('#saveDates').submit();
	});
});



function getDates(status){

	var dates = [];
	$('.'+status).each(function(){
		dates.push(this.getAttribute('data-date'));
	});

	var inputs = $('#inputs');	

	var count = 0;

	for (var i = dates.length - 1; i >= 0; i--) {
		var group = $(document.createElement('div'));

		var dateInput = $(document.createElement('input'));
		dateInput.attr('name',"date"+status+i);
		dateInput.attr('type','hidden');
		dateInput.attr('value',dates[i]);

		inputs.append(dateInput);

		count++;
	}

	return count;
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