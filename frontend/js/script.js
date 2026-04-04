// Search filter
document.getElementById("search").addEventListener("keyup", function () {
    let value = this.value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let name = card.getAttribute("data-name");
        card.style.display = name.includes(value) ? "block" : "none";
    });
});

// Click card
document.querySelectorAll(".card").forEach(card => {
    card.addEventListener("click", () => {
        window.location.href = "services.html";
    });
});
function showDetails(serviceName) {
    const panel = document.getElementById('details-panel');
    
    // This updates the HTML inside the right-side panel
    panel.innerHTML = `
        <div class="service-info">
            <h2>${serviceName} Details</h2>
            <p>Our expert ${serviceName}s are available 24/7 for your home needs.</p>
            <ul style="list-style: none; padding: 0; margin: 20px 0;">
                <li>✅ Professional & Verified</li>
                <li>✅ 30-Minute Arrival</li>
                <li>✅ Transparent Pricing</li>
            </ul>
            <div style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">
                Starting at $19.00
            </div>
            <button class="cta-btn" style="width: 100%;">Proceed to Book</button>
        </div>
    `;
}
// Get user location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
    document.getElementById("locationText").innerText = "Location not supported";
}

function showPosition(position) {
    let lat = position.coords.latitude;
    let lon = position.coords.longitude;

    // For now we assume Chandigarh (you can upgrade later)
    document.getElementById("locationText").innerText =
        "Showing services near your location (Chandigarh)";
}

function showError() {
    document.getElementById("locationText").innerText =
        "Showing services near Chandigarh";
}
// Get GPS location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(getLocationName);
}

function getLocationName(position) {
    let lat = position.coords.latitude;
    let lon = position.coords.longitude;

    // Using OpenStreetMap API (FREE)
    fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
        .then(res => res.json())
        .then(data => {
            let city = data.address.city || data.address.town || "your area";

            document.getElementById("locationText").innerText =
                "Showing services near " + city;
        })
        .catch(() => {
            document.getElementById("locationText").innerText =
                "Showing services near Chandigarh";
        });
}

function goToBooking() {
    window.location.href = "booking.html";
}

function confirmBooking() {
    alert("Booking Confirmed!");
    window.location.href = "dashboard.html";
}
function goToDetails() {
    window.location.href = "service-details.html";
}
// Set location text dynamically
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(pos => {
        document.querySelector(".location").innerText = "📍 Your Location";
    });
}
function goToDashboard() {
    window.location.href = "dashboard.html";
}
// Toggle Profile Dropdown
function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
   if(menu.style.display === "block") {
    menu.style.display = "none";
   }
   else{
    menu.style.display="block";
   }
   }
   window.onclick = function(event){
    if(! event.target.matches('.profile-icon')){
        let dropdown = document.getElementById("dropdownMenu");
        if(dropdown){
            dropdown.style.display = "none";
        }
    }
   }

// Notification Alert
function showNotification() {
    alert("No new notifications 🔔");
}

// Dark Mode Toggle
function toggleDarkMode() {
    document.body.classList.toggle("dark");
}
function validateLogin() {
    let email = document.querySelector('input[type="email"]').value;
    let password = document.querySelector('input[type="password"]').value;

    if (email === "" || password === "") {
        alert("All fields are required!");
        return false;
    }

    if (!email.includes("@")) {
        alert("Enter valid email!");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters!");
        return false;
    }

    return true;
}
fetch("../backend/book_service.php", {
    method:"POST",
    body:new FormData(bookingForm)
})
.then(res=>res.text())
.then(data=>{
    alert("Booking Done ✅");
});