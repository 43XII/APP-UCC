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
  <link rel="stylesheet" href="./Cssmockup/stylees-mark2.css " />
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

<body class='background-body'>

  <div class="container-fluid App header-bar" >
    <!-- <h1 class="mt-1" style="margin-bottom:0px;">APP.UCC.CO.TH</h1> -->
    <img class="logoapp" src="./img/ucclogo.png" alt="">
    <span>
      <?php
      if (!empty($_SESSION["login_ldap"])) { ?>
        <div class="logout">
          <div id="logout">
            <span class="input-group m-2 w-50">

              <div class="logout">
                <!-- <div class="yess">
                  <a href="index.php"><img class="yes" src="img/YES-WE-UNITED.png" alt=""></a>
                </div> -->
                <div id="logout">
                  <span class="input-group m-2 w-50">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-user-circle"></i>
                    </span>
                    <input type="text" value="<?php echo $_SESSION['namelog']; ?>" readonly name="user_01"
                      class="form-control" placeholder="User Name" aria-label="Input group example"
                      aria-describedby="basic-addon1">

                  </span>
                  <div class="btn_logout">
                    <!-- <button type="submit" class="btn btn-secondary btn-sm">Login</button> -->
                    <a href="logout.php" class="btn btn-secondary btn-sm btn-logout">Logout</a>
                  </div>
                </div>

                <!-- <div ><img src="To be world class-4.png" alt="" id="tobe"></div> -->
              </div>
            </span>
          </div>
        </div>
      <?php } else { ?>
        <div class="login">
          <div id="login">
            <span class="input-group m-2 w-50">
              <div class="login">
                <div id="login">
                  <!-- <div class="yess">
                      <a href="index.php"><img class="yes" src="img/YES-WE-UNITED.png" alt=""></a>
                    </div> -->
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
                    <button type="submit" class="btn btn-dark btn-sm"
                      style="width:80px; height:35px; font-size:18px;">Login</button>
                  </div>
                </div>
              </div>
              </form>
            </span>
          </div>
          <!-- <div ><img src="To be world class-4.png" alt="" id="tobe"></div> -->
        </div>
      <?php } ?>
    </span>
  </div>
  <div class="blur-overlay"></div>

  <section class="row " id="col" style="width:100%">
    <aside class="col-3 col-xl-2 bg-pr full-height-overflow1" id="aside">

    </aside>
    <main class="col-9 col-xl-10 bg-gray-100  full-height-overflow" style="overflow: hidden;">
      <div class="container" id="home">
        <div class="head  mt-0">
          <div class="logo fs-2 mt-4 mb-2"><img src="img/head welcome.png" style="width: 360px; height: 60px;" alt=""></div>
        </div>
        <div class="row gap-3 p-1 mb-1 align-items-center">
          <div class="card p-2" style="width: 25rem;">
            <img src="img/u2.jpg" class="card-img-top office" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bangpakong U2</h5>
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
              <h5 class="card-title">Head Office U3</h5>
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
              <h5 class="card-title">Rayong U4</h5>
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
      <iframe class="pt-3" id="frame" style="display: none;" name="contents" width="100%" height="570" src=""></iframe>
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
</script>



</html>

<script>
  // DATA MENU API
  document.addEventListener('DOMContentLoaded', () => {
    const apiUrl = 'https://www.ucc.co.th/api/App_ucc/data_menu.php';
    const token = 'UCC_WEB_APP_1989'; // token ที่ตรงกับ PHP

    fetch(apiUrl, {
        method: 'GET', // หรือ POST ถ้า API ต้องการ
        headers: {
          'Authorization': token,
          'Content-Type': 'application/json'
        }
      })
      .then(res => {
        if (!res.ok) throw new Error('Network response was not ok. Status: ' + res.status);
        return res.json();
      })
      .then(data => {
        renderMenu(data.datamenu);
        setupMenuToggle(); // เรียก toggle หลังสร้างเมนู
      })
      .catch(err => {
        console.error('❌ Fetch API error:', err);
      });
  });
