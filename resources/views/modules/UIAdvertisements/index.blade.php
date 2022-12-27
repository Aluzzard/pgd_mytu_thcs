<div class="UIAdvertisements">
	@if($UIAdvertisements->where('id', $id)->first())
	{!! $UIAdvertisements->where('id', $id)->first()->content !!}
	@endif
</div>