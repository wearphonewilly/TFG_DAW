<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .img-fluid {
            max-width: 60% !important;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container .vertical {
            position: relative;
            top: 50%;
            transform: translateY("-50%");
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            margin: 0 auto;
        }

        .container .vertical .col {
            box-sizing: border-box;
            padding: 0 0.75rem;
        }

        @media screen and (max-width: 1000px) {
            .container .vertical .push-2 {
                width: 100% !important;
            }
        }

        .container .vertical .col-3 {
            width: 33.3333333333%;
        }

        @media screen and (max-width: 1000px) {
            .container .vertical .col-3 {
                width: 50%;
            }
        }

        @media screen and (max-width: 700px) {
            .container .vertical .col-3 {
                width: 100%;
            }
        }

        .email2:valid+span:before {
            content: "✅";
            color: #8BC34A;
        }

        .email2:invalid+span:before {
            content: "❌";
            color: #f44336;
        }

        .col-3 .email:valid {
            border-color: #8BC34A;
            transition: 0.5s;
        }

        .container .vertical .col-3 .email:valid+span:before {
            position: relative;
            left: -2rem;
        }

        .container .vertical .col-3 .email:invalid {
            border-color: #f44336;
            transition: 0.5s;
        }

        .container .vertical .col-3 .email:invalid+span:before {
            position: relative;
            left: -2rem;
        }

        .container .vertical .col-3 input {
            text-align: left;
            border-radius: 6rem;
            border: 1px solid #a0a0a0;
            padding: 0.6rem 2rem 0.6rem 1rem;
            width: 12rem;
            font-family: roboto;
            transition: 0.5s;
            margin-bottom: 1.5rem;
        }

        .container .vertical .col-3 input:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="vertical">
            <div class="col-3 col">
                <input class="email email2" type="email" placeholder="Enter your email" /><span> </span>
            </div>
        </div>
        <div class="form-group" id="usernameDiv">
            <label for="exampleInputEmail1">Username</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter password" name="usuario">
            <span></span>
        </div>
    </div>


</body>

</html>