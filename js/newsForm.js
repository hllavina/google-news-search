function submitSearch() {

  var path = pluginURL.plugin_url;
  var searchTerm = document.getElementById("searchTermText").value;
  var responseDiv =  document.getElementById("searchOutput");
  if (searchTerm.length==0) { 
    responseDiv.innerHTML="Please enter a search term to generate news."
  	 return;
  }
  if (window.XMLHttpRequest) {
  
    xmlhttp=new XMLHttpRequest();
  } else { 
  	responseDiv.innerHTML="Sorry, your browser does not support this service."
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("searchOutput").innerHTML=this.responseText;
    }
  }
   xmlhttp.open("GET",(path.toString() + "/getNews.php?searchTerm="+searchTerm,true));
  xmlhttp.send();
}
