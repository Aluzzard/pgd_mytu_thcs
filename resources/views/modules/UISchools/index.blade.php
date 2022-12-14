@include('modules.UISchools.css')
<div class="UISchools">
	<div class="content">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="truong-mn-tab" data-bs-toggle="tab" data-bs-target="#truong-mn" type="button" role="tab" aria-controls="truong-mn" aria-selected="true">Trường Mầm non</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="truong-th-tab" data-bs-toggle="tab" data-bs-target="#truong-th" type="button" role="tab" aria-controls="truong-th" aria-selected="false">Trường Tiểu học</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="truong-thcs-tab" data-bs-toggle="tab" data-bs-target="#truong-thcs" type="button" role="tab" aria-controls="truong-thcs" aria-selected="false">Trường THCS</button>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="truong-mn" role="tabpanel" aria-labelledby="truong-mn-tab">
				<div class="row">
					@foreach($schools->where('category_id', 1) as $school)
					<div class="col-sm-6">
						<a href="{{ $school->slug }}" target="_blank">
							{{$school->name}}
						</a>
					</div>
					@endforeach
				</div>
				
			</div>
			<div class="tab-pane fade" id="truong-th" role="tabpanel" aria-labelledby="truong-th-tab">
				<div class="row">
					@foreach($schools->where('category_id', 2) as $school)
					<div class="col-sm-6">
						<a href="{{ $school->slug }}" target="_blank">
							{{$school->name}}
						</a>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="truong-thcs" role="tabpanel" aria-labelledby="truong-thcs-tab">
				<div class="row">
					@foreach($schools->where('category_id', 3) as $school)
					<div class="col-sm-6">
						<a href="{{ $school->slug }}" target="_blank">
							{{$school->name}}
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>