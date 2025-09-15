<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="img/ucclogo1.png">
  <title>UNITED COIL CENTER LIMITED</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="Cssmockup/stylees.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Alkatra:wght@700&family=Itim&family=Odor+Mean+Chey&family=Prompt:ital@0;1&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="./font-awesome/all.min.css">
  <link rel="stylesheet" href="./font-awesome/fontawesome.min.css">
</head>
<?php
session_start();
if($_POST['user_01']){
  $CHK_ADMIN=strtoupper($_POST['user_01']);
}
if($CHK_ADMIN=="ADMINISTRATOR"){
  $_POST['user_01']="";
  $_POST['user_02']="";
}
if (isset($_POST["user_01"])) {
  $user_01 = $_POST["user_01"];
  $user_02 = $_POST["user_02"];
  if ($user_01 != "" || $user_02 != "") {

    //if($session_is_registered("user_01")){}

    $username = 'UCC\\' . $user_01;
    $password = $user_02;
    $ds = ldap_connect("192.168.81.6");
    if ($ds) {
      ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
      $r = ldap_bind($ds, $username, $password) or dir("Unable to connect to LDAP server");

      $sr = ldap_search($ds, "DC=ucc,DC=co,DC=th", "CN=$user_01");
      $info = ldap_get_entries($ds, $sr);

      if ($info["count"] <> "") {
        $entry = ldap_first_entry($ds, $sr);
        $attrs = ldap_get_attributes($ds, $entry);
        for ($i = 0; $i < $info["count"]; $i++) {
          if ($info[$i]["mail"][0] != "" && $info[$i]["description"][0] != "CCH") {
            $user_profile = array(
              $info[$i]["initials"][0],
              $info[$i]["givenname"][0],
              $info[$i]["sn"][0],
              $info[$i]["mail"][0],
              $info[$i]["telephonenumber"][0],
              $info[$i]["mobile"][0],
              $info[$i]["physicaldeliveryofficename"][0],
              $info[$i]["description"][0],
              $info[$i]["wwwhomepage"][0]
            );
            for ($z = 0; $z < count($info[$i]["memberof"]) - 1; $z++) {
              $mem[$z] = split(",", $info[$i]["memberof"][$z]);
              $memof[$z] = split("=", $mem[$z][0]);
              $memberof[$z] = $memof[$z][1];
            }
          }
        }
        $login_ldap = "OK";
        $_SESSION['login_ldap'] = "OK";
        $_SESSION['namelog'] = "$user_profile[0] $user_profile[1] $user_profile[2]";
        /*#############################################################################
        
                    SESSION
        
        ###############################################################################*/


        session_register("user_01");
        session_register("user_02");
        session_register("userprofile");
        session_register("memberof");
        session_register("memo_code");


      } else {
        header("location:index.php");
      }
      ldap_close($ds);
    } else {
      header("location:index.php");
    }
  } else {
    header("location:index.php");
  }
}

?>

