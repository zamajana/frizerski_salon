<li class='dropdown user user-menu'>
    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
       <i class='glyphicon glyphicon-user'></i>
<?php

if(isset($_SESSION['login'])){

  if($_SESSION['userID']==1){

    echo "<span>Administrator <i class='caret'></i></span>";

  }else{

    echo "<span>Tajci & Boba <i class='caret'></i></span>";
  }

}

?>
</a>
    <ul class='dropdown-menu' style="width:100px;">
        <!-- Menu Body -->
        <!-- Menu Footer-->
        <li class='user-footer'>
           <div class='pull-right'>
               <a href="logout.php" class="tn btn-default btn-flat">Sign out</a>
           </div>
        </li>
    </ul>
</li>
<!-- <li>
  <a href="logout.php" class="tn btn-default btn-flat"  style="background-color:red;">Sign out</a>
  </li> -->