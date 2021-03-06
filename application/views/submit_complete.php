<style>


.arrow{
  padding: 0 30px 0 30px;
  margin:0 auto; display:block;
}
.download_cover{
  background-image: url("/source/image/download_hover.png");
  z-index: 100;
background-size: contain;
 background-position:15px;
 background-repeat: no-repeat;
}
 .download_img{
     z-index: 50;
   opacity:1;
 }
.download_cover:hover .download_img{
     z-index: 50;
  opacity:0.5;
}
.banner{
  width:100%;
  height:300px;
  position:absolute;
  left:0;
  top:0;
  overflow:hidden;
}
.banner>img{
  min-height: 300px;
}
.navbar-right{
  color:white !important;
}
.YourButton{
      border: 2px solid white;
          color: white;
}
</style>
<script>
function banner_generator(){
  var width = document.documentElement.clientWidth;
  $(".banner>img").css("margin-left","-"+($(".banner>img").width()-width)/2+"px");
}
$(function(){
  $("#root_container").css("height",$(".banner").height()+"px");
  banner_generator();
  $(window).on("resize",function(){
      $("#root_container").css("height",$(".banner").height()+"px");
      banner_generator();
  });
});
</script>
  <div class="banner">
    <img src="/source/image/submit-page-banner.jpg">
    <div class="banner-text">
    <p>혼자 간직해온 작품이 있나요?</p>
    <p>제작비용 0원에 당신만의 제품을 선보이세요.</p>
    </div>
  </div>
</div>
<div class="container" >
  <div class="row">
      <div class="col-xs-12" style="margin-top:30px; ">
        <span style="margin-top:30px; text-align:center; display:block; font-size: 25px; color:#655453; font-weight:bold;">
          업로드가 완료되었습니다.
        </span>
      </div>
      <div class="col-xs-12" style="margin-top:30px; ">
        <span style="margin-top:10px; text-align:center; display:block; font-size: 18px; color:#655453; font-weight:400;">
          아티스트님의 작품이 무사히 업로드 되었습니다.<br>
          최대한 신속히 확인한 뒤 연락드리겠습니다.<br>
          감사합니다.<br><br><br><br><br>
        </span>
      </div>
  </div>

  
  </div>
</div>
