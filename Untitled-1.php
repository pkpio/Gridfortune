<?php
require_once '../../require/functions.php';
if(!isset($_SESSION['user_email']))header( "Refresh: 0; url=../../" );
else{
	$email = $_SESSION['user_email'];
	$sql = "SELECT user_name
		FROM tbl_users
		WHERE user_email = '$email'";
$result = mysql_query($sql) or die("error fetching details." . mysql_error());
$userdata = mysql_fetch_assoc($result);
?>
<div align="center" style="width:700px;">
<div id="header">
	<?php include_once '../../header.php'; ?>
</div>
<style type="text/css">
		
					
			.boxgrid{ 
				width: 325px; 
				height: 260px; 
				margin:10px; 
				float:left; 
				background:#eef2ed; 
				border: solid 2px #000; 
				overflow: hidden; 
				position: relative; 
			}
				.boxgrid img{ 
					position: absolute; 
					top: 0; 
					left: 0; 
					border: 0; 
				}
				.boxgrid p{ 
					padding: 0 10px; 
					color:#000; 
					font-weight:500;
					font-family:garamond;
				}
				.boxgrid a{
					text-decoration:none;
				}
				.boxgrid h3{
					font-size:24px;
					text-align:center;
				}
				
			.boxcaption{ 
				float: left; 
				position: absolute; 
				background: #000; 
				height: 100px; 
				width: 100%; 
				opacity: .8; 
				/* For IE 5-7 */
				filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
				/* For IE 8 */
				-MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
 			}
 				.captionfull .boxcaption {
 					top: 260;
 					left: 0;
 				}
 				.caption .boxcaption {
 					top: 220;
 					left: 0;
 				}
				
		</style>
		
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
				//Vertical Sliding
				$('.boxgrid.slidedown').hover(function(){
					$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
				});
				//Horizontal Sliding
				$('.boxgrid.slideright').hover(function(){
					$(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
				});
				//Diagnal Sliding
				$('.boxgrid.thecombo').hover(function(){
					$(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
				});
				//Partial Sliding (Only show some of background)
				$('.boxgrid.peek').hover(function(){
					$(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
				});
				//Full Caption Sliding (Hidden to Visible)
				$('.boxgrid.captionfull').hover(function(){
					$(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'260px'},{queue:false,duration:160});
				});
				//Caption Sliding (Partially Hidden to Visible)
				$('.boxgrid.caption').hover(function(){
					$(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'220px'},{queue:false,duration:160});
				});
			});
		</script>
		

		<a href="app1/?file=<?php echo $_GET['file']; ?>">
		<div class="boxgrid slidedown" id="left-pane">
		
				<img class="cover" src="app1.jpg"/>
					<h3 style="color:#000">Application-1</h3>
                    <p> "Analyze Energy Usage" can help you in analyzing your energy usage and recommends the saving 
					measures. The features of this application are giving a preliminary overview about your usage patterns,
					 identifying the unusually high usage days, and recommend the measures to save the electricity bill
					 </p>	
			</div></a>
            
            
         <a href="app2/?file=<?php echo $_GET['file']; ?>">  
         <div class="boxgrid slidedown" id="left-pane1">
				<img class="cover" src="app2.jpg"/>
					<h3 style="color:red">Application-2</h3>
					<p> "Manage Peak Usage" is specialized to help you manage your power usage at your peak (high cost)
					 usage periods. Using a robust optimization technique, the feature takes into consideration your
					  consumer preferences, such as day of the week and preferred level of consumption, to help you
					   optimize how you use your electricity and how you want to decrease your levels. 
					    </p></div></a>
                        
		<a href="app3/?file=<?php echo $_GET['file']; ?>">		
        <div class="boxgrid slidedown" id="left-pane2">
				<img class="cover" src="app3.jpg"/>
					<h3 style="color:green">Application-3</h3>
					<p>"Switch to Renewables" recommends when it is most profitable to connect your renewable energy
					 sources, such as solar, fuel cell, PHEV, and wind, to the grid and for personal use. It takes into account
					  consumption levels and the cost you are currently paying on electricity. This feature, with consumer
					   inputs about desired investment levels and location, provides optimal recommendations on renewable
					    energy usage to save and earn money.</br>
                        </p></div></a>
                        
		
        <a href="app4/?file=<?php echo $_GET['file']; ?>" >
        <div class="boxgrid slidedown" id="left-pane3">
				<img class="cover" src="app4.jpg"/>
					<h3 style="color:#000">Application-4</h3>
					<p>"Look into the future" projects your future power usage. This feature is based on consumer input and
					 customized calculations to change one's energy usage over a desired period of time and thus to save 
					 money.
                 	</p></div></a>
                     
                     
			<a href="app5/?file=<?php echo $_GET['file']; ?>" ><div class="boxgrid slidedown" id="left-pane4">
				<img class="cover" src="app5.jpg"/>
					<h3 style="color:brown">Application-5</h3>
					<p>"More Information, Get Smart" can provide more money saving methods by taking into consideration 
					temperature, humidity and wind speed. The user must upload a file with additional information, through
					 which the feature will recommend the best way to reduce energy usage and save money. 
					</p>	
			</div></a>
            <div style="position:absolute; top:820px; height:20px; width:100%;">
            </div>

<!--<div id="footer">
<?php include_once '../../footer.php'; ?>
</div>                
                <!--
<div id="left-pane">
<input type="button" value="APP-1" onclick="changeframe('app1')"></input><br/>
<input type="button" value="APP-2" onclick="changeframe('app2')"></input><br/>
<input type="button" value="APP-3" onclick="changeframe('app3')"></input><br/>
<input type="button" value="APP-4" onclick="changeframe('app4')"></input><br/>
<input type="button" value="APP-5" onclick="changeframe('app5')"></input>
</div>
-->

<style>

#left-pane{
	position:absolute;
	left:180px;
	top:200px;
	
</style>
<style>
#left-pane1{
position:absolute;
left:180px;
top:480px;
</style>
<style>
#left-pane2{
position:absolute;
left:880px;
top:200px;
</style>
<style>
#left-pane3{
position:absolute;
left:530px;
top:340px;
</style>
<style>
#left-pane4{
position:absolute;
left:880px;
top:480px;
</style>

<script>
function changeframe(file){
frame=document.getElementById("iframe");
frame.src=file+"/?file=<?php echo $_GET['file']; ?>";
}
</script>
<?php
}
?>