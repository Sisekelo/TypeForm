<?php
ob_start();
/* Displays user information and some useful messages */
session_start();
$message = $_SESSION['message'];
$active =  $_SESSION['Active'];
$number = $_SESSION['number'];


date_default_timezone_set('Africa/Mbabane');
$date = date('H:i:s');

if("05:00:00" <= $date && $date < "23:59:59"){
// Check if user is logged in using the session variable
    if($active == 0){

    $_SESSION['emoji'] = "&#x1F60A;";
    $_SESSION['message'] = "Please check your SMS's on ".$number." to confirm your number";
    header("location: notification.php");  
  }

  if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['emoji'] = "&#x1F625;";
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: notification.php");    
  }
  else {
      // Makes it easier to read
      $first_name = $_SESSION['first_name'];
      $last_name = $_SESSION['last_name'];
      $email = $_SESSION['email'];
      $number = $_SESSION['number'];
      $meal_choice = $_SESSION['meal_choice'];
      $picURL =  $_SESSION['picURL'];
      $room = $_SESSION['room'];
      $active = $_SESSION['Active'];
      $points = $_SESSION['points'];
      
      
  };
}
else{
  $_SESSION['emoji'] = "&#x1F625;";
  $_SESSION['message'] = "Sorry we are closed for now. \n our opening times are from \n 6 am to midnight SA time";
  header("location: notification.php");    
};
?>
<!DOCTYPE html>
<html style="background: #04b4aa">
<head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  
    <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
    
 
    
  <meta charset="UTF-8">
  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a2452f631a40500136712dd&product=sticky-share-buttons"></script>
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome, <?= $first_name ?></title>
  <?php include 'css/true.html'; ?>
</head>

<div class="loader"><p></p>
   </div>

