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
<div class="container mx-auto flex shadow-1 flex-col">
	<div class="flex header-bg">
		<div class="logo header-bg">
			<img class="p-6 px-12" src="/images/allianz-logo.png">
		</div>
		<div class="border bg-transparent border-grey-light shadow-1 my-4"></div>
		<div class="flex-1 plan-name header-bg">
			<p class="p-6 this-black font-bold text-xl">{{ $plan['name'] }}</p>
		</div>
	</div>
	<div class="flex bg-white">
		<div class="header-bg text-center md:w-1/6 flex flex-col py-4" id="nav-tabs">
			@foreach(range(1,$pax) as $p)
			<button class="bg-transparent pb-4 py-2 mt-4 mx-10 info-btn this-black nav-btn" traveller-id="traveller-{{ $p }}" id="traveller-btn-{{ $p }}"><i class="text-blue-lighter fas fa-user"></i><span class="px-4">{{ $p }}</span></button>
			@endforeach
			<!-- <button class="bg-transparent text-blue-darker hover:text-white pb-4 py-2 mt-4 mx-10 info-btn" traveller-id="traveller-{{ $p }}" id="add-new"><i class="fas fa-plus pt-1"></i></span></button> -->
			<!-- <button class="blue-btn pb-4 py-2 my-2 mt-4 mx-10 nav-btn" data-id="death-disability">Traveller 2</button> -->
		</div>
		<form method="POST" action="{{ route('traveller-create') }}" class="form flex flex-col bg-white" id="mainForm">
			@csrf
			@foreach(range(1,$pax) as $p)
			<div id="traveller-{{ $p }}" class="hidden traveller-form m-4">
				<p class="text-xl this-black font-bold px-4 pt-2">Traveller {{ $p }} Information</p>
				<div class="flex">
					<div class="flex-1 flex flex-col p-4">
						<label class="py-2">Name <span class="text-grey-dark italic">(as per ID)</span><span class="text-red p-2">*</span></label>
						<input type="text" name="name[]" data-id="name" class="px-2 p-2 border border-grey-dark">
						<span class="text-sm text-red m-1 hidden" id="name-label">* This field is required</span>
					</div>
					<div class="flex flex-col p-4">
						<label class="py-2">ID Type and Number<span class="text-red p-2">*</span></label>
						<div class="flex border border-grey-dark">
							<div class="flex border-r border-grey-dark rounded-none p-2">
								<select name="id_type[]" class="bg-transparent" id="id-type-select">
								  <option value="ic">IC</option>
								  <option value="passport">Passport</option>
								</select>
								<i class="fas fa-chevron-down" id="id-type-arrow"></i>
							</div>
							<input type="text" name="id_number[]" data-id="id" class="px-2 p-2">
						</div>
						<span class="text-sm text-red m-1 hidden" id="id-label">* This field is required</span>
					</div>
				</div>
				<div class="flex -my-6">
					<div class="flex-1 flex flex-col p-4">
						<label class="py-2">Email<span class="text-red p-2">*</span></label>
						<input type="text" name="email[]" data-id="email" class="px-2 p-2 border border-grey-dark">
						<span class="text-sm text-red m-1 hidden" id="email-label">* This field is required</span>
					</div>
					<div class="flex-1 flex flex-col p-4">
						<label class="py-2">Contact Number<span class="text-red p-2">*</span></label>
						<div class="flex border border-grey-dark">
							<button class="px-2 p-2 border-r border-grey-dark" disabled>+60</button>
							<input type="text" name="phone_number[]" data-id="phone" class="px-2 p-2">
						</div>
						<span class="text-sm text-red m-1 hidden" id="phone-label">* This field is required</span>
					</div>
				</div>
				<div class="flex -my-6">
					<div class="flex-1 flex flex-col p-4">
						<label class="py-2">Nationality<span class="text-red p-2">*</span></label>
						<select class="px-2 p-2 border border-grey-dark rounded-none bg-white" name="nationality[]">
							<option value="my">Malaysia</option>
							<option value="sg">Singapore</option>
						</select>
						<span class="text-sm text-red m-1 hidden" id="nationality-label">* This field is required</span>
					</div>
					<div class="flex-1 flex flex-col p-4">
						<label class="py-2">Date of Birth<span class="text-red p-2">*</span></label>
						<input type="date" name="dob[]" data-id="dob" class="px-2 p-1 border border-grey-dark">
						<span class="text-sm text-red m-1 hidden" id="dob-label">* This field is required</span>
					</div>
					<div class="flex-1 flex flex-col p-4">
						<label class="py-2">Gender<span class="text-red p-2">*</span></label>
						<select class="px-2 p-2 border border-grey-dark rounded-none bg-white" name="gender[]">
							<option value="0">Male</option>
							<option value="1">Female</option>
						</select>
					</div>
				</div>
				<div class="flex -my-6">
					<div class="flex-auto flex flex-col p-4">
						<label class="py-2">Address 1<span class="text-red p-2">*</span></label>
						<input type="text" name="address_1[]" data-id="address" class="px-2 p-2 border border-grey-dark">
						<span class="text-sm text-red m-1 hidden" id="address-label">* This field is required</span>
					</div>
					<div class="flex-auto flex flex-col p-4">
						<label class="py-2">Address 2</label>
						<input type="text" name="address_2[]" class="px-2 p-2 border border-grey-dark">
					</div>
				</div>
				<div class="flex -my-6">
					<div class="flex flex-col p-4">
						<label class="py-2">Postcode<span class="text-red p-2">*</span></label>
						<input type="text" name="postcode[]" data-id="postcode" class="px-2 p-2 border border-grey-dark">
						<span class="text-sm text-red m-1 hidden" id="postcode-label">* This field is required</span>
					</div>
					<div class="flex flex-col p-4">
						<label class="py-2">City<span class="text-red p-2">*</span></label>
						<input type="text" name="city[]" data-id="city" class="px-2 p-2 border border-grey-dark">
						<span class="text-sm text-red m-1 hidden" id="city-label">* This field is required</span>
					</div>
					<input type="hidden" name="key" value="{{ $plan['key'] }}">
					<div class="flex flex-col p-4">
						<label class="py-2">State<span class="text-red p-2">*</span></label>
						<select class="px-2 p-2 border border-grey-dark rounded-none bg-white" name="state[]">
							<option value="wp">Wilayah Persekutuan</option>
							<option value="selangor">Selangor</option>
						</select>
						<span class="text-sm text-red m-1 hidden" id="name-label">* This field is required</span>
					</div>
				</div>
				<div class="flex my-6 mx-2">
					@if($p != 1)
					<a class="bg-transparent px-4 cursor-pointer pb-5 pt-4 info-btn this-black next-btn mx-2" traveller-id="traveller-{{ $p - 1 }}" btn-id="{{ $p - 1 }}">Previous: Traveller {{ $p - 1 }}</a>
					@endif
					@if($p < $pax)
					<a class="bg-transparent px-4 cursor-pointer pb-5 pt-4 info-btn this-black next-btn mx-2" traveller-id="traveller-{{ $p + 1 }}" btn-id="{{ $p + 1 }}">Next: Traveller {{ $p + 1 }}</a>
					@else
					<button type="submit" id="submit-btn" class="flex bg-blue-dark shadow-md px-4 cursor-pointer pb-5 pt-4 this-white next-btn mx-2 font-bold"><span class="w-full px-4">Proceed Payment</span><i class="fas fa-arrow-right"></i></button>
					@endif
				</div>
			</div>
			@endforeach
			<input type="hidden" name="pax" value="{{ $pax }}">
			<input type="hidden" name="travelling_days" value="{{ $travelling_days }}">
			<input type="hidden" name="destination" value="{{ $destination }}">
			<input type="hidden" name="plan" value="{{ $plan['key'] }}">
			<input type="hidden" name="name" value="{{ $plan['name'] }}">
			<input type="hidden" name="premiums" value="{{ $plan['premiums'] }}">
		</form>
		<div class="w-full pricing mx-12 my-6 border-2 border-blue bg-white rounded bg-inherit p-4">
			<p class="text-blue text-sm font-bold">Plan Selected</p><br>
			<p class="flex this-black text-3xl font-bold -mt-5 items-center"><span class="pr-2">{{ $plan['name'] }}</span><img src="/images/tick.png" class=""></p>
			<div class="flex pt-10 justify-between text-left">
				<p class="px-4">Death & disability <br>protection</p>
				<p class="px-4 font-bold text-blue">Lump Sum<br> RM{{ number_format($plan['benefits']['death']) }}</p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Medical <br> Expenses</p>
				<p class="px-4 font-bold text-blue"><?php echo $plan['benefits']['medical'] == "Unlimited" ? "Unlimited" : "Reimburse up<br> to RM".number_format($plan['benefits']['medical']) ?></p>
			</div>
			<div class="flex pt-6 justify-between text-left">
				<p class="px-4">Cancelled <br> Trip</p>
				<p class="px-4 font-bold text-blue"><?php echo $plan['benefits']['tripcancel'] == "Unlimited" ? "Unlimited" : "Reimburse up<br> to RM".number_format($plan['benefits']['tripcancel']) ?></p>
			</div>
			<div class="flex justify-center content-start pt-8">
				<span class="font-bold this-black currency pt-4">RM</span>
				<p class="font-bold this-black price-tag">{{ $plan['premiums'] }}</p>
				<!-- <span class="font-bold this-black text-2xl self-end pb-2 px-2">/ trip</span> -->
			</div>
			<p class="this-black text-xl text-center">{{ $travelling_days > 1 ? "for ".$travelling_days." days" : "per trip" }}</p>
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
	$("#traveller-1").removeClass("hidden");
	$("#traveller-btn-1").removeClass("bg-transparent this-black").addClass("blue-btn");
	$(".nav-btn").click(function(e){
		var exit;
		$(':input').each(function(){
			if($(this).val() == ""){
				$("#"+$(this).attr('data-id')+"-label").removeClass('hidden');
				exit = true;
			}
		});
		if(exit){
			return;
		}
		$(".traveller-form").each(function(){
			$(this).addClass('hidden');
		});
		$("#"+$(this).attr('traveller-id')).removeClass('hidden');
		// $(".qa-section").each(function(){
		// 	$(this).hide();
		// });
		$(".nav-btn").each(function(){
			$(this).removeClass("blue-btn");
			$(this).addClass("info-btn this-black bg-transparent");
		});
		$(this).addClass("blue-btn");
		$(this).removeClass("info-btn this-black bg-transparent");
		var el = "#" + $(this).attr("data-id");
		$(el).show();
	});

	$(".next-btn").click(function(e){
		var exit;
		$(':input').each(function(){
			if($(this).val() == ""){
				$("#"+$(this).attr('data-id')+"-label").removeClass('hidden');
				exit = true;
			}
		});
		if(exit){
			return;
		}
		$(".traveller-form").each(function(){
			$(this).addClass('hidden');
		});
		$("#"+$(this).attr('traveller-id')).removeClass('hidden');
		$(".nav-btn").each(function(){
			$(this).removeClass("blue-btn");
			$(this).addClass("info-btn this-black bg-transparent");
		});
		$("#traveller-btn-"+$(this).attr('btn-id')).addClass("blue-btn");
		$("#traveller-btn-"+$(this).attr('btn-id')).removeClass("info-btn this-black bg-transparent");
	});

	$("#submit-btn").click(function(e){
		e.preventDefault();
		var exit;
		$(':input').each(function(){
			if($(this).val() == ""){
				$("#"+$(this).attr('data-id')+"-label").removeClass('hidden');
				exit = true;
			}
		});
		if(exit){
			return;
		}
		blurAll();
		$("#mainForm").submit();
	});

});
</script>
@endsection

