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
			<p class="p-6 this-black font-bold text-xl">{{ $plan['name'] }}</p>
		</div>
	</div>
	<div class="flex">
		<div class="nav-bg text-center md:w-1/6 flex flex-col py-4">
			@foreach(range(1,$pax) as $p)
			<button class="bg-transparent pb-4 py-2 mt-4 mx-10 info-btn this-black nav-btn" data-key="" id="traveller-btn-{{ $p }}">Traveller {{ $p }}</button>
			@endforeach
			<!-- <button class="blue-btn pb-4 py-2 my-2 mt-4 mx-10 nav-btn" data-id="death-disability">Traveller 2</button> -->
		</div>
		<form class="form flex flex-col" id="traveller-2">
			<div class="flex">
				<div class="flex-1 flex flex-col p-4">
					<label class="py-2">Name <span class="text-grey-dark italic">(as per ID)</span><span class="text-red p-2">*</span></label>
					<input type="text" name="name" class="px-6 p-2 border border-grey-dark">
				</div>
				<div class="flex flex-col p-4">
					<label class="py-2">ID Type and Number<span class="text-red p-2">*</span></label>
					<div class="flex border border-grey-dark">
						<select name="id_type" class="p-2 border-r border-grey-dark rounded-none">
						  <option value="ic">IC</option>
						  <option value="passport">Passport</option>
						</select>
						<input type="text" name="id_number" class="px-6 p-2">
					</div>
				</div>
			</div>
			<div class="flex -my-6">
				<div class="flex-1 flex flex-col p-4">
					<label class="py-2">Email<span class="text-red p-2">*</span></label>
					<input type="text" name="email" class="px-6 p-2 border border-grey-dark">
				</div>
				<div class="flex-1 flex flex-col p-4">
					<label class="py-2">Contact Number<span class="text-red p-2">*</span></label>
					<div class="flex border border-grey-dark">
						<button class="px-6 p-2 border-r border-grey-dark" disabled>+60</button>
						<input type="text" name="phone_number" class="px-6 p-2">
					</div>
				</div>
			</div>
			<div class="flex">
				<div class="flex-1 flex flex-col p-4">
					<label class="py-2">Nationality<span class="text-red p-2">*</span></label>
					<select class="px-6 p-2 border border-grey-dark rounded-none bg-white" name="nationality">
						<option value="my">Malaysia</option>
						<option value="sg">Singapore</option>
					</select>
				</div>
				<div class="flex-1 flex flex-col p-4">
					<label class="py-2">Date of Birth<span class="text-red p-2">*</span></label>
					<input type="date" name="dob" class="px-6 p-1 border border-grey-dark">
				</div>
				<div class="flex-1 flex flex-col p-4">
					<label class="py-2">Gender<span class="text-red p-2">*</span></label>
					<div>
						<button name="male" class="p-2 rounded-l border border-grey-dark">Male</button><button name="female" class="p-2 rounded-r border border-grey-dark border-l-none">Female</button>
					</div>
				</div>
			</div>
		</form>
		<div class="flex-1 pricing mx-12 my-2 border-2 border-blue rounded bg-inherit p-4">
			<p class="text-blue text-sm font-bold">Plan Selected</p><br>
			<p class="flex this-black text-3xl font-bold -mt-5 items-center justify-between"><span>Allianz Travel Care</span><img src="/images/tick.png" class=""></p>
			<div class="flex pt-16 justify-between text-left">
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

