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
<p class="font-bold this-black text-4xl m-8 text-center">3 plans found</p>
<div class="container mx-auto flex justify-between">
	
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){
	
});
</script>
@endsection

