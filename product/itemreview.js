function showreviewpopup() {
      var x = document.getElementById("reviewpopup");
      if (x.style.display === "none") {
            x.style.display = "block";
      } else {
            x.style.display = "none";
      }
}

function ingelogdcheck(){
      var x = document.getElementById("reviewpopup");
      x.style.opacity = "0";
}