<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		<link rel="stylesheet" href="css/style.css"/>
		<script text="text/javascript">
			var newArray = [
   				["medium", 0, 0],
        		["small", 162, 0],
        		["small", 244, 0],
        		["small", 162, 62],
        		["small", 244, 62],
        		["medium", 326, 0],
        		["small", 0, 122],
        		["small", 82, 122],
        		["medium", 0, 184],
        		["medium", 0, 306],
        		["large", 166, 124],
        		["small", 162, 366],
        		["small", 244, 366],
        		["medium", 326, 366],
        		["small", 322, 488],
        		["small", 404, 488],
        		["medium", 322, 550],
        		["large", 0, 430]
    		];   		
    		$(document).ready(function(){
    			

    			var num = $('div#left-side').children().length;
    			var divImages = $('div#left-side').children();
    			var counter=0;
    			for(var i=0;i<num;i++){
    				if(counter==18){
    					counter=0;
    					for(var j=0;j<18;j++){
    						newArray[j][2]=newArray[j][2]+672;
    					}
    				}
    				if(newArray[counter][0]=="small"){
    					$(divImages[i]).addClass("simg-container");
    					$(divImages[i]).find('img').addClass("size-small");
    					
    				}
    				if(newArray[counter][0]=="medium"){
    					$(divImages[i]).addClass("mimg-container");
    					$(divImages[i]).find('img').addClass("size-medium");
    				
    				}
    				if(newArray[counter][0]=="large"){
    					$(divImages[i]).addClass("limg-container");
    					$(divImages[i]).find('img').addClass("size-large");
    				}
    				$(divImages[i]).css({'left': newArray[counter][1]});
    				$(divImages[i]).css({'top': newArray[counter][2]});
    				counter++;
    			}
    			    
    						
    		});

		</script>
	</head>
	<body>
		<div id="page">
		<div id="event-top-page">
			<div id="event-image"><img src="img/profile.jpg"></img></div>
			<div id="event-data">
				<div id="epage-topdata">
					<p id="epage-eventname">Understanding Eygptian</p>
					<p id="epage-eventdate">Feb 1'2011</p>
				</div>
				<div id="epage-bdata">
					<p>150 IVY Street</p>
				</div>
			</div>
			<div id="event-map"><img src="img/profile.jpg" style="width:200px;height:150px;"></img></div>
			<div style="clear:both;"></div>
		</div>
		<div id="bottom-page">
			<div id="right-side">
				<div id="add-album">
					<a href="#"><img src="img/add-album-normal.png"></img></a>
				</div>
				<div>	
				<table border="0" cellspacing="0">
					<tbody>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
						<tr><td><img src="img/profile.jpg"></td><td><p class="people-name">Kaushal Agrawal</p></td></tr>
					</tbody>
				</table>
				</div>
			</div>
			<div id="left-side">
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>
				<div><img src="img/thumbnail.jpg"></img></div>

											
			</div>
			<div style="clear:both;"/>
		</div>
		</div>
	</body>
</html>
