<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');

        * {
            margin: 0;
            box-sizing: border-box;
        }

        body {
            padding: 5px;
            font-family: "Roboto Mono";
        }

        #main-content-area {
            display: flex;
            justify-content: center;
            height: 90vh;
            /* margin-bottom: 10px; */
            /* border: 1px solid; */
        }

        #left-area {
            width: 75vw;
            border: 1px solid;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 25px 5px;

            display: flex;
        }

        #column-one,
        #column-two,
        #column-three {
            flex: 1;
            padding: 10px 5px;
        }

        #column-two,
        #column-one {
            border-right: 5px solid;
        }

        /* #left-area {
            margin-right: 10px;
            margin-bottom: 10px;
        } */

        #right-area {
            width: 25vw;
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

        #adding-list {
            border: 1px solid;
            height: 100%;
            width: 100%;
            display: grid;
            place-items: center;
            padding: 15px;
        }

        #right-side-form {
            width: 100%;
            line-height: 30px;
            position: relative;
        }

        #right-side-form input[type=text] {
            width: 100%;
            height: 30px;
            padding: 3px 5px;
            border-radius: 5px;
            border-bottom: 1px solid;
            border-right: none;
            border-left: 1px solid;
            border-top: none;
            font-family: "Roboto Mono";
        }

        #right-side-form input[type=button],
        input[type=submit] {
            font-family: "Roboto Mono";
        }

        #add-task-submit-btn {
            width: 100%;
            height: 30px;  
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
            <div id="column-one">
                Blah
            </div>
            <div id="column-two">
                Blah
            </div>
            <div id="column-three">
                Blah
            </div>
        </div>
        <div id="right-area">
            <div id="adding-list">
                <form action="" method="post" id="right-side-form">
                    Task: <br>
                    <input type="text" name="" id="" placeholder="Ex: Team meeting at 20:00"> <br>
                    <input type="button" value="Add Task" onclick="addItem();" id="task1" style="margin-top: 10px;">
                    <br><br>
                    Heading (optional): <br>
                    <input type="text" name="heading" placeholder="Ex: Business"> <br><br>
                    Add to column: <br>

                    <label for="col1">
                        <input type="radio" name="cols" id="col1"> Column 1
                    </label>

                    <label for="col2">
                        <input type="radio" name="cols" id="col2"> Column 2
                    </label>

                    <label for="col3">
                        <input type="radio" name="cols" id="col3"> Column 3
                    </label> 

                    <br><br>

                    <input type="submit" value="Add" name="add_tasks" id="add-task-submit-btn">
                </form>
            </div>
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

    <script>
        const addItem = () => {
            static itemCount = 1;
            
        }
    </script>
</body>
</html>