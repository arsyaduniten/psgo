@extends('base')
@section('gtag')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139047120-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139047120-1');
</script>
@endsection

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
<div class="flex m-4 px-16 py-4">
	<div class="flex-auto text-center md:text-left">
		<img class="" src="/images/pslogo@1x.png">
	</div>
</div>
<div class="container mx-auto flex flex-col mt-12">
	<p class="text-xl md:text-3xl this-black font-bold text-center">Protect <span class="this-blue">yourself</span> and your <span class="this-blue">loved ones</span> while you are travelling<br> with the most affordable Travel Insurance in Malaysia</p>
		<div class="flex md:flex-row mt-6 mx-auto">
			<svg width="191px" height="156px" viewBox="0 0 191 156" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <defs>
			        <linearGradient x1="0%" y1="0%" x2="135.394258%" y2="143.858314%" id="linearGradient-1">
			            <stop stop-color="#FFFFFF" stop-opacity="0.998131793" offset="0%"></stop>
			            <stop stop-color="#000000" stop-opacity="0.499207428" offset="100%"></stop>
			        </linearGradient>
			        <path d="M116,0 L191,0 L191,156 L116,156 C116,144.954305 106.821837,136 95.5,136 C84.1781626,136 75,144.954305 75,156 L12,156 C5.372583,156 8.11624501e-16,150.627417 0,144 L0,12 C-8.11624501e-16,5.372583 5.372583,1.21743675e-15 12,0 L75,0 C75,11.045695 84.1781626,20 95.5,20 C106.821837,20 116,11.045695 116,5.46065928e-12 Z" id="path-2"></path>
			    </defs>
			    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <g id="axa-smarttraveller" transform="translate(-222.000000, -506.000000)">
			            <rect fill="#FFFFFF" x="0" y="0" width="1024" height="887"></rect>
			            <g id="Discount-Percentage" transform="translate(222.000000, 506.000000)">
			                <g>
			                    <g id="Combined-Shape">
			                        <use fill="#93C5FB" xlink:href="#path-2"></use>
			                        <use fill="url(#linearGradient-1)" style="mix-blend-mode: soft-light;" xlink:href="#path-2"></use>
			                    </g>
			                    <g id="Group" transform="translate(12.000000, 7.000000)" stroke-width="3">
			                        <rect id="Rectangle" stroke="#D0021B" opacity="0.93" transform="translate(5.533238, 32.533238) rotate(-327.000000) translate(-5.533238, -32.533238) " x="3.03323841" y="30.0332384" width="5" height="5"></rect>
			                        <rect id="Rectangle" stroke="#D0021B" opacity="0.76" transform="translate(75.085221, 21.968920) rotate(-46.000000) translate(-75.085221, -21.968920) " x="73.085221" y="19.9689205" width="4" height="4"></rect>
			                        <rect id="Rectangle" stroke="#D0021B" opacity="0.91" transform="translate(121.955838, 20.642209) rotate(-221.000000) translate(-121.955838, -20.642209) " x="118.955838" y="17.6422086" width="6" height="6"></rect>
			                        <rect id="Rectangle" stroke="#D0021B" opacity="0.91" transform="translate(13.348459, 99.511607) rotate(-221.000000) translate(-13.348459, -99.511607) " x="10.3484587" y="96.5116067" width="6" height="6"></rect>
			                        <circle id="Oval" stroke="#0A3C77" opacity="0.78" transform="translate(158.403249, 10.277360) rotate(-41.000000) translate(-158.403249, -10.277360) " cx="158.403249" cy="10.2773596" r="5"></circle>
			                        <circle id="Oval" stroke="#0A3C77" opacity="0.78" transform="translate(34.053843, 130.053843) rotate(-41.000000) translate(-34.053843, -130.053843) " cx="34.053843" cy="130.053843" r="5"></circle>
			                        <polygon id="Star" stroke="#F5A623" opacity="0.72" transform="translate(25.950917, 62.411673) rotate(-286.000000) translate(-25.950917, -62.411673) " points="25.9509174 64.6616735 23.3058837 66.0522499 23.8110402 63.1069617 21.6711631 61.021097 24.6284006 60.5913852 25.9509174 57.9116735 27.2734342 60.5913852 30.2306717 61.021097 28.0907945 63.1069617 28.595951 66.0522499"></polygon>
			                        <polygon id="Star" stroke="#F5A623" opacity="0.82" transform="translate(158.017243, 70.017243) rotate(-26.000000) translate(-158.017243, -70.017243) " points="158.017243 72.2672434 155.37221 73.6578198 155.877366 70.7125316 153.737489 68.6266669 156.694727 68.1969551 158.017243 65.5172434 159.33976 68.1969551 162.296998 68.6266669 160.157121 70.7125316 160.662277 73.6578198"></polygon>
			                        <rect id="Rectangle" stroke="#765ECB" opacity="0.81" transform="translate(149.367816, 111.422028) rotate(-296.000000) translate(-149.367816, -111.422028) " x="146.367816" y="108.422028" width="6" height="6" rx="3"></rect>
			                        <rect id="Rectangle" stroke="#765ECB" opacity="0.94" transform="translate(24.950804, 11.879690) rotate(-17.000000) translate(-24.950804, -11.879690) " x="22.4508041" y="9.37968991" width="5" height="5" rx="2.5"></rect>
			                        <polygon id="Triangle" stroke="#EB5D6B" opacity="0.89" transform="translate(123.078030, 133.189393) rotate(-25.000000) translate(-123.078030, -133.189393) " points="123.07803 130.189393 126.07803 136.189393 120.07803 136.189393"></polygon>
			                    </g>
			                    <text id="%" font-family="ClearSans-Bold, Clear Sans" font-size="24" font-weight="bold" letter-spacing="-0.7104" fill="#0A3C77">
			                        <tspan x="141.181372" y="59">%</tspan>
			                    </text>
			                    <text id="25" font-family="ClearSans-Bold, Clear Sans" font-size="80" font-weight="bold" letter-spacing="-2.368002" fill="#0A3C77">
			                        <tspan x="51.336752" y="98">25</tspan>
			                    </text>
			                    <text id="Discount" font-family="ClearSans, Clear Sans" font-size="16" font-weight="bold" letter-spacing="-0.4735999" fill="#0A3C77">
			                        <tspan x="66.4998683" y="126">Discount</tspan>
			                    </text>
			                </g>
			            </g>
			        </g>
			    </g>
			</svg>
			<div class="promotion-banner flex">
				<div class="price-section flex items-center px-4">
					<div class="flex flex-col">
						<p class="py-2 px-4 text-xl this-white">As low as</p>
						<div class="flex flex-col py-2 px-4 pr-8 this-white">
							<div class="pricing-container flex p-2 justify-center">
								<div class="text-xs">RM</div>
								<div class="text-5xl font-bold -mt-3">12</div>
							</div>
						</div>
					</div>
					<div>
						<p class="font-bold text-center pt-1 text-3xl text-white">
							RM0 Stamp Duty Fee
						</p>
					</div>
				</div>
				<div class="counter-section flex flex-col items-center text-center px-6">
					<img src="/images/clock.png" class="mx-4 my-2 mb-0">
					<p class="this-white"><span class="font-bold text-xl" id="bold-days" style="color:#FFC360;"></span> left at this price!</p>
					<!-- <div class="countdown flex mt-2">
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
					</div> -->
					<a href="https://axa.idevaffiliate.com/idevaffiliate.php?id=103&url=2&tid1={{ Request::get('med') }}" class="affiliate-link shadow-md my-2 p-2 pb-3 px-12 font-bold text-xl no-underline action-btn">Get Offer Now</a>
				</div>
			</div>
		</div>
	<div class="product-banner flex flex-col mt-6 px-16 mx-auto shadow-md">
		<p class="-mx-12 font-bold text-2xl px-4 pt-4 pb-1" style="color:#E3F0FF;">AXA Smart Traveller</p>
		<p class="-mx-12 text-white px-4">What makes AXA Smart Traveller one of the most popular travel insurance in town?</p>
		<div class="flex flex-col md:flex-row">
			<div class="flex flex-col">
				<div class="flex p-8 items-center">
					<img src="/images/money.png">
					<p class="this-white font-bold md:leading-normal px-4">Classic Plan is Most Basic<br> and Affordable</p>
				</div>
				<div class="flex px-8 items-center">
					<img class="pl-2" src="/images/guarantee.png">
					<p class="this-white font-bold md:leading-normal px-6">ENTRY AGE - 30 days old<br>LAST ENTRY AGE - 79 yrs old</p>
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
			<img class="p-4 -mx-16" src="/images/axa-logo.png">
		</div>
	</div>
	<a class="text-4xl font-bold mx-auto antialiased py-12 affiliate-link" style="color:#0071FF;" href="https://axa.idevaffiliate.com/idevaffiliate.php?id=103&url=2&tid1={{ Request::get('med') }}">Get Offer Now</a>
</div>

@endsection


@section('script')
<script>
$(document).ready(function(){
	var today = new Date();
	blurAll();
	if(localStorage.countDownDate == null){
		var countDownDate = new Date();
		countDownDate.setDate( countDownDate.getDate() + 7 );
		countDownDate = countDownDate.getTime();
		localStorage.setItem("countDownDate", countDownDate);
	} else {
		var countDownDate = localStorage.countDownDate;
	}

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
		deBlur();
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

	$(".affiliate-link").click(function(e){
		e.preventDefault();
		blurAll();
		window.location.href = $(this).attr('href');
	});
});

function blurAll(){
	$( "*" ).not( "#loader , body, head, html, svg, rect").addClass('blur');
	$("#loader").removeClass('hidden');
}

function deBlur(){
	$( "*" ).not( "#loader , body, head, html, svg, rect").removeClass('blur');
	$("#loader").addClass('hidden');
}
</script>
@endsection

