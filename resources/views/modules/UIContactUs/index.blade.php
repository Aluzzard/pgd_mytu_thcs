<div class="UIContactUs">
	<div class="container">
		<div class="row">
			<div class="box col-md-6">
				<div class="heading"><span>Thông tin liên hệ</span></div>
				<div class="content-information">
					<div class="first">Liên hệ trực tiếp!</div>
					<div class="name">{{$information_website->name}}</div>
					<div class="address">Địa chỉ: {{$information_website->address}}</div>
					<div class="numberphone">Số điện thoại: {{$information_website->numberphone}}</div>
					<div class="email">Email: {{$information_website->email}}</div>
					<div class="last">Cám ơn quý khách đã gửi ý kiến. Chúng tôi sẽ phản hồi trong thời gian sớm nhất !</div>
				</div>
			</div>
			<div class="col-md-6">
				<form id="form-action" method="post" action="{{ route('home.contact.post') }}">
					<div class="py-2">Hoặc gửi liên hệ cho chúng tôi theo mẫu dưới đây</div>
                    @csrf
                    @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $err)
                        {{ $err }}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(Session::has('flash_success'))
                    <div class="alert alert-success">
                        {{ session('flash_success') }}
                    </div>
                    @endif
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Họ và tên*">
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="numberphone" value="{{ old('numberphone') }}" placeholder="Số điện thoại *">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email *">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" value="{{ old('content') }}" name="content" placeholder="Nhập nội dung *" style="height: 200px"></textarea>
                        </div>
                        <div class="col-md-6">
				            <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Nhập mã bảo vệ">
			            </div>
			            <div class="col-md-6">
			              	{!! captcha_img() !!}
					        <button class="btn" id="regen-captcha"><i class="fas fa-redo-alt"></i></button>
			          	</div>
                        <div class="col-md-12">
                            <button type="submit">Gửi</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>