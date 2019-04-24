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

<div class="container mx-auto flex flex-col mt-12">
	<p class="text-3xl this-black font-bold text-center">Protect <span class="this-blue">yourself</span> and your <span class="this-blue">loved ones</span> while you are travelling<br> with the most affordable Travel Insurance in Malaysia</p>
	<a class="mx-auto no-underline" href="/">
		<div class="flex mt-6 mx-auto">
			<svg width="191px" height="156px" viewBox="0 0 191 156" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <defs>
			        <linearGradient x1="0%" y1="0%" x2="135.394258%" y2="143.858314%" id="linearGradient-1">
			            <stop stop-color="#FFFFFF" stop-opacity="0.998131793" offset="0%"></stop>
			            <stop stop-color="#000000" stop-opacity="0.499207428" offset="100%"></stop>
			        </linearGradient>
			        <path d="M75.4100743,156 L12,156 C5.372583,156 8.11624501e-16,150.627417 0,144 L0,12 C-8.11624501e-16,5.372583 5.372583,4.65912813e-15 12,3.44169138e-15 L75,3.44169138e-15 C75,11.045695 84.1781626,20 95.5,20 C106.821837,20 116,11.045695 116,3.44169138e-15 L191,3.44169138e-15 L191,156 L115.589926,156 C113.690517,146.871039 105.417727,140 95.5,140 C85.5822726,140 77.3094826,146.871039 75.4100743,156 Z" id="path-2"></path>
			    </defs>
			    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <g id="axa-smarttraveller" transform="translate(-222.000000, -506.000000)">
			            <g id="Discount-Percentage" transform="translate(222.000000, 506.000000)">
			                <g>
			                    <g id="Combined-Shape">
			                        <use fill="#0A3C77" xlink:href="#path-2"></use>
			                        <use fill="url(#linearGradient-1)" style="mix-blend-mode: soft-light;" xlink:href="#path-2"></use>
			                    </g>
			                    <text id="%" font-family="ClearSans-Bold, Clear Sans" font-size="24" font-weight="bold" letter-spacing="-0.7104" fill="#FBFBFB">
			                        <tspan x="141.181372" y="59">%</tspan>
			                    </text>
			                    <text id="25" font-family="ClearSans-Bold, Clear Sans" font-size="80" font-weight="bold" letter-spacing="-2.368002" fill="#FBFBFB">
			                        <tspan x="51.336752" y="98">25</tspan>
			                    </text>
			                    <text id="Discount" font-family="ClearSans, Clear Sans" font-size="16" font-weight="normal" letter-spacing="-0.4735999" fill="#FBFBFB">
			                        <tspan x="66.4998683" y="126">Discount</tspan>
			                    </text>
			                </g>
			            </g>
			        </g>
			    </g>
			</svg>
			<div class="promotion-banner flex">
				<div class="price-section flex">
					<p class="py-8 px-4 text-xl this-white">As low as</p>
					<div class="flex flex-col py-4 px-4 pr-8 this-white">
						<div class="pricing-container flex p-2 justify-center">
							<div class="text-xs">RM</div>
							<div class="text-5xl font-bold -mt-3">12</div>
						</div>
						<p class="font-bold text-xl text-center pt-2 line-through text-yellow-dark"><span class="text-white">RM 16</span></p>
						<p class="font-bold text-center pt-2 text-white">
							<span class="text-yellow-dark line-through">
								<span class="text-white">RM 10</span>
							</span>
							Stamp Duty Fee
						</p>
					</div>
				</div>
				<div class="counter-section flex flex-col items-center px-6">
					<img src="/images/clock.png" class="mx-4 my-2">
					<p class="this-white"><span class="font-bold text-xl" id="bold-days" style="color:#FFC360;"></span> left at this price!</p>
					<div class="countdown flex mt-2">
						<div class="flex flex-col content-center px-2">
							<div class="p-2 rounded text-center font-bold countdown-block" style="color:#E3F0FF;" id="days"></div>
							<p class="this-white">Days</p>
						</div>
						<div class="flex flex-col px-2">
							<div class="p-2 rounded text-center font-bold countdown-block" style="color:#E3F0FF;" id="hours"></div>
							<p class="this-white">Hours</p>
						</div>
						<div class="flex flex-col px-2">
							<div class="p-2 rounded text-center font-bold countdown-block" style="color:#E3F0FF;" id="minutes"></div>
							<p class="this-white">Minutes</p>
						</div>
						<div class="flex flex-col px-2">
							<div class="p-2 rounded text-center font-bold countdown-block" style="color:#E3F0FF;" id="seconds"></div>
							<p class="this-white">Seconds</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</a>
	<div class="product-banner flex flex-col mt-6 px-6 mx-auto shadow-md">
		<p class="font-bold text-2xl px-4 pt-4 pb-1" style="color:#E3F0FF;">AXA Smart Traveller</p>
		<p class="text-white px-4">What makes AXA Smart Traveller one of the most popular travel insurance in town?</p>
		<div class="flex">
			<div class="flex flex-col">
				<div class="flex p-8 items-center">
					<img src="/images/money.png">
					<p class="this-white font-bold leading-normal px-4">Classic Plan is Most Basic<br> and Affordable</p>
				</div>
				<div class="flex px-8 items-center">
					<img class="pl-2" src="/images/guarantee.png">
					<p class="this-white font-bold leading-normal px-6">ENTRY AGE - 30 days old<br>LAST ENTRY AGE - 79 yrs old</p>
				</div>
			</div>
			<div class="flex flex-col">
				<div class="flex p-8 items-center">
					<img src="/images/invoice.png">
					<p class="this-white font-bold px-4">Medical Expenses Reimburse<br>Up to <span class="text-xl" style="color:#FFC360;">RM 300,000</span></p>
				</div>
				<div class="flex px-8 items-center">
					<img class="" src="/images/secure.png">
					<p class="this-white font-bold px-5">Accidental Death/Disability<br>Lump Sum Payout of <span class="text-xl" style="color:#FFC360;">RM 300,000</span></p>
				</div>
			</div>
		</div>
		<div class="text-right">
			<img class="p-4 -mx-5" src="/images/axa-logo.png">
		</div>
	</div>
	<a class="text-4xl font-bold mx-auto antialiased pt-4" style="color:#0071FF;" href="/">Get Offer Now</a>
</div>

@endsection


@section('script')
<script>
$(document).ready(function(){
	var countDownDate = new Date();
	countDownDate.setDate( countDownDate.getDate() + 7 );
	countDownDate = countDownDate.getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

		// Get todays date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Output the result in an element with id="demo"
		$("#days").text(days);
		$("#bold-days").text(days + " Days");
		$("#hours").text(hours);
		$("#minutes").text(minutes);
		$("#seconds").text(seconds);

		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			$("#bold-days").text('0');
			$("#days").text('0');
			$("#hours").text('0');
			$("#minutes").text('0');
			$("#seconds").text('0');
		}
	}, 1000);
});

function blurAll(){
	$( "*" ).not( "#loader , body, head, html, svg, rect").addClass('blur');
	$("#loader").removeClass('hidden');
}
</script>
@endsection

