<div class="UIAdvertisements">
	@if($advertisements->where('id', $id)->first())
	{!! $advertisements->where('id', $id)->first()->content !!}
	@endif
</div>