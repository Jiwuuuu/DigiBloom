var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    var panel = this.nextElementSibling;
    
    // If the clicked accordion is already active, close its corresponding answer
    if (this.classList.contains("active")) {
      panel.style.display = "none";
      this.classList.remove("active");
    } else {
      // Close all answers
      closeAllAnswers();
      
      // Toggle active class for clicked accordion
      this.classList.toggle("active");

      // Open the panel of the clicked accordion
      panel.style.display = "block";
    }
  });
}

function closeAllAnswers() {
  var answers = document.getElementsByClassName("answer");
  for (var j = 0; j < answers.length; j++) {
    answers[j].style.display = "none";
    acc[j].classList.remove("active");
  }
}

