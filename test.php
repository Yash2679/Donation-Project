<html lang="en" >
 
<head>
  <meta charset="UTF-8">
  <title>CSS Input Label Animation | Webdevtrick.com</title>
 
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <style>
     * {
  letter-spacing: 3px;
  font-family: 'Alegreya Sans SC', sans-serif;
}
body {
  color: white;
  background-color: #f05855;
}
 
h1 {
  font-size: 60px;
  margin: 0px;
  padding: 0px;
  text-align: center;
}
 
div.main {
  width: 700px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  vertical-align: middle;
}
 
div.main div {
  position: relative;
  margin: 40px 0;
}
 
label {
  position: absolute;
  top: 0;
  font-size: 30px;
  margin: 10px;
  padding: 0 10px;
  background-color: #f05855;
  -webkit-transition: top .2s ease-in-out,  font-size .2s ease-in-out;
  transition: top .2s ease-in-out,  font-size .2s ease-in-out;
}
 
.active {
  top: -25px;
  font-size: 20px;
  font-weight: 900;
  letter-spacing: 6px;
  text-transform: uppercase;
}
 
input[type=text] {
  width: 100%;
  padding: 20px;
  border: 2px solid white;
  font-size: 20px;
  font-weight: 800;
  background-color: #f05855;
  color: white;
}
 
input[type=text]:focus {
  outline: none;
}
 </style>
  
</head>
 
<body>
    <script>
        $(document).ready(function(){
$('input').on('focusin', function() {
  $(this).parent().find('label').addClass('active');
});
 
$('input').on('focusout', function() {
  if (!this.value) {
    $(this).parent().find('label').removeClass('active');
  }
});
   }); </script>
<div class="main">
  <h1>CSS Label Animation</h1>
  <div>
    <label for="FirName">First Name</label>
    <input id="FirName" type="text" class="styl"/>
  </div>
 
  <div>
    <label for="LasName">Last Name</label>
    <input id="LasName" type="text" class="styl"/>
  </div>
  
  <div>
    <label for="Massag">Your Massage</label>
    <input id="Massag" type="text" class="styl"/>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 
    <script  src="function.js"></script>
 
 
</body>
</html>