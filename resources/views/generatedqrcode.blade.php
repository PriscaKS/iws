<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d1b30;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            position: relative;
            overflow: hidden; /* Prevents scrolling */
        }

        .sidebar {
            width: 20%;
            background-color: #11101d;
            padding: 20px;
            box-shadow: 4px 0 8px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
        }

        .sidebar h3 {
            color: #ffdd57;
            margin-bottom: 15px;
        }

        .sidebar .qr-code-link {
            display: block;
            color: #ffdd57;
            padding: 10px 0;
            cursor: pointer;
            text-decoration: none;
            border-bottom: 1px solid #333;
        }

        .sidebar .qr-code-link:hover {
            background-color: #333;
        }

        .qr-code-container {
            background-color: #11101d;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
            margin: auto;
            text-align: center;
            color: #ffdd57;
            overflow-y: auto;
            position: relative; /* For positioning the back arrow */
        }

        .qr-code-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-family: 'Dancing Script', cursive;
            color: #ffdd57;
        }

        .qr-code-container .info {
            margin-bottom: 20px;
            color: #fff;
            text-align: left;
        }

        .qr-code {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .qr-code img {
            width: 100%;
            max-width: 200px;
            height: auto;
        }

        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
            
            font-size: 24px;
            color: #ffdd57;
            cursor: pointer;
            z-index: 10; /* Ensure it's on top of other elements */
        }

        .back-arrow:hover {
            color: #fdd948;
        }

        .luggage-details {
            margin-top: 20px;
            color: #fff;
            text-align: left;
        }

        .luggage-item {
            margin-bottom: 15px;
        }

        .luggage-item img {
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 style="margin: 55px;">Recent QR Codes</h3>
        <div id="qrCodeLinks"></div>
    </div>

    <!-- Back Arrow -->
    <div class="back-arrow">
        <a href="mainPage.html"><i class="fa-solid fa-arrow-left"></i></a>
    </div>

    <!-- Main QR Code Container -->
    <div class="qr-code-container">
        <h2>Your QR Code</h2>
        <!-- QR Code -->
        <div class="qr-code">
            <img id="qrCodeImage" src="" alt="QR Code">
        </div>

        <!-- User Information -->
        <div class="info">
            <p><strong>Name:</strong> <span id="name"></span></p>
            <p><strong>Surname:</strong> <span id="surname"></span></p>
            <p><strong>Email:</strong> <span id="email"></span></p>
            <p><strong>Phone:</strong> <span id="phone"></span></p>
            <p><strong>Flight Ticket:</strong> <span id="ticketNumber"></span></p>
            <p><strong>Departure:</strong> <span id="departureAirport"></span></p>
            <p><strong>Destination:</strong> <span id="destination"></span></p>
        </div>
        
        <!-- Luggage Details -->
        <div class="luggage-details">
            <h3>Luggage Details</h3>
            <div id="luggageDetailsList"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
    <script>
        // Function to get URL parameters
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            const data = {
                name: params.get('name'),
                surname: params.get('surname'),
                email: params.get('email'),
                phone: params.get('phone'),
                ticketNumber: params.get('ticketNumber'),
                departureAirport: params.get('departureAirport'),
                destination: params.get('destination'),
                luggageDetails: JSON.parse(params.get('luggageDetails') || '[]')
            };
            return data;
        }

        // Function to display QR code data
        function displayQRCodeData(data) {
            document.getElementById('name').textContent = data.name;
            document.getElementById('surname').textContent = data.surname;
            document.getElementById('email').textContent = data.email;
            document.getElementById('phone').textContent = data.phone;
            document.getElementById('ticketNumber').textContent = data.ticketNumber;
            document.getElementById('departureAirport').textContent = data.departureAirport;
            document.getElementById('destination').textContent = data.destination;

            // Generate and display QR code
            const qrCodeData = JSON.stringify(data);
            QRCode.toDataURL(qrCodeData, { width: 200, margin: 2 }, function (err, url) {
                if (err) console.error(err);
                document.getElementById('qrCodeImage').src = url;
            });

            // Display luggage details
            const luggageDetailsList = document.getElementById('luggageDetailsList');
            luggageDetailsList.innerHTML = ''; // Clear previous details if any

            if (data.luggageDetails.length > 0) {
                data.luggageDetails.forEach(luggage => {
                    const luggageItem = document.createElement('div');
                    luggageItem.className = 'luggage-item';
                    luggageItem.innerHTML = `
                        <p><strong>Name:</strong> ${luggage.name}</p>
                        <p><strong>Description:</strong> ${luggage.description}</p>
                        <img src="${luggage.image}" alt="Luggage Image" style="max-width: 100px; height: auto;">
                    `;
                    luggageDetailsList.appendChild(luggageItem);
                });
            } else {
                luggageDetailsList.innerHTML = '<p>No luggage details available.</p>';
            }
        }

        // Load and display QR code data on page load
        window.onload = function() {
            const data = getQueryParams();
            displayQRCodeData(data);
        };
    </script>

</body>
</html>
