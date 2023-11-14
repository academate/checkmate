<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <script>
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        }

        //function to input heading to screen
        const inputHeadingToScreen = (theHeading, idOfColumn) => {
            let columnId = document.getElementById(idOfColumn);

            // if (prevHeadingExists == 1) {
            //     columnId.innerHTML += "<div class='list-groups'><h4 class='to-do-list-heading'>" + theHeading + "</h4>";
            //     columnId.innerHTML += "<div class='heading-underline'></div>";
            // } else {
            //     columnId.innerHTML += "</div><div class='list-groups'><h4 class='to-do-list-heading'>" + theHeading + "</h4>";
            //     columnId.innerHTML += "<div class='heading-underline'></div>";
            // }

            //chaning this below thing:-------------------- revert back here if any error

            // columnId.innerHTML += "<div class='list-groups'><h4 class='to-do-list-heading'>" + theHeading + "</h4>";
            // columnId.innerHTML += "<div class='heading-underline'></div>";

            //changing this above thing:------------------------------------------------------------------------

            // if (columnId == "column-one") {
                
            // } else if (columnId == "column-two") {
                
            // } else {

            // }

            if (columnId.innerHTML != "") {
                columnId.innerHTML += "<hr>";
            }

            columnId.innerHTML += `<div class='heading-grp'><h4 class='to-do-list-heading'>` + theHeading + `</h4><div class='cross-div' id='` + idOfColumn.substring(7) + `'onclick='removeThisListGrp(this);'><span class='cross-bar-one'></span><span class='cross-bar-two'></span></div></div>`;
            columnId.innerHTML += "<span class='heading-underline'></span>";

            // let headingsArray = Array.from
        }

        //function to input list items to the screen
        const inputListItemsToScreen = (theItem, idOfColumn) => {
            let columnId = document.getElementById(idOfColumn);

            columnId.innerHTML += "<input type='checkbox' onclick='strikeText(this);'><span>" + theItem + "</span><br>";
        }

        // const inputTasksToScreen = (theContent, idOfColumn) => {
        //     // console.log("inside input tasks function");
        //     // console.log("COlumn id = " + idOfColumn);
        //     // console.log("\n\nThe content = " + theContent);

        //     let columnId = document.getElementById(idOfColumn);

        //     if (theContent.includes("<h")) {
        //         console.log("the condition is true");
        //         columnId.innerHTML += theContent + "<br>";
        //         columnId.innerHTML += "<div class='heading-underline'></div>";
        //     } else {
        //         console.log("the condition is false");
        //         columnId.innerHTML += theContent + "<br>";
        //     }

        //     // alert("inputTasksToScreen has been called with " + theContent);

            
        // }

        // for striking/unstriking the text when the checkbox is checked/unchecked
        const strikeText = (currentObj) => {
            let curChBx = currentObj;
            let textOfNextSibling = curChBx.nextSibling.innerHTML;

            // console.log(textOfNextSibling);

            // console.log(curChBx);

            if (curChBx.checked) {
                // console.log("Checked");
                curChBx.nextSibling.innerHTML = "<s>" + textOfNextSibling + "</s>";
            } else {
                // console.log("unchecked");
                curChBx.nextSibling.innerHTML = textOfNextSibling.slice(3, -4);
            }
        }

        const removeFirstHr = () => {
            let colOne = document.getElementById("column-one");
            let colTwo = document.getElementById("column-two");
            let colThree = document.getElementById("column-three");

            colOne.firstElementChild.remove();
            colTwo.firstElementChild.remove();
            colThree.firstElementChild.remove();
        }
    </script>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        /* * {
    margin: 0;
}

#main-content-area {
    display: flex;
    justify-content: center;
    height: 80vh;
    border: 1px solid;
}

#left-area {
    width: 70vw;
    border: 1px solid;
}

#right-area {
    width: 30vw;
    border: 1px solid;
}

nav {
    border: 1px solid;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 20vh;
    display: flex;
    justify-content: center;
    align-items: center;
} */

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

#logout-page {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1000;
    /* background: white; */
    /* opacity: 0.7; */
    display: grid;
    place-items: center;
    visibility: hidden;
}

#logout-box {
    border: 3px solid;
    border-radius: 10px;
    width: 300px;
    padding: 20px;
    background: red;
    opacity: 1;
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
    padding: 10px 15px;
    overflow: auto;
}

#column-one::-webkit-scrollbar,
#column-two::-webkit-scrollbar,
#column-three::-webkit-scrollbar {
    display: none;
}

hr {
    margin: 10px 0px;
}

#column-two,
#column-one {
    border-right: 5px solid;  
}

/* #left-area {
    margin-right: 10px;
    margin-bottom: 10px;
} */

.heading-grp {
    position: relative;
    padding: 5px;
    /* border-top: 2px solid;
    border-right: 2px solid;
    border-left: 2px solid; */
    /* border-top-left-radius: 10px;
    border-top-right-radius: 10px; */
    margin-top: 10px;
    /* border: 1px solid; */
}

.cross-div {
    /* visibility: hidden; */
    cursor: pointer;
    /* opacity: 0; */
    /* scale: 1.05; */
}

.cross-div:hover {
    /* visibility: visible; */
    opacity: 1;
}

.cross-bar-one, 
.cross-bar-two {
    background: green;
    min-width: 18px;
    height: 2px;
    display: inline-block;
    position: absolute;
    right: 10px;
    top: 15px;
    border-radius: 15px;
}

