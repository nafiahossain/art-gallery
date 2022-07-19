<?php
include('admin/security.php');

if(isset($_POST['contact']))
{
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $msg = $_POST['msg'];

    $query = "INSERT INTO `contact`(`c_name`, `c_email`, `msg`) VALUES ('$cname','$cemail','$msg');";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        echo "<script>alert('Your message has been sent.')</script>";
    }
    else
    {
        echo "<script>alert('Unable to send you message.')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | ArtSpace</title>
    <link rel="shortcut icon" type="image" href="images/title.png">
    <style>
        /* Google Font CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Joan&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Joan', serif;
        }

        .topnav {
            position: relative;
            overflow: hidden;
            background-color: white;
        }

        .topnav a {
            float: left;
            color: black;
            text-align: center;
            margin: 25px 20px;
            padding: 10px 10px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }

        .topnav a:hover {
            background-color: #E9D5DA;
            color: black;
        }

        .topnav a.active {
            color: white;
        }

        .topnav-centered img {
            float: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .topnav-right {
            float: right;
        }

        body {
            
            width: 100%;
            background: white;   
        }

        .containerr {
            width: 85%;
            background: #fff;
            border-radius: 6px;
            padding: 30px 60px 30px 40px;
        }

        .containerr .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .containerr .content .left-side {
            width: 55%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            position: relative;
        }

        .content .left-side::before {
            content: '';
            position: absolute;
            height: 70%;
            width: 2px;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: black;
        }

        .content .left-side .details {
            margin: 14px;
            text-align: center;
        }

        .content .left-side .details i {
            font-size: 30px;
            color: rgb(92, 92, 92);
            margin-bottom: 10px;
        }

        .content .left-side .details .topic {
            font-size: 18px;
            font-weight: 500;
        }

        .content .left-side .details .text-one,
        .content .left-side .details .text-two {
            font-size: 14px;
            color: #afafb6;
        }

        .containerr .content .right-side {
            width: 75%;
            margin-left: 75px;
        }

        .content .right-side .topic-text {
            font-size: 23px;
            font-weight: 600;
            color: black;
        }

        .right-side .input-box {
            height: 50px;
            width: 100%;
            margin: 12px 0;
        }

        .right-side .input-box input,
        .right-side .input-box textarea {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            background: #F0F1F8;
            border-radius: 6px;
            padding: 0 15px;
            resize: none;
        }

        .right-side .message-box {
            min-height: 110px;
        }

        .right-side .input-box textarea {
            padding-top: 6px;
        }

        .right-side .button {
            display: inline-block;
            margin-top: 12px;
        }

        .right-side .button input[type="button"] {
            color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: rgb(92, 92, 92);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button input[type="button"]:hover {
            background: #6867AC;
        }

        @media (max-width: 950px) {
            .containerr {
                width: 90%;
                padding: 30px 40px 40px 35px;
            }

            .containerr .content .right-side {
                width: 75%;
                margin-left: 55px;
            }
        }

        @media (max-width: 820px) {
            .containerr {
                margin: 40px 0;
                height: 100%;
            }

            .containerr .content {
                flex-direction: column-reverse;
            }

            .containerr .content .left-side {
                width: 100%;
                flex-direction: row;
                margin-top: 40px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .containerr .content .left-side::before {
                display: none;
            }

            .containerr .content .right-side {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="topnav">

        <!-- Centered link -->
        <div class="topnav-centered">
            <img class="logo" src="images/logoo.png" alt="ArtSpace">
        </div>

        <!-- Left-aligned links (default) -->
        <a style="margin-left: 350px;" href="#news">News</a>
        <a href="#contact">Contact</a>

        <!-- Right-aligned links -->
        <div class="topnav-right">
            <a href="#search">Search</a>
            <a style="margin-right: 350px;" href="#about">About</a>
        </div>

    </div>
    <div class="containerr">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Mailing Address</div>
                    <div class="text-one">ArtSpace@gmail.org</div>
                    <div class="text-two">ArtSpace_admin@gmail.org</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Contact Info</div>
                    <div class="text-one">Main-office: +123 456</div>
                    <div class="text-two">Sub-office: +789 123</div>
                </div>
                <div class="email details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">The Dhaka Gallery, Dhaka</div>
                    <div class="text-two">The Soho Gallery, Soho</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send an E-mail</div>
                <p>If you have any questions about artworks published on the site, personal data requests, members of the media 
                    interested in reaching ArtSpace's communications team or general questions and feedback, Reach us by sending
                    your message.</p>
                <form method="POST">
                    <div class="input-box">
                        <input type="text" name="cname" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <input type="email" name="cemail" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box message-box">
                        <textarea name="msg" placeholder="Enter your message" required></textarea>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-dark btn-user" name="contact" value="Send Now">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>