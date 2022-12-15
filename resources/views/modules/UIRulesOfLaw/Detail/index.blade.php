<div class="UIRulesOfLaw Detail Default1">
  <div class="heading">{{ $document->content }}</div>
  <div class="box-top">
    <div class="row">
      <div class="col-md-4 title">Số ký hiệu văn bản: </div>
      <div class="col-md-8">{{ $document->number }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Ngày ban hành: </div>
      <div class="col-md-8">{{Carbon\Carbon::parse($document->date_issue)->format('d/m/Y')}}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Ngày hiệu lực:</div>
      <div class="col-md-8">{{Carbon\Carbon::parse($document->date_effect)->format('d/m/Y')}}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Trích yếu nội dung:</div>
      <div class="col-md-8">{{ $document->content }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Hình thức văn bản:</div>
      <div class="col-md-8">{{ $document->type->name }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Lĩnh vực:</div>
      <div class="col-md-8">{{ $document->field->name }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Người ký duyệt:</div>
      <div class="col-md-8">{{ $document->signor }}</div>
    </div>
    <div class="row">
      <div class="col-md-4 title">Tài liệu đính kèm:</div>
      <div class="col-md-8">
        <a target='_blank' href="{{$document->file_path}}">
          <i class='fa fa-paperclip' style="font-size: 20px; color: red"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="box-preview">
    <object data="{{$document->file_path}}" type="application/pdf" style="width: 100%; height: 700px;"><i>Giao diện điện thoại không hỗ trợ trình xem trước văn bản. Vui lòng tải về file văn bản </i><a href="{{$document->file_path}}" class="font-weight-bold">Download file văn bản.</a></object>
  </div>
</div>
        
