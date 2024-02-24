// Get the modal
var modal = document.getElementById("logoutModal");

// Get the button that opens the modal
var btn = document.getElementById("logoutButton");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the confirm and cancel buttons
var confirmLogoutBtn = document.getElementById("confirmLogout");
var cancelLogoutBtn = document.getElementById("cancelLogout");

// Function to open the modal
function openModal() {
    modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks the button, open the modal
btn.onclick = openModal;

// When the user clicks on <span> (x), close the modal
span.onclick = closeModal;

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        closeModal();
    }
};

// When the user clicks confirm logout, redirect to logout script
confirmLogoutBtn.onclick = function () {
    window.location.href = "logout.php";
};

// When the user clicks cancel logout, close the modal
cancelLogoutBtn.onclick = closeModal;
