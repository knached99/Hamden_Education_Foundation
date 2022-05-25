<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="<?php echo base_url();?>styling/img/HEF-favicon.png" sizes="32x32">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create an Account</title>
        <style>
            @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");
            * {
                margin: 0;
                padding: 0;
                outline: none;
                font-family: "Poppins", sans-serif;
            }
            #msg{
                /* display: none; */
                background: #fff;
                color: #000;
                position: relative;
                padding: 20px;
                margin-top: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align: left;
            }
            :root {
             --primary: #eee;
             --secondary: #333;
             --errorColor: red;
             --stepNumber: 6;
             --containerWidth: 600px;
             --inputBorderColor: lightgray;
            }

            body {
             display: flex;
             align-items: center;
             justify-content: center;
             min-height: 100vh;
             overflow-x: hidden;
             background: url('https://1.bp.blogspot.com/-NmAp0VyE9SI/Vfl2CBIY4RI/AAAAAAAAAJk/l36_1UwSb04/s1600/shutterstock_183832961.jpg');
             background-size: cover;
             height: 100%;
             /*overflow: hidden;*/
            }
            ::selection {
                color: #fff;
                background: var(--primary);
            }
            .container {
                width: var(--containerWidth);
                background: #fff;
                text-align: center;
                border-radius: 5px;
                padding: 50px 35px 10px 35px;
            }
            .container header {
                font-size: 35px;
                font-weight: 600;
                margin: 0 0 30px 0;
            }
            .container .form-outer {
                width: 100%;
                overflow-x: hidden;
                /*overflow: hidden;*/
            }
            .container .form-outer form {
                display: flex;
                width: calc(100% * var(--stepNumber));
            }
            .form-outer form .page {
                width: calc(100% / var(--stepNumber));
                transition: margin-left 0.3s ease-in-out;
            }
            .form-outer form .page .title {
                text-align: left;
                font-size: 25px;
                font-weight: 500;
            }
            .form-outer form .page .field {
                width: var(--containerWidth);
                height: 45px;
                margin: 45px 0;
                display: flex;
                position: relative;
            }
            form .page .field .label {
                position: absolute;
                top: -30px;
                font-weight: 500;
                color: #265857;
            }
            form .page .field input {
                box-sizing: border-box;
                height: 100%;
                width: 100%;
                border: 1px solid var(--inputBorderColor);
                border-radius: 5px;
                padding-left: 15px;
                margin: 0 1px;
                font-size: 18px;
                transition: border-color 150ms ease;
            }
           
            form .page .field input.invalid-input {
                border-color: var(--errorColor);
            }
            form .page .field select {
                width: 100%;
                padding-left: 10px;
                font-size: 17px;
                font-weight: 500;
            }
            form .page .field button {
                width: 100%;
                height: calc(100% + 5px);
                border: none;
                background: #265857;
                margin-top: -20px;
                border-radius: 5px;
                color: #fff;
                cursor: pointer;
                font-size: 18px;
                font-weight: 500;
                letter-spacing: 1px;
                text-transform: uppercase;
                transition: 0.5s ease;
            }
            form .page .field button:hover {
                background: #000;
            }
            form .page .btns button {
                margin-top: -20px !important;
            }
            form .page .btns button.prev {
                margin-right: 3px;
            font-size: 17px;
    }
    form .page .btns button.next {
        margin-left: 3px;
    }
    .container .progress-bar {
        display: flex;
        margin: 40px 0;
        user-select: none;
    }
    .container .progress-bar .step {
        text-align: center;
        width: 100%;
        position: relative;
    }
    .container .progress-bar .step p {
        font-weight: 500;
        font-size: 18px;
        color: #265857;
        margin-bottom: 8px;
    }
    .progress-bar .step .bullet {
        height: 25px;
        width: 25px;
        border: 2px solid #000;
        display: inline-block;
        border-radius: 50%;
        position: relative;
        transition: 0.2s;
        font-weight: 500;
        font-size: 17px;
        line-height: 25px;
    }
    .progress-bar .step .bullet.active {
        border-color: var(--primary);
        background: #265857;
    }
    .progress-bar .step .bullet span {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }
    .progress-bar .step .bullet.active span {
        display: none;
    }
    .progress-bar .step .bullet:before,
    .progress-bar .step .bullet:after {
        position: absolute;
        content: "";
        bottom: 11px;
        right: -51px;
        height: 3px;
        width: 44px;
        background: #262626;
    }
    .progress-bar .step .bullet.active:after {
        background: var(--primary);
        transform: scaleX(0);
        transform-origin: left;
        animation: animate 0.3s linear forwards;
    }
    @keyframes animate {
        100% {
            transform: scaleX(1);
        }
    }
    .progress-bar .step:last-child .bullet:before,
    .progress-bar .step:last-child .bullet:after {
        display: none;
    }
    .progress-bar .step p.active {
        color: var(--primary);
        transition: 0.2s linear;
    }
    .progress-bar .step .check {
        position: absolute;
        left: 50%;
        top: 70%;
        font-size: 15px;
        transform: translate(-50%, -50%);
        display: none;
    }
    .progress-bar .step .check.active {
        display: block;
        color: #fff;
    }

    @media screen and (max-width: 660px) {
        :root {
            --containerWidth: 400px;
        }
        .progress-bar .step p {
            display: none;
        }
        .progress-bar .step .bullet::after,
        .progress-bar .step .bullet::before {
            display: none;
        }
        .progress-bar .step .bullet {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .progress-bar .step .check {
            position: absolute;
            left: 50%;
            top: 50%;
            font-size: 15px;
            transform: translate(-50%, -50%);
            display: none;
        }
        .step {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
    @media screen and (max-width: 490px) {
        :root {
            --containerWidth: 100%;
        }
        .container {
            box-sizing: border-box;
            border-radius: 0;
        }   
    }
      /* The message box is shown when the user clicks on the password field */
      #msg {
            display: none;
            background: #fff;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #msg p {
            padding: 10px 35px;
            font-size: 14px;
            background-color: white;


        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: #5cb85c;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✅";

        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: #e96060;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "❌";
        }
        .text-danger{
           color: #dc3545
        }
</style>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <body>
        <div style="box-shadow: 1px 8px 20px grey;" class="container">
            <header style="color: #265857;"><a style="font-size: 25px; color: #ffa639;" href="../Home/new_home"><i class="fas fa-arrow-alt-circle-left fa-lg"></i></a> Join Now!</header>
            <div class="progress-bar">
                <div class="step">
                    <p>Basic Info</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>School Details</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
           
                <div class="step">
                    <p>Login Details</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>More Info</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
          
            </div>
            <div class="form-outer">
                <?php echo form_open();?>
                    <!--Basic Info-->
                    <div class="page slide-page">
                        <div style="color: #265857;" class="title">Basic Info:</div>
                            <?php if(isset($signup_err)){ echo $signup_err;}?>
                        <div class="field">
                            <div class="label"> <span style="color: #ffa639;">-</span> First Name <span style="color: #ffa639;">-</span> </div>
                            <input type="text" name="fname" value="<?php echo set_value('fname') ?>" />
                            <small class="text-danger"><?php echo form_error('fname'); ?></small>
                        </div>
                        <div class="field">
                            <div class="label"> <span style="color: #ffa639;">-</span> Last Name <span style="color: #ffa639;">-</span> </div>
                            <input type="text" name="lname" value="<?php echo set_value('lname') ?>"/>
                            <small class="text-danger"><?php echo form_error('lname'); ?></small>

                        </div>
                        <div class="field">
                            <button style="background-color: #265857;" class="firstNext next">Next</button>
                        </div>
                        <div>
                                <a href="../Login/student_login" style="color: #265857; margin: 40px;"><i class="fas fa-graduation-cap"></i></a>
                                <a href="../Login/guest_login" style="color: #265857; margin: 40px;"><i class="fas fa-user"></i></a>
                                <a href="../Login/teacher_login" style="color: #265857; margin: 40px;"><i class="fas fa-chalkboard-teacher"></i></a>
                        </div>
                    </div>
                   
                    <!--School Details-->
                    <div class="page">
                        <div style="color: #265857;" class="title">School Details:</div>
                        <div class="field">
                            <div class="label"> <span style="color: #ffa639;">-</span> School Name <span style="color: #ffa639;">-</span></div>
                           <!-- <input type="text" name="school_name" value="<?php echo set_value('school_name') ?>" /> --> 
                           <select name="school_name" id="school_name">
                           </select>
                            <small class="text-danger"><?php echo form_error('school_name'); ?></small>

                          </div>
                        <!--<div class="field">
                            <div class="label"> <span style="color: #ffa639;">-</span> School Email <span style="color: #ffa639;">-</span></div>
                            <input type="text" name="school_email" value="<?php echo set_value('school_email') ?>"/>
                            <small class="text-danger"><?php echo form_error('school_email'); ?></small>
                        </div>-->
                        <div class="field">
                            <div class="label"><span style="color: #ffa639;">-</span> School Type <span style="color: #ffa639;">-</span></div>
                            <select name="school_type">
                                <option value="Not Affiliated With a School">Not Affiliated With a School</option>
                                <option value="Elementary">Elementary</option>
                                <option value="Middle">Middle</option>
                                <option value="Highschool">Highschool</option>
                            </select>
                            <small class="text-danger"><?php echo form_error('school_type'); ?></small>

                        </div>
                        <div class="field btns">
                            <button class="prev-4 prev">Previous</button>
                            <button class="next-4 next">Next</button>
                        </div>
                    </div>

                    <!--Login Details-->
                    <div class="page">
                        <div style="color: #265857;" class="title">Login Details:</div>
                        <div class="field">
                            <div class="label"><span style="color: #ffa639;">-</span> Email <span style="color: #ffa639;">-</span></div>
                            <input type="text" name="email" value="<?php echo set_value('email');?>"/>
                            <small class="text-danger"><?php echo form_error('email'); ?></small>

                        </div>
                        <div class="field">
                            <div class="label"><span style="color: #ffa639;">-</span> Password <span style="color: #ffa639;">-</span></div>
                            <input id="pwd" type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                            <small class="text-danger"><?php echo form_error('pwd'); ?></small>
                        </div>
                
                        <div id="msg">
                            <h6 class="fw-normal">Your password must contain the following:</h6>
                            <hr style="background-color: #4650dd !important">
                            <p id="letter" class="fw-normal invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="fw-normal invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="fw-normal  invalid">A <b>number</b></p>
                            <p id="length" class="fw-normal  invalid">Minimum <b>8 characters</b></p>
                            <p id="special" class="fw-normal  invalid">special character like <b>?</b> or <b>!</b></p>
                        </div>
                            
                        <div class="field">
                            <div class="label"><span style="color: #ffa639;">-</span> Retype Password <span style="color: #ffa639;">-</span></div>
                            <input type="password" id="confirm_pwd" name="confirm_pwd" />
                            <small class="text-danger"><?php echo form_error('confirm_pwd'); ?></small>
                        </div>

                        <input class="check" type="checkbox"  onclick="showpwd()">
                        <label>show password</label>
                     
                        <div class="field btns">
                            <button class="prev-5 prev">Previous</button>
                            <button class="next-4 next">Next</button>
                        </div>

                    </div>

                    <!--Account Type-->
                    <div class="page">
                      <div style="color: #265857;" class="title">Account Type</div>
                      <div class="field">
                        <div style="color: #265857;" class="label"> <span style="color: #ffa639;">-</span> What's your position? <span style="color: #ffa639;">-</span></div>
                        <select name="position">
                          <option disabled selected>Select your position</option>
                          <option value="Student">Student</option>
                          <option value="Teacher">Teacher</option>
                          <option value="Guest">Guest</option>
                        </select>
                      </div>
                      <div class="field btns">
                      <button class="prev-5 prev">Previous</button>
                            <button class="submit">Create my account!</button>
                      </div>
                    </div>
               <?php echo form_close();?>
            </div>
        </div>

        <!--Password-->
        <!--<div id="msg">
            <h6 class="fw-normal">Your password must contain the following:</h6>
            <hr style="background-color: #4650dd !important">
            <p id="letter" class="fw-normal invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="fw-normal invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="fw-normal  invalid">A <b>number</b></p>
            <p id="length" class="fw-normal  invalid">Minimum <b>8 characters</b></p>
            <p id="special" class="fw-normal  invalid">special character like <b>?</b> or
            <b>!</b></p>
        </div>-->


        <script>
          initMultiStepForm();

function initMultiStepForm() {
    const progressNumber = document.querySelectorAll(".step").length;
    const slidePage = document.querySelector(".slide-page");
    const submitBtn = document.querySelector(".submit");
    const progressText = document.querySelectorAll(".step p");
    const progressCheck = document.querySelectorAll(".step .check");
    const bullet = document.querySelectorAll(".step .bullet");
    const pages = document.querySelectorAll(".page");
    const nextButtons = document.querySelectorAll(".next");
    const prevButtons = document.querySelectorAll(".prev");
    const stepsNumber = pages.length;

    if (progressNumber !== stepsNumber) {
        console.warn(
            "Error, number of steps in progress bar do not match number of pages"
        );
    }

    document.documentElement.style.setProperty("--stepNumber", stepsNumber);

    let current = 1;

    for (let i = 0; i < nextButtons.length; i++) {
        nextButtons[i].addEventListener("click", function (event) {
            event.preventDefault();

            inputsValid = validateInputs(this);
            // inputsValid = true;

            if (inputsValid) {
                slidePage.style.marginLeft = `-${
                    (100 / stepsNumber) * current
                }%`;
                bullet[current - 1].classList.add("active");
                progressCheck[current - 1].classList.add("active");
                progressText[current - 1].classList.add("active");
                current += 1;
            }
        });
    }

    for (let i = 0; i < prevButtons.length; i++) {
        prevButtons[i].addEventListener("click", function (event) {
            event.preventDefault();
            slidePage.style.marginLeft = `-${
                (100 / stepsNumber) * (current - 2)
            }%`;
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    }
   /* submitBtn.addEventListener("click", function () {
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
        setTimeout(function () {
            alert("Your Form Successfully Signed up");
            location.reload();
        }, 800);
    }); */

    function validateInputs(ths) {
        let inputsValid = true;

        const inputs =
            ths.parentElement.parentElement.querySelectorAll("input");
        for (let i = 0; i < inputs.length; i++) {
            const valid = inputs[i].checkValidity();
            if (!valid) {
                inputsValid = false;
                inputs[i].classList.add("invalid-input");
            } else {
                inputs[i].classList.remove("invalid-input");
            }
        }
        return inputsValid;
    }
}

        </script>
        <script>
            let schools = ["Not Affiliated With a School", "Alice Peck Learning Center", "Bear Path Elementary", "Church Street Elementary", "Dunbar Hill Elementary", "Helen Street Elementary", "Ridge Hill Elementary", "Shephred Glen Elementary", "Spring Glen Elementary", "West Woods Elementary", "Hamden Collaborative Learning Center (HCLC)", "Hamden Middle School", "Hamden High School"];
            let html = [];
            for(var i=0; i < schools.length; i++){
                html.push("<option>" + schools[i] + "</option>");
            }
            document.getElementById('school_name').innerHTML=html.join("");
        </script>

<script>
        // Password validation as the user types
        var myInput = document.getElementById("pwd");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var special = document.getElementById("special");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function () {
            document.getElementById("msg").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function () {
            document.getElementById("msg").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate special characters
            var specialChars = /[\!\@\#\$\%\^\&\*\)\(\+\=\.\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-\?]/g;
            if (myInput.value.match(specialChars)) {
                special.classList.remove("invalid");
                special.classList.add("valid");
            } else {
                special.classList.remove("valid");
                special.classList.add("invalid");
            }
            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>

    <script>
        // toggle password visibilty
        function showpwd() {
            let x = document.getElementById("pwd");
            let y = document.getElementById('confirm_pwd');
            let text = document.getElementById('text');
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                text.innerHTML = "Hide Password";
            } else {
                x.type = "password";
                y.type = "password";
                text.innerHTML = "Show Password";
            }
        }
    </script>
    </body>
</html>

