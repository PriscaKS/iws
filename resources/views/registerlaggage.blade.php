<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Ticket</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="stylesheet/register.css">
   
    <style>
        .luggage-item {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ffdd57;
            display: flex;
            flex-direction: column;
        }

        .remove-luggage-btn {
            align-self: flex-end;
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .button-container {
            margin-top: 20px; /* Space above the button container */
        }

        .button-container button {
            display: block; /* Ensure buttons are displayed as block elements */
            margin-bottom: 10px; /* Space below each button */
            padding: 10px;
            font-size: 18px;
            font-weight: 400;
        }
    </style>
</head>
<body>

    <!-- Top-left Text with Icon -->
    <div class="top-left">
        <i class="fas fa-plane"></i>
        <h2>Malawi Airlines</h2>
        <i class="fas fa-bars nav-icon"></i>
        <div class="nav-content">
            <h2>Malawi Airlines</h2>
        </div>
    </div>

    <div class="booking-form">
        <form id="bookingForm">
            <h2>Register Luggage</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" readonly>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" readonly>
            </div>
            <div class="form-group">
                <label for="ticket-number">Flight Ticket Number</label>
                <input type="text" id="ticket-number" name="ticket-number">
            </div>
            <div class="form-group">
                <label for="departure-airport">Departure Airport</label>
                <input type="text" id="departure-airport" name="departure-airport" placeholder="Enter departure airport" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination Airport</label>
                <input type="text" id="destination" name="destination" placeholder="Enter destination airport" required>
            </div>

            <!-- Luggage Section -->
            <div class="luggage-section" id="luggageSection">
                <div class="luggage-item" id="luggageItemTemplate">
                    <h3>Luggage 1</h3>
                    <div class="form-group">
                        <label for="luggage-name-1">Item type</label>
                        <input type="text" id="luggage-name-1" name="luggage-name[]" placeholder="Enter luggage name" required>
                    </div>
                    <div class="form-group">
                        <label for="luggage-description-1">Item description</label>
                        <input type="text" id="luggage-description-1" name="luggage-description[]" placeholder="Enter brand description" required>
                    </div>
                    <div class="form-group">
                        <label for="luggage-description-1">Item Brand</label>
                        <input type="text" id="luggage-brand" name="luggage-description[]" placeholder="Enter item brand" required>
                    </div>
                    <button type="button" class="remove-luggage-btn">Remove</button>
                </div>
            </div>

            <!-- Button Container -->
            <div class="button-container">
                <button type="button" class="add-luggage-btn" id="addLuggageBtn">Add Luggage</button>
                <button type="submit" id="submitLuggageBtn">Submit Luggage</button>
            </div>
        </form>
        <button id="viewQRCodeBtn" style="display:none;">View QR Code</button>
    </div>

    <script>
        const navIcon = document.querySelector('.nav-icon');
        const navContent = document.querySelector('.nav-content');
        const viewQRCodeBtn = document.getElementById('viewQRCodeBtn');
        const luggageSection = document.getElementById('luggageSection');
        const addLuggageBtn = document.getElementById('addLuggageBtn');
    
        // Track the current luggage count
        let luggageCount = 1;
    
        navIcon.addEventListener('click', () => {
            navContent.classList.toggle('active');
        });
    
        // Simulate fetching data from the database and autofilling the form
        document.addEventListener('DOMContentLoaded', () => {
            const formData = {
                name: "John",
                surname: "Doe",
                email: "johndoe@example.com",
                phone: "123-456-7890",
                ticketNumber: "FL123456"
            };
    
            document.getElementById('name').value = formData.name;
            document.getElementById('surname').value = formData.surname;
            document.getElementById('email').value = formData.email;
            document.getElementById('phone').value = formData.phone;
            document.getElementById('ticket-number').value = formData.ticketNumber;
        });
    
        function updateLuggageCount() {
            const luggageItems = luggageSection.querySelectorAll('.luggage-item');
            luggageCount = luggageItems.length > 0 ? luggageItems.length + 1 : 1;
        }
    
        function addLuggageItem(count) {
            const newLuggageItem = document.createElement('div');
            newLuggageItem.classList.add('luggage-item');
            newLuggageItem.innerHTML = `
                <h3>Luggage ${count}</h3>
                <div class="form-group">
                    <label for="luggage-name-${count}">Luggage Name</label>
                    <input type="text" id="luggage-name-${count}" name="luggage-name[]" placeholder="Enter luggage name" required>
                </div>
                <div class="form-group">
                    <label for="luggage-description-${count}">Luggage Description</label>
                    <input type="text" id="luggage-description-${count}" name="luggage-description[]" placeholder="Enter luggage description" required>
                </div>
                <button type="button" class="remove-luggage-btn">Remove</button>
            `;
            luggageSection.appendChild(newLuggageItem);
    
            // Add event listener for the remove button
            const removeBtn = newLuggageItem.querySelector('.remove-luggage-btn');
            removeBtn.addEventListener('click', () => {
                luggageSection.removeChild(newLuggageItem);
                updateLuggageCount(); // Update the count after removal
            });
        }
    
        // Adding luggage items dynamically
        addLuggageBtn.addEventListener('click', () => {
            updateLuggageCount(); // Update the count based on existing items
            addLuggageItem(luggageCount); // Add the new luggage item with the updated count
        });
    
        // Remove luggage item
        luggageSection.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-luggage-btn')) {
                const luggageItem = e.target.closest('.luggage-item');
                luggageSection.removeChild(luggageItem);
                updateLuggageCount(); // Update the count after removal
            }
        });
    
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Handle the form submission logic here
            alert('Luggage Registered successfully!');
    
            // Show the "View QR Code" button after submission
            viewQRCodeBtn.style.display = 'block';
        });
    
        // Redirect to the QR code page when "View QR Code" button is clicked
        viewQRCodeBtn.addEventListener('click', function() {
            // Collect luggage details
            const luggageItems = document.querySelectorAll('.luggage-item');
            const luggageDetails = [];
            
            luggageItems.forEach((item, index) => {
                const name = item.querySelector(`[id^='luggage-name-']`).value;
                const description = item.querySelector(`[id^='luggage-description-']`).value;
                luggageDetails.push({
                    name: name,
                    description: description
                });
            });
    
            const queryParams = new URLSearchParams({
                name: document.getElementById('name').value,
                surname: document.getElementById('surname').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                ticketNumber: document.getElementById('ticket-number').value,
                departureAirport: document.getElementById('departure-airport').value,
                destination: document.getElementById('destination').value,
                luggageDetails: JSON.stringify(luggageDetails)
            }).toString();
            
            const qrCodePageUrl = 'http://127.0.0.1:8000/your-qr-code-page?' + queryParams;
            window.location.href = qrCodePageUrl;
        });
    </script>
</body>
</html>
