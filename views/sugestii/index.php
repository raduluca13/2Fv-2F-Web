	   	<header>
	    	<h1 class="title">My WEB way!</h1>
	     	<nav>
	 			<ul id="nav_ul">
	 				<li id="home_li" class="nav_item"><a id="a_frontpage" href="/home">Home</a></li>
 					<!-- <li id="sugestii_li" class="nav_item"><a id="a_sugestii" href="/sugestii">Suggestions</a></li> -->
 					<li id="catalog_li" class="nav_item"><a id="a_catalog" href="catalog.html">Rankings</a></li>
 					<li id="profile" class="nav_item"><a id="a_profile" href="/profile">Profile</a>
					<li id="ddn" class="nav_item"><a id="logout" href="javascript:logout();">Logout</a>
	 					<!--ul id="dropdown"-->
	 						<!--li id="myprofile_li"><a id="a_myprofile" href="myprofile.html">Detalii</a></li-->
	 						<!--li id="logout_li"><a id="a_logout" href="logout.html">Logout</a></li-->
	 					<!--/ul-->
	 				</li>
	 			</ul>
	 		</nav>
	  	</header>
		<main>
			<section id="sec1" class="bigtitle">
    	<h2 class="bigtitle-title">COURSE</h2>
    	<h3 style = "color: #0ec91a; font-size:18px; class="subtitle">Here you'll find the next three avaible events</h3>
    	<a id="a_su_curs" href="#" onclick="showDiv_curs();return false;" class="info-link">Click here for details</a>
    	<ul id="ul_su_curs" class="future_events">
    		<!-- the very next event -->
    		<li class="future_events_li" >
    			<span style="color: #3498db; float:left;">Next lecture on </span>
    			<a id="a_item0";  target="_blank"></a>
    			<a id="d_item0" target="_blank" style = "color: #3498db; font-size:18px;float:right;">Date</a>
    		</li>
    		<!-- suggestion no. 1 -->
    		<li class="future_events_li" >
    			<span id="item1"></span>
    			<a id="a_item1" target="_blank"></a>
    			<a id="d_item1" target="_blank" style = "color: #3498db; font-size:18px; float:right;">Date</a>
    		</li>
    		<!-- suggestion no. 2 -->
    		<li class="future_events_li">
    			<span id="item2" ></span>
    			<a id="a_item2";  target="_blank" style="text-align: center;"></a>
    			<a id="d_item2" target="_blank" style = "color: #3498db; font-size:18px; float:right;">Date</a>
    		</li>
    		<!-- suggestion no. 3 -->
    		<li class="future_events_li">
    			<span id="item3" "></span>
    			<a id="a_item3";  target="_blank"></a>
    			<a id="d_item3" target="_blank" style = "color: #3498db; font-size:18px; float:right; ">Date</a>
    		</li>

    		<li><a id="a_hide_c" class="info-link" href="#" onclick="hide_curs();return false;">Hide</a></li>
    	</ul>
  	</section>
		   	<section id="sec2" class="bigtitle">
		    	<h2 class="bigtitle-title">LABORATORY</h2>
		    	<h3 style = "color: #0ec91a; font-size:18px; class="subtitle">Do you want to improve you performance at laboratory?</h3>
		    	<a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Click here for suggestions</a>
		    	<ul id="ul_su_lab" class="future_events">

		    	<li class="future_events_li">
    			<span style="color:#3498db; float:left;">Next laboratory on</span>
    			<a id="l_a_item0";  target="_blank"></a>
    			<a id="l_d_item0" target="_blank" style = "color: #3498db; font-size:18px; float:right;">Date</a>
    		</li>
    		<!-- suggestion no. 1 -->
    		<li class="future_events_li">
    			<span id="l_item1" ></span>
    			<a id="l_a_item1" target="_blank"></a>
    			<a id="l_d_item1" target="_blank" style = "color: #3498db; font-size:18px;float:right;">Date</a>
    		</li>
    		<!-- suggestion no. 2 -->
    		<li class="future_events_li">
    			<span id="l_item2" ></span>
    			<a id="l_a_item2";  target="_blank"></a>
    			<a id="l_d_item2" target="_blank" style = "color: #3498db; font-size:18px;float:right; ">Date</a>
    		</li>
    		<!-- suggestion no. 3 -->
    		<li class="future_events_li">
    			<span id="l_item3" ></span>
    			<a id="l_a_item3";  target="_blank"></a>
    			<a id="l_d_item3" target="_blank" style = "color: #3498db; font-size:18px;float:right; ">Date</a>
    		</li>


		    	<li><a id="a_hide_l" class="info-link" href="#" onclick="hide_lab();return false;">Hide</a></li>
		    	</ul>
		  	</section>
		 	<section id="sec3" class="bigtitle">
		    	<h2 class="bigtitle-title">OTHER EVENTS</h2>
		    	<h3 style = "color: #0ec91a; font-size:18px; class="subtitle">Do you want to find events suitable for Web Technologies?</h3>
		    	<a id="a_su_even" href="#" onclick="showDiv_ev();return false;" class="info-link">Click here for suggestions</a>
		    	<ul id="ul_su_even" class="future_events">
			      	<li class="future_events_li" id="future1"></li>
			      	<li class="future_events_li" id="future2"></li>
			      	<li class="future_events_li" id="future3"></li>
			      	<li class="future_events_li" id="future4"></li>
			      	<li class="future_events_li" id="future5"></li>
							<li class="future_events_li" id="future6"></li>
  					<li><a href="#" class="info-link">See more events</a></li>
  					<li><a id="a_hide_ev" class="info-link" href="#" onclick="hide_ev();return false;">Hide</a></li>
  				</ul>
		  	</section>
		  	<script src="/views/sugestii/js/show-hide.js" type="text/javascript"></script>
		  	<script src="/views/sugestii/js/future_events.js" type="text/javascript"></script>
		  	<script src="/views/sugestii/js/sugestii.js" type="text/javascript"></script>
		</main>
