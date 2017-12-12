

function submitSearch() {
  //Gets the path to the plugin that was provided by the loading of the script
  var path = GNS.plugin_url;
  // retrinve 
  var searchTerm = document.getElementById("searchTermText").value.trim();
  var responseDiv =  document.getElementById("searchOutput");

  // If user has not entered any string, print message  
  if (searchTerm.length==0) { 
    responseDiv.innerHTML="Please enter a search term to generate news."
  	return;
  }

  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        // if status is successful, print result 
        responseDiv.innerHTML=this.responseText;
      }
    }
    // Makes a GET request to php page with searchterm entered by user 

    xmlhttp.open("GET",path.toString() + "/getNews.php?searchTerm="+searchTerm,true);
    xmlhttp.send();
  } else { 
    // if browser does not support httprequest such as ie 6 or ie 7, print message 
    responseDiv.innerHTML="Sorry, your browser does not support this service."
  }
  
}
