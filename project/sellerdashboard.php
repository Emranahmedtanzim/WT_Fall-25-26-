<!DOCTYPE html>
<html lang=>
<head>
   
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dashboard">

        <div class="header">
            <div>
                <h2>Seller Dashboard</h2>
                <p>Logged in as: <strong>seller@example.com</strong></p>
            </div>
            <form>
                <button type="submit">Logout</button>
            </form>
        </div>

        <h3>List a Property</h3>

        <form class="add-property-form">
            <input type="text" placeholder="e.g., 3 Bedroom Apartment">
            <input type="text" placeholder="e.g., Dhanmondi, Dhaka">
            <input type="number" placeholder="e.g., 15000000">
            <input type="text" placeholder="Short description (optional)">
            <button type="submit">Add Property</button>
        </form>

        <h3>Your Listed Properties</h3>

        <p>You have not listed any properties yet.</p>

        <table class="properties-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

    </div>

</body>
</html>
