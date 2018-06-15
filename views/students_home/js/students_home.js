function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function PopulateChances()
{
    ajax.post('api/computechanches', {
        id : cookieGetUserID()
        }, function (chances)
    {
      console.log(chances);
      chances=chances.split(" ");
      courses_attendances = chances[0];
      courses_attendances=parseInt(courses_attendances*100);
      laboratories_attendances = chances[1];
      laboratories_attendances=parseInt(laboratories_attendances*100);
      web_events = chances[2];
      web_events=parseInt(web_events*100);
      project_situation = chances[3];
      project_situation=parseInt(project_situation*100);
      promovability_chance = chances[4];
      promovability_chance=parseInt(promovability_chance*100);


      document.getElementById("courses_attendances_value").textContent=courses_attendances+"%";
      document.getElementById("laboratories_attendances_value").textContent=laboratories_attendances+"%";
      document.getElementById("web_events_value").textContent=web_events+"%";
      document.getElementById("project_situation_value").textContent=project_situation+"%";
      document.getElementById("promovability_chance_value").textContent=promovability_chance+"%";
      document.getElementById("courses_attendances").style.width=(courses_attendances+"%");
      document.getElementById("laboratories_attendances").style.width=(laboratories_attendances+"%");
      document.getElementById("web_events").style.width=(web_events+"%");
      document.getElementById("project_situation").style.width=(project_situation+"%");
      document.getElementById("promovability_chance").style.width=(promovability_chance+"%");
      document.getElementById("github_frame").src="http://colmdoyle.github.io/gh-activity/gh-activity.html?user=".concat(GetGithubAccountCookieValue(),"&repo=pbr&type=repo");

      if (promovability_chance < 50)
        document.getElementById("face").src="/public/images/sad_face.png"
      else
        document.getElementById("face").src="/public/images/smiley_face.png"
    });
}

function PopulateEvents()
{
  ajax.get('api/getevents',{
  }, function (events)
  {
    events = events.split("#!#");
    document.getElementById("future1").textContent=events[0];
    document.getElementById("future2").textContent=events[1];
    document.getElementById("future3").textContent=events[2];
    document.getElementById("future4").textContent=events[3];
    document.getElementById("future5").textContent=events[4];
    document.getElementById("future6").textContent=events[5];
  });
}
