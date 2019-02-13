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
<div class="container mx-auto flex shadow-1 flex-col">
	<div class="flex header-bg">
		<div class="logo header-bg">
			<img class="p-6 px-12" src="/images/allianz-logo.png">
		</div>
		<div class="border bg-transparent border-grey-light shadow-1 my-4"></div>
		<div class="flex-1 plan-name header-bg">
			<p class="p-6 this-black font-bold text-xl">Allianz Travel Care</p>
		</div>
	</div>
	<div class="flex">
		<div class="nav-bg text-center md:w-1/6 flex flex-col py-4">
			<button class="bg-transparent pb-4 py-2 mt-4 mx-10 info-btn this-black nav-btn" data-id="medical-expenses">Medical<br>Expenses</button>
			<button class="blue-btn pb-4 py-2 my-2 mt-4 mx-10 nav-btn" data-id="death-disability">Death &<br>Disability</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn">Other Life<br>/Medical</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn">Itinerary<br>/Bookings</button>
		</div>
		<div class="qa-section" id="medical-expenses" hidden>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
		</div>
		<div class="qa-section" id="death-disability">
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet here?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lorem ipsum donor amet?</p>
				<p class="text-lg this-black">Lorem ipsum donor amet donor amet donor</p>
			</div>
		</div>
		<div class="pricing mx-24">
			<div class="flex justify-center content-start pt-8">
				<span class="font-bold this-black currency pt-4">RM</span>
				<p class="font-bold this-black price-tag">15</p>
				<span class="font-bold this-black text-2xl self-end pb-2 px-2">/ trip</span>
			</div>
			<button class="whatsapp-btn px-12 py-4 m-6 text-xl text-blue-darker">Buy Now</button>
		</div>
	</div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){
	$(".nav-btn").click(function(e){
		$(".qa-section").each(function(){
			$(this).hide();
		});
		$(".nav-btn").each(function(){
			$(this).removeClass("blue-btn");
			$(this).addClass("info-btn this-black bg-transparent");
		});
		$(this).addClass("blue-btn");
		$(this).removeClass("info-btn this-black bg-transparent");
		var el = "#" + $(this).attr("data-id");
		$(el).show();
	});
});
</script>
@endsection