.cross-bar-one {
    transform: rotate(45deg);
}

.cross-bar-two {
    transform: rotate(-45deg);
}

#right-area {
    width: 25vw;
    border: 1px solid;
    margin-bottom: 10px;
}

.heading-underline {
    width: 30%;
    height: 5px;
    border-radius: 5px;
    background: red;
    display: block;
    /* margin-left: 10px;
    margin-bottom: 5px; */
    margin: 0px auto 10px auto;
}

input[type=checkbox] {
    margin-right: 8px;
    margin-left: 8px;
    cursor: pointer;
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
    <div id="logout-page">
        <div id="logout-box">
            <p>Log out from Checkmate?</p> <br>
            <input type="button" value="Logout" onclick="logOutConfirmation(true);">
            <input type="button" value="Cancel" onclick="logOutConfirmation(false);">
        </div>
    </div>
    <section id="main-content-area">
        <div id="left-area">
            <div id="column-one">
                <!-- Nothing added yet -->
            </div>
            <div id="column-two">
                <!-- Nothing added yet -->
            </div>
            <div id="column-three">
                <!-- Nothing added yet -->
            </div>
        </div>
        <div id="right-area">
            <?php
            $user = $_REQUEST["id"];
            $user = trim($user, "'");
            $dir = "users/" . $user;

            include_once("insert_into_file.php");

            //creating a folder for the user if it doesn't exits
            if (!file_exists("users/" . $user)) {
                mkdir($dir);
                file_put_contents($dir . "/col1.txt", "");
                file_put_contents($dir . "/col2.txt", "");
                file_put_contents($dir . "/col3.txt", "");
                file_put_contents($dir. "/headings_to_remove.txt", "");
                load_the_list();
            } else {
                // echo "Directory already exists";
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
                    <input type="text" name="opHeading" id="heading" placeholder="Ex: Business" value="<?php echo $optionalHeading; ?>" required> <br><br>
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

        <!-- <a href="" class="nav-links" onclick="logOutPopUpBox();"> -->
            <p onclick="logOutPopUpBox();">logout</p>
        <!-- </a> -->
        <!-- <a href="" class="">Contact</a> -->
    </div>

    <script>
        let theArrayOfH4 = Array.from(document.getElementsByClassName("to-do-list-heading"));

        let logoutPage = document.getElementById("logout-page");

        //checking for logout confirmation and doing things accordingly
        const logOutConfirmation = (boolVal) => {
            if (boolVal == true) {
                window.location.replace("login.php");
            } else {
                logoutPage.style.visibility = "hidden";
                logoutPage.style.zIndex = -1000;
            }
        }

        //showing logout confirmation box
        const logOutPopUpBox = () => {
            logoutPage.style.visibility = "visible";
            logoutPage.style.zIndex = 1000;
        }

        function checkingInArray(theHeading, columnId) {

            // console.log("~~~~Called checkingInArray()~~~~~");

            let count = 0;

            console.log(theArrayOfH4);

            for (let i = 0; i < theArrayOfH4.length; i++) {
                // console.log("~~~~~INSIDE FOREACH~~~~~");
                // console.log("~~~~~~~~" + theArrayOfH4[i].innerHTML + " ");
                // console.log(theHeading + "\n");
                if (theArrayOfH4[i].innerHTML == theHeading && theArrayOfH4[i].nextElementSibling.id == columnId) {
                    // console.log("~~~~~INSIDE IF~~~~~");
                    // alert("Found at " + count);
                    return i;
                } 
                count++;
            }

            // return count;
        }

        //this function is for removing a list group (heading + items under it) from the screen
        const removeThisListGrp = (curElementReference) => {
            let theHeading = curElementReference.previousElementSibling.innerHTML;

            console.log("Clicked this element: " + theHeading);

            let theMainEle = curElementReference.parentElement;

            if (theMainEle.previousElementSibling != null && theMainEle.previousElementSibling.tagName == "HR") {
                theMainEle.previousElementSibling.remove();
            }

            while (true) {
                let prevEle = theMainEle;
                
                try {
                    theMainEle = theMainEle.nextElementSibling;
                } catch (err) {
                    console.log("Exception encountered");
                }

                prevEle.remove();

                if (theMainEle == null || theMainEle.tagName == "DIV") {
                    break;
                }
            }

            let currentElementId = curElementReference.id;
            // let vari = columnId.previousElementSibling;
            console.log("YES");
            console.log(currentElementId);
            // console.log(columnId.parentElement);
            // console.log(vari);
            console.log("NO");

            // $.post("insert_into_file.php", {headingName: theHeading});
            
            // if (currentElementId == "one") {
            //     let theIndex = checkingInArray(theHeading, currentElementId);
            //     alert("INDEX: " + theIndex);
            // } else if (currentElementId == "two") {
            //     let theIndex = checkingInArray(theHeading, currentElementId);
            //     alert("INDEX: " + theIndex);
            // } else {
            //     let theIndex = checkingInArray(theHeading, currentElementId);
            //     alert("INDEX: " + theIndex);
            // }

            theArrayOfH4 = Array.from(document.getElementsByClassName("to-do-list-heading"));

            // console.log(columnId);

            // console.log("WIth column id = " + columnId);
        }
    </script>
</body>
</html>