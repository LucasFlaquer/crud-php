<?php
  mysqli_report(MYSQLI_REPORT_STRICT);

  function open_database() {
    try {
      $con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
      return $con;
    } catch (Exception $e) {
      echo $e->getMessage();
      return null;
    }
  }
  function close_database($con) {
    try {
      mysqli_close($con);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
?>