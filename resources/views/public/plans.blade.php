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
<p class="font-bold this-black text-4xl m-8 text-center">{{ sizeof($available_plans) }} Plans Found</p>
<form class="container mx-auto flex justify-between flex-wrap" method="POST" action="{{ route('traveller-info') }}" id="planForm">
	@csrf
	<input type="hidden" name="pax" value="{{ $pax }}">
	<input type="hidden" name="travelling_days" value="{{ $travelling_days }}">
	<input type="hidden" name="destination" value="{{ $destination }}">
	<input type="hidden" name="plan" id="plan">
	@foreach($available_plans as $key => $plan)
	<div class="bg-white rounded shadow-1 my-6">
		<div class="mx-6 my-6 text-center">
			<img src="/images/allianz-logo.png" class="p-2">
			<p class="this-black text-2xl font-bold break-words w-64 mx-auto">{{ $plan['name'] }}</p>
			<div class="flex justify-center content-start pt-8">
				<span class="font-bold this-black currency pt-4">RM</span>
				<p class="font-bold this-black price-tag">{{ $plan['premiums'] }}</p>
			</div>
			<p class="this-black text-2xl">{{ $travelling_days > 1 ? "for ".$travelling_days." days" : "per trip" }}</p>
			<div class="flex pt-16 justify-between text-left">
				<p class="px-4">Death & disability <br>protection</p>
				<p class="px-4 font-bold text-blue">Lump Sum of <br> RM{{ number_format($plan['benefits']['death']) }}</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Medical <br> Expenses</p>
				<p class="px-4 font-bold text-blue"><?php echo $plan['benefits']['medical'] == "Unlimited" ? "Unlimited" : "Reimburse up<br> to RM".number_format($plan['benefits']['medical']) ?></p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Cancelled <br> Trip</p>
				<p class="px-4 font-bold text-blue"><?php echo $plan['benefits']['tripcancel'] == "Unlimited" ? "Unlimited" : "Reimburse up<br> to RM".number_format($plan['benefits']['tripcancel']) ?></p>
			</div>
			<div class="flex flex-col">
				<button class="blue-btn pb-4 py-2 text-xl mt-12 mx-10 selectPlan" data-key="{{ $key }}">Select Plan</button>
				<button class="bg-transparent border-2 border-blue pb-4 py-2 text-xl mt-4 mx-10 info-btn this-black">More Info</button>
			</div>
		</div>
	</div>
	@endforeach
</form>
@endsection


@section('script')
<script>
$(document).ready(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$(".selectPlan").click(function(){
		var plan = this.getAttribute('data-key');
		$("#plan").val(plan);
		$("#planForm").submit();
	});
});
</script>
@endsection

