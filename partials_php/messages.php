<?php
session_start();
    if(isset($_SESSION['error'])){?>
    <div class="alert alert-danger alert-dismissable fade show mt-3" role="alert">
      <?php
      echo $_SESSION['error'];
      unset($_SESSION['error']);
      ?>
      <button type="button" class="close" data-dismiss="alert" arial-label="Close">
        <span aria-hidden="true"> &times; </span>
      </button>
    </div>
      
    <?php  }  ?>