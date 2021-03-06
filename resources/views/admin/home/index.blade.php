@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	body, #page-wrapper {
		background-color: #efefef;
	}
	.bg-grey {
		background: #fff;
	}
</style>
@stop

@section('MainContent')
@include('admin.home.title')
@include('admin.home.content')


@stop
	
@section('AditionalFoot')
@include('admin.layouts.promo')
<script src="{{ URL::asset('/js/simple-weather.min.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBYypRLa1NPizMVwobgO4Z9jmE61LVrsZY"></script>
<script type="text/javascript">
	$(document).ready(function() {
		if (navigator.geolocation){
		  navigator.geolocation.getCurrentPosition(showPosition);
		}
		else{
		  latitudeAndLongitude.innerHTML="Geolocation is not supported by this browser.";
		}
		function showPosition(position){ 
		    location.latitude=position.coords.latitude;
		    location.longitude=position.coords.longitude;
		    var geocoder = new google.maps.Geocoder();
		    var latLng = new google.maps.LatLng(location.latitude, location.longitude);

		 if (geocoder) {
		    geocoder.geocode({ 'latLng': latLng}, function (results, status) {
		       if (status == google.maps.GeocoderStatus.OK) {
		         var newLoc = results[2].formatted_address; 
		         console.log(newLoc);
		         $.simpleWeather({
					location: newLoc,
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
				newDate.setDate(newDate.getDate());    
				$('#Date span:first-child').html(newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
				$('#Date span:last-child').html(dayNames[newDate.getDay()]);

				
				window.setInterval(function(){
				  $('.promo-add .item').toggleClass('active');
				}, 5000);
		       }
		       else {
		        $('#address').html('Geocoding failed: '+status);
		       }
		    });
		  }      
		} 


	});
</script>
@stop