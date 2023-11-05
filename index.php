<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script>
        const inputTasksToScreen = (theContent, idOfColumn) => {
            console.log("inside input tasks function");
            console.log("COlumn id = " + idOfColumn);
            console.log("\n\nThe content = " + theContent);
            let columnId = document.getElementById(idOfColumn);

            // alert("inputTasksToScreen has been called with " + theContent);

            columnId.innerHTML += theContent + "<br>";
        }
    </script>
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

        .radio-btn-grp {
            display: flex;
            justify-content: space-between;
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
                Nothing added yet
            </div>
            <div id="column-two">
                Nothing added yet
            </div>
            <div id="column-three">
                Nothing added yet
            </div>
        </div>
        <div id="right-area">
            <?php
            $user = $_REQUEST["id"];
            $user = trim($user, "'");
            $dir = "users/" . $user;

            include("insert_into_file.php");

            //creating a folder for the user if it doesn't exits
            if (!file_exists("users/" . $user)) {
                mkdir($dir);
                file_put_contents($dir . "/col1.txt", "");
                file_put_contents($dir . "/col2.txt", "");
                file_put_contents($dir . "/col3.txt", "");
                load_the_list();
            } else {
                echo "Directory already exists";
                load_the_list();
            }

            ?>
            <div id="adding-list">
                <form action="" method="post" id="right-side-form">
                    Task: <br>
                    <input type="text" name="taskOne" id="taskOne" placeholder="Ex: Team meeting at 20:00" style="margin-bottom: 15px;" value="<?php echo $taskOne; ?>" required> <br>

                    <input type="text" name="taskTwo" id="taskTwo" placeholder="Ex: Meet boss for dinner" value="<?php echo $taskTwo; ?>">
                    <!-- <input type="button" value="Add Task" onclick="addItem();" id="task1" style="margin-top: 10px;"> -->
                    <br><br>
                    Heading (optional): <br>
                    <input type="text" name="opHeading" id="heading" placeholder="Ex: Business" value="<?php echo $optionalHeading; ?>"> <br><br>
                    Add to column: <br>

                    <div class="radio-btn-grp">
                    <label for="col1">
                        <input type="radio" name="cols" id="col1" value="col1"> Left
                    </label>

                    <label for="col2">
                        <input type="radio" name="cols" id="col2" value="col2" checked> Middle
                    </label>

                    <label for="col3">
                        <input type="radio" name="cols" id="col3" value="col3"> Right
                    </label> 
                    </div>

                    <br>

                    <input type="submit" value="Add" name="add_tasks" id="add-task-submit-btn" > <!-- onclick="addItem();" -->

                    <!-- <br> -->

                    <!-- <div id="err-msg-area"></div> -->
                </form>
            </div>
        </div>
    </section>

    <?php
    

    ?>
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

    <?php
        
    ?>

    <script>
        const addItem = () => {
            // document.getElementById("add-task-submit-btn").addEventListener("click", (event) => {
            //     event.preventDefault();
            // });

            console.log("Reached here");
            let taskOne = document.getElementById("taskOne");

            let taskTwo = document.getElementById("taskTwo");

            let optionalHeading = document.getElementById("heading");
            
            let leftRdBtn = document.getElementById("col1");
            let middleRdBtn = document.getElementById("col2");
            let rightRdBtn = document.getElementById("col3");

            console.log(taskOne.value + "\n" + taskTwo.value + "\n" + optionalHeading.value + "\n");

            // let errMsgArea = document.getElementById("err-msg-area");

            if (taskOne.value == "") {
                // console.log("HMMM");
                alert("Please enter at least one task before submitting");
            } 
            else {
                // errMsgArea.innerHTML = "";

                let radioChecked = "default";

                if (leftRdBtn.checked) {
                    console.log("Left is checked");
                    leftRdBtn.checked = false;
                    radioChecked = "left";
                }

                if (middleRdBtn.checked) {
                    console.log("Middle is checked");
                    middleRdBtn.checked = false;
                    radioChecked = "middle";
                }

                if (rightRdBtn.checked) {
                    console.log("Right is checked");
                    rightRdBtn.checked = false;
                    radioChecked = "right";
                }

                let funCalled = "<?php echo insert_into_file('true', ); ?>";

                taskOne.value = "";

                if (taskTwo.value != "") {
                    taskTwo.value = "";
                }

                optionalHeading.value = "";

                console.log(funCalled);
            }

            //making everything empty
            // taskOne.value = "";
        }
    </script>
</body>
</html>