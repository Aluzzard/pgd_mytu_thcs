<div class="UIAdvertisements">
	@foreach($advertisements->where('id',$id)->first as $advertisement)
		{!! $advertisement->content !!}
	@endforeach
</div>