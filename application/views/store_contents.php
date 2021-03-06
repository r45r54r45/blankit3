<style>


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
  width:18%;
  height:100%;
  cursor: pointer;
}
.menu_item:hover{
  color: #96AFB5;
  border-bottom:2px solid #96AFB5;
}

.radius-4{
  overflow: hidden;
  border-radius: 15px;
}
.status_bar{
  height:7px;
  background: linear-gradient(to right, #687C87 70%,#D3D3D3 70% );
}
.img{
  width:100%;
}
.status_percent{
  font-weight: bold;
  color: #687C87;
  font-size: 10px;
  float:left;
  margin-left: 10px;
}
.status_day_word{
  font-weight: bold;
  color: #655453;
  font-size: 10px;
  float:right;
  margin-right:10px;
}
.status_day{
  font-weight: bold;
  color: #687C87;
  font-size: 10px;
}

.box:hover{
  background: #96AFB5;
}
.box:hover p{
  color: white;
}
.col-xs-6{
  padding:10px 5px 0 5px;
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
.product_area{
  height:auto;
  position: relative;
}
.product_bed{
  position: relative;
  left:0
  top:0;
  z-index: 1;
}
.product{
  position: absolute;
  z-index:2;
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
<div class="row" style="min-height:400px">
  <!-- 컨텐츠 반복시작 -->

  <?php
  //아래는 현재 URL 확인용 continue
  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  if (strpos($url,'cloth') !== false) {
    $urlNum = 1;
  } else if(strpos($url,'ecobag') !== false) {
    $urlNum = 2;
  } else if(strpos($url,'pouch') !== false){
    $urlNum = 3;
  } else if(strpos($url,'done') !== false){
    $urlNum = 4;
  }
  else {
    $urlNum = 0;
  }
  //url 확인 여기까지
  $cnt = 0;
  foreach ($contents->result() as $row)
  {

    $storeType = $row->store_type;
    $pref = trim($row->PREF);

    $itemPos;
    $itemBed;

    if(strcmp($pref,"E_1_1") || strcmp($pref,"E_1_2") || strcmp($pref,"E_1_3")){
      $itemPos="left:35.4%;top:46.100000000000006%;width:29.333333333333332%;height:39.93333333333333%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    if($pref=="E_2"){
      $itemPos="left:34.599999999999994%;top:46.1%;width:31.1%;height:42.199999999999996%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    if($pref=="E_3"){
      $itemPos="left:35.4%;top:49.6%;width:28.9%;height:39.36666666666667%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    if($pref=="E_4"){
      $itemPos="left:37.6%;top:57.199999999999996%;width:25.466666666666665%;height:34.66666666666667%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    if($pref=="P_1"){
      $itemPos="left:23.799999999999997%;top:28.799999999999997%;width:52.56666666666666%;height:42.86666666666667%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    if($pref=="H_1_1" || $pref=="H_1_2" || $pref=="H_1_3" || $pref=="H_1_4" || $pref=="H_1_5"){
      $itemPos="left:38%;top:40.2%;width:20.96666666666667%;height:18.46666666666667%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    if($pref=="M_1_1" || $pref=="M_1_2" || $pref=="M_1_3" || $pref=="M_1_4" || $pref=="M_1_5"){
      $itemPos="left:37%;top:35%;width:23.066666666666666%;height:20.333333333333332%;";
      $itemBed="/source/product/" . $pref . "_bed.jpg";
    }

    // 우현 이미지 합성부분 종료


     if ($urlNum == 0){

    } else if ($storeType == $urlNum){
      if ($row->store_status == 3){
        continue;
      }
    } else if ($urlNum == 4 && $row->store_status == 3){

    } else {
      continue;

    }


    $cnt++;
    $totalGoal = $row->store_goal;
    $nowGoal = $row->store_goal_now;

    // 0 현재 모집인원 나누기 전체 모집인원 문제
    if ($nowGoal == 0){
      $percGoal = 0;
    }
    else {
      $percGoal = $nowGoal / $totalGoal * 100;
    }

    //"앞으로 # 일 계산"
    $curDate = date('Y-m-d H:i:s');
    $dueDate = $row->store_day;
    $curDateNum = strtotime($curDate);
    $dueDateNum = strtotime($dueDate);
    $remainSecs = $dueDateNum - $curDateNum;
    $remainDays = $remainSecs / 86400;
    if($remainDays<=0){
      $remainDays = "마감";
      $dayStatus = 0;
    }
    else{
      $remainDays=floor($remainDays);
      $dayStatus = 1;
    }
    //여기까지 "앞으로 # 일 계산"
    ?>

    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-15">
      <div class="box radius-4">


      <div><a href="/gallery/product/<?php echo $row->store_id;?>">
      	<!-- <img src="" class="img_rounded"> -->
        <div class="product_area ">
            <!-- <image class="product_bed img_rounded img-responsive" src="<?echo $itemBed;?>"> -->
            <!-- <div class="product" style="<?echo $itemPos;?>"> -->
              <img src="<?php echo $row->store_image;?>" class="img img-responsive">
              <!-- </div> -->
            </div>

          </a></div>
          <!-- <div class="status_bar" style="background: linear-gradient(to right, #687C87 0%,#D3D3D3 100% );"></div> -->
          <!-- <div class="artist_hover" style="padding-top:7px;">
            <span class="status_percent"><?php //echo ceil($percGoal);?>%</span>
            <span class="status_day_word"><?php //if ($dayStatus == 1) echo "앞으로";?> <span class="status_day"><?php //echo $remainDays;?></span><?php //if ($dayStatus == 1) echo "일";?></span>
          </div> -->
          <div class="artist_hover" style="width: 100%; display: inline-flex;">
            <div style="width:20%; margin-left: 10px; padding-top: 10px; margin-bottom:15px;">
              <img src="<?php echo $row->artist_profile;?>" class="pp img img-circle">
            </div>
            <div style="width:80%; padding-left:10px; padding-top:10px;">
              <p class="artist_name"><?php echo $row->user_name;?></p>
              <p class="artist_type"><?php echo $row->artist_type;?></p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="clearfix visible-xs-block visible-sm-block visible-md-block"></div> -->
      <?php }

      if($cnt==0){
      	// gallery/done이 비어있을 경우
      	if($this->uri->segment(2) == "done"){
      		echo "
        <span style='margin: 100px auto 0px;
        display: table;
        font-size: 20px;'>종료된 펀딩이 없습니다.</span>
        ";
      	}
      	// 그 외가 비어있을 경우
        else{
        	echo "
        <span style='margin: 100px auto 0px;
        display: table;
        font-size: 20px;'>현재 진행 중인 펀딩이 없습니다.</span>
        ";
        }
      }?>

      <!-- 컨텐츠 반복 끝 -->
    </div>
  </div>
