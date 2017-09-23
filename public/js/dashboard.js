$(document).ready(function(){
	
	//FULL CALENDAR
	//Get availabilities in json
	var json = $('#availabilities').html();
	var availabilities = JSON.parse(json);

	//Get all bookings from hidden html
	var events = [];
	$(".bookings").each(function(booking){
		var eventId = $(this).find('.bookingId').html();
		var eventClient = $(this).find('.bookingClient').html();
		var eventDate = $(this).find('.bookingDate').html();
		var eventProduct = $(this).find('.bookingProduct').html();

		var event = {id: eventId, start: eventDate, title: eventClient,product: eventProduct, color: "purple"};
		events.push(event);
	});

	$('#calendar').fullCalendar({
		firstDay:1,
		eventSources: [
			events,
		],
		dayRender: function(date,cell){
			var cellDate = cell.attr('data-date');
			for (var i = availabilities.length - 1; i >= 0; i--) {
				var userDate = moment(availabilities[i].availaDate).format('Y-MM-DD');
				if(userDate == cellDate){
					if(availabilities[i].motiv == "available"){
						cell.css({'backgroundColor':'rgba(144,238,144)','opacity':'0.3'});
						cell.addClass('available');
					} else {
						cell.css({'backgroundColor':'rgba(233, 150, 122)','opacity':'0.3'});
						cell.addClass('unavailable');
					}
				}
			}
		},
		dayClick: function() {
			changeStatus(this);
		},
		eventRender: function(event,element){
			return title = 	'<a href="/bookings/'+event.id+'/edit" class="btn btn-info btn-xs">'+moment(event.start).format('h:m')+' '+event.title+'</a>';
		},
		editable: true,
	});
	//END FULLCALENDAR

	//GET MONTH AND YEAR
	// Get the month the user is modifying in order to update only this month
	var actualMonthYear = $('#calendar').fullCalendar('getDate');
	
	var monthYearInput = $(document.createElement('input'));
	monthYearInput.attr('type','hidden').attr('name','monthYear').attr('value',moment(actualMonthYear).format('Y-MM'));

	$('.fc-next-button').click(function(){
		actualMonthYear = moment(actualMonthYear).add(1,'M').format('Y-MM');
		monthYearInput.attr('value',actualMonthYear);
	});

	$('.fc-prev-button').click(function(){
		actualMonthYear = moment(actualMonthYear).subtract(1,'M').format('Y-MM');
		monthYearInput.attr('value',actualMonthYear);
	});
	//END

	//SAVE
	// Save and send availabilities to AvailabilityController on POST
	$('#save').click(function(){
		$('#inputs').empty();
		var avail = getDates('available');
		var unavail = getDates('unavailable');

		var availInput = $(document.createElement('input')).attr('name','availableNumber').attr('type',"hidden").attr('value',avail);
		var unavailInput = $(document.createElement('input')).attr('name','unavailableNumber').attr('type',"hidden").attr('value',unavail);
		
		$('#inputs').append(availInput,unavailInput,monthYearInput);

		$('#saveDates').submit();
	});
	//END SAVE

	//ALL BUT THE WEEK
	// CHANGE STATUS OF WEEK DAY AND WEEK-ENDS DAY
	$('#allButWeekEnds').click(function(){
		$('.fc-day').each(function(day){
			var date = moment($(this).attr('data-date')).format('Y-MM');
			var weekEnd = moment($(this).attr('data-date')).format('dddd');
			if(date == moment(actualMonthYear).format('Y-MM')){
				if(weekEnd != 'Saturday' && weekEnd != 'Sunday'){
					changeStatus(this);	
				} else{
					changeStatus(this);
					changeStatus(this);
				}
			}
		});
	});
	//END ALL BUT THE WEEK
});



function getDates(status){

	var yearMonth;
	var dates = [];
	$('.'+status).each(function(){
		dates.push(this.getAttribute('data-date'));
		yearMonth = moment(this.getAttribute('data-date')).format('Y-MM');
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
		$(object).css({'backgroundColor':'rgba(233, 150, 122)','opacity':'0.3'});
	} else if($(object).is('.unavailable')){
		$(object).removeClass('unavailable');
		$(object).css({'backgroundColor':'rgba(0, 0, 0, 0)'});
	} else {
		$(object).addClass('available');
		$(object).css({'backgroundColor':'rgba(144,238,144)','opacity':'0.3'})
	}
}