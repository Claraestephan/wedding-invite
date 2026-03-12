
const weddingDate = new Date("Sep 29, 2026 21:00:00").getTime();

const timer = setInterval(function(){
  const now = new Date().getTime();
  const distance = weddingDate - now;

  const days = Math.floor(distance / (1000*60*60*24));
  const hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
  const minutes = Math.floor((distance % (1000*60*60)) / (1000*60));
  const seconds = Math.floor((distance % (1000*60)) / 1000);

  document.getElementById("timer").innerHTML =
    days + " days " + hours + " hours " + minutes + " minutes " + seconds + " seconds";
}, 1000);


document.getElementById("rsvpForm").addEventListener("submit", function(e){
  e.preventDefault(); 

  const url = "https://script.google.com/macros/s/AKfycbzsD5kFG5VlSh3dTVebmt5jlTH5P-Ya0nQ-G-GfmXjm2arYyxgrv6FYkUkQmn39CzsF/exec"; 
  const formData = new FormData();
  formData.append("email", document.getElementById("email").value);
  formData.append("name", document.getElementById("name").value);
  formData.append("guests", document.getElementById("guests").value);
  formData.append("message", document.getElementById("message").value);

  
  fetch(url, { method: "POST", body: formData })
  .then(response => response.text())
  .then(data => {
      document.getElementById("response").innerHTML = "Thank you! Your RSVP has been sent.";
      document.getElementById("rsvpForm").reset();
  })
  .catch(error => {
      document.getElementById("response").innerHTML = "There was an error. Please try again.";
      console.error(error);
  });
});