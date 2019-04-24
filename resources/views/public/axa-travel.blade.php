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
<div class="fixed z-50 hidden" id="loader" style="top:50%; bottom:50%; left: 50%; right: 50%">
	<svg width="51px" height="50px" viewBox="0 0 51 50">
	    <rect y="0" width="13" height="50" fill="#1fa2ff">
	        <animate attributeName="height" values="50;10;50" begin="0s" dur="1s" repeatCount="indefinite" />
	        <animate attributeName="y" values="0;20;0" begin="0s" dur="1s" repeatCount="indefinite" />
	    </rect>
	    <rect x="19" y="0" width="13" height="50" fill="#12d8fa">
	        <animate attributeName="height" values="50;10;50" begin="0.2s" dur="1s" repeatCount="indefinite" />
	        <animate attributeName="y" values="0;20;0" begin="0.2s" dur="1s" repeatCount="indefinite" />
	    </rect>
	    <rect x="38" y="0" width="13" height="50" fill="#06ffcb">
	        <animate attributeName="height" values="50;10;50" begin="0.4s" dur="1s" repeatCount="indefinite" />
	        <animate attributeName="y" values="0;20;0" begin="0.4s" dur="1s" repeatCount="indefinite" />
	    </rect>
	</svg>
</div>

<div class="container mx-auto flex flex-col">
	<p class="text-3xl this-black font-bold text-center">Protect <span class="this-blue">yourself</span> and your <span class="this-blue">loved ones</span> while you are travelling<br> with the most affordable Travel Insurance in Malaysia</p>
	<div class="product-banner flex flex-col mt-6 mx-auto">
		<p class="text-white font-bold text-xl p-4">AXA Smart Traveller</p>
		<p class="text-white px-4">What makes AXA Smart Traveller one of the most popular travel insurance in town?</p>
		<div class="flex">
			<div class="flex flex-col">
				<div class="flex p-8 items-center">
					<img src="/images/money.png">
					<p class="this-white font-bold px-4">Classic Plan is Most Basic<br> and Affordable</p>
				</div>
				<div class="flex px-8 items-center">
					<img class="pl-2" src="/images/guarantee.png">
					<p class="this-white font-bold px-6">ENTRY AGE - 30 days old<br>LAST ENTRY AGE - 79 yrs old</p>
				</div>
			</div>
			<div class="flex flex-col">
				<div class="flex p-8 items-center">
					<img src="/images/invoice.png">
					<p class="this-white font-bold px-4">Medical Expenses Reimburse<br>Up to RM 300,000</p>
				</div>
				<div class="flex px-8 items-center">
					<img class="" src="/images/secure.png">
					<p class="this-white font-bold px-5">Accidental Death/Disability<br>Lump Sum Payout of RM 300,000</p>
				</div>
			</div>
		</div>
		<div class="text-right">
			<img class="p-4" src="/images/axa-logo.png">
		</div>
	</div>
	<div class="flex promotion-banner">
	</div>
</div>

@endsection


@section('script')
<script>
$(document).ready(function(){
	
});

function blurAll(){
	$( "*" ).not( "#loader , body, head, html, svg, rect").addClass('blur');
	$("#loader").removeClass('hidden');
}
</script>
@endsection

