<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="colors.css">
    <style><?php include 'styles.css'; ?></style>
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

        const addHr = (idOfColumn) => {
            let columnId = document.getElementById(idOfColumn);

            columnId.innerHTML += "<hr>";
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
            let colOne = document.getElementById("column-one").firstElementChild;
            let colTwo = document.getElementById("column-two").firstElementChild;
            let colThree = document.getElementById("column-three").firstElementChild;

            if (colOne.tagName == "HR") {
                colOne.remove();
            }

            if (colTwo.tagName == "HR") {
                colTwo.remove();
            }

            if (colThree.tagName == "HR") {
                colThree.remove();
            }

            // colOne.firstElementChild.remove();
            // colTwo.firstElementChild.remove();
            // colThree.firstElementChild.remove();
        }

        const populateUsersCheckmateHeading = (userFullName) => {
            let usersCheckmateHeadingArea = document.getElementById("users-checkmate-heading");

            usersCheckmateHeadingArea.innerHTML = "<div>" + userFullName + "'s <span class='checkmate'>CheckMate</span></div>";
        }
    </script>
</head>

<body>
    <div id="logout-background-page"></div>
    <div id="logout-page">
        <div id="logout-box">
            <p>Log out from Checkmate?</p> <br>
            <div class="flex-line">
                <input type="button" value="LOGOUT" onclick="logOutConfirmation(true);">
                <input type="button" value="CANCEL" onclick="logOutConfirmation(false);">
            </div>
        </div>
    </div>
    <section id="main-content-area">
        <div id="left-area">
            <div id="users-checkmate-heading"></div>
            <div id="left-content-area">
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
        </div>
        <div id="right-area">
            <div id="add-task-heading">
                ADD TASK
            </div>
            <?php
            include_once("connect.php");

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
                load_the_list();
            } else {
                // echo "Directory already exists";
                load_the_list();
            }

            ?>
            <div id="adding-list">
                <form action="" method="post" id="right-side-form">
                    Heading ~ <br>
                    <input type="text" name="opHeading" id="heading" placeholder="Ex: Business" value="<?php echo $optionalHeading; ?>" required> <br><br>
                    Task ~ <br>
                    <input type="text" name="taskOne" id="taskOne" placeholder="Ex: Team meeting at 20:00" style="margin-bottom: 15px;" value="<?php echo $taskOne; ?>" required> <br>

                    <input type="text" name="taskTwo" id="taskTwo" placeholder="Ex: Meet boss for dinner" value="<?php echo $taskTwo; ?>">
                    <!-- <input type="button" value="Add Task" onclick="addItem();" id="task1" style="margin-top: 10px;"> -->
                    <br><br>

                    Add To Column ~ <br>

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

                    <input type="submit" value="ADD" name="add_tasks" id="add-task-submit-btn" > <!-- onclick="addItem();" -->

                    <!-- <br> -->

                    <!-- <div id="err-msg-area"></div> -->
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

        <!-- <a href="" class="nav-links" onclick="logOutPopUpBox();"> -->
            <p onclick="logOutPopUpBox();">logout</p>
        <!-- </a> -->
        <!-- <a href="" class="">Contact</a> -->
    </div>

    <script>
        // let theArrayOfH4 = Array.from(document.getElementsByClassName("to-do-list-heading"));

        let logoutPage = document.getElementById("logout-page");
        let logoutBackPage = document.getElementById("logout-background-page");

        //checking for logout confirmation and doing things accordingly
        const logOutConfirmation = (boolVal) => {
            if (boolVal) {
                window.location.replace("login.php");
            } else {
                logoutPage.style.visibility = logoutBackPage.style.visibility = "hidden";
                logoutPage.style.zIndex = -1000;
                logoutBackPage.style.zIndex = -500;
            }
        }

        //showing logout confirmation box
        const logOutPopUpBox = () => {
            logoutPage.style.visibility = logoutBackPage.style.visibility = "visible";
            logoutPage.style.zIndex = 1000;
            logoutBackPage.style.zIndex = 500;
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
                
                if (theMainEle.previousElementSibling.previousElementSibling == null) {
                    theMainEle.previousElementSibling.remove();
                }

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