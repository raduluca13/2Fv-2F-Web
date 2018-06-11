<header>
  <h1 class="title">My WEB way | teacher</h1>
  <nav>
   <ul id="nav_ul">
     <li id="home_li" class="nav_item"><a id="a_frontpage" href="students_index.html">Home</a></li>
     <li id="sugestii_li" class="nav_item"><a id="a_sugestii" href="sugestii.html">Catalog</a></li>

     <li id="ddn" class="nav_item"><a id="a_profile" href="profile.html">Profile</a>
       <!--ul id="dropdown"-->
         <!--li id="myprofile_li"><a id="a_myprofile" href="myprofile.html">Detalii</a></li-->
         <!--li id="logout_li"><a id="a_logout" href="logout.html">Logout</a></li-->
       <!--/ul-->
     </li>
   </ul>
 </nav>
</header>
<main>
<section style="min-height:1000px;">
 <h2 style="text-align:center;">Activitate recenta</h2>
 <!--  -->
 <h2 class="bigtitle-title">Adaugare nota</h2>
       <p>1. Adaugare punctaj student: Iftimesei Ioan.</p>
       <p>2. Adaugare punctaj student: Arhip Andrei.</p>
       <a id="a_su_curs" href="#" onclick="showDiv_curs();return false;" class="info-link">Info</a>
       <ul id="ul_su_curs">
         <li><p>1. Punctaj [Lab - 3]: 10.00 puncte.</p></li>
         <li><p>2. Punctaj [Lab - 3]: 9.00 puncte.</p></li>

       </ul>
 <!--  -->
 <h2 class="bigtitle-title">Evidenta prezente laborator</h2>
       <p>Update tabel evidenta prezente laborator.</p>
       <a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Info</a>
       <ul id="ul_su_lab">
         <p>1. Prezenta [Lab - 3] +1 student: Iftimesei Ioan.</p>
         <p>2. Prezenta [Lab - 3] +1 student: Arhip Andrei.</p>
         <p>3. Prezenta [Lab - 3] +1 student: Radu Luca.</p>
       </ul>
 <!--  -->
 <h2 class="bigtitle-title">Adaugare Bonus</h2>
       <p>Adaugare bonus student: Cretu Marius.</p>
       <a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Info</a>
       <ul id="ul_su_lab">
         <p>1. Bonus [Lab - 3] +5 (puncte).</p>
       </ul>
 <!--  -->
 <h2 class="bigtitle-title">Evidenta prezente curs</h2>
       <p>Update tabel evidenta prezente curs.</p>
       <a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Info</a>
       <ul id="ul_su_lab">
         <p>1. Prezenta [Curs - 3] +1 student: Iftimesei Ioan.</p>
         <p>2. Prezenta [Lab - 3] +1 student: Cretu Marius.</p>

       </ul>

   <a href="#" class="info-link">Load more...</a>
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
 <script src="js/vanillaCalendar.js" type="text/javascript"></script>
   <script>
     window.addEventListener('load', function () {
       vanillaCalendar.init({
         disablePastDays: true
       });
     })
 </script>
</section>

<section class="bigtitle">
 <h2 class="bigtitle-title">WEB events</h2>
 <ul class="future_events">
   <li class="future_events_li">SmashingConf San Francisco, USA (April 17-18, 2018)</li>
   <li class="future_events_li checked">App Promotion Summit London, UK(March, 2018)</li>
   <li class="future_events_li">Experience Conference Bratislava, Slowakia(March 27, 2018)</li>
   <li class="future_events_li">DevConf 2018 Johannesburg, South Africa(March 27, 2018)</li>
   <li class="future_events_li">University of Illinois Web Conference 2018(April 4-6, 2018)</li>
   <li class="future_events_li">RWDevCon 2018 Alexandria, VA, USA(April 5-7, 2018)</li>
 </ul>
 <script src="js/future_events.js" type="text/javascript"></script>
 <a href="#" class="info-link">See more events</a>
</section>
</main>
