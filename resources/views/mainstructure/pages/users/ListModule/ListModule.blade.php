@extends('mainstructure.layouts.admins.layout')
@section('title','Danh sách module')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div style="display: flow-root;">
			@if($list_modules)
				@foreach ($list_modules as $group_modules => $modules)
				<div class="row">
					<div class="col-lg-12">
						<h4>{{ $group_modules }}</h4>
					</div>
				    @foreach ($modules->sortBy('order') as $module)
				    	<?php $url = $module->controller; ?>
				        <a href="<?php echo route( $module->controller.'.get.'.'index' ); ?>" class="col-md-1 text-center py-3 d-flex-wrap">
			    			<img src="{{($module->avatar) ? ($module->avatar) : ('upload/icon/module/default.png')}}" width="50">
			    			<span>{{$module->name}}</span>
			    		</a>
				    @endforeach
				</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection

