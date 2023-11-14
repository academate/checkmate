<html>
<?php
$col_one_headings = array();
$col_two_headings = array();
$col_three_headings = array();
$heading_to_remove_array = array();

function load_the_list() {
    GLOBAL $dir;

    //file names
    // GLOBAL $left;
    // GLOBAL $middle;
    // GLOBAL $right;

    GLOBAL $col_one_headings;
    GLOBAL $col_two_headings;
    GLOBAL $col_three_headings;

    // echo sizeof($col_one_headings);
    // echo sizeof($col_two_headings);
    // echo sizeof($col_three_headings);

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
            array_push($col_one_headings, substr($line, 9));
            $left_read_heading += 1;
            echo '<script>inputHeadingToScreen("' . substr($line, 9, strlen($line)) . '", "column-one");</script>';
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
            array_push($col_two_headings, substr($line, 9));
            $middle_read_heading += 1;
            echo '<script>inputHeadingToScreen("' . substr($line, 9, strlen($line)) . '", "column-two");</script>';
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
            array_push($col_three_headings, substr($line, 9));
            $right_read_heading += 1;
            echo '<script>inputHeadingToScreen("' . substr($line, 9, strlen($line)) . '", "column-three");</script>';
        } else {
            echo '<script>inputListItemsToScreen("' . substr($line, 6, strlen($line)) . '", "column-three");</script>';
        }
        
        // echo '<script>inputTasksToScreen("' . $line . '", "column-three");</script>';
    }

    //Making some big changes here ------------------------------------------------------------------------------------------------------------------------------

    fclose($fptr_left);
    fclose($fptr_middle);
    fclose($fptr_right);

    // echo var_dump($col_one_headings);
    // echo "<br><br>" . var_dump($col_two_headings);
    // echo "<br><br>" . var_dump($col_three_headings);

    // foreach($col_one_headings as $ele) {
    //     echo $ele;
    // }

    // foreach($col_two_headings as $ele) {
    //     echo $ele;
    // }
    
    // foreach($col_three_headings as $ele) {
    //     echo $ele;
    // }

    // echo var_dump($col_one_headings);
    // echo var_dump($col_two_headings);

    echo "<script>removeFirstHr();</script>";
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
    // echo "Inside insert_into_file fnciton successfully";

    // echo "<br> $dir";

    $file = $dir . "/" . $file_name . ".txt";
    // echo "<br>" . $file;

    $file_prt = fopen($file, "r");

    $file_content = "";
    $flag = 0;

    $optionalHeading = strtoupper($optionalHeading);

    while ($line = fgets($file_prt)) {
        if (str_contains($line, "heading: ")) {
            $line = rtrim($line, "\n");
            $heading_of_matched_line = substr($line, 9);
            // echo "~~~~~~~~~~~~~HEADING: " . $heading_of_matched_line;

            if ($heading_of_matched_line == $optionalHeading) {
                // echo "~~~~~~OPTIONAHL heading match";
                $file_content = $file_content . $line . "\n";

                $file_content = $file_content . "item: " . $taskOne . "\n";

                if ($taskTwo != "") {
                    $file_content = $file_content . "item: " . $taskTwo . "\n";
                }

                $flag = 1;
            } else {
                $file_content = $file_content . $line . "\n";
            }
        } else {
            $file_content = $file_content . $line;
        }
    }

    fclose($file_prt);

    if ($flag == 0) {
        // $file_content = $file_content . $optionalHeading . "\n" . $taskOne . "\n";

        // if ($taskTwo != "") {
        //     $file_content = $file_content . $taskTwo . "\n";
        // }

        $file_ptr = fopen($file, "a");

        fwrite($file_ptr, "heading: " . $optionalHeading . "\n");

        fwrite($file_ptr, "item: " . $taskOne . "\n");

        if ($taskTwo != "") {
            fwrite($file_ptr, "item: " . $taskTwo . "\n");
        }

        fclose($file_ptr);
    } else {
        $file_ptr = fopen($file, "w");

        fwrite($file_ptr, $file_content);

        fclose($file_ptr);
    }

    // $file_ptr = fopen($file, "a");
    
    // fwrite($file_ptr, "heading: " . $optionalHeading . "\n");

    // fwrite($file_ptr, "item: " . $taskOne . "\n");

    // if ($taskTwo != "") {
    //     fwrite($file_ptr, "item: " . $taskTwo . "\n");
    // }

    // fclose($file_ptr);
    // echo "<br><br>Writing to file successful";
}

// function remove_heading($the_heading_index, $column_id) {
//     GLOBAL $col_one_headings;
//     GLOBAL $col_two_headings;
//     GLOBAL $col_three_headings;

//     GLOBAL $dir;

//     echo "The coludmn id = $column_id <br>";

//     $the_file_name = $dir . "/headings_to_remove.txt";
//     echo $the_file_name;
//     $file_pt = fopen($the_file_name, "a");

//     if ($column_id == "column-one") {
//         echo "INside first if";

//         echo $the_heading_index;
//         $the_index = substr($the_heading_index, 3, 5);
//         echo "~~~~INDEXXXX~~~~~~~ $the_index";
//         echo $the_heading_index;

//         if ((int) $the_heading_index == 1) {
//             echo "IT IS ONE";
//         }

//         // fwrite($file_pt, "1" . $the_heading . "\n");

//     } else if ($column_id == "column-two") {
//         echo "INside if else";

//         if ((int) $the_heading_index == 5) {
//             echo "IT IS ONE";
//         }

//         echo $the_heading_index;
//         echo $the_heading_index;
//         // fwrite($file_pt, "2$the_heading\n");
//     } else {
//         // fwrite($file_pt, "3$the_heading\n");
//         echo "inside else";

//         echo $the_heading_index;
//         echo $the_heading_index;
//     }
    
    
    // else {
    //     echo "INside else";
    //     remove_heading_from_array($heading, 3);
    // }

    // echo var_dump($col_one_headings);
    // echo var_dump($col_two_headings);
    // echo var_dump($col_three_headings);

    // fclose($file_pt);
// }

// function remove_heading_from_array($the_heading_to_remove, $the_array_no) {
//     GLOBAL $col_one_headings;
//     GLOBAL $col_two_headings;
//     GLOBAL $col_three_headings;

//     $heading_to_remove = $the_heading_to_remove;
//     $array_no = $the_array_no;

//     echo $the_heading_to_remove;
    // echo "Insdie that called function";
    // echo "\n";
    // echo $array_no;

    // foreach ($the_array_name as $ele) {
        // $the_index = array_search($the_heading_to_remove, $the_array);
        // unset($the_array[$the_index]);
        // array_values($the_array);
    // }

    // echo "<br><br>" . var_dump($the_array);
    

    // if ($the_array_no == 1) {
    //     $the_index = array_search($the_heading_to_remove, $the_array);
    //     // echo $the_index;
    // }  else if ($the_array_no == 2) {
    //     $the_index = array_search($the_heading_to_remove, $the_array);
    //     // echo $the_index;
    // } else {
    //     $the_index = array_search($the_heading_to_remove, $the_array);
    //     // echo $the_index;
    // }
// }

?>
</html>