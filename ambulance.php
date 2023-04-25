<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['rid']))
  {
  header('location:login.php');
  }
  else {
    $rid = $_SESSION['rid'];
    $sql = "select bloodrequest.*, hospitals.* from bloodrequest, hospitals where rid='$rid' && bloodrequest.hid=hospitals.id";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Ambulance"; ?>
<?php require 'head.php'; ?>
<style>
.login-form{
    width: calc(100% - 20px);
    max-height: 650px;
    max-width: 450px;
    background-color: white;
}
:root{
    /* color type A */
    --line_color : #555555 ;
    --back_color : #FFECF6  ;

    /* color type B */
    /* --line_color : #1b1919 ;
    --back_color : #E9ECFF  ; */

    /* color type C */
    /* --line_color : #00135C ;
    --back_color : #DEFFFA  ; */
}

.button{
    position : relative ;
    z-index : 0 ;
    width : 240px ;
    height : 56px ;
    text-decoration : none ;
    font-size : 14px ; 
    font-weight : bold ;
    color : var(--line_color) ;
    letter-spacing : 2px ;
    transition : all .3s ease ;
}
.button__text{
    display : flex ;
    justify-content : center ;
    align-items : center ;
    width : 100% ;
    height : 100% ;
}
.button::before,
.button::after,
.button__text::before,
.button__text::after{
    content : '' ;
    position : absolute ;
    height : 3px ;
    border-radius : 2px ;
    background : var(--line_color) ;
    transition : all .5s ease ;
}
.button::before{
    top : 0 ;
    left : 54px ;
    width : calc( 100% - 56px * 2 - 16px ) ;
}
.button::after{
    top : 0 ;
    right : 54px ;
    width : 8px ;
}
.button__text::before{
    bottom : 0 ;
    right : 54px ;
    width : calc( 100% - 56px * 2 - 16px ) ;
}
.button__text::after{
    bottom : 0 ;
    left : 54px ;
    width : 8px ;
}
.button__line{
    position : absolute ;
    top : 0 ;
    width : 56px ;
    height : 100% ;
    overflow : hidden ;
}
.button__line::before{
    content : '' ;
    position : absolute ;
    top : 0 ;
    width : 150% ;
    height : 100% ;
    box-sizing : border-box ;
    border-radius : 300px ;
    border : solid 3px var(--line_color) ;
}
.button__line:nth-child(1),
.button__line:nth-child(1)::before{
    left : 0 ;
}
.button__line:nth-child(2),
.button__line:nth-child(2)::before{
    right : 0 ;
}
.button:hover{
    letter-spacing : 6px ;
}
.button:hover::before,
.button:hover .button__text::before{
    width : 8px ;
}
.button:hover::after,
.button:hover .button__text::after{
    width : calc( 100% - 56px * 2 - 16px ) ;
}
.button__drow1,
.button__drow2{
    position : absolute ;
    z-index : -1 ;
    border-radius : 16px ;
    transform-origin : 16px 16px ;
}
.button__drow1{
    top : -16px ;
    left : 40px ;
    width : 32px ;
    height : 0;
    transform : rotate( 30deg ) ;
}
.button__drow2{
    top : 44px ;
    left : 77px ;
    width : 32px ;
    height : 0 ;
    transform : rotate(-127deg ) ;
}
.button__drow1::before,
.button__drow1::after,
.button__drow2::before,
.button__drow2::after{
    content : '' ;
    position : absolute ;
}
.button__drow1::before{
    bottom : 0 ;
    left : 0 ;
    width : 0 ;
    height : 32px ;
    border-radius : 16px ;
    transform-origin : 16px 16px ;
    transform : rotate( -60deg ) ;
}
.button__drow1::after{
    top : -10px ;
    left : 45px ;
    width : 0 ;
    height : 32px ;
    border-radius : 16px ;
    transform-origin : 16px 16px ;
    transform : rotate( 69deg ) ;
}
.button__drow2::before{
    bottom : 0 ;
    left : 0 ;
    width : 0 ;
    height : 32px ;
    border-radius : 16px ;
    transform-origin : 16px 16px ;
    transform : rotate( -146deg ) ;
}
.button__drow2::after{
    bottom : 26px ;
    left : -40px ;
    width : 0 ;
    height : 32px ;
    border-radius : 16px ;
    transform-origin : 16px 16px ;
    transform : rotate( -262deg ) ;
}
.button__drow1,
.button__drow1::before,
.button__drow1::after,
.button__drow2,
.button__drow2::before,
.button__drow2::after{
    background : var( --back_color ) ;
}
.button:hover .button__drow1{
    animation : drow1 ease-in .06s ;
    animation-fill-mode : forwards ;
}
.button:hover .button__drow1::before{
    animation : drow2 linear .08s .06s ;
    animation-fill-mode : forwards ;
}
.button:hover .button__drow1::after{
    animation : drow3 linear .03s .14s ;
    animation-fill-mode : forwards ;
}
.button:hover .button__drow2{
    animation : drow4 linear .06s .2s ;
    animation-fill-mode : forwards ;
}
.button:hover .button__drow2::before{
    animation : drow3 linear .03s .26s ;
    animation-fill-mode : forwards ;
}
.button:hover .button__drow2::after{
    animation : drow5 linear .06s .32s ;
    animation-fill-mode : forwards ;
}
@keyframes drow1{
    0%   { height : 0 ; }
    100% { height : 100px ; }
}
@keyframes drow2{
    0%   { width : 0 ; opacity : 0 ;}
    10%  { opacity : 0 ;}
    11%  { opacity : 1 ;}
    100% { width : 120px ; }
}
@keyframes drow3{
    0%   { width : 0 ; }
    100% { width : 80px ; }
}
@keyframes drow4{
    0%   { height : 0 ; }
    100% { height : 120px ; }
}
@keyframes drow5{
    0%   { width : 0 ; }
    100% { width : 124px ; }
}
.button_container{
    width : 100% ;
    height : 300px ;
    display : flex ;
    flex-direction : column ;
    justify-content : center ;
    align-items : center ;
}
button{
    border:1px solid transparent;
}
</style>
<body onload="getlocation();">
	<?php require 'header.php'; ?>
	<div class="container cont">
        <div class="button_container">
        <form action="" method="post">
            <button href="#" type="submit" class="button" name="call">
                <div class="button__line"></div>
                <div class="button__line"></div>
                <span class="button__text">Call Ambulance<i class='bx bxs-bus-school' ></i></span>
                <div class="button__drow1"></div>
                <div class="button__drow2"></div>
            </button>
            <input type="hidden" name="ulatitude" class="form-control mb-3">
            <input type="hidden" name="ulongitude" class="form-control mb-3">
        </form>
        </div>
    </div>
    <script>
    function getlocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
    }
    function showPosition(position){
        var latitude = document.querySelector('input[name = "ulatitude"]').value = position.coords.latitude;
        var longitude = document.querySelector('input[name = "ulongitude"]').value = position.coords.longitude;
        console.log(latitude);
        console.log(longitude);
    }
    function showError(error){
      switch(error.code){
        case error.PERMISSION_DENIED:
        alert("Please Allow Geolocation Service to Get The location");
        location.reload();
        break;
      }
    }
    </script>
    <?php require 'footer.php'; ?>
