<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Enter your details!</h1>
    <form action="index.php" method="post">
        Enter Name: <input type="text" id="name" name="name" placeholder="Enter your name:"><br><br>
        
        <label for="school">Select School:</label>
        <select id="school" name="school">
            <option>Select your School</option>
            <option>School of Computer Science</option>
            <option>School of Electrical Engineering</option>
            <option>School of Law</option>
            <option>School of Design</option>
            <option>School of Pharmacy</option>
        </select><br><br>
        Phone Number: <input type="text" id="contact" placeholder="10 digit PhoneNumber" name="phone" onchange = "validphone()"><br><br>
        Email Address: <input type="email" id="email" name="email" placeholder="Valid Email id" onchange = "validemail()"><br><br>
        State: <input type="text" id="state" list="StateLists" name="state" onchange="filterCities()" placeholder="Select from dropdown"><br><br>
        City: <input list="CityLists" id="city" name="city" placeholder="Select your city"><br><br>
        Country: <input type="text" id="country" name="country"><br><br>
        Pin Code: <input type="text" id="pincode" name="pincode"placeholder="6 Digit code" title="Enter 6 digit numbers only" onchange = "validpincode()"><br><br>

        <datalist id="StateLists">
            <option>Maharashtra</option>
            <option>Karnataka</option>
            <option>Gujarat</option>
        </datalist>
        <datalist id="CityLists">
        </datalist>
        
        <br><br>
        <input type="submit" value="Submit" onsubmit="return validateForm()">
    </form>

</body>
<script>
    const citiesByState = {
        "Maharashtra": [
            "Mumbai", "Pune", "Nagpur", "Nashik", "Aurangabad",
            "Solapur", "Amravati", "Kolhapur", "Sangli", "Satara"
        ],
        "Karnataka": [
            "Bangalore", "Mysore", "Hubli", "Belgaum", "Mangalore",
            "Gulbarga", "Davanagere", "Shimoga", "Bellary", "Tumkur"
        ],
        "Gujarat": [
            "Ahmedabad", "Surat", "Vadodara", "Rajkot", "Bhavnagar",
            "Jamnagar", "Junagadh", "Gandhinagar", "Anand", "Bharuch"
        ]
    };

    function filterCities() {
        const selectedState = document.getElementById("state").value;
        const cityInput = document.getElementById("city");
        const cityList = document.getElementById("CityLists"); 

        cityList.innerHTML = "";

        if (selectedState in citiesByState) {
            citiesByState[selectedState].forEach(city => {
                const option = document.createElement("option");
                option.value = city;
                cityList.appendChild(option);
            });
        }
    }

    function validateForm() {
        const name = document.getElementById("name").value;
        const school = document.getElementById("school").value;
        const contact = document.getElementById("contact").value;
        const email = document.getElementById("email").value;
        const state = document.getElementById("state").value;
        const city = document.getElementById("city").value;
        const pincode = document.getElementById("pincode").value;

        if (
        name.trim() === "" ||
        school.trim() === "" ||
        contact.trim() === "" ||
        email.trim() === "" ||
        state.trim() === "" ||
        city.trim() === "" ||
        pincode.trim() === ""
    ) {
        alert("All fields are mandatory.");
        return false;
    }
    }
    function validphone() {
        if (contact.value.length != 10) {
            alert("Phone number must be exactly 10 digits.");
        }
    }
    const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    function validemail() {
        if (email.value.match(emailPattern)){
            console.log("correct email!!");
        }
        else {
            alert("Invalid Email Address!");
        }
    }
    function validpincode() {

        if (pincode.value.length !== 6) {
            alert("Pin code must be exactly 6 digits.");
        }
    }
</script>
</html>