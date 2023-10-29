<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        * {
            margin: 0;
            box-sizing: border-box;
        }

        body {
            padding: 5px;
        }

        #main-content-area {
            display: flex;
            justify-content: center;
            height: 90vh;
            /* margin-bottom: 10px; */
            /* border: 1px solid; */
        }

        #left-area {
            width: 80vw;
            border: 1px solid;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        /* #left-area {
            margin-right: 10px;
            margin-bottom: 10px;
        } */

        #right-area {
            width: 20vw;
            border: 1px solid;
            margin-bottom: 10px;
        }

        /* #right-area {
            margin-bottom: 10px;
        } */

        #nav-section {
            border: 1px solid;
            /* position: fixed; */
            /* bottom: 0; */
            /* width: calc(100vw - 10px); */
            width: calc(100vw - 10px);
            /* height: calc(10vh - 10px); */
            height: calc(10vh - 15px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #left-area, 
        #right-area,
        #nav-section {
            border-radius: 15px;
        }

        #nav-section {
            /* margin-bottom: 10px;
            margin-right: 10px; */
        }

        .nav-links {
            /* height: 50%; */
            /* border: 1px solid;    */
            display: grid;
            align-items: center;
            margin-right: 40px;
            margin-left: 40px;
        }

        .nav-links img {
            scale: 0.8;     
        }
    </style>
</head>
<body>
    <section id="main-content-area">
        <div id="left-area">
            dfdfd
        </div>
        <div id="right-area">
            dfdf
        </div>
    </section>
    <div id="nav-section">
        <!-- <a href="" class="">Home</a> -->
        <a href="#" class="nav-links">
            <img src="./icons8-home-50.png" alt="">
        </a>
        <a href="" class="nav-links">
            <img src="./icons8-user-48.png" alt="">
        </a>
        <a href="" class="nav-links">
            <img src="./icons8-about-48.png" alt="">
        </a>
        <!-- <a href="" class="">Contact</a> -->
    </div>
</body>
</html>