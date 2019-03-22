@extends('base')

@section('head')
<style type="text/css">
	body{
		background: url('/images/background.png');
    	background-size: cover;
    	background-repeat: no-repeat;
	}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
<div class="container mx-auto flex shadow-1">
	<div class="flex flex-col bg-white">
		<div class="flex">
			<p class="text-3xl font-bold m-12" style="color:#0A3C77;">Please fill out<br>your payment<br>details</p>
			<img src="/images/wallet.png">
		</div>
		<div class="flex m-12 justify-left">
			<div class="w-1/2">
				<div class="flex flex-col">
					<label class="text-xs this-black py-2">CARD NUMBER</label>
					<input type="text" name="cc_no" class="border rounded-sm p-4 py-2 cc-input">
				</div>
				<div class="flex flex-col">
					<label class="text-xs this-black py-2">CARD HOLDER</label>
					<input type="text" name="cc_holder" class="border rounded-sm p-4 py-2 cc-input">
				</div>
				<div class="flex">
					<div class="flex flex-no-grow flex-col w-1/2 mr-10">
						<label class="text-xs this-black py-2">EXPIRATION DATE</label>
						<input type="text" name="cc_expiry" class="border rounded-sm p-4 py-2 cc-input">
					</div>
					<div class="flex flex-no-grow flex-col w-1/3">
						<label class="text-xs this-black py-2">CVC</label>
						<input type="text" name="cvc" class="border rounded-sm p-4 py-2 cc-input">
					</div>
				</div>
				<button class="font-bold text-base this-white rounded-sm px-8 py-3 pb-4 my-4" style="background: #297CD9;">Pay MYR50.00</button>
			</div>
			<div>
			</div>
		</div>
	</div>
	<div class="flex flex-col" style="background: #F8FCFF;">
		<img src="/images/family.png">
	</div>
</div>
@endsection


@section('script')
<script>
function blurAll(){
	$( "*" ).not( "#loader , body, head, html, svg, rect").addClass('blur');
	$("#loader").removeClass('hidden');
}
$(document).ready(function(){
	

});
</script>
@endsection

