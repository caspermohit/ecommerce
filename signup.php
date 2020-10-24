<?php
include'Header.php';
?>
<br>
<br>
<br>
<br>

<body>

    <div class="container">
        <form method="post" action="record.php" onsubmit="return Validate()" name="vform">

            <div class="caption" class="formInput">
                <h2 id="h2">Create a Secure Account</h2>
                <p id="p">Welcome to the ClecksE-market</p>
            </div>
            <div id="username_div" class="formInput">
                <label>Username</label> <br>
                <input type="text" name="username" class="textInput">
                <div id="name_error"></div>
            </div>

            <div id="email_div" class="formInput">
                <label>Email</label> <br>
                <input type="text" name="email" class="textInput">
                <div id="email_error"></div>
            </div>

            <div id="password_div" class="formInput">
                <label>Password</label> <br>
                <input type="password" name="password" class="textInput">
                <div id="password_error"></div>
            </div>

            <div id="pass_confirm_div" class="formInput">
                <label>Confirm Password</label> <br>
                <input type="password" name="password_confirm" class="textInput">
                <div id="pass_confirm_error"></div>
            </div>

            <div id="mobile_div" class="formInput">
                <label>Mobile No</label> <br>
                <input type="text" name="mobile" class="textInput">
                <div id="mobile_error"></div>
            </div>

            <div id="address_div" class="formInput">
                <label>Address</label> <br>
                <input type="text" name="address" class="textInput">
                <div id="address_error"></div>
            </div>

            <br>
            <div class="formInput">
                <label for="GENDER">Choose your Gender</label>
                <select name="gender" required>
                    <option value="">Click To Select<i class="fas fa-angle-down"></i></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            </div>

            <div class="formInput">
                <label for="Role">Choose your Role</label>
                <select name="rolelist" required>
                    <option value="">Click To Select<i class="fas fa-angle-down"></i></option>
                    <option value="Customer">Customer</option>
                    <option value="Trader">Trader</option>
                    <option value="Admin">Admin</option>
                </select>

            </div>

            <br><br>
            <div class="custom-control custom-checkbox mb-3" id="chk_div">
                <input type="checkbox" class="custom-control-input" id="chk" required="checked">
                <label class="custom-control-label" for="chk">Accept Terms and Conditions</label>
            </div>

            <br><br>

            <div>
                <input type="submit" name="CREATE" value="CREATE ACCOUNT"
                    class="btn btn-primary btn-shadow btn-rounded w-md">
            </div>

            <div id="note" class="center">
                <a class="nav-link icon-user" id="navbar" data-toggle="modal" data-target="#elegantModalForm"
                    style="color:black;">Already have an account? Log In</a>
            </div>

        </form>
    </div>


    <style>
    body {
        background-color: #f9fafb;

    }

    main {
        display: flex;
        flex-direction: column;
        justify-items: center;
        align-items: center;
        box-sizing: border-box;
    }

    header {
        margin: 3em;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-top-left-radius: 17px;
        border-top-right-radius: 17px;
        border-bottom-right-radius: 17px;
        border-bottom-left-radius: 17px;
        background-color: rgb(121, 204, 219);
    }

    img {
        width: 100%;
        height: auto;
    }

    .caption {
        text-align: center;
        margin-top: 3em;
        margin-bottom: 2.5em;
        margin-left: 4.2em;
        margin-right: 4.2em;
    }

    h2,
    p {
        margin: 0;
        font-family: sans-serif;
    }

    #h2 {
        font-size: 1.5rem;
        color: #083e9e;

    }

    #p {
        font-size: .875rem;
        color: #4a5568;
    }

    #p1 {
        font-size: 1rem;
        color: #083e9e;
        margin-top: 2em;

    }

    .formInput {
        width: 85%;
        display: flex;
        flex-direction: column;
        margin-bottom: 2em;
        margin-left: .5em;
        margin-right: .5em;
    }

    input {
        padding: 20px;
        font-size: .9rem;
        border-radius: 5px;
        background-color: #edf2f7;
        border: 0 solid snow;
        color: #1a202c;
    }

    select {
        padding: 15px;
        border-radius: 5px;
        font-size: .9rem;
        background-color: #edf2f7;
        color: #1a202c;
        border: 0 solid snow;
        width: 100%;
    }

    option {
        font-family: sans-serif;
        font-size: .9rem;
        background-color: #edf2f7;
        color: #1a202c;

    }

    label {
        font-size: .75rem;
        font-family: sans-serif;
        font-weight: bold;
        margin-bottom: .7em;
        color: #4a5568;
    }

    button {
        font-family: sans-serif;
        font-weight: bold;
        padding: 20px;
        color: snow;

        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border: 0 solid #083e9e;
        cursor: pointer;
    }

    button:hover {}

    a {
        text-decoration: none;
    }

    #note {
        color: snow;
        font-size: .875rem;
        font-family: sans-serif;
        text-align: center;
        margin-top: 3em;
        margin-bottom: 4em;
        cursor: pointer;
    }
    </style>

    <script>
    var username = document.forms['vform']['username'];
    var email = document.forms['vform']['email'];
    var password = document.forms['vform']['password'];
    var password_confirm = document.forms['vform']['password_confirm'];
    var mobile = document.forms['vform']['mobile'];
    var address = document.forms['vform']['address'];
    var check = document.forms['vform']['chk'].checked;



    // SELECTING ALL ERROR DISPLAY ELEMENTS
    var name_error = document.getElementById('name_error');
    var email_error = document.getElementById('email_error');
    var password_error = document.getElementById('password_error');
    var mobile_error = document.getElementById('mobile_error');
    var address_error = document.getElementById('address_error');
    //var x= document.getElementById("chk").checked;

    // SETTING ALL EVENT LISTENERS
    username.addEventListener('blur', nameVerify, true);
    email.addEventListener('blur', emailVerify, true);
    password.addEventListener('blur', passwordVerify, true);
    mobile.addEventListener('blur', mobileVerify, true);
    address.addEventListener('blur', addressVerify, true);

    // validation function
    function Validate() {
        // validate username
        if (username.value == "") {
            username.style.border = "1px solid red";
            document.getElementById('username_div').style.color = "red";
            name_error.textContent = "Username is required";
            username.focus();
            return false;
        }


        // validate username
        if (username.value.length < 3) {
            username.style.border = "1px solid red";
            document.getElementById('username_div').style.color = "red";
            name_error.textContent = "Username must be at least 3 characters";
            username.focus();
            return false;
        }

        if (!isNaN(username.value)) {
            username.style.border = "1px solid red";
            document.getElementById('username_div').style.color = "red";
            name_error.textContent = "Username should not be a number";
            username.focus();
            return false;
        }


        // validate email
        if (email.value == "") {
            email.style.border = "1px solid red";
            document.getElementById('email_div').style.color = "red";
            email_error.textContent = "Email is required";
            email.focus();
            return false;
        }

        if (email.value.indexOf('@') <= 0) {
            email.style.border = "1px solid red";
            document.getElementById('email_div').style.color = "red";
            email_error.textContent = "@ position invalid";
            email.focus();
            return false;
        }

        if ((email.value.charAt(email.value.length - 4) != '.') && (email.value.charAt(email.value.length - 3) !=
                '.')) {
            email.style.border = "1px solid red";
            document.getElementById('email_div').style.color = "red";
            email_error.textContent = ". position invalid";
            email.focus();
            return false;
        }

        // validate password
        if (password.value == "") {
            password.style.border = "1px solid red";
            document.getElementById('password_div').style.color = "red";
            //password_confirm.style.border = "1px solid red";
            password_error.textContent = "Password is required";
            password.focus();
            return false;
        }

        // check if the two passwords match
        if (password.value != password_confirm.value) {
            password.style.border = "1px solid red";
            document.getElementById('pass_confirm_div').style.color = "red";
            password_confirm.style.border = "1px solid red";
            pass_confirm_error.innerHTML = "The two passwords do not match";
            password.focus();
            return false;
        }

        //check if mobile
        if (mobile.value == "") {
            mobile.style.border = "1px solid red";
            document.getElementById('mobile_div').style.color = "red";
            mobile_error.textContent = "Mobile number is required";
            mobile.focus();
            return false;
        }

        //check if mobile number is number
        if (isNaN(mobile.value)) {
            mobile.style.border = "1px solid red";
            document.getElementById('mobile_div').style.color = "red";
            mobile_error.textContent = "Character is not a mobile number";
            mobile.focus();
            return false;
        }

        if (mobile.value.length != 10) {
            mobile.style.border = "1px solid red";
            document.getElementById('mobile_div').style.color = "red";
            mobile_error.textContent = "Mobile number should be 10 digit";
            mobile.focus();
            return false;
        }

        if (address.value == "") {
            address.style.border = "1px solid red";
            document.getElementById('address_div').style.color = "red";
            address_error.textContent = "Address is required";
            address.focus();
            return false;
        }

    }
    // event handler functions
    function nameVerify() {
        if (username.value != "") {
            username.style.border = "1px solid #5e6e66";
            document.getElementById('username_div').style.color = "#5e6e66";
            name_error.innerHTML = "";
            return true;
        }
    }

    function emailVerify() {
        if (email.value != "") {
            email.style.border = "1px solid #5e6e66";
            document.getElementById('email_div').style.color = "#5e6e66";
            email_error.innerHTML = "";
            return true;
        }
    }

    function mobileVerify() {
        if (mobile.value != "") {
            mobile.style.border = "1px solid #5e6e66";
            document.getElementById('mobile_div').style.color = "#5e6e66";
            mobile_error.innerHTML = "";
            return true;
        }
    }




    function passwordVerify() {
        if (password.value != "") {
            password.style.border = "1px solid #5e6e66";
            document.getElementById('pass_confirm_div').style.color = "#5e6e66";
            document.getElementById('password_div').style.color = "#5e6e66";
            password_error.innerHTML = "";
            return true;
        }
        if (password.value == password_confirm.value) {
            password_confirm.style.border = "1px solid #5e6e66";
            password.style.border = "1px solid #5e6e66";

            document.getElementById('pass_confirm_div').style.color = "#5e6e66";
            document.getElementById('password_confirm').style.color = "#5e6e66";
            pass_confirm_error.innerHTML = "";
            return true;
        }
    }

    function addressVerify() {
        if (mobile.value != "") {
            address.style.border = "1px solid #5e6e66";
            document.getElementById('address_div').style.color = "#5e6e66";
            address_error.innerHTML = "";
            return true;
        }
    }
    </script>

</body>

<?php include 'footer.php';?>