<body method="post" action="order.php"> 

  <div id="first" class="mega" id="first" class="mega">
    <div id="mainbackground" style="background: #04c8ba">
      <div id="mainPage">
        <div id="message">
            
         <div class="sidebar" style="height: 100vh;z-index: 10000">
          <div class="cancel" onclick="cancel(this.className)">✕</div>

          <div id="picInfo" style="height: 10%">
            <!--<img src="img/profile.jpg" style="width:20%;">-->
            <p style="display: inline-block;">Hi,<?= $first_name ?></p>
          </div>

          <div id="Help" style="height: 45%">
         
            <p>Current points: <?= $points ?> </p>
            <p>10 Points = 1 free meal.</p>
            <p>Share with your friends and get 2 Points once they buy their first meal</p>
            
            <div style="overflow: auto" 
                data-description="Hey there, register for Oui Deliver and get food delivered to your door step"
                data-url="https://ouideliver.xyz/index.php?refer=<?= $email ?>" class="sharethis-inline-share-buttons"></div>

           
          </div>

          <div id="Logout" style="height: 45%">
            <p style="display: inline-block;">Hi,<?= $last_name ?></p>
          </div>
        </div>
 

        <div id="Messages1" class="center">
            <span class="toggle" onclick="changeClass()" style="    margin-left: 2%;font-size: 30px;float: left">☰</span>
            
            
            <p style="margin: 0" id="top">
                <?= $message ?>
            </p>
        </div>

          <div id="Usuals" class="center">
            <img src="img/truck.png" id="mainlogo">
          </div>    

          <div  id="Messages2" class="center"><p><strong id="top2">Choose a panini below</strong></p></div>



        </div>

        <div id="notification" class="center">

          <table id="ingredients" class="center">
            <th id="panini_title">What do you want in your <span id="flavour"></span> panini?</th>

              <tr>
                <td>
                  <input type="checkbox" name="ingredients" id="chilli" class="flavour" />
                    <label for="chilli" onclick="showSlide();">
                        Chilli
                    </label>
                </td>
              </tr>

              <tr>
                <td>
                  <input type="checkbox" name="ingredients" id="cheese" class="flavour"  style="width:100%" />
                    <label for="cheese" style="width:100%" onclick="showSlide();">
                        Cheese
                    </label>
                </td>
              </tr>
              
              <tr>
                <td>
                  <input type="checkbox" name="ingredients" id="onion" class="flavour"  style="width:100%" />
                    <label for="onion" style="width:100%" onclick="showSlide();">
                        Onion
                    </label>
                </td>
              </tr>

              <tr>
                <td>
                  <input type="checkbox" name="ingredients" id="tomato" class="flavour"  style="width:100%" />
                    <label for="tomato" style="width:100%" onclick="showSlide();">
                        Tomato
                    </label>
                </td>
              </tr>
          </table>
        </div>

        <div id="icons"  onclick="showNotice(this.id)" style="overflow: hidden;">
          <table> <!-- food choices -->
            <hr align="middle" width="50%">   
            <tr>
              <td style="width: 25%" id="iconsnada">
                <input onclick="tellme(this.id)" type="radio" name="food" id="nothing" class="input-hidden" value="0" style="width:100%" />
                <label for="nothing" style="width:100%" class="icons">
                    <img  src="img/error.png" alt="nothing" style="width:100%"/>
                </label>
              </td>
              <td style="width: 25%">
                <input onclick="tellme(this.id)" type="radio" name="food" id="beef" class="input-hidden" value="100" style="width:100%" />
                <label for="beef" style="width:100%">
                    <img  src="img/beef.png" alt="beef" style="width:100%"/>
                </label>
              </td>
              <td style="width: 25%">
                <input onclick="tellme(this.id)" type="radio" name="food" id="chicken" class="input-hidden" value="100" style="width:100%" />
                <label for="chicken" style="width:100%">
                    <img  src="img/chicken.png" alt="chicken" style="width:100%"/>
                </label>
              </td>
              <td style="width: 25%">
                <input onclick="tellme(this.id)" type="radio" name="food" id="lamb" class="input-hidden" value="100" style="width:100%"/>
                <label for="lamb" style="width:100%">
                    <img  src="img/lamb.png" alt="fries" style="width:100%"/>
                </label>
              </td>
            </tr>
          </table>
        </div>

        <div id="price" class="center">
          <hr align="middle" width="50%"> 
          <p>1 Meal = 100 RPS</p>
        </div>
      </div>

      <div id="pay" class="center">
          <input oninput ="Payment(this.id)" type="range" min="1" max="100" value="0" class="slider" id="myRange" style="display: none">
          <p><span> Slide to confirm</span> <br><span id="amount">0</span> Rps</p>
      </div>

    </div>
  </div>

  <div id="second" class="mega">
    <div id="mainbackground" style="background: #04c8ba">
        <div id="mainPage">

          <div id="message2" >
      
              <div id="Messages1" class="center">
                <img src="img/340.png" id="page2" onclick="goback(this.id)">
                <p style="margin: 0" id="top3">Something to drink?</p>
              </div>

            <div id="Usuals" class="center">
              <img src="img/truck.png" id="mainlogo">
            </div>
            <div  id="Messages2" class="center"><p><strong id="top4">Choose a drink below</strong></p></div>
          </div>

          <div id="notification2" class="center">
            <img src="img/340.png" id="page25" onclick="goback(this.id)">
            <p>Your drink choice is <br>
              <span id="drink_choice">
              </span>
            </p>
          </div>

            <div id="icons2" style="overflow: hidden;">
              <table> <!-- food choices -->
                <hr align="middle" width="50%">   
                <tr>
                  <td style="width: 25%" id="icons2nada"> 
                    <input onclick="tellthem(this.id)" type="radio" name="drink" id="zero" class="input-hidden" value="0" style="width:100%" />
                    <label for="zero" style="width:100%">
                        <img  src="img/error.png" alt="nothing" style="width:100%"/>
                    </label>
                  </td>
                  <td style="width: 25%"> 
                    <input onclick="tellthem(this.id)" type="radio" name="drink" id="coke" class="input-hidden" value="50" style="width:100%" />
                    <label for="coke" style="width:100%">
                        <img  src="img/coke.png" alt="coke" style="width:100%"/>
                    </label>
                  </td>
                  <td style="width: 25%">
                    <input onclick="tellthem(this.id)" type="radio" name="drink" id="fantaorange" class="input-hidden" value="50" style="width:100%" />
                    <label for="fantaorange" style="width:100%">
                        <img  src="img/fantaorange.png" alt="fanta orange" style="width:100%"/>
                    </label>
                  </td>
                  <td style="width: 25%">
                    <input onclick="tellthem(this.id)" type="radio" name="drink" id="fanta apple" class="input-hidden" value="50" style="width:100%" />
                    <label for="fanta apple" style="width:100%">
                        <img  src="img/fanta apple.png" alt="coke3" style="width:100%"/>
                    </label>
                  </td>
                </tr>
              </table>
            </div>
          <div id="price" class="center">
            <hr align="middle" width="50%"> 
            <p>1 Drink = 50 RPS</p>
          </div>
        </div>
      <div id="pay" class="center">
          <input oninput ="Payment(this.id)" type="range" min="1" max="100" value="0" class="slider" id="myRange1">
          <p> Slide to confirm <span id="amount2">0</span> Rps</p>
      </div>
    </div>
  </div>

  <div id="third" class="mega">
    <div id="mainbackground" style="background: #04c8ba">
      <div id="mainPage">

        <div id="confirmation" class="center" style="height: 10%;">
          <img src="img/340.png" id="page3" onclick="goback(this.id)">
          <p>Just to confirm,<?= $first_name ?></p>
        </div>

          <hr align="middle" width="50%" style="margin-bottom: 0;margin-top: 0;"> 

        <div id="foods" class="center" style="height: 45%;">
          <span id="confirmFood" style="font-size: 200%;"></span>
          <br>
          <img id="confirmFoodPic" src="" alt="meal" style="height:50%;"/>
          <br>
          <span>With </span><span id="confirmFoodFlav" style="font-size: 150%;"></span>
        </div>

          <hr align="middle" width="50%"> 

        <div id="drink" class="center" style="height: 45%;">
          <span id="confirmDrink" style="font-size: 200%;">Coca Cola</span>
          <br>
          <img id="confirmDrinkPic"  src="drink" alt="drink choice" style="height:50%;"/>
        </div>
      </div>

      <div id="pay" class="center">
        <input oninput ="Payment(this.id)" type="range" min="1" max="100" value="0" class="slider" id="myRange2">
          <p> Slide to confirm <span id="amount3">0</span> Rps</p>
      </div>
    </div>
  </div>

  <form id="finalform" method="post" action="order.php" style="display: none">
    <input type="text" name="meal" id="lastmeal">
    <input type="text" name="flavour" id="lastflavour">
    <input type="text" name="drink" id="lastdrink">
    <input type="text" name="price" id="lastamount">
  </form>
 
<script type="text/javascript" src="js/true.js?v=2"></script>
</body>
</html>
