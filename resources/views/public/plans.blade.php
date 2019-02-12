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
<p class="font-bold this-black text-4xl m-8 text-center">3 plans found</p>
<div class="container mx-auto flex justify-between">
	<div class="bg-white rounded shadow-1">
		<div class="mx-6 my-6 text-center">
			<img src="/images/allianz-logo.png" class="p-2">
			<p class="this-black text-3xl font-bold">Allianz Plan</p>
			<div class="flex justify-center content-start pt-8">
				<span class="font-bold this-black currency pt-4">RM</span>
				<p class="font-bold this-black price-tag">15</p>
			</div>
			<p class="this-black text-2xl">per trip</p>
			<div class="flex pt-16 justify-between text-left">
				<p class="px-4">Death & disability <br>protection</p>
				<p class="px-4 font-bold text-blue">Lump Sum of <br> RM200,000</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Medical <br> Expenses</p>
				<p class="px-4 font-bold text-blue">Reimburse up<br> to RM1 Mil.</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Cancelled <br> Trip</p>
				<p class="px-4 font-bold text-blue">Reimburse up<br> to RM20,000</p>
			</div>
			<div class="flex flex-col">
				<button class="whatsapp-btn pb-4 py-2 text-xl mt-12 mx-10">Select Plan</button>
				<button class="bg-transparent border-2 border-blue pb-4 py-2 text-xl mt-4 mx-10 info-btn this-black">More Info</button>
			</div>
		</div>
	</div>
	<div class="bg-white rounded shadow-1">
		<div class="mx-6 my-6 text-center">
			<img src="/images/allianz-logo.png" class="p-2">
			<p class="this-black text-3xl font-bold">Allianz Plan</p>
			<div class="flex justify-center content-start pt-8">
				<span class="font-bold this-black currency pt-4">RM</span>
				<p class="font-bold this-black price-tag">15</p>
			</div>
			<p class="this-black text-2xl">per trip</p>
			<div class="flex pt-16 justify-between text-left">
				<p class="px-4">Death & disability <br>protection</p>
				<p class="px-4 font-bold text-blue">Lump Sum of <br> RM200,000</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Medical <br> Expenses</p>
				<p class="px-4 font-bold text-blue">Reimburse up<br> to RM1 Mil.</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Cancelled <br> Trip</p>
				<p class="px-4 font-bold text-blue">Reimburse up<br> to RM20,000</p>
			</div>
			<div class="flex flex-col">
				<button class="whatsapp-btn pb-4 py-2 text-xl mt-12 mx-10">Select Plan</button>
				<button class="bg-transparent border-2 border-blue pb-4 py-2 text-xl mt-4 mx-10 info-btn this-black">More Info</button>
			</div>
		</div>
	</div>
	<div class="bg-white rounded shadow-1">
		<div class="mx-6 my-6 text-center">
			<img src="/images/allianz-logo.png" class="p-2">
			<p class="this-black text-3xl font-bold">Allianz Plan</p>
			<div class="flex justify-center content-start pt-8">
				<span class="font-bold this-black currency pt-4">RM</span>
				<p class="font-bold this-black price-tag">15</p>
			</div>
			<p class="this-black text-2xl">per trip</p>
			<div class="flex pt-16 justify-between text-left">
				<p class="px-4">Death & disability <br>protection</p>
				<p class="px-4 font-bold text-blue">Lump Sum of <br> RM200,000</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Medical <br> Expenses</p>
				<p class="px-4 font-bold text-blue">Reimburse up<br> to RM1 Mil.</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Cancelled <br> Trip</p>
				<p class="px-4 font-bold text-blue">Reimburse up<br> to RM20,000</p>
			</div>
			<div class="flex flex-col">
				<button class="whatsapp-btn pb-4 py-2 text-xl mt-12 mx-10">Select Plan</button>
				<button class="bg-transparent border-2 border-blue pb-4 py-2 text-xl mt-4 mx-10 info-btn this-black">More Info</button>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){
	
});
</script>
@endsection

