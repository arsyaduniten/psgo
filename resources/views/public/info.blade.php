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
<form class="hidden" method="POST" action="{{ route('traveller-info') }}" id="planForm">
	@csrf
	<input type="hidden" name="pax" value="{{ $planinfos['pax'] }}">
	<input type="hidden" name="travelling_days" value="{{ $planinfos['travelling_days'] }}">
	<input type="hidden" name="destination" value="{{ $planinfos['destination'] }}">
	<input type="hidden" name="plan" id="plan" value="{{ $planinfos['key'] }}">
	<input type="hidden" name="name" value="{{ $planinfos['name'] }}">
	<input type="hidden" name="premiums" value="{{ $planinfos['premiums'] }}">
	<input type="hidden" name="death" value="{{ $planinfos['benefit_death_adult'] }}">
	<input type="hidden" name="medical" value="{{ $planinfos['benefit_medical_adult'] }}">
	<input type="hidden" name="tripcancel" value="{{ $planinfos['benefit_tripcancel'] }}">
</form>
<div class="container mx-auto flex shadow-1 flex-col">
	<button onclick="window.history.back();" class="p-4 bg-blue-dark text-white no-underline text-center flex justify-between"><i class="fas fa-arrow-left mx-2"></i><span>Choose a different plan</span></button>
	<div class="flex header-bg">
		<div class="logo header-bg">
			<img class="p-6 px-12" src="/images/allianz-logo.png">
		</div>
		<div class="border bg-transparent border-grey-light shadow-1 my-4"></div>
		<div class="flex-1 plan-name header-bg">
			<p class="p-6 this-black font-bold text-xl">{{ $planinfos['name'] }}</p>
		</div>
	</div>
	<div class="flex">
		<div class="nav-bg text-center md:w-1/6 flex flex-col py-4">
			<button class="blue-btn border-2 border-blue pb-4 py-2 my-2 mt-4 mx-10 nav-btn" data-id="death-disability">Death &<br>Disability</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn" data-id="medical-expenses">Medical<br>Expenses</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn" data-id="other-medical">Other Life<br>/Medical</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn" data-id="itinerary-bookings">Itinerary<br>/Bookings</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn" data-id="personal-belongings">Personal<br>Belongings</button>
			<button class="bg-transparent border-2 border-blue pb-4 py-2 my-2 mx-10 info-btn this-black nav-btn" data-id="personal-liability">Personal<br>Liability</button>
		</div>
		<div class="qa-section flex-1" id="medical-expenses">
			@if($planinfos['benefit_medical_adult'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidents, Sickness and Injury Treatments (Adult)</p>
				<p class="text-lg this-black">{{ is_numeric($planinfos['benefit_medical_adult']) ? "Lump Sum of RM".number_format($planinfos['benefit_medical_adult']) :  $planinfos['benefit_medical_adult']}}</p>
			</div>
			@endif
			@if($planinfos['benefit_medical_sc'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidents, Sickness and Injury Treatments (Senior Citizen)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_medical_sc']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_medical_child'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidents, Sickness and Injury Treatments (Child)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_medical_child']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_med_fam'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidents, Sickness and Injury Treatments (Family)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_med_fam']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_emergencyevacuation'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Emergency Medical Evacuation</p>
				<p class="text-lg this-black">{{ is_numeric($planinfos['benefit_emergencyevacuation']) ? "Lump Sum of RM".number_format($planinfos['benefit_emergencyevacuation']) :  $planinfos['benefit_emergencyevacuation']}}</p>
			</div>
			@endif
			@if($planinfos['benefit_emergencyrepatriation'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Emergency Medical Repatriation</p>
				<p class="text-lg this-black">{{ is_numeric($planinfos['benefit_emergencyrepatriation']) ? "Lump Sum of RM".number_format($planinfos['benefit_emergencyrepatriation']) :  $planinfos['benefit_emergencyrepatriation']}}</p>
			</div>
			@endif
			@if($planinfos['benefit_followup'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Follow-up Treatment back Home</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_followup']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_hospincome'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Hospital Allowance</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_hospincome']) }}</p>
			</div>
			@endif
		</div>
		<div class="qa-section flex-1" id="death-disability">
			@if($planinfos['benefit_death_adult'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidental Death (Adult)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_death_adult']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_death_sc'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidental Death (Senior Citizen)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_death_sc']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_death_child'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidental Death (Child)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_death_child']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_death_fam'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Accidental Death (Family)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_death_fam']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_pd_adult'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Total Disability (Adult)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_pd_adult']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_pd_sc'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Total Disability (Senior Citizen)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_pd_sc']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_pd_child'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Total Disability (Child)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_pd_child']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_pd_fam'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Total Disability (Family)</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_pd_fam']) }}</p>
			</div>
			@endif
		</div>
		<div class="qa-section flex-1" id="other-medical">
			@if($planinfos['benefit_compcare'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Compassionate Visit</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_compcare']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_childcare'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Child Care</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_childcare']) }}</p>
			</div>
			@endif
		</div>
		<div class="qa-section flex-1" id="itinerary-bookings">
			@if($planinfos['benefit_tripcancel'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Cancelled Trip</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_tripcancel']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_tripcurtail'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Interrupted Trip</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_tripcurtail']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_traveldelay'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Delayed Trip</p>
				<p class="text-lg this-black">{{ is_numeric($planinfos['benefit_traveldelay']) ? "Lump Sum of RM".number_format($planinfos['benefit_traveldelay']) : $planinfos['benefit_traveldelay'] }}</p>
			</div>
			@endif
			@if($planinfos['benefit_misseddept'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Missed Departure</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_misseddept']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_missedconnection'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Missed Travel Connection</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_missedconnection']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_traveloverbook'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Overbooked Flight</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_traveloverbook']) }}</p>
			</div>
			@endif
		</div>
		<div class="qa-section flex-1" id="personal-belongings">
			@if($planinfos['benefit_personaleffects'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lost Bags and Belongings</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_personaleffects']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_traveldocs'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Lost Passport and Other Important Documents</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_traveldocs']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_personalmoney'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Loss of Personal Money</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_personalmoney']) }}</p>
			</div>
			@endif
			@if($planinfos['benefit_luggagedelay'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">Overseas Baggage Delay</p>
				<p class="text-lg this-black">Lump Sum of RM{{ number_format($planinfos['benefit_luggagedelay']) }}</p>
			</div>
			@endif
		</div>
		<div class="qa-section flex-1" id="personal-liability">
			@if($planinfos['benefit_personalliability'] != 'NA')
			<div class="qa m-6">
				<p class="text-blue-darker font-bold text-lg">If Someone Makes a Claim Against You</p>
				<p class="text-lg this-black">{{ is_numeric($planinfos['benefit_personalliability']) ? "Lump Sum of RM".number_format($planinfos['benefit_personalliability']) : "Lump Sum of RM".$planinfos['benefit_personalliability'] }}</p>
			</div>
			@endif
		</div>
		<div class="flex-initial pricing mx-24">
			<div class="flex flex-col">
				<div class="flex justify-center content-start pt-8">
					<span class="font-bold this-black currency pt-4">RM</span>
					<p class="font-bold this-black price-tag">{{ $planinfos['premiums'] * $planinfos['pax'] }}</p>
					<span class="font-bold this-black text-2xl self-end pb-2 px-2">/ trip</span>
				</div>
				<span class="font-bold this-black text-2xl self-center pb-2 px-2">for {{ $planinfos['pax'] }} person</span>
			</div>
			<button class="whatsapp-btn px-12 py-4 m-6 text-xl text-blue-darker" id="selectPlan">Buy Now</button>
		</div>
	</div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){
	$(".qa-section").each(function(){
		$(this).hide();
	});
	$("#death-disability").show();
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
	$("#selectPlan").click(function(e){
		e.preventDefault();
		blurAll();
		$("#planForm").submit();
	});
});

function blurAll(){
	$( "*" ).not( "#loader , body, head, html, svg, rect").addClass('blur');
	$("#loader").removeClass('hidden');
}
</script>
@endsection

