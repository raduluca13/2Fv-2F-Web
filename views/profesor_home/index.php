  <body>
   <header>
     <h1 class="title">My WEB way | teacher</h1>
     <nav>
      <ul id="nav_ul">
        <li id="home_li" class="nav_item"><a id="a_frontpage" href="/home">Home</a></li>
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
 <section style="min-height:1000px;">
    <h2 style="text-align:center;">Activitate recenta</h2>
    <!--  -->
    <h2 class="bigtitle-title">Adaugare nota</h2>


          <p id="add_item0" style="color: #3498db;"></p>
          <p id="add_item1"  style="color: #3498db;"></p>

          <a id="a_su_curs" href="#" onclick="showDiv_curs();return false;" class="info-link">Info</a>
          <ul id="ul_su_curs">
            <li><p id="add_item0_show"></p></li>
            <li><p id="add_item1_show"></p></li>

          </ul>
    <!--  -->
    <h2 class="bigtitle-title">Evidenta prezente laborator</h2>
          <p>Update tabel evidenta prezente laborator.</p>
          <a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Info</a>
          <ul id="ul_su_lab">
            <p id="prez_item0" style="color: #3498db;"></p>
            <p id="prez_item1" style="color: #3498db;"></p>
            <p id="prez_item2" style="color: #3498db;"></p>
          </ul>
    <!--  -->
    <h2 class="bigtitle-title">Adaugare Bonus</h2>
          <p id="bonus_item"> Cretu Marius.</p>
          <a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Info</a>
          <ul id="ul_su_lab">
            <p id="bonus_item0" style="color: #3498db;"></p>
          </ul>
    <!--  -->
    <h2 class="bigtitle-title">Evidenta prezente curs</h2>
          <p>Update tabel evidenta prezente curs.</p>
          <a id="a_su_lab" href="#" onclick="showDiv_lab();return false;" class="info-link">Info</a>
          <ul id="ul_su_lab">
            <p id="prez_l_item0" style="color: #3498db;"></p>
            <p id="prez_l_item1" style="color: #3498db;"></p>

          </ul>

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
    <script src="/views/profesor_home/js/vanillaCalendar.js" type="text/javascript"></script>
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
      <li class="future_events_li" id="future1"></li>
      <li class="future_events_li" id="future2"></li>
      <li class="future_events_li" id="future3"></li>
      <li class="future_events_li" id="future4"></li>
      <li class="future_events_li" id="future5"></li>
      <li class="future_events_li" id="future6"></li>
    </ul>
    <script src="/views/profesor_home/js/future_events.js" type="text/javascript"></script>
    <script src="/views/profesor_home/js/profesor_home.js" type="text/javascript"></script>
    <a href="#" class="info-link">See more events</a>
  </section>
</main>
  </body>