</body>
<?php
    if(isset($_POST['call'])){
        $u_detail = mysqli_query($conn, "SELECT * FROM receivers WHERE id='$rid'");
        $u_arr = mysqli_fetch_array($u_detail);
        $username = $u_arr['rname'];
        $email = $u_arr['remail'];
        $phone = $u_arr['rphone'];
        $city = $u_arr['rcity'];
        $u_lat = $_POST['ulatitude'];
        $u_long = $_POST['ulongitude'];
        $check = mysqli_query($conn," SELECT * FROM ambulance WHERE alatitude='$u_lat' AND alongitude='$u_long'");
        if(mysqli_num_rows($check)>0){
            echo "<script>alert('Thanks For Concern Someone Already Called the Ambulace')</script>";
        }else{
            $load_call = "INSERT INTO ambulance (rid,aname,aemail,aphone,acity,alatitude,alongitude,status) VALUES ('$rid','$username','$email','$phone','$city','$u_lat','$u_long','Pending')";
            $call_ambu = mysqli_query($conn,$load_call);
            if($call_ambu){
                echo "<script>alert('Ambulance is On the Way')</script>";
            }else{
                echo "<script>alert('Unable to Contact the Ambulance')</script>";
            }
        }
    }
    ?>
</html>
<?php } ?>