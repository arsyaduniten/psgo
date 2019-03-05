@extends('base')

@section('head')
<style type="text/css">
	body{
		background: url('/images/background.png');
    	background-size: cover;
    	background-repeat: no-repeat;
	}
</style>
@endsection


@section('content')
@include('layouts.nav')
<div class="py-6 flex flex-col justify-center">
	<img class="mx-auto" src="/images/travel-ai.png">
	<p class="mx-auto pt-4 text-4xl this-black font-bold">You've earned your vacation. Let us help you Protect it.</p>
	<p class="mx-auto pt-1 text-xl this-black font-bold">Get your travel insurance quotation in 10 seconds.</p>
	<div class="flex justify-center">
		<form class="flex bg-white shadow-1 rounded py-2 mt-6" id="quote_form" action="{{ route('getplans') }}" method="post">
			@csrf
			<div class="flex">
				<div>
					<p class="px-4 p-2 font-bold text-sm this-grey">Travelling to</p>
					<input class="-my-2 pl-4 py-1 bg-white rounded-l-lg font-bold input-color text-xl" type="text" name="destination" id="destination">
				</div>
				<img class="py-5 px-3" src="/images/location-ic.png">
			</div>
			<div class="border border-grey-light"></div>
			<div class="flex">
				<div>
					<p class="px-4 p-2 font-bold text-sm this-grey">Depart date</p>
					<input class="-my-2 pl-4 bg-white font-bold input-color text-xl" type="date" name="depart_date" id="depart">
				</div>
				<img class="py-5 px-3" src="/images/calendar-ic.png">
			</div>
			<div class="border border-grey-light"></div>
			<div class="flex">
				<div>
					<p class="px-4 p-2 font-bold text-sm this-grey">Return date</p>
					<input class="-my-2 pl-4 bg-white font-bold input-color text-xl rounded-r-lg" type="date" name="return_date" id="return">
				</div>
				<img class="py-5 px-3" src="/images/calendar-ic.png">
			</div>
			<div class="border border-grey-light"></div>
			<div class="flex">
				<img class="py-4 px-2 cursor-pointer" src="/images/minus-ic.png" id="minus-btn">
				<div class="w-32">
					<p class="px-4 p-2 font-bold text-sm this-grey">Traveller</p>
					<input class="-my-2 pl-4 py-1 bg-white font-bold input-color text-xl rounded-r-lg w-32" type="text" disabled value="1" name="traveller">
				</div>
				<img class="py-5" src="/images/traveller.png">
				<img class="py-4 px-2 cursor-pointer" src="/images/plus-ic.png" id="plus-btn">
			</div>
			<button id="submit-btn" class="p-6 mx-2 self-center rounded font-bold whatsapp-btn" type="submit">Get Quotation</button>
		</form>
	</div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	today = yyyy+'-'+mm+'-'+dd;
	console.log(today);
	document.getElementById("depart").setAttribute('min', today);
	document.getElementById("return").setAttribute('min', today);
	$('input[name=destination]').focus();
	$('#submit-btn').on('click', function(e){
		e.preventDefault();
		$("input[name=traveller]").removeAttr("disabled");;
		$("#quote_form").submit();
	});
	$('#minus-btn').on('click', function(){
		if($("input[name=traveller]").val() == 1){
			return;
		}
		var traveller = Number($("input[name=traveller]").val()) - 1;
		$("input[name=traveller]").val(traveller);
	});
	$('#plus-btn').on('click', function(){
		var traveller = Number($("input[name=traveller]").val()) + 1;
		$("input[name=traveller]").val(traveller);
	});
});

function initMap(){
	var input = document.getElementById('destination');
    var autocomplete = new google.maps.places.Autocomplete(input);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMh6XVDcpIrX2uQs4KMpjr_bapHqya4SU&libraries=places&callback=initMap"
        async defer></script>
@endsection

