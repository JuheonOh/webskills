<script>
$(function(){
	var url = document.location.href;
	
	if(url.indexOf("?scroll=bottom") !== -1){
		$("html, body").animate({
			scrollTop : $("#scroll_map").offset().top
		}, 1000);
	}
});
</script>
<div class="main1sub1">
    <figure>
        <img src="/image/inside.jpg" alt="inside" title="inside">
        <figcaption>
            고품격스러운 내부
        </figcaption>
    </figure>
    <figure>
        <img src="/image/outside.jpg" alt="outside" title="outside">
        <figcaption>
            세련된 외부
        </figcaption>
    </figure>
    <figure>
        <img src="/image/location_map.png" alt="location_map" title="location_map" id="scroll_map">
        <figcaption>
            지도
        </figcaption>
    </figure>
</div>
