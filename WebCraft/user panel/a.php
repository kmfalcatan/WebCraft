<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome to MedEquip Tracker</title>
    <style>
        :root {
            font-size: 16px; /* Define the base font size */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 31.25rem; /* Equivalent to 500px */
            margin: 1.25rem auto; /* Equivalent to 20px */
            padding: 1.25rem;
            background-color: #ffffff;
            border-radius: 0.625rem; /* Equivalent to 10px */
            box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.1);
            text-align: justify; /* Justify content */
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem; /* Equivalent to 20px */
        }
        .logo {
            width: auto;
            height: 4.375rem; /* Equivalent to 70px */
        }
        p {
            font-size: 0.875rem; /* Equivalent to 14px */
            line-height: 1.6;
            margin: 0.625rem 0; /* Equivalent to 10px */
        }
        
        strong {
            font-weight: bold;
        }

        .message{
            border-bottom: 0.0625rem #ccc solid; /* Equivalent to 1px */
            padding-bottom: 1.25rem; /* Equivalent to 20px */
        }

        .header-content {
            flex-grow: 1;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <img src='https://drive.google.com/uc?export=view&id=1pTJhLj_6Eqg1l-TwCTQP1q955iNratFX' alt='Logo Left' class='logo'>
            <div class='header-content'>
                <p>Western Mindanao State University <br> College of Medicine <br> National Road, Baliwasan, Zamboanga City</p>
            </div>
            <img src='https://drive.google.com/uc?export=view&id=1cMPyfzCR8XWfoJnvIeGlZjsnU_w9XFWW' alt='Logo Right' class='logo'>
        </div>
        <p>Welcome to MedEquip Tracker, <strong>$fullname</strong>!</p>
        <br>
        <p class="message">We are delighted to have you as one of our valued end users. By adding you to our system, you are now responsible for managing the units under your name. Should you encounter any issues or have any concerns, please don't hesitate to report them to our administration. We will take prompt action to address any matters that require attention.</p>
        <br>
        <p>Here are your account details:</p>
        <p>Email: <strong>$email</strong></p>
        <p>Password: <strong>$password</strong></p>
        <br>
        <p>To access your account and continue, please click the following link: <a href='https://example.com/login'>Login Link</a></p>
        <p>Thank you for joining MedEquip Tracker. We look forward to assisting you in managing your units effectively.</p>
    </div>
</body>
</html>
