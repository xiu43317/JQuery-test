<?php 
$PATH = "../products/TAFFETA/*.*";
$TITLE = "TAFFETA";
$WIDTH = "300px";
$HEIGHT = "500px";
$HREF = "#taffeta";
$first = 20;
$header = 17;
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    .left {
      text-align: center;
    }

    .img {
      display: inline-block;
      margin: 1em;
    }

    #title {
      text-align: center;
    }

    .back {
      text-align: center;
    }

    /* The Modal (background) */
    .modal1 {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 100;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
      -webkit-animation-name: fadeIn;
      /* Fade in the background */
      -webkit-animation-duration: 0.4s;
      animation-name: fadeIn;
      animation-duration: 0.4s;
    }

    /* Modal Content */
    .modal-content1 {
      position: fixed;
      background-color: #fefefe;
      top: 50%;
      left: 50%;
      width: 400px;
      overflow-y: auto;
      height: 100%;
      transform: translate(-50%, -50%);
      -webkit-animation-name: slideIn;
      -webkit-animation-duration: 0.4s;
      animation-name: slideIn;
      animation-duration: 0.4s;
    }

    /* The Close Button */
    .close {
      color: grey;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header1 {
      padding: 2px 16px;
      background-color: white;
      color: black;
    }

    .modal-body1 {
      position: relative;
      text-align: center;
    }

    .modal-footer1 {
      padding: 2px 16px;
      background-color: white;
      color: black;
    }

    a:hover .img-magnifier-glass {
      opacity: 1;
      pointer-events: initial;
    }

    @-webkit-keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @media only screen and (max-width: 767px) {
      .modal-content1 {
        width: 100%;
        height: 100%;
        overflow-y: y;
        border-radius: 0 !important;
        background-color: #ececec !important
      }

      .modal-body1 {
        position: relative;
        width: 300px;
      }
    }

    #gotop {
      position: fixed;
      z-index: 90;
      right: 30px;
      bottom: 31px;
      display: none;
      width: 50px;
      height: 50px;
      color: #fff;
      opacity: 50%;
      background: #33b5e5;
      line-height: 50px;
      border-radius: 50%;
      transition: all 0.5s;
      text-align: center;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    }
    #gotop:hover{
      opacity: 100%;
    }

  </style>
</head>

<body>
  <h1 id="title"><?php echo $TITLE; ?></h1>
  <p class="back"><a class="select" href="#photoindex">To Category</a></p>
  <a href="<?php echo $HREF?>" id="gotop">
    <i class="fa fa-angle-up fa-3x"></i>
  </a>
  <div class=left>
    <?php
    $files = glob($PATH);
    for ($i = 0; $i < count($files); $i++) {
      $j = $i + 1;
      $num = $files[$i];
      $name = substr($num, $first, -4);
      $data = substr($num, 3);
      echo    '<div class="img">' .
        '<p style="text-align:center">' . $name . '</p>' .
        '<a href="javascript:void(0)" onclick="showPic(\'' . $data . '\');"><img src="' . $num . '" width="200" height="150"></a>' .
        '</div>';
    }
    ?>
  </div>
  <!-- The Modal -->
  <div id="myModal" class="modal1">

    <!-- Modal content -->
    <div class="modal-content1">
      <div class="modal-header1">
        <span class="close">&times;</span>
        <h2 id="header">Modal Header</h2>
        <hr>
      </div>
      <div class="modal-body1">
        <a><img id="myimage" src="../img/BradPitt2.jpg" width="<?php echo $WIDTH; ?>" height="<?php echo $HEIGHT; ?>"></a>
      </div>
      <div class="modal-footer1" style="text-align:right;">
        <hr>
        <button id="closeBtn" type="button" class="btn btn-secondary">Close</button>
      </div>
    </div>

  </div>
  <script>
    // Get the modal
    var modal1 = document.getElementById("myModal");
    var img = document.getElementById("myimage");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var init = 0;

    /* 按下GoTop按鈕時的事件 */
    $('#gotop').click(function() {
      $('html,body').animate({
        scrollTop: 0
      }, 'slow'); /* 返回到最頂上 */
      return false;
    });

    /* 偵測卷軸滑動時，往下滑超過400px就讓GoTop按鈕出現 */
    $(window).scroll(function() {
      if ($(this).scrollTop() > 400) {
        $('#gotop').fadeIn();
      } else {
        $('#gotop').fadeOut();
      }
    });

    // When the user clicks the button, open the modal 
    function showPic(num) {
      img.src = "./" + num;
      modal1.style.display = "block";
      var fileName = num.substring(<?php echo $header;?>);
      var extIndex = fileName.lastIndexOf('.');
      if (extIndex != -1) {
        fileName = fileName.substr(0, extIndex);
      }
      $('#header').text(fileName);
      if (init == 0) {
        magnify("myimage");
        changePic("myimage", 3);
        init += 1;
      } else {
        changePic("myimage", 3);
      }

    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      $('#myModal').fadeOut(400);
    }

    $('#closeBtn').click(function() {
      $('#myModal').fadeOut(400);
    })

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal1) {
        $('#myModal').fadeOut(400);
      }
    }
    if ($(window).width() < 767) {
      img.width = 200;
      img.height = 400;
    }
  </script>
</body>

</html>