<body>
  <div class="container-fluid App">
    <h1 class="mt-1">APP.UCC.CO.TH</h1>
  </div>

  <?php
  if (!empty($_SESSION["login_ldap"])) { ?>
    <div class="login">
      <div id="login">
        <span class="input-group m-2 w-50">
          <span class="input-group-text" id="basic-addon1">
            <i class="fas fa-user-circle"></i>
          </span>
          <input type="text" value="<?php echo $_SESSION['namelog']; ?>" readonly name="user_01" class="form-control"
            placeholder="User Name" aria-label="Input group example" aria-describedby="basic-addon1">

        </span>
        <div class="btn_login">
          <!-- <button type="submit" class="btn btn-secondary btn-sm">Login</button> -->
          <a href="logout.php" class="btn btn-secondary btn-sm">Logout</a>
        </div>
      </div>
      <div class="yess">
        <a href="index.php"><img class="yes" src="img/YES-WE-UNITED.png" alt=""></a>
      </div>
      <!-- <div ><img src="To be world class-4.png" alt="" id="tobe"></div> -->
    </div>
  <?php } else { ?>

    <form action="" method="POST">
      <div class="login ">
        <div id="login">
          <span class="input-group m-2 ">
            <span class="input-group-text" id="basic-addon1">
              <i class="fas fa-user-circle"></i>
            </span>
            <input type="text" name="user_01" class="form-control" placeholder="User Name"
              aria-label="Input group example" aria-describedby="basic-addon1">

          </span>
          <span class="input-group m-2">
            <span class="input-group-text" id="basic-addon1">
              <i class="fas fa-key"></i>
            </span>
            <input type="password" name="user_02" class="form-control" placeholder="Password"
              aria-label="Input group example" aria-describedby="basic-addon1">
          </span>
          <div class="btn_login">
            <button type="submit" class="btn btn-secondary btn-sm">Login</button>
          </div>
        </div>
        <div class="yess">
          <a href="index.php"><img class="yes" src="img/YES-WE-UNITED.png" alt=""></a>
        </div>

      </div>
    </form>
  <?php } ?>
  <section class="row " id="col">
    <aside class="col-3 col-xl-2 bg-pr full-height-overflow1" id="aside">
      <h4 class="Topic">Information</h4>
      <ul>
        <a href="index.php">
          <li class="hov-primary"><i class="fas fa-home fa-lg"></i> Home</li>
        </a>
        <a href="https://tsu2.ucc.co.th" target="contents">
          <li class="hov-primary"><i class="fas fa-truck-moving fa-lg"></i> Truck Scale U2</li>
        </a>
        <a href="http://tsu3.ucc.co.th" target="contents">
          <li class="hov-primary"><i class="fas fa-truck-moving fa-lg"></i> Truck Scale U3</li>
        </a>
        <a href="https://tsu4.ucc.co.th" target="contents">
          <li class="hov-primary"><i class="fas fa-truck-moving fa-lg"></i> Truck Scale U4</li>
        </a>
        <a href="http://app.ucc.co.th/test" target="contents">
          <li class="hov-primary"><i class="fas fa-mail-bulk fa-lg"></i> Group mail</li>
        </a>
        <a href="http://app.ucc.co.th/map" target="contents">
          <li class="hov-primary"><i class="far fa-map fa-lg"></i> Map</li>
        </a>
        <a href="http://app.ucc.co.th/eforms/New_Requirement_Form_R07.pdf" target="contents">
          <li class="hov-primary"><i class="far fa-building fa-lg"></i> New Requirement From(Epicor)</li>
        </a>
        <a href="https://www.ucc.co.th/news_admin_mgmt/login.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-newspaper"></i> News Management</li>
        </a>
	 <a href="https://www.ucc.co.th/news_admin_opening/login.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-address-card"></i> Opening Management</li>
        </a>
	 <a href="https://mobileapp.ucc.co.th:22443/TQA/reason_Gallery.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-cogs fa-lg"></i> Defect information</li>
        </a>


      </ul>
      <h4 class="Topic">Programlist</h4>
      <ul>
        <a href="http://app.ucc.co.th/chk_stock" target="contents">
          <li class="hov-primary"><i class="fas fa-cube fa-lg"></i> chk_stock</li>
        </a>
        <a href="http://app.ucc.co.th/memo_online" target="contents">
          <li class="hov-primary"><i class="fas fa-sd-card fa-lg"></i> ERP Memo Online</li>
        </a>
        <a href="http://app.ucc.co.th/memo_online/index_admin.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-memory fa-lg"></i> Memo Online Admin</li>
        </a>
        <a href="http://app.ucc.co.th/new_com" target="contents">
          <li class="hov-primary"><i class="fas fa-desktop fa-lg"></i> Computer Service</li>
        </a>
        <a href="http://app.ucc.co.th/Spare/" target="_blank">
          <li class="hov-primary"><i class="fas fa-archive fa-lg"></i> Stock Computer</li>
        </a>
        <a href="https://booking-room.ucc.co.th/index.php" target="_blank">
          <li class="hov-primary"> <i class="fas fa-book-open fa-lg"></i> Meeting Room Booking</li>
        </a>
        <a href="https://booking-room.ucc.co.th/ucc_car/index.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-car-alt fa-lg"></i> Car Booking Online</li>
        </a>
	 <a href="https://mobileapp.ucc.co.th:22443/interpreter/" target="_blank">
          <li class="hov-primary"><i class="fas fa-cogs fa-lg"></i> Interpreter System </li>
        </a>

	<a href="https://mobileapp.ucc.co.th:22443/sales_invoice/" target="_blank">
          <li class="hov-primary"><i class="fas fa-file-alt fa-lg"></i> Invoice Send & Receipt</li>
        </a>

        <a href="https://booking-room.ucc.co.th/welcome-board-user/" target="_blank">
          <li class="hov-primary"><i class="fas fa-clipboard fa-lg"></i> Welcome Board</li>
        </a>
        <a href="https://booking-room.ucc.co.th/p-cha/" target="_blank">
          <li class="hov-primary"><i class="fas fa-file-alt fa-lg"></i> New Req (K.Saksit)</li>
        </a>
        <a href="https://booking-room.ucc.co.th/p-cha-admin/" target="_blank">
          <li class="hov-primary"><i class="fas fa-file-signature fa-lg"></i> Report Req (By Admin)</li>
        </a>
        <a href="http://" target="_blank" rel="noopener noreferrer"></a>
        <a href="https://booking-room.ucc.co.th/qrcode/" target="_blank">
          <li class="hov-primary"><i class="fas fa-qrcode fa-lg"></i> Qrcode SkidLot</li>
        </a>
        <a href="http://app.ucc.co.th/skid_control" target="contents">
          <li class="hov-primary"><i class="fas fa-stream fa-lg"></i> Skid Control</li>
        </a>
        <a href="https://u2millsheet.ucc.co.th:2443" target="_blank">
          <li class="hov-primary"><i class="far fa-clone fa-lg"></i> U2 Millsheet</li>
        </a>
        <a href="https://u3millsheet.ucc.co.th" target="_blank">
          <li class="hov-primary"><i class="far fa-clone fa-lg"></i> U3 Millsheet</li>
        </a>
        <a href="https://u4millsheet.ucc.co.th" target="_blank">
          <li class="hov-primary"><i class="far fa-clone fa-lg"></i> U4 Millsheet</li>
        </a>
        <a href="http://app.ucc.co.th/TQA_Center/menu_ga.php" target="_blank">
          <li class="hov-primary"><i class="far fa-folder-open fa-lg"></i> Document ISO14001:2005</li>
        </a>
        <a href="http://app.ucc.co.th/TQA_Center/menu_center.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-folder-open fa-lg"></i> Document Control(TQA)</li>
        </a>
        <a href="https://u3millsheet.ucc.co.th/IMEXDoc/" target="_blank">
          <li class="hov-primary"><i class="far fa-file-archive fa-lg"></i> IMEX Document Online</li>
        </a>
        <a href="https://u3millsheet.ucc.co.th/TISI_DOC/" target="_blank">
          <li class="hov-primary"><i class="fas fa-file-archive fa-lg"></i> TISI eDocument Online</li>
        </a>
        <a href="http://192.168.79.11:81/Die_MTN_control.php" target="_blank">
          <li class="hov-primary"><i class="fas fa-tools fa-lg"></i> Die MTN Control</li>
        </a>
        <a href="https://u3millsheet.ucc.co.th/Customer-Routing/" target="_blank">
          <li class="hov-primary"><i class="fas fa-city fa-lg"></i> Customer Routing</li>
        </a>
        <a href="http://app.ucc.co.th/Log_maildown/" target="_blank">
          <li class="hov-primary"><i class="fas fa-inbox fa-lg"></i> Log Mail System Down</li>
        </a>
        <a href="http://app2.ucc.co.th/Overdue/" target="_blank">
          <li class="hov-primary"><i class="fas fa-industry fa-lg"></i> Overdue Online</li>
        </a>
        <a href="https://booking-room.ucc.co.th/requisitionpj/" target="_blank">
          <li class="hov-primary"><i class="fas fa-list-alt"></i> Requisition_TOF</li>
        </a>
        <a href="https://booking-room.ucc.co.th/requisition_form/" target="_blank">
          <li class="hov-primary"><i class="fas fa-paste"></i> HR App Form</li>
        </a>
	<a href="https://www.ucc.co.th/Satisfaction_Survey/login.php" target="_blank">
          <li class="hov-primary"><i class="fa-solid fa-clipboard-list"></i> Survey Program </li>
        </a>

      </ul>
    </aside>
    <main class="col-9 col-xl-10 bg-gray-100  full-height-overflow" style="overflow: hidden;">
      <div class="container" id="home">
        <div class="head  mt-3">
          <div class="logo fs-2"><img src="img/head welcome.png" style="width: 330px; height: 60px;" alt=""></div>
        </div>
        <div class="row gap-3 p-1 mb-1 align-items-center">
          <div class="card p-2" style="width: 25rem;">
            <img src="img/u2.jpg" class="card-img-top office" alt="...">
            <div class="card-body">
              <h5 class="card-title">Chonburi branch (U2)</h5>
              700/351 Moo 6 Amata City Chonburi Industrial Estate, Bangna-Trad Rd. Km.57, Don-Hua-Roh, Muang, Chonburi
              20000 Thailand

              <br>Tel: 038-468-747</br>
              <p>Fax : 038-468-478</p>
              <a href="http://app.ucc.co.th/map/index.php?u2=YES" target="_blank" class="btn btn-secondary">Read
                more</a>
            </div>
          </div>
          <div class="card p-2" style="width: 25rem;">
            <img src="img/U3A.jpg" class="card-img-top office" alt="...">
            <div class="card-body">
              <h5 class="card-title">Samutprakarn branch (U3) HQ</h5>
              54/10 Moo 7 Soi Thammasiri, Bangna-Trad Rd.,Km.25.5, Bangsaotong,
              Bangsaotong, Samutprakarn 10570 Thailand
              <br>Tel: 02-338-1340, 02-708-3170 </br>
              <p>Fax: 02-338-1342</p>
              <a href="http://app.ucc.co.th/map/index.php?u3=YES" target="_blank" class="btn btn-secondary">Read
                more</a>
            </div>
          </div>
          <div class="card p-2" style="width: 25rem;">
            <img src="img/United_Coil_1.jpg" class="card-img-top office" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rayong branch (U4)</h5>
              500/81 Moo 3 WHA Eastern Seaboard Industrial Estate 1, Tasit, Pluakdaeng,
              Rayong 21140 Thailand
              <br>Tel: 033-659-777 <p>Fax: 033-659-778</p>
              <a href="http://app.ucc.co.th/map/index.php?u4=YES" target="_blank" class="btn btn-secondary">Read
                more</a>
            </div>
          </div>
        </div>
        <div class="head mt-1">
          <div class="logo fs-2"><img src="img/To be world class-4.png" style="width: 350px; height: 25px;" alt="">
          </div>
        </div>
      </div>

      <!-- test iframe -->
      <iframe id="frame" style="display: none;" name="contents" width="100%" height="570" src=""></iframe>
    </main>
  </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script>

  let home = document.getElementById('home');
  let frame = document.getElementById('frame');
  document.getElementById("aside").addEventListener("click", displayNone);

  function displayNone() {
    home.style.display = "none";
    frame.style.display = "block";
  }
  test

