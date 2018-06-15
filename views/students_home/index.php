
<script>
  PopulateChances()
  PopulateEvents()
</script>

 <header>
   <h1 class="title">My WEB way!</h1>
   <nav>
			<ul id="nav_ul">
				<li id="home_li" class="nav_item"><a id="a_frontpage" href="/home">Home</a></li>
				<li id="sugestii_li" class="nav_item"><a id="a_sugestii" href="/sugestii">Suggestions</a></li>
				<li id="catalog_li" class="nav_item"><a id="a_catalog" href="/catalog">Rankings</a></li>
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
<section style="min-height:550px;">
  <h2 class="bigtitle-title">Promovability calculator</h2>

  <div style="background-color:#5aaadb; width:200px; margin:auto; border: 3px solid var(--light_blue);" ><img src="/public/images/smiley_face.png" alt="smiley face" style="width:200px" id="face"/></div>
  <div class="prmovability" style="width:75%;margin-left:5%; margin-top:40px;">
    <span>Courses attendances:</span>
    <div class="progress" style="margin-bottom:10px;">
          <span style="width: 20%;" id="courses_attendances"><span id="courses_attendances_value">20%</span></span>
    </div>

    <span>Laboratories attendances:</span>
    <div class="progress" style="margin-bottom:10px;">
      <span class="green" style="width: 40%;" id="laboratories_attendances"><span id="laboratories_attendances_value">40%</span></span>
    </div>

    <span>WEB events attendances:</span>
    <div class="progress" style="margin-bottom:10px;">
      <span class="orange" style="width: 60%;" id="web_events"><span id="web_events_value">60%</span></span>
    </div>

    <span>Project situation:</span>
    <div class="progress" style="margin-bottom:10px;">
      <span class="red" style="width: 80%;" id="project_situation"><span id="project_situation_value">80%</span></span>
    </div>

    <span>Promovability chance:</span>
    <div class="progress">
      <span class="blue" style="width: 55%;" id="promovability_chance"><span id="promovability_chance_value">55%</span></span>
    </div>
  </div>

  <a href="#" class="info-link">Learn more...</a>
</section>
<section class="bigtitle">
  <h2 class="bigtitle-title">Courses and Laboratories Calendar</h2>
  <div id="v-cal">
    <div class="vcal-header">
      <button class="vcal-btn" data-calendar-toggle="previous">
        <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
        </svg>
      </button>

      <div class="vcal-header__label" data-calendar-label="month">
        March 2017
      </div>


      <button class="vcal-btn" data-calendar-toggle="next">
        <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
        </svg>
      </button>
    </div>
    <div class="vcal-week">
      <span>Mon</span>
      <span>Tue</span>
      <span>Wed</span>
      <span>Thu</span>
      <span>Fri</span>
      <span>Sat</span>
      <span>Sun</span>
    </div>
    <div class="vcal-body" data-calendar-area="month"></div>
  </div>
  <script src="/views/students_home/js/vanillaCalendar.js" type="text/javascript"></script>
  	<script>
  		window.addEventListener('load', function () {
  			vanillaCalendar.init({
  				disablePastDays: true
  			});
  		})
	</script>
</section>
 <section class="bigtitle" min-heigt="470">
  <h2 class="bigtitle-title">Github </h2>
  <iframe allowtransparency="true" frameborder="0" scrolling="yes" seamless="seamless"
  src=""; width="100%" height="470" max-height="470" min-height="470" style="margin-bottom:0%;" id="github_frame"></iframe>
</section>
<section class="bigtitle">
  <h2 class="bigtitle-title">WEB events</h2>
  <ul class="future_events">
    <li class="future_events_li" id="future1"></li>
    <li class="future_events_li" id="future2"></li>
    <li class="future_events_li" id="future3"></li>
    <li class="future_events_li" id="future4"></li>
    <li class="future_events_li" id="future5"></li>
    <li class="future_events_li" id="future6"></li>
  </ul>
  <script src="/views/students_home/js/future_events.js" type="text/javascript"></script>
  <a href="/sugestii" class="info-link">See more events</a>
</section>
</main>
