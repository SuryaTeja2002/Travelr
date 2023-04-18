<?php

session_start();

// Check if the user is logged in
if (isset($_SESSION['user_info'])) {
  // If they are, destroy the session
  session_destroy();
  
  // Send a success message back to the client
  echo 'success';
} else {
  // If they are not logged in, send an error message back to the client
  echo 'error';
}

?>
