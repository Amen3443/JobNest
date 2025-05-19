//document.getElementById("conform").addEventListener("submit", function(event) {
    //event.preventDefault(); // Prevent the default form submission
    
    // Get form data
    let formData = new FormData(this);
    
    // Example: Perform AJAX request to submit form data to the server
    // Replace this with your actual AJAX request
    // For demonstration, just display a popup with the submitted data
 //   let message = "Name: " + formData.get("name") + "\nEmail: " + formData.get("email") + "\nSubject: " + formData.get("subject") + "\nMessage: " + formData.get("message");
  //  alert("Message sent successfully!\n\n" + message);
//});

document.getElementById("clearButton").addEventListener("click", function() {
    // Clear form fields
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("subject").value = "";
    document.getElementById("message").value = "";
});