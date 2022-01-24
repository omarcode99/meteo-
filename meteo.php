
<?php

if(isset($_POST['btn'])){
if(empty($_POST['city'])){

$error = "your input is empty" ;

}





if($_POST['city']){

  @$apidata= file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_POST['city']."&APPID=152d2277b38209192ff23c8e74f9217b") ;
  $tabweather = json_decode($apidata , true) ;
  
  if(@$tabweather['cod'] == 200) {
  $temperature = $tabweather ['main'] ['temp'] - 273  ;
     $weather = "<b> weather condition : </b>"  .$tabweather['weather'] ['0'] ['description']  ;
}
else {

  
  $cityerror = "please entre a name of city" ;
}
}
}


?>























<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>


* {
  outline: none;
}


body {
  background-image: url("https://www.mwallpapers.com/download-image/452643/1080x715") ;
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  height: 100%;
  min-height: 100%;
}

body {
  margin: 0;
  
}

.tb {
  display: table;
  width: 100%;
}

.td {
  display: table-cell;
  vertical-align: middle;
}

input,
button {
  color: #fff;
  font-family: Nunito;
  padding: 0;
  margin: 0;
  border: 0;
  background-color: transparent;
}

#cover {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  width: 550px;
  padding: 35px;
  margin: -83px auto 0 auto;
  background-color: #ff7575;
  border-radius: 20px;
  box-shadow: 0 10px 40px #ff7c7c, 0 0 0 20px #ffffffeb;
  transform: scale(0.6);
}

form {
  height: 96px;
}

input[type="text"] {
  width: 100%;
  height: 96px;
  font-size: 60px;
  line-height: 1;
}

input[type="text"]::placeholder {
  color: #e16868;
}

#s-cover {
  width: 1px;
  padding-left: 35px;
}

button {
  position: relative;
  display: block;
  width: 84px;
  height: 96px;
  cursor: pointer;
}

#s-circle {
  position: relative;
  top: -8px;
  left: 0;
  width: 43px;
  height: 43px;
  margin-top: 0;
  border-width: 15px;
  border: 15px solid #fff;
  background-color: transparent;
  border-radius: 50%;
  transition: 0.5s ease all;
}

button span {
  position: absolute;
  top: 68px;
  left: 43px;
  display: block;
  width: 45px;
  height: 15px;
  background-color: transparent;
  border-radius: 10px;
  transform: rotateZ(52deg);
  transition: 0.5s ease all;
}

button span:before,
button span:after {
  content: "";
  position: absolute;
  bottom: 0;
  right: 0;
  width: 45px;
  height: 15px;
  background-color: #fff;
  border-radius: 10px;
  transform: rotateZ(0);
  transition: 0.5s ease all;
}

#s-cover:hover #s-circle {
  top: -1px;
  width: 67px;
  height: 15px;
  border-width: 0;
  background-color: #fff;
  border-radius: 20px;
}

#s-cover:hover span {
  top: 50%;
  left: 56px;
  width: 25px;
  margin-top: -9px;
  transform: rotateZ(0);
}

#s-cover:hover button span:before {
  bottom: 11px;
  transform: rotateZ(52deg);
}

#s-cover:hover button span:after {
  bottom: -11px;
  transform: rotateZ(-52deg);
}
#s-cover:hover button span:before,
#s-cover:hover button span:after {
  right: -6px;
  width: 40px;
  background-color: #fff;
}
.h1{

color:  #FF6666 ;
height: 400px;
width: 1500px;
display: flex;
flex-direction: column;
justify-content: center;
text-align: center;
font-size: 400%;

}

.php{

color: white ;


}

  </style>
</body>
</html>

<form method="post" action="">

<div> <h1 class = "h1" >WEATHER GLOBAL CITY</h1>  </div>
<div id="cover">
    <div class="tb">
      <div class="td"><input type="text" name = "city" placeholder="Search" value = <?php if(!empty($city)){?> <?php echo $city    ?> <?php } ?> ></div>
      <div class="td" id="s-cover">
        <button name = "btn" type="submit">
          <div id="s-circle"></div>
          <span></span>
        </button>
      </div>
    </div>
  
      <div class = "php">

      <?php if(!empty($cityerror)){ ?>
 <?php echo  "<h1>$cityerror  <h1>" ; ?> 
   <?php } ?>

   <?php if(!empty($temperature)){ ?>
 <?php echo  "<h1>$temperature °C <h1>" ; ?> 
   <?php } ?>

      <?php if(!empty($error)){ ?>
 <?php echo  "<h2>$error<h2>" ; ?> 
   <?php } ?>

   <?php if(!empty($weather)){ ?>
 <?php echo  "<h1>$weather<h1>" ; ?> 
   <?php } ?>

   

   




      </div>
  </form>
</div>