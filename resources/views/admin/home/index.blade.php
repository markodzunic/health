@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	#page-wrapper {
		background-color: #f9f9f9;
	}
	.bg-grey {
		background: #fff;
	}
</style>
@stop

@section('MainContent')
@include('admin.home.title')
@include('admin.home.content')
@include('admin.layouts.promo')
@stop
<!-- <span class="h3 no-margin-bottom">18 degrees</span><br /> -->
									<!-- <span class="h5 no-margin-bottom">Partly Cloudy – Boyle</span> -->
	
@section('AditionalFoot')
<script src="{{ URL::asset('/js/simple-weather.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var latitudeAndLongitude=document.getElementById("latitudeAndLongitude"),
		location={
		    latitude:'',
		    longitude:''
		};

		if (navigator.geolocation){
		  navigator.geolocation.getCurrentPosition(showPosition);
		}
		else{
		  latitudeAndLongitude.innerHTML="Geolocation is not supported by this browser.";
		}

		function showPosition(position){ 
		    location.latitude=position.coords.latitude;
		    location.longitude=position.coords.longitude;
		    latitudeAndLongitude.innerHTML="Latitude: " + position.coords.latitude + 
		    "<br>Longitude: " + position.coords.longitude; 
		    var geocoder = new google.maps.Geocoder();
		    var latLng = new google.maps.LatLng(location.latitude, location.longitude);

		 if (geocoder) {
		    geocoder.geocode({ 'latLng': latLng}, function (results, status) {
		       if (status == google.maps.GeocoderStatus.OK) {
		         console.log(results[0].formatted_address); 
		       }
		       else {
		        $('#address').html('Geocoding failed: '+status);
		       }
		    }); //geocoder.geocode()
		  }      
		} //showPosition


		$.simpleWeather({
			location: 'Pirot, RS',
			unit: 'c',
			success: function(weather) {
				html = '<span class="h3 no-margin-bottom">'+weather.temp+'&deg; '+weather.units.temp+'</span><br />';
				html +=  '<span class="h5 no-margin-bottom">'+weather.currently+' – '+weather.city+'</span>';

				$("#weather").html(html);
			},
			error: function(error) {
				$("#weather").html("<p>"+error+"</p>");
			}
		});

		var monthNames = [ "January", "February", "March", "April", "May", "June",
		    "July", "August", "September", "October", "November", "December" ];
		var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

		var newDate = new Date();
		newDate.setDate(newDate.getDate() + 1);    
		$('#Date span:first-child').html(newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
		$('#Date span:last-child').html(dayNames[newDate.getDay()]);

		// $('#Date').text();
	})
</script>
@stop