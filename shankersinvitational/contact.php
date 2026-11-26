<?php 
include 'dbutils.php';
include 'utils.php';
$currentcomp = getCurrentComp();



?><!-- -->
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta content="black" name="apple-mobile-web-app-status-bar-style">
        
        <!-- Page title + Description -->
        <title>The Shankers Invitational - Contact Us</title>
        <meta name="description" content="The Shankers Invitational Tournament is an annual golfing display of some of the most shankingly average golf seen in Australia">
                
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
        <link rel="icon" type="image/png" href="favicons/favicon-196x196.png" sizes="196x196">
        <link rel="icon" type="image/png" href="favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
        
        
		
		<!-- Style Sheets -->
        <link rel="stylesheet" type="text/css" href="css/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
		
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">  
        <link rel="stylesheet" type="text/css" href="css/jquery.sidr.light.css">
        <link rel="stylesheet" type="text/css" href="js/media/mediaelementplayer.min.css" />
        <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css"> 
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.4"/> 
        <link rel="stylesheet" type="text/css" href="css/mosaic.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/rs-plugin.css">
        <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" />
        <link rel="stylesheet" type="text/css" href="css/tooltipster.css">
        <link rel="stylesheet" type="text/css" href="css/mega.css" />
        

        <link rel="stylesheet" type="text/css" href="css/skin1.css"> <!-- change to skin2.css for other skin -->
        <link rel="stylesheet" type="text/css" href="css/full.css"> <!-- change to boxed.css for boxed style -->
		
		
		<!-- Scripts -->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
    
    	
    	
	<div id="divheader"></div>
        	
     	
    	
    	
   	<!-- Start Outter Wrapper -->	
   	<div class="outter-wrapper">
   		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3569.009490812422!2d153.09455599999998!3d-26.551962999999997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b93719bd1912f93%3A0xf02a35bd720a4a0!2sPalmer+Coolum+Resort!5e0!3m2!1sen!2sau!4v1423045784547" width="600" height="550" frameborder="0" style="border:0"></iframe>
   	</div>
   	<!-- End Outter Wrapper -->		
    
    	
    
    
    			
    	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper body-wrapper">		
		<div class="wrapper ad-pad clearfix">
			
			
			<div class="col-3-4">
	        	<h1>Get in touch</h1>
	        	<p class="lead">Want to know more about the Shankers Invitational Tournament?  Send us a message. </p> 
	   	                
	        	
	        	
	        	<script type="text/javascript">
	        	 var RecaptchaOptions = {
	        	    theme : 'custom',
	        	    custom_theme_widget: 'recaptcha_widget'
	        	 };
	        	 </script>
	        	 
	        	 
	        	<!-- Start Form -->
	        	<form id="contactform" action="php/processForm-wcaptcha.php" method="post">
	        		<table class="tableless">
	        			<tr><td><input type="text" id="name" name="name" placeholder="What's your name" /></td></tr>
	        			<tr><td><input type="email" id="email" name="email" placeholder="Email goes here" /></td></tr>
	        			<tr><td><textarea id="message" name="message" rows="5" cols="20" placeholder="Whats this about?"></textarea></td></tr>
	        		</table>
	        		
	        		<?php
	        		  require_once('php/recaptchalib.php');
	        		  $publickey = "6LdQugETAAAAABt9gG6ta32aTObWed_PTOW5Ma4J"; // Recaptcha Public Key
	        		  echo recaptcha_get_html($publickey);
	        		?>
	        		
	        		
	        		<!-- Start Recapcha Widget -->
	        		 <div id="recaptcha_widget" style="display:none">
	        		
	        		   <div id="recaptcha_image"></div>
	        		   <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
	        		
	        		   <div class="recaptcha_only_if_image"><!-- Enter the words above: --></div>
	        		   <div class="recaptcha_only_if_audio"><!-- Enter the numbers you hear: --></div>
	        			
	        		   <input type="text" id="recaptcha_response_field" placeholder="Enter the words you see or hear" name="recaptcha_response_field" />
	        		
	        		   
	        		   	
	        		   <ul class="recap-tools">
	        		   		<li><a href="javascript:Recaptcha.reload()">
	        		   		<em class="fa">&#xf021;</em> <!-- Get another CAPTCHA --></a>
	        		   		</li>
	        		   
		        		   <li class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">
		        		   		<em class="fa">&#xf0a1;</em><!-- Get an audio CAPTCHA --></a>		
		        		   </li>
		        		   
		        		   <li class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">
		        		   		<em class="fa">&#xf03e;</em><!-- Get an image CAPTCHA --></a>
		        		   </li>
		        		
		        		   <li><a href="javascript:Recaptcha.showhelp()">
		        		   		<em class="fa">&#xf128;</em><!-- Help --></a>
		        		   </li>
	        		
	        		 </ul>
	        		 </div>
	        		
	        		
	        		 <script type="text/javascript"
	        		    src="http://www.google.com/recaptcha/api/challenge?k=6LdQugETAAAAABt9gG6ta32aTObWed_PTOW5Ma4J">
	        		 </script>
	        		 
	        		 <noscript>
	        		   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LdQugETAAAAABt9gG6ta32aTObWed_PTOW5Ma4J"
	        		        height="300" width="500" frameborder="0"></iframe><br>
	        		   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
	        		   </textarea>
	        		   <input type="hidden" name="recaptcha_response_field"
	        		        value="manual_challenge">
	        		 </noscript>
	        		
	        		<input name="button" class="btn-2" type="submit" value="Send Message" id="send" />
	        	</form>
	        	
	        	
	        	
	        	<div id="response"></div>
	              	                                                                                               
				<!-- Finish Main Content -->
	        </div>
			
			
			
	
			<!-- Start Main Sidebar  -->
			<aside class="col-1-4 last">
				<div class="widget">
				<h3>Find us at</h3>
			    <ul class="widget-list list-1">
			    	<li><a href="https://twitter.com/TheShankers">Twitter.com/TheShankers</a></li>
			    	<li>Melbourne, Australia, 3000</li>
			    </ul>
							    </div>	
			</aside> 
			<!-- Finish Sidebar -->
				
			
		</div>
	</div>
    	
    	
    	
    	
    	
    	
		
		
	<!-- Load jQuery -->
	<script type="text/javascript" src="js/vendor/jquery-1.8.3.min.js"></script>
	
	<!-- Load jQuery -->
	<script type="text/javascript" src="js/vendor/jquery-1.8.3.min.js"></script>
	
	<!-- Start Scripts --> 
	<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="js/jquery.sidr.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<script type="text/javascript" src="js/cleantabs.jquery.js"></script>
	<script type="text/javascript" src="js/fitvids.min.js"></script>
	<script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
	<script type="text/javascript" src="js/media/mediaelement-and-player.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="js/selectivizr-min.js"></script>
	<script type="text/javascript" src="js/placeholder.js"></script>
	<script type="text/javascript" src="js/jquery.stellar.min.js"></script>
	<script type="text/javascript" src="js/mosaic.1.0.1.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/jquery.tooltipster.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/jquery.sticky.js"></script>
	<script type="text/javascript" src="js/html5media.js"></script>
	
	<script type="text/javascript" src="js/contact.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	
	<script type="text/javascript" src="js/main.js"></script>
	

	
	
	 			
				
    <div id="divfooter"></div>
	<div id="divga"></div>
	<script type="text/javascript">

        $(document).ready(function () {
            $("#divheader").load("header.php");
            $("#divfooter").load("footer.html");
            $("#divga").load("ga.html");
        });   
 	</script>
	    
    </body>
</html>
