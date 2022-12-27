<div class="UIDetailSteeringDocument Default1">
  <div class="heading">{{ $UISteeringDocumentDetail->content }}</div>
  <div class="box-top">
    <div class="row">
      <div class="col-md-4 title">Số ký hiệu văn bản: </div>
      <div class="col-md-8">{{ $UISteeringDocumentDetail->number }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Ngày ban hành: </div>
      <div class="col-md-8">{{Carbon\Carbon::parse($UISteeringDocumentDetail->date_issue)->format('d/m/Y')}}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Ngày hiệu lực:</div>
      <div class="col-md-8">{{Carbon\Carbon::parse($UISteeringDocumentDetail->date_effect)->format('d/m/Y')}}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Trích yếu nội dung:</div>
      <div class="col-md-8">{{ $UISteeringDocumentDetail->content }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Hình thức văn bản:</div>
      <div class="col-md-8">{{ $UISteeringDocumentDetail->type->name }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Lĩnh vực:</div>
      <div class="col-md-8">{{ $UISteeringDocumentDetail->field->name }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Người ký duyệt:</div>
      <div class="col-md-8">{{ $UISteeringDocumentDetail->signor }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Tài liệu đính kèm:</div>
      <div class="col-md-8">
        <a target='_blank' href="{{$UISteeringDocumentDetail->file_path}}">
          <i class='fa fa-paperclip' style="font-size: 20px; color: red"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="box-preview">
    <object data="{{$UISteeringDocumentDetail->file_path}}" type="application/pdf" style="width: 100%; height: 700px;"><i>Giao diện điện thoại không hỗ trợ trình xem trước văn bản. Vui lòng tải về file văn bản </i><a href="{{$UISteeringDocumentDetail->file_path}}" class="font-weight-bold">Download file văn bản.</a></object>
  </div>
</div>
        
