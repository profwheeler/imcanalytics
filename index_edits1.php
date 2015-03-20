<?php
	if(isset($_POST['name'])) {
	     
	     $UNAME = ($_POST['name']);
		 $GREETING = 'Welcome back '. $UNAME.'.';

		 } else { 
		 $GREETING = 'Welcome Guest. <a href="#" class="my_popup_open">Log on</a> for recommendations.'; 
		 }
		 $CARTCOUNT = 0;
		 
?>

<html>
 <head>

 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://www.imcanalytics.com/js/jquery.popupoverlay.js"></script>
 <style>
 section {
    width: 90%;
    height: 200px;
    margin: auto;
    padding: 10px;
}

#one {
  float:left; 
  margin-right:20px;
  width:40%;
  border:1px solid;
  min-height:170px;
}

#two { 
  overflow:hidden;
  width:40%;
  border:1px solid;
  min-height:170px;
}

#three {
  float:left; 
  margin-top:10px;
  margin-right:20px;
  width:40%;
  border:1px solid;
  min-height:170px;
}

#four { 
  overflow:hidden;
  margin-top:10px;
  width:40%;
  border:1px solid;
  min-height:170px;
}

@media screen and (max-width: 400px) {
   #one { 
    float: none;
	margin-right:0;
    margin-bottom:10px;
    width:auto;
  }
  
  #two { 
  background-color: white;
  overflow:hidden;
  width:auto;
  margin-bottom:10px;
  min-height:170px;
}

   #three { 
    float: none;
	margin-right:0;
    margin-bottom:10px;
    width:auto;
  }
  
  #four { 
  background-color: white;
  overflow:hidden;
  width:auto;
  min-height:170px;
}

}
</style>

<script>
    
    $(document).ready(function() {

      // Initialize the plugin
	 
      $('#my_popup').popup({  
	   transition: 'all 0.3s',
       scrolllock: true // optional
   });
});

</script>

<script language="JavaScript">

function checkCookie() {

    var userdeets = getCookie("readuser");
    if (userdeets != "") {
	    var deets = userdeets.split("%-");
		var user = deets[0];
		greeting.innerHTML = 'Welcome ' + user;
	} else { return "";
  }
}

function getCookie(cname) {

    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function bakeCookie(cname, cvalue1, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue1 + ";" + expires;
}

function mixCookie() {

 	    var name = document.forms["form1"]["name"].value;

        bakeCookie("readuser", name, 365);
			
   }
</script>

 </head>
 <body onload="checkCookie()">
 <div style="width:100%; height:25%; background-color:#57585A;">
 <img src="img/ic1.jpg" style="max-height: 100%;">
    <div style="float:right; margin-right:75px;margin-top:10px; color:white;"> Cart: <?php echo $CARTCOUNT ?> </div>
 </div>
 <div style="margin-top:10px; margin-bottom:10px; font-size: 130%; color:#57585A;">
 <strong>Icculus Media: For All Your Fictional Needs</strong>
 </div>

 <div id="greeting"> <?php echo $GREETING ?> </div>
 <div id="cta1"> Please browse our options:</div>
 <section>
    <div id="one" style="padding:10px;">
	Book One</div>
    <div id="two" style="padding:10px;">
	Book Two
	</div>
	<div id="three" style="padding:10px;">
	Book Three</div>
    <div id="four" style="padding:10px;">
	Book Four
	</div>
</section>

	<div id="my_popup" style = "background-color: white; display: none; padding: 20px;">
    <form name="form1" action="#" method="post">
	     <div>Please enter your name:</div>
	
    <input name="name" id="uname" type="text" /><p>
	<input type="submit" onclick="mixCookie();" value="Log In"/> <p>
	</form>
	</div>

 </body>
 </html>
