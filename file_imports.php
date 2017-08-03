<?php
/**
 * Created by PhpStorm.
 * User: jasonlu
 * Date: 8/3/17
 * Time: 3:02 PM
 *
 * File: file_imports.php
 * Author: Jason Lu (jasonlu6@bu.edu)
 *
 * Collaboration:
* Professor Douglas Densmore (dougd@bu.edu)
* Marliene Pavan (mapavan@bu.edu)
* Blade Olson (bladeols@bu.edu)
* Christopher Rodriguez (Fluigi Lab)  -->

* Description: "Hacky Solution" in order to import various ICE Samples "in bulk" *
 */

    if (isset($_FILES['ice_imports'])) {
        $myFile = $_FILES['ice_imports'];
        $fileCounter = count($myFile["import"]);

        /** for loop to accumulate the counts */
        /** attributes: import file name, temporary file name (in the stack),
         * type of file (.csv,.txt,.gwl, etc), file size (in kb),
         errors with the file*/

        for ($count = 0; $count < fileCounter; $count++) {
            ?>


            <p>File #<?= $count + 1 ?>:</p>
            <p>
                Name: <?= $myFile["Import File Name:"][$count] ?><br>
                Temp file: <?= $myFile["Temporary name:"][$count] ?><br>
                Type: <?= $myFile["Type of file:"][$count] ?><br>
                Size: <?= $myFile["File Size: "][$count] ?><br>
                Error: <?= $myFile["Errors: "][$count] ?><br>
            </p>

            <?php
            }
        }
?>