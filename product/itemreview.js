function showreviewpopup() {
      var x = document.getElementById("reviewpopup");
      if (x.style.display === "block") {
            x.style.display = "none";
      } else {
            x.style.display = "block";

      }
}

function starclick(value){
      document.getElementById("count").value= value;


}

function starchange(){
      var value = document.getElementById("count").innerHTML;

}


