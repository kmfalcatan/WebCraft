<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            position: relative; 
        }

        .left-arrow {
            position: absolute;
            left: 20px; 
            top: 5%; /* Position it vertically in the middle */
            transform: translateY(-50%); /* Center it vertically */
            font-size: 24px;
            color: rgb(2, 116, 200);
            cursor: pointer;
        }

        .left-arrow a i{
            font-size: 40px;
            text-decoration: none;
            color:  rgb(2, 116, 200);
        }

        @keyframes move-forward {
            0% { transform: translateX(0); }
            50% { transform: translateX(10px); }
            100% { transform: translateX(0); }
        }

        .moving-icon {
            animation: move-forward 1s infinite;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr; 
            gap: 20px; 
        }
        .left-container,
        .right-container {
            background-color:  rgb(2, 116, 200);
            padding: 20px;
            display: flex; 
            flex-direction: column; 
            justify-content: space-between; 
        }

        .right-container{
            padding: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
            background-color: #fff;
        }

        h2{
            color: #fff;
        }
        iframe {
            width: 100%; 
            height: 100%; 
            border: 0;
        }

        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin-bottom: 10px;
            display: block;
            color: #fff;
        }
        form input[type="text"],
        form input[type="email"],
        form textarea {
            margin-bottom: 20px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            flex: 1;
        }
        form input[type="submit"] {
            background-color: #fff;
            color: white;
            padding: 20px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 20%;
            margin-bottom: 50px;
            color:  rgb(2, 116, 200);
            font-weight: bold;
            font-size: 15px;
        }
        form input[type="submit"]:hover {
            background-color: #f5f5f5;
        }
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }
        .flex-container > div {
            flex: 1;
            margin-right: 10px;
        }
        .flex-container > div:last-child {
            margin-right: 0;
        }

        input#fullname,
        input#email {
            width: calc(100% - 10px); 
            margin-right: 5px; 
        }

        .icons-container {
            display: flex;
            justify-content: space-between; 
            margin-bottom: 50px;
        }
        .icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 100px;
            padding: 5px;
        }

        .icon i {
            background-color:rgb(2, 116, 200);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .icon p {
            margin-top: 10px;
            text-align: center;
        }

         /* Media query for smaller screens */
         /* @media only screen and (min-width: 600px){
            .container {
                grid-template-columns: 1fr; 
                margin: 5rem auto;
            }

            .left-container,
            .right-container{
                flex-direction: column;

            }

            .icons-container{
                flex-direction: column;
                margin-bottom: 50px;
            }
        }

        @media only screen and (min-width: 1025px) and (max-width: 1440px) {
            .container{
                display: flex;
            }

            .icons-container {
                flex-direction: row;
                align-items: center;
                margin: 0 20px;
            }
         } */
    </style>
</head>
<body>

    <div class="left-arrow">
        <a href="landing_page.php"><i class="fas fa-angle-double-left moving-icon"></i></a>
    </div>
    

<div class="container">
    <div class="left-container">
        <h2>Contact Us</h2>
        <form action="#" method="post">
            <div class="flex-container">
                <div>
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>
            </div>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="right-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3905.301715663541!2d122.08110821423245!3d6.912057019051757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3262ff1e7af09515%3A0x1fb9b32f951d3403!2sWestern%20Mindanao%20State%20University!5e0!3m2!1sen!2sph!4v1646071410041!5m2!1sen!2sph" allowfullscreen></iframe>
    </div>
</div>

<div class="icons-container">
    <div class="icon">
        <i class="fas fa-map-marker-alt"></i>
        <p>Western Mindanao State University, Baliwasan Normal Road <br>Zamboanga City, 7000</p>
    </div>
    <div class="icon">
        <i class="fas fa-phone"></i>
        <p>+63 123 456 7890</p>
    </div>
    <div class="icon">
        <i class="fas fa-envelope"></i>
        <p>example@example.com</p>
    </div>
</div>

</body>
</html>
