@include('modules.UIImageLibraryDetail.css')
<div class="UIDetailImageLibrary_Default1">
    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
        @foreach($images as $image)
        <li data-thumb="{{$image->path}}"> 
            <img src="{{$image->path}}" width="100%" />
             </li>
        @endforeach
    </ul>
</div>

