<script src="{{ asset('assets/guests/default/modules/UIDetailImageLibrary/js/lightslider.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#content-slider").lightSlider({
    loop:true,
    keyPress:true
  });
  $('#image-gallery').lightSlider({
    gallery:true,
    item:1,
    thumbItem:9,
    slideMargin: 0,
    speed:500,
    auto:true,
    loop:true,
    onSliderLoad: function() {
      $('#image-gallery').removeClass('cS-hidden');
    }  
  });
});
</script>