<?php
$col_one_headings = array();
$col_two_headings = array();
$col_three_headings = array();

function load_the_list() {
    GLOBAL $dir;

    //file names
    // GLOBAL $left;
    // GLOBAL $middle;
    // GLOBAL $right;

    GLOBAL $col_one_headings;
    GLOBAL $col_two_headings;
    GLOBAL $col_three_headings;

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

    $left_read_heading = $middle_read_heading = $right_read_heading = 0;

    //reading left_file line by line
    while ($line = fgets($fptr_left)) {
        // echo $line;
        $line = rtrim($line, "\n");

        //inserting the headings of column 1 to an array
        if (str_contains($line, "heading: ")) {
            // array_push($col_one_headings, substr($line, 31, strlen($line) - 31 - 5));
            $left_read_heading += 1;
            echo '<script>inputHeadingToScreen("' . substr($line, 9, strlen($line)) . '", "column-one", ' . $left_read_heading . ');</script>';
        } else {
            echo '<script>inputListItemsToScreen("' . substr($line, 6, strlen($line)) . '", "column-one");</script>';
        }
        
        // echo '<script>inputTasksToScreen("' . $line . '", "column-one");</script>';
    }

    //reading middle_file line by line
    while ($line = fgets($fptr_middle)) {
        // echo $line;
        $line = rtrim($line, "\n");

        //inserting the headings of column 2 to an array
        if (str_contains($line, "heading: ")) {
            // array_push($col_two_headings, substr($line, 31, strlen($line) - 31 - 5));
            $middle_read_heading += 1;
            echo '<script>inputHeadingToScreen("' . substr($line, 9, strlen($line)) . '", "column-two", ' . $middle_read_heading . ');</script>';
        } else {
            echo '<script>inputListItemsToScreen("' . substr($line, 6, strlen($line)) . '", "column-two");</script>';
        }
        
        // echo '<script>inputTasksToScreen("' . $line . '", "column-two");</script>';
    }

    //reading right_file line by line
    //Making some big changes here ------------------------------------------------------------------------------------------------------------------------------
    while ($line = fgets($fptr_right)) {
        // echo $line;
        $line = rtrim($line, "\n");

        //inserting the headings of column 3 to an array
        if (str_contains($line, "heading: ")) {
            // array_push($col_one_headings, substr($line, 31, strlen($line) - 31 - 5));
            $right_read_heading += 1;
            echo '<script>inputHeadingToScreen("' . substr($line, 9, strlen($line)) . '", "column-three", ' . $right_read_heading . ');</script>';
        } else {
            echo '<script>inputListItemsToScreen("' . substr($line, 6, strlen($line)) . '", "column-three");</script>';
        }
        
        // echo '<script>inputTasksToScreen("' . $line . '", "column-three");</script>';
    }

    //Making some big changes here ------------------------------------------------------------------------------------------------------------------------------

    fclose($fptr_left);
    fclose($fptr_middle);
    fclose($fptr_right);

    foreach($col_one_headings as $ele) {
        echo $ele . "<br>";
    }

    foreach($col_two_headings as $ele) {
        echo $ele . "<br>";
    }
    
    foreach($col_three_headings as $ele) {
        echo $ele . "<br>";
    }
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

    // echo $taskOne;
    // echo "<br>" . $taskTwo;
    // echo "<br>" . $optionalHeading;
    // echo "<br>" . $radio_checked;

    insert_into_file($taskOne, $taskTwo, $optionalHeading, $radio_checked);

    //after doing writing task
    $taskOne = $taskTwo = $optionalHeading = $radio_checked = "";
}

function insert_into_file($taskOne, $taskTwo, $optionalHeading, $file_name) {
    GLOBAL $dir;
    echo "Inside insert_into_file fnciton successfully";

    echo "<br> $dir";

    $file = $dir . "/" . $file_name . ".txt";
    // echo "<br>" . $file;

    $file_ptr = fopen($file, "a");

    //changing this whole part -----------------------------------------------------------------------------------------------

    if ($optionalHeading != "") {
        fwrite($file_ptr, "heading: " . $optionalHeading . "\n");
    }

    fwrite($file_ptr, "item: " . $taskOne . "\n");

    if ($taskTwo != "") {
        // $content += $taskTwo;
        // $content += "<input type='checkbox'>" . $taskTwo . "\n";
        fwrite($file_ptr, "item: " . $taskTwo . "\n");
    }

    // fwrite($file_ptr, $content); //writing content to the file

    //changing this whole part -----------------------------------------------------------------------------------------------

    fclose($file_ptr);
    echo "<br><br>Writing to file successful";
    
    // $taskOne = $_POST["taskOne"];
    // echo $taskOne;
}

?>