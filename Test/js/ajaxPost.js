
function ajaxPost(url, callback) {

var accessToken = "YTUyODk0NjEwOGEwNzJiNThhN2E1NzA5ZGY0MDgyMDQ1ZDY1NmRjOTM2YTU1MTQ4NjM2NTIxZTBkZWFmNjEzZA";

sessionStorage.setItem("email", email);
var http = new XMLHttpRequest();

var params = "?accessToken=" + accessToken;
http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/json");
http.setRequestHeader("content-length", "69");
http.setRequestHeader("accept-encoding", "gzip, deflate");


http.onreadystatechange = function() {//Call a function when the state changes.
  if(http.readyState == 4 && http.status == 200) {
      if (http.responseText == "Formulaire Validé"){
         window.location = "http://localhost:8888/EyesHelp/contactLensInfo.html";
         alert(http.responseText);
      }
      else {
        window.location = "http://localhost:8888/EyesHelp/register.html";
        alert(http.responseText);
      }

    }
}

http.send(params);
}
