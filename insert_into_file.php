<?php

function load_the_list() {
    GLOBAL $dir;

    //file names
    // GLOBAL $left;
    // GLOBAL $middle;
    // GLOBAL $right;

    $left = $dir . "/col1.txt"; 
    $middle = $dir . "/col2.txt"; 
    $right = $dir . "/col3.txt";

    // $left = $dir . "/col1.txt"; 
    // $middle = $dir . "/col2.txt"; 
    // $right = $dir . "/col3.txt";

    //creating file pointer for each file
    $fptr_left = fopen($left, "r");
    $fptr_middle = fopen($middle, "r");
    $fptr_right = fopen($right, "r");

    //reading the content of each file
    // $left_content = fread($fptr_left, filesize($left));

    //reading left_file line by line
    while ($line = fgets($fptr_left)) {
        echo $line;
        $line = rtrim($line, "\n");
        
        echo '<script>inputTasksToScreen("' . $line . '", "column-one");</script>';
    }

    //reading middle_file line by line
    while ($line = fgets($fptr_middle)) {
        echo $line;
        $line = rtrim($line, "\n");
        
        echo '<script>inputTasksToScreen("' . $line . '", "column-two");</script>';
    }

    //reading right_file line by line
    while ($line = fgets($fptr_right)) {
        echo $line;
        $line = rtrim($line, "\n");
        
        echo '<script>inputTasksToScreen("' . $line . '", "column-three");</script>';
    }

    fclose($fptr_left);
    fclose($fptr_middle);
    fclose($fptr_right);
}

$taskOne = $taskTwo = $optionalHeading = $radio_checked = "";

if (isset($_POST["add_tasks"])) {
    $taskOne = $_POST["taskOne"];

    // if (isset($_POST["taskTwo"])) {
    //     $taskTwo = $_POST["taskTwo"];
    // }

    try {
        $taskTwo = $_POST["taskTwo"];
    } catch (Exception $e) {}
    
    try {
        $optionalHeading = $_POST["opHeading"];
    } catch (Exception $ex) {}

    $radio_checked = $_POST["cols"];

    echo $taskOne;
    echo "<br>" . $taskTwo;
    echo "<br>" . $optionalHeading;
    echo "<br>" . $radio_checked;

    insert_into_file($taskOne, $taskTwo, $optionalHeading, $radio_checked);

    //after doing writing task
    $taskOne = $taskTwo = $optionalHeading = $radio_checked = "";
}

function insert_into_file($taskOne, $taskTwo, $optionalHeading, $file_name) {
    GLOBAL $dir;
    echo "Inside insert_into_file fnciton successfully";

    echo "<br> $dir";

    $file = $dir . "/" . $file_name . ".txt";
    echo "<br>" . $file;

    $file_ptr = fopen($file, "a");

    if ($optionalHeading != "") {
        fwrite($file_ptr, "<h4 class='to-do-list-heading'>" . $optionalHeading . "</h4>\n");
        // $content += ;
    }

    fwrite($file_ptr, "<input type='checkbox'>" . $taskOne . "\n");

    if ($taskTwo != "") {
        // $content += $taskTwo;
        // $content += "<input type='checkbox'>" . $taskTwo . "\n";
        fwrite($file_ptr, "<input type='checkbox'>" . $taskTwo . "\n");
    }

    // fwrite($file_ptr, $content); //writing content to the file

    fclose($file_ptr);
    echo "<br><br>Writing to file successful";
    
    // $taskOne = $_POST["taskOne"];
    // echo $taskOne;
}

?>