</script>

</html>
<?php
/*
include ("config.send.php");
$sql = "select * from servers order by ser_00 desc";
$result = mysql_db_query($dbname, $sql) or die("Can't connect to table in database $dbname");
$d = 0;
while ($row = mysql_fetch_array($result)) {
  //echo "$row[0]<br>";
  //??????????????????????
  $expire_explode = explode("/", $row[12]);
  $expire_day[$d] = $expire_explode[0];
  $expire_month[$d] = $expire_explode[1];
  $expire_year[$d] = $expire_explode[2];

  //??????????????????
  $send_explode = explode("/", $row[15]);
  $send_1[$d] = $send_explode[0];
  $send_2[$d] = $send_explode[1];
  $send_3[$d] = $send_explode[2];

  //???????????????
  $today_explode = explode("/", $Mday);
  $today_day[$d] = $today_explode[0];
  $today_month[$d] = $today_explode[1];
  $today_year[$d] = $today_explode[2];

  $End[$d] = mktime(0, 0, 0, $expire_month[$d], $expire_day[$d], $expire_year[$d]);
  $Start[$d] = mktime(0, 0, 0, $today_month[$d], $today_day[$d], $today_year[$d]);

  $DateNum[$d] = ceil(($End[$d] - $Start[$d]) / 86400); // 28
  if ($DateNum[$d] == 60 || $DateNum[$d] == 30 || ($DateNum[$d] <= 5 && $DateNum[$d] >= 0)) {
    if ($send_1[$d] <> $dd || $row[15] == "") {
      include ("send_server.php");
    }
  }
  $d++;
}
*/
?>