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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
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
<div class="container mx-auto flex flex-col-reverse md:flex-row shadow-1">
	<div class="flex flex-col bg-white w-full">
		<div class="flex">
			<p class="text-3xl font-bold m-12" style="color:#0A3C77;">Please fill out<br>your payment<br>details</p>
			<img class="hidden md:block" src="/images/wallet.png">
		</div>
		<div class="flex mx-12">
			<div class="ml-0 m-2" style="border: 2px solid #D4E0FF;"><img class="p-1 px-3" src="/images/mastercard.png" style="padding-top: 6px;"></div>
			<div class="m-2" style="border: 2px solid #D4E0FF;"><img class="p-2" src="/images/Visa.png"></div>
		</div>
		<form class="flex mx-12 my-6 mb-12 justify-left" method="post" action="https://payment.ipay88.com.my/epayment/entry.asp">
			<div class="w-full md:w-1/2">
				<div class="flex flex-col">
					<label class="text-xs this-black py-2">CARD NUMBER</label>
					<input type="tel" name="cc_no" id="cc_no" maxlength="19" class="border rounded-sm p-4 py-2 cc-input">
				</div>
				<div class="flex flex-col">
					<label class="text-xs this-black py-2">CARD HOLDER</label>
					<input type="text" name="cc_holder" class="border rounded-sm p-4 py-2 cc-input">
				</div>
				<div class="flex">
					<div class="flex flex-no-grow flex-col w-1/2 mr-10">
						<label class="text-xs this-black py-2">EXPIRATION DATE</label>
						<input type="tel" maxlength="7" id="cc_expiry" name="cc_expiry" class="border rounded-sm p-4 py-2 cc-input" placeholder="_ _  / _ _">
					</div>
					<div class="flex flex-no-grow flex-col w-1/3">
						<label class="text-xs this-black py-2">CVC</label>
						<input type="tel" maxlength="4" id="cvc" name="cvc" class="border rounded-sm p-4 py-2 cc-input" placeholder="_ _ _">
					</div>
				</div>
				<button class="font-bold text-lg text-white rounded-sm px-8 py-3 pb-4 my-5 mb-6" style="background: #297CD9;">Pay MYR{{ number_format($total, 2) }}</button>
			</div>
			<div>
			</div>
			<input type="hidden" name="MerchantCode" value="M15551">
			<input type="hidden" name="PaymentId" value="">
			<input type="hidden" name="RefNo" value="{{ $refno }}">
			<input type="hidden" name="Amount" value="1.00">
			<input type="hidden" name="Currency" value="MYR">
			<input type="hidden" name="ProdDesc" value="{{ $name }}">
			<input type="hidden" name="UserName" value="{{ $customer['name'] }}">
			<input type="hidden" name="UserEmail" value="{{ $customer['email'] }}">
			<input type="hidden" name="UserContact" value="{{ $customer['phone_number'] }}">
			<input type="hidden" name="Remark" value="">
			<input type="hidden" name="Lang" value="UTF-8">
			<input type="hidden" name="SignatureType" value="SHA256">
			<input type="hidden" name="Signature" value="{{ $signature }}">
			<input type="hidden" name="ResponseURL"
			value="https://go.policystreet.com/payment/response">
			<input type="hidden" name="BackendURL"
			value="https://go.policystreet.com/payment/backend">
		</form>
	</div>
	<div class="flex flex-col w-full px-12 md:px-0" style="background: #F8FCFF;">
		<div>
			<img src="/images/family.png">
		</div>
		<div class="flex flex-col md:mx-24 my-8">
			<p class="text-2xl font-bold" style="color:#0A3C77;">{{ $name }}</p>
			<div class="flex pt-3">
				<p class="text-xs w-full" style="color:#487BB8;">Travel Insurance</p>
				<p class="text-base font-bold" style="color:#0A3C77;">MYR{{ number_format($premiums, 2) }}</p>
			</div>
			<div class="line-break my-8"></div>
			<div class="flex">
				<p class="text-base font-bold w-full" style="color:#0A3C77;">No. of Travellers</p>
				<p class="text-base font-bold" style="color:#487BB8;">x{{ $pax }}</p>
			</div>
			<div class="flex">
				<p class="text-base font-bold w-full" style="color:#0A3C77;">Travelling Day(s)</p>
				<p class="text-base font-bold" style="color:#487BB8;">{{ $travelling_days }}</p>
			</div>
			<div class="flex pt-3">
				<p class="text-base font-bold w-full" style="color:#0A3C77;">Subtotal</p>
				<p class="text-base font-bold" style="color:#487BB8;">MYR{{ number_format($total, 2) }}</p>
			</div>
			<div class="line-break my-8"></div>
			<div class="flex">
				<p class="text-lg font-bold w-full" style="color:#0A3C77;">Total</p>
				<p class="text-xl font-bold" style="color:#0071FF;">MYR{{ number_format($total, 2) }}</p>
			</div>
		</div>
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
	$("#cc_no").focus();
	$("#cc_no").payment('formatCardNumber');
	$("#cc_expiry").payment('formatCardExpiry');
	$("#cvc").payment('formatCardCVC');
});
</script>
@endsection

