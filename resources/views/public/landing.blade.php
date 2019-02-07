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
	<p class="mx-auto pt-4 text-5xl this-black font-bold">You've earned your vacation. Let us help you Protect it.</p>
	<p class="mx-auto pt-1 text-2xl this-black font-bold">Get your travel insurance quotation in 10 seconds.</p>
	<div class="flex mx-auto bg-white shadow-md rounded-lg py-2 mt-6">
		<div class="flex">
			<div>
				<p class="px-4 p-2 font-bold text-sm this-grey">Travelling to</p>
				<input class="-my-2 pl-4 py-1 bg-white rounded-l-lg font-bold input-color text-xl" type="text">
			</div>
			<img class="py-5 px-3" src="/images/location-ic.png">
		</div>
		<div class="border border-grey-light"></div>
		<div class="flex">
			<div>
				<p class="px-4 p-2 font-bold text-sm this-grey">Depart date</p>
				<input class="-my-2 pl-4 bg-white font-bold input-color text-xl" type="date">
			</div>
			<img class="py-5 px-3" src="/images/calendar-ic.png">
		</div>
		<div class="border border-grey-light"></div>
		<div class="flex">
			<div>
				<p class="px-4 p-2 font-bold text-sm this-grey">Return date</p>
				<input class="-my-2 pl-4 bg-white font-bold input-color text-xl rounded-r-lg" type="date">
			</div>
			<img class="py-5 px-3" src="/images/calendar-ic.png">
		</div>
		<div class="border border-grey-light"></div>
		<div class="flex">
			<img class="py-4 px-2" src="/images/minus-ic.png">
			<div class="w-32">
				<p class="px-4 p-2 font-bold text-sm this-grey">Traveller</p>
				<input class="-my-2 pl-4 py-1 bg-white font-bold input-color text-xl rounded-r-lg w-32" type="text" disabled value="1">
			</div>
			<img class="py-5" src="/images/traveller.png">
			<img class="py-4 px-2" src="/images/plus-ic.png">
		</div>
	</div>
</div>
@endsection


@section('script')

@endsection