</script>
<script>
  function renderMenu(datamenu) {
    const activeMenus = datamenu.filter(item => item.Status_menu === 'Y');

    // จัดกลุ่มตาม Group_NO
    const grouped = {};
    activeMenus.forEach(item => {
      if (!grouped[item.Group_NO]) {
        grouped[item.Group_NO] = {
          Group_Menu: item.Group_Menu,
          items: []
        };
      }
      grouped[item.Group_NO].items.push(item);
    });

    let html = '';

    Object.values(grouped).forEach(group => {
      // เรียงเมนูย่อยตาม Menu_NO
      group.items.sort((a, b) => parseInt(a.Menu_NO) - parseInt(b.Menu_NO));

      html += `
        <div class="container-menu">
            <div class="card-menubar">
                <div class="header-menu">
                    <h3>${group.Group_Menu}</h3>
                    <i class="fas fa-angle-down iconM"></i>
                </div>
                <div class="body-menu">
                    <ul>
        `;

      group.items.forEach(item => {
        let target = '';
        if (item.Type_Action === 'LINK_TO') target = '_blank';
        else if (item.Type_Action === 'OPEN_IN') target = 'contents';

        html += `
                        <a href="${item.Link_Menu}" target="${target}">
                            <li class="hov-primary">
                                <i class="${item.ICON_Menu}"></i> ${item.Name_Menu}
                            </li>
                        </a>
                    `;
      });

      html += `
                    </ul>
                </div>
            </div>
        </div>
        `;
    });

    document.getElementById('aside').innerHTML = html;
  }

  // --- Toggle เมนูหลัก (เปิด/ปิด) ---
  function setupMenuToggle() {
    const cardMenus = document.querySelectorAll('.card-menubar');
    cardMenus.forEach(menuCard => {
      const headerMenu = menuCard.querySelector('.header-menu');
      headerMenu.addEventListener('click', () => {
        menuCard.classList.toggle('open'); // สลับ class 'open'
      });
    });
  }
</script>

<style>
  /* ตัวอย่าง CSS สั้น ๆ ให้ toggle ทำงาน */
  .card-menubar .body-menu {
    display: none;
  }

  .card-menubar.open .body-menu {
    display: block;
  }
</style>
<?php
// include("config.send.php");
// $sql = "select * from servers order by ser_00 desc";
// $result = mysql_db_query($dbname, $sql) or die("Can't connect to table in database $dbname");
// $d = 0;
// while ($row = mysql_fetch_array($result)) {
//   //echo "$row[0]<br>";
//   $expire_explode = explode("/", $row[12]);
//   $expire_day[$d] = $expire_explode[0];
//   $expire_month[$d] = $expire_explode[1];
//   $expire_year[$d] = $expire_explode[2];
//   $send_explode = explode("/", $row[15]);
//   $send_1[$d] = $send_explode[0];
//   $send_2[$d] = $send_explode[1];
//   $send_3[$d] = $send_explode[2];

//   $today_explode = explode("/", $Mday);
//   $today_day[$d] = $today_explode[0];
//   $today_month[$d] = $today_explode[1];
//   $today_year[$d] = $today_explode[2];

//   $End[$d] = mktime(0, 0, 0, $expire_month[$d], $expire_day[$d], $expire_year[$d]);
//   $Start[$d] = mktime(0, 0, 0, $today_month[$d], $today_day[$d], $today_year[$d]);

//   $DateNum[$d] = ceil(($End[$d] - $Start[$d]) / 86400); // 28
//   if ($DateNum[$d] == 60 || $DateNum[$d] == 30 || ($DateNum[$d] <= 5 && $DateNum[$d] >= 0)) {
//     if ($send_1[$d] <> $dd || $row[15] == "") {
//       include("send_server.php");
//     }
//   }
//   $d++;
// }
?>