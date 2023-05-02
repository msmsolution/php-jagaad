<?php

//$dir = readline("Enter a file: ");
//// Check if the directory exists
//if (file_exists($dir) ) {
//
//    // Get the files of the directory as an array
//    $scan_arr = scandir($dir);
//    $files_arr = array_diff($scan_arr, array('.','..') );
//    // echo "<pre>"; print_r( $files_arr ); echo "</pre>";
//    // Get each files of our directory with line break
//    foreach ($files_arr as $file) {
//        //Get the file path
//        $file_path = "my_directory/".$file;
//        // Get the file extension
//        $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
//        if ($file_ext=="txt") {
//            echo $file."<br/>";
//        }
//
//    }
//}
//else {
//    echo "Dorectory does not exists";
//}
// Prompt the user to enter a directory path to scan
echo "Enter directory path: ";
$dir_path = trim(fgets(STDIN));
// Scan the directory and all subdirectories for all files with a .txt extension
echo "Scanning directory $dir_path for .txt files...\n";
$backup_dir = $dir_path . "/backup";
$files = scan_directory($dir_path, $backup_dir);
// Create a new directory named "backup" inside the scanned directory
echo "Creating backup directory $backup_dir...\n";
if (!mkdir($backup_dir)) {
    die("Error creating backup directory!\n");
}
echo "Backup directory created successfully!\n";
// Create a backup copy of each .txt file found by copying it to the "backup" directory, while appending the current date and time to the filename
foreach ($files as $file) {
    $backup_filename = $backup_dir . "/" . basename($file, ".txt") . "_" . date("Y-m-d_H-i-s") . ".txt";
    echo "Backing up $file...\n";
    if (!copy($file, $backup_filename)) {
        die("Error backing up file $file!\n");
    }
    echo "File backed up successfully! Backup filename: $backup_filename\n";
    // Create a report file named "backup_report.txt" inside the "backup" directory, containing the following information for each file backed up
    $report_filename = $backup_dir . "/backup_report.txt";
    $report_content = "Original filename and path: $file\nBackup filename and path: $backup_filename\nDate and time of backup: " . date("Y-m-d H:i:s") . "\n\n";
    if (!file_put_contents($report_filename, $report_content, FILE_APPEND)) {
        die("Error creating backup report!\n");
    }
}
echo "Creating backup report $report_filename...\n";
echo "Backup report created successfully!\n";
// Delete the "backup" directory and all of its contents
echo "Deleting backup directory...\n";
delete_directory($backup_dir);
echo "Backup directory deleted successfully!\n";
function scan_directory($dir_path, $backup_dir) {
    $files = [];
    $dir_handle = opendir($dir_path);
    if (!$dir_handle) {
        die("Error opening directory $dir_path!\n");
    }
    while (($entry = readdir($dir_handle)) !== false) {
        $entry_path = $dir_path . "/" . $entry;
        if ($entry === "." || $entry === "..") {
            continue;
        }
        if (is_dir($entry_path)) {
            $subdir_files = scan_directory($entry_path, $backup_dir);
            $files = array_merge($files, $subdir_files);
        } elseif (is_file($entry_path) && pathinfo($entry_path, PATHINFO_EXTENSION) === "txt") {
            $files[] = $entry_path;
        }
    }
    closedir($dir_handle);
    return $files;
}
function delete_directory($dir_path) {
    $dir_handle = opendir($dir_path);
    if (!$dir_handle) {
        die("Error opening directory $dir_path!\n");
    }
    while (($entry = readdir($dir_handle)) !== false) {
        $entry_path = $dir_path . "/" . $entry;
        if ($entry === "." || $entry === "..") {
            continue;
        }
        if (is_dir($entry_path)) {
            delete_directory($entry_path);
        } else {
            unlink($entry_path);
        }
    }
    closedir($dir_handle);
    if (!rmdir($dir_path)) {
        die("Error deleting directory $dir_path!\n");
    }
}








