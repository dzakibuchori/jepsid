$(document).ready(function(){

	function twoDigit(n){
	    return n > 9 ? "" + n: "0" + n;
	}

	function carStatus(n){
		var src;
		switch(n.toUpperCase()){
			case 'PARKING' : src = 'img/mstop.png';
			break;
			case 'STOP' : src = 'img/mstop.png';
			break;
			case 'RUNNING' : src = 'img/mrunning.png';
			break;
			case 'LOST' : src = 'img/mlost.png';
			break;
			case 'ALARM' : src = 'img/malarm.png';
			break;
		}

		return src;
	}

	function engineStatus(n){
		var src;
		switch(n.toUpperCase()){
			case 'ENGINE ON' : src = 'img/eon.png';
			break;
			case 'ENGINE OFF' : src = 'img/eoff.png';
			break;
		}

		return src;
	}


	$('.vehicle').click(function(){
		$(location).attr('href', 'vehiclelist.php');
	});

	$('.map').click(function(){
		$(location).attr('href', 'map.php');
	});

	$('.notif').click(function(){
		$(location).attr('href', '#');
	});

	$.getJSON(
		"http://obd.id-clouds.net/raja_engine/GPS2.php?CMD=LOCATEVEHICLE&APIKEY=7910a2754c38c4b2b07594c73c73441a&TERLIST=358899058765630||358899058768659",
		function(data){
			var vehData = data.VEHICLE.DATA;
			$.each(vehData, function(index, value){
				// Vehicle Detail
				$(".veh-detail").append('\
		          <div class="col-sm-6 col-xs-6">\
		            <div class="veh-wrapper"><span>'+value.LICENSE+'</span>\
		              <hr>\
		              <div class="row data-detail">\
		                <div class="col-sm-2">\
		                  <img src="img/direction.png" class="dir-icon" alt="direction" style="-webkit-transform: rotate('+value.DIRECTION+'deg); transform: rotate('+value.DIRECTION+'deg);"></img>\
		                </div>\
		                <div class="col-sm-5">\
		                  <div class="row text-left detail-left">\
		                    <div class="col-sm-12"><span class="speed">'+twoDigit(value.SPEED)+'<span class="km">km/h</span></span></div>\
		                    <div class="col-sm-12"><span>ODO : '+value.MILEAGE+'</span></div>\
		                  </div>\
		                </div>\
		                <div class="col-sm-5">\
		                  <div class="row text-left detail-right">\
		                    <div class="col-sm-12"><img class="blink status-icon" alt="car_statuts" src="'+carStatus(value.STATUS)+'"><span>'+value.STATUS+'</span></div>\
		                    <div class="col-sm-12"><img class="blink status-icon" alt="engine_statuts" src="'+engineStatus(value.STATUS_ENGINE)+'"><span>'+value.STATUS_ENGINE+'</span></div>\
		                  </div>\
		                </div>\
		              </div><span>'+value.TIME_FORMAT+'</span>\
		              <hr><span class="address">'+value.ADDRESS+'</span>\
		            </div>\
					');
				console.log(value);
				// All Vehicles on Map	
			});


		}
	);
});
