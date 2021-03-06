<style>
.banner{
  height:50px;
  width:100%;
  background: white;
  position:absolute;
  left:0;
  top:0;
  border-bottom: 1px solid #D3D3D3;
}
.nav-color{
  color: #868686 !important;
}
.ss{
    color:#868686;
    text-align: center;
    font-size: 12px;
    /*padding-bottom: 0px !important;*/
}
tr{
  height:40px;
}

.myButton {
  background-color:#687c87;
  border-radius:12px;
  border:2px solid #687c87;
  display:inline-block ;
  cursor:pointer;
  color:white !important;
  font-family:"Noto Sans", "Noto Sans CJK KR", sans-serif;
  font-size:12px;
  font-weight:regular;
  padding:3px 12px;
}
.myButton:hover {
  background-color: white;
  color: #687c87 !important;
}
.myButton:active {
  position:relative;
  top:1px;
}
.submit_button{
  display: block;
  text-align: center;
}
.menu{
  width:90px;
  display:inline-block;
}
.menu_input{
  width:150px;
}
.menu_input_radio{
  width:130px;
  display: inline-block;
}
.menu_button{
  margin-left: 10px;
}
.menu_input_phone_1{
  width:40px;
}
.menu_input_phone_2{
  width:50px;
}
.margin-bottom-5{
  margin-bottom: 5px;

}
input[type="radio"] + label{
  margin-left: 7px;
  font-size:13px;
}
.title1{
  font-size: 20px;
  color:#868686;
}
.title2{
  font-size: 15px;
  color:#443333;
}
.order_border{
  border:1px solid #B7B7B7;
  border-radius: 6px;
  padding: 5px;
}
.order_border:hover{
  background: #D3D3D3;
}
.order_result_1{
  font-size:10px;
  color:#D3D3D3;
  float:right;
}
.order_result_2{
  margin-left: 10px;
  font-size:12px;
  color:#443333;
  float:right;
}
.order_title{
  color:#868686;
  margin: 0px 0px 0px 3px;
}
.order_content{
  color:#443333;
  margin: 0px 0px 0px 3px;
}
.menu{
  width:320px;
  height:100%;
  position: absolute;
  left:50%;
  bottom:0;
  margin-left: -160px;

  background: white;
}
.menu_item{
  font-weight: bold;
  color: #868686;
  text-align: center;
  display: inline-block;
  width:32%;
  height:100%;
  cursor: pointer;
}
.menu_item:hover{
  color: #96AFB5;
  border-bottom:2px solid #96AFB5;
}
</style>
<script>
$(function(){

});

function checkSubmit(){
	if($('input[name="title"]').val()==0){
		alert('제목을 입력해주세요');
		return;
	}
	if($('input[name="email"]').val()==0){
		alert('이메일을 입력해주세요');
		return;
	}

	$('#formform').submit();
}
</script>

<?php

if (isset($_GET['status'])){
	if($_GET['status'] == "success"){
		echo "
	  		<script>alert('성공적으로 문의되었습니다. 최대한 신속히 답변 드리도록 하겠습니다.');</script>	
	  	";
	}
	if($_GET['status'] == "fail"){
		echo "
  		<script>alert('문의 제출 시 오류가 생겼거나 비정상적 접근을 시도하셨습니다.');</script>
  		";
	}
}
?>

<div class="banner">

</div>
</div>
<div class="container" >
  <div class="row row-padding-xs-100 " style="margin:70px 0px 40px;">
    <div class="col-xs-12 gal" style="text-align:center;display:block;">
      <span style="font-size:32px; font-weight:500;">HELP</span>
    </div>
  </div>
</div>



  <div class="container" >
    <div class="row row-padding-xs-100" style="margin-bottom:10px;">
      <div class="col-md-12" style="position:relative; height:25px; border-bottom: 1.5px solid #D3D3D3;">
        <div class="menu">
          <div class="menu_item" >
            <a href="/help">공지사항</a>
          </div>
          <div class="menu_item" >
            <a href="/help/faq">FAQ</a>
          </div>
          <div class="menu_item" style="border-bottom:2px solid #96AFB5; color:#96AFB5;">
            <a href="/help/cs">고객센터</a>
          </div>
        </div>
      </div>
    </div>

	<form id="formform" method="post" action="/help/func_cs_submit" enctype="multipart/form-data">
    <div class="row row-padding-xs-100" style="margin-top:20px; ">
      <div class="col-xs-12" style="background:#F5F6F7; border-radius:15px;">
        <div class="row" style="margin-top:30px;">
          <div class="col-xs-12 col-sm-2">
            <div style="font-weight:500; color:#676464; text-align:center;">제목</div>
          </div>
          <div class="col-xs-12 col-sm-9">
            <input type="text" name="title" style="width:100%;">
          </div>
          <div class="hidden-xs col-sm-1">
          </div>
        </div>
        
           <div class="row" style="margin-top:20px;">
          <div class="col-xs-12 col-sm-2">
            <div style="font-weight:500; color:#676464; text-align:center;">이메일</div>
          </div>
          <div class="col-xs-12 col-sm-9">
            <input type="text" name="email" style="width:100%;">
          </div>
          <div class="hidden-xs col-sm-1">
          </div>
        </div>
        
        <div class="row" style="margin-top:20px;">
          <div class="col-xs-12 col-sm-2">
            <div style="font-weight:500; color:#676464; text-align:center;">내용</div>
          </div>
          <div class="col-xs-12 col-sm-9">
            <textarea type="text" name="contents" style="width:100%;height:150px; border:1px solid #B7B7B7;"><?php
            $takeDown = "";
            if (isset($_GET['productID'])){
            	$takeDown = $_GET['productID'];
            	echo "----------------------------\n이미 제출된 작품 판매 페이지의 수정/삭제 요청은 현재 고객센터에서 접수 받고 있습니다.\n요청 접수 시 해당 작품은 자동으로 펀딩 목록에서 임시 제외되며, 신속히 요청을 확인 및 처리한 뒤 다시 올려드리겠습니다.\n만일 삭제 요청일 경우 문의 접수 직후 바로 새로 판매 등록하시는 것을 추천드립니다.\n\n감사합니다.\n----------------------------";
            }
            ?></textarea>
          </div>
          <div class="hidden-xs col-sm-1">

          </div>
        </div>
        <div class="row" style="margin-top:20px;margin-bottom:30px;">
          <div class="col-xs-12 col-sm-2">
            <div style="font-weight:500; color:#676464; text-align:center;">파일첨부</div>
          </div>
          <div class="col-xs-12 col-sm-9">
            <input type="file" name="file" style="width:100%; height:30px; border:1px solid #B7B7B7;">
          </div>
          <div class="hidden-xs col-sm-1">
	
          </div>
        </div>
       <input type="hidden" name="takeDown" value="<?php echo $takeDown;?>">
       </form>
        <div class="row" style="margin-top:20px;">
          <div class="col-xs-12" style="text-align:center;">
            <a onclick="checkSubmit();" style="cursor:pointer;"><div style="display:block; width:200px; border:1px solid #337ab7; margin:10px auto; padding:10px 0px; border-radius:10px; color:#337ab7; font-size:15px; font-weight:500;">문의하기</div></a>
          </div>

        </div>
      </div>


    </div>

</div>
