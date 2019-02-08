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
		<div class="flex bg-white shadow-1 rounded py-2 mt-6">
			<div class="flex">
				<div>
					<p class="px-4 p-2 font-bold text-sm this-grey">Travelling to</p>
					<input class="-my-2 pl-4 py-1 bg-white rounded-l-lg font-bold input-color text-xl" type="text" name="destination">
				</div>
				<img class="py-5 px-3" src="/images/location-ic.png">
			</div>
			<div class="border border-grey-light"></div>
			<div class="flex">
				<div>
					<p class="px-4 p-2 font-bold text-sm this-grey">Depart date</p>
					<input class="-my-2 pl-4 bg-white font-bold input-color text-xl" type="date" name="depart_date">
				</div>
				<img class="py-5 px-3" src="/images/calendar-ic.png">
			</div>
			<div class="border border-grey-light"></div>
			<div class="flex">
				<div>
					<p class="px-4 p-2 font-bold text-sm this-grey">Return date</p>
					<input class="-my-2 pl-4 bg-white font-bold input-color text-xl rounded-r-lg" type="date" name="return_date">
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
			<button class="p-6 mx-2 self-center rounded font-bold whatsapp-btn" type="submit">Get Quotation</button>
		</div>
	</div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){
	$('input[name=destination]').focus();
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
</script>
@endsection

