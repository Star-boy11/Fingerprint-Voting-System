
<?php
/*
    include('connect.php');

    if (isset($_POST['submit'])){
        $reset = mysqli_query($connect,"UPDATE voter SET status = 0");
        $candidate_delete = mysqli_query($connect, "DELETE FROM candidate");
        $folder_path = "../uploads/";

        // Remove all files in the folder but not folder
    


        echo '
                <script>
                    alert("Ready to Vote");
                    window.location = "../routes/reset_vote.php";
                </script>';
    }
    */
?>

<?php
    // Include the connection file
    include('connect.php');

    // Check if the submit button is pressed
    if (isset($_POST['submit'])){

        // Reset all voters' status to 0
        $reset = mysqli_query($connect,"UPDATE voter SET status = 0");

        // Delete all candidate records
        $candidate_delete = mysqli_query($connect, "DELETE FROM candidate");

        // Set the path to the folder
        $folder_path = "../uploads/";

        // Open the folder
        $folder = opendir($folder_path);

        // Loop through all the files in the folder
        while (($file = readdir($folder)) !== false) {
            // Skip . and .. files
            if ($file == '.' || $file == '..') {
                continue;
            }

            // Check if the file is a directory
            if (is_dir($folder_path . $file)) {
                // Recursively delete the subdirectory
                delete_folder($folder_path . $file);
            } else {
                // Delete the file
                unlink($folder_path . $file);
            }
        }

        // Close the folder
        closedir($folder);

        // Function to recursively delete a folder and its contents
        function delete_folder($folder_path) {
            // Open the folder
            $folder = opendir($folder_path);

            // Loop through all the files in the folder
            while (($file = readdir($folder)) !== false) {
                // Skip . and .. files
                if ($file == '.' || $file == '..') {
                    continue;
                }

                // Check if the file is a directory
                if (is_dir($folder_path . $file)) {
                    // Recursively delete the subdirectory
                    delete_folder($folder_path . $file);
                } else {
                    // Delete the file
                    unlink($folder_path . $file);
                }
            }

            // Close the folder
            closedir($folder);

            // Delete the folder
            rmdir($folder_path);
        }

        // Redirect to reset_vote.php after the reset
        echo '
            <script>
                alert("Ready to Vote");
                window.location = "../routes/reset_vote.php";
            </script>';
    }
?>
