<?php
include "./config/config.php";
function get_safe_value($conn, $str)
{
   if ($str != '') {
      $str = trim($str);
      return mysqli_real_escape_string($conn, $str);
   }
}

// ===========selct =============
function getAll($table)
{
   global $conn;
   $query = "SELECT * FROM $table";
   return $query_run = mysqli_query($conn, $query);
};
function getByID($table, $id)
{
   global $conn;
   $query = "SELECT * FROM $table where importer_id='$id'";
   return $query_run = mysqli_query($conn, $query);
};
function getByIDUser($table, $id)
{
   global $conn;
   $query = "SELECT * FROM $table where admin_users='$id'";
   return $query_run = mysqli_query($conn, $query);
};


//  ===========inset message============ 
function redirect($url, $message)
{
   $_SESSION['message'] = $message;
   header("Location: " . $url);
   exit();
};
function redirectdelete($url, $message)
{
   $_SESSION['delete'] = $message;
   header("Location: " . $url);
   exit();
};
// =============vewimore ============
function modal_chack($unit_details ,$modal)
{
   global $conn;
   $query = "SELECT * FROM $unit_details where model='$modal'";
   return $query_run = mysqli_query($conn, $query);
};
// ============count table for index page card count===========
function validate($input) {
   return $input;
}

function getCount($tableName) {
   global $conn;
   $table = validate($tableName); // Use the validate function

   $query = "SELECT * FROM $table";
   $result = mysqli_query($conn, $query);

   if (!$result) {
       // Handle query error, if any
       return "Error: " . mysqli_error($conn);
   }

   $totalCount = mysqli_num_rows($result);
   return $totalCount;
}
?>