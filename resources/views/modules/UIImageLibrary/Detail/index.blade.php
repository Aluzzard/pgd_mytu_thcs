@include('modules.UIImageLibrary.Detail.css') 
<div class="UIDetailImageLibrary Default1"> <ul id="image-gallery" class="gallery
 list-unstyled cS-hidden">
        @foreach($UIDetailImageLibrary as $image)
        <li data-thumb="{{$image->path}}"> 
            <img src="{{$image->path}}" width="100%" />
             </li>
        @endforeach
    </ul>
</div>

