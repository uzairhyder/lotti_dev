<style>
  .sidenav {
    max-width: 300px;
    width: 70%;
    overflow-x: hidden;
    overflow-y: hidden;
    height: 100%;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    transform-origin: left center;
    transform: translateX(-300px);
    background-color: #ff2446;
  }

  .sidenavHeader {
    padding: 10px 0px 10px 25px;
    width: 120px;
    height: 50px;
    margin: 10px 0px;
  }

  .sidenavHeader img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .sidenavContentHeader {
    margin-top: 5px;
    padding: 10px 0px 10px 50px;
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    font-family: montserratBold;
  }

  .sidenavContent {
    padding: 10px 0px 10px 50px;
  }


  hr {
    height: 2px !important;
    border: 0;
    color: #ffffff;
    background-color: #ffffff;
  }

  .sidenavRow {
    display: flex;
    width: 100%;
    justify-content: space-between;
    padding: 15px 25px 15px 25px;
  }

  .signInButtons {
    padding: 15px 25px 15px 25px;
  }


  #closeBtn {
    display: none;
    position: fixed;
    top: 10px;
    left: 0;
    margin-left: 250px;
    color: white;
    font-size: 36px;
    cursor: pointer;
    z-index: 55555;
    transform: translateY(-5px);
    transition: visibility 0.5s;
  }

  #main-container a,
  #main-container a:link,
  #main-container a:visited,
  #main-container a:hover,
  #main-container a:active {
    text-decoration: none;
    color: black;
  }

  #sub-container-content a,
  #sub-container-content a:link,
  #sub-container-content a:visited,
  #sub-container-content a:hover,
  #sub-container-content a:active {
    text-decoration: none;
    color: black;
  }

  /* animation */
  @keyframes collapse {
    0% {
      z-index: 100;
      transform: translateX(0px);
    }

    100% {
      transform: translateX(-300px);
    }
  }

  @keyframes expand {
    0% {
      z-index: 100;
      transform: translateX(-300px);
    }

    100% {
      transform: translateX(0px);
    }
  }

  @keyframes show {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  @keyframes hide {
    0% {
      opacity: 1;
    }

    100% {
      opacity: 0;
    }
  }

  /* Overlay */
  #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 50;
    background-color: rgba(0, 0, 0, 0.7);
  }

  /* Dropdown */
  .sidenavContainer hr {
    width: 85%;
  }

  .sidenavRowDropdown {
    display: flex;
    width: 100%;
    justify-content: start;
    align-items: center;
    padding: 15px 25px 15px 25px;
    cursor: pointer;
  }


  .sidenavContainer {
    display: none;
    height: 0px;
    opacity: 0;
    transform: scaleY(0);
    transform-origin: center top;
  }

  @keyframes expandDropDown {
    0% {
      transform: scaleY(0);
      opacity: 0;
    }

    100% {
      transform: scaleY(1);
      opacity: 1;
    }
  }

  @keyframes collapseDropDown {
    0% {
      transform: scaleY(1);
      opacity: 1;
    }

    100% {
      transform: scaleY(0);
      opacity: 0;
    }
  }

  /* Container part */
  #main-container {
    position: absolute;
    width: 100%;
    height: 100%;
  }

  @keyframes mainAway {
    0% {
      transform: translateX(0px);
    }

    100% {
      transform: translateX(-300px);
    }
  }

  @keyframes mainBack {
    0% {
      transform: translateX(-300px);
    }

    100% {
      transform: translateX(0px);
    }
  }

  #sub-container {
    position: absolute;
    width: 100%;
    height: 100%;
    transform: translateX(300px);
    background-color: #ff2446;
    overflow: auto;
    /* background: linear-gradient(86deg, #7d003f, #ff2446) !important; */
  }

  @keyframes subBack {
    0% {
      transform: translateX(300px);
    }

    100% {
      transform: translateX(0px);
    }
  }

  @keyframes subPush {
    0% {
      transform: translateX(0px);
    }

    100% {
      transform: translateX(300px);
    }
  }

  #mainMenu {
    margin-top: 5px;
    padding: 10px 0px 0px 25px;
    font-weight: bold;
    font-size: 18px;
    cursor: pointer;
  }

  .sidenavRow i {
    color: #ffffff;
  }

  #mainMenu i {
    color: #ffffff;
    margin-right: 8px;
  }

  #mainMenu {
    color: #ffffff;
    font-family: montserratBold;
  }

  @media only screen and (max-width: 393px) {
    #closeBtn {
      margin-left: 290px;
    }
  }

  @media only screen and (max-width: 375px) {
    #closeBtn {
      margin-left: 275px;
    }
  }

  @media only screen and (max-width: 360px) {
    #closeBtn {
      margin-left: 260px;
    }
  }

  @media only screen and (max-width: 320px) {
    #closeBtn {
      margin-left: 230px;
    }
  }
</style>

<body>

  <div id="overlay"></div>

  <div id="closeBtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></div>
  <div class="sidenav noPrint" id="mySidenav">
    <div class="sidenavHeader">
      <a href="{{route('home')}}">
        <img src="{{asset('front_assets/images/logo.webp')}}" alt="logo">
      </a>
    </div>
    <!--Below SideNavHeader-->
    <div id="main-container">


      <a href="#" onclick="openAppliances()">
        <div class="sidenavRow">
          <div>Home Appliances</div>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </div>
      </a>
      <a href="#" onclick="openEntertaiment()">
        <div class="sidenavRow">
          <div>TV & Entertaiment</div>
          <i class="fa fa-chevron-right"></i>
        </div>
      </a>
      <a href="#" onclick="openMobile()">
        <div class="sidenavRow">
          <div>Computing & Mobile</div>
          <i class="fa fa-chevron-right"></i>
        </div>
      </a>
      <a href="#" onclick="openFurniture()">
        <div class="sidenavRow">
          <div>Furniture</div>
          <i class="fa fa-chevron-right"></i>
        </div>
      </a>
      <a href="{{route('login')}}">
        <div class="signInButtons">
          <div>Sign In</div>
        </div>
      </a>
      <a href="{{route('register')}}">
        <div class="signInButtons">
          <div>Sign Up</div>
        </div>
      </a>
      <!-- <a href="#">
        <div class="sidenavRow">
          <div>My Account</div>
        </div>
      </a>
      <a href="#">
        <div class="sidenavRow">
          <div>Sign Out</div>
        </div>
      </a> -->

    </div>

    <div id="sub-container">
      <div id="mainMenu">
        <i class="fa fa-chevron-left"></i> Main Menu
      </div>
      <hr />
      <div id="sub-container-content">
        <div class="sidenavContentHeader"></div>
        <a href="#">
          <div class="sidenavContent"></div>
        </a>
      </div>
    </div>
  </div>



</body>
<script src="main.js"></script>
<script src="script.js"></script>
<script>
  function openNav() {
    document.getElementById("mySidenav").style.animation = "expand 0.3s forwards";
    //closeBtn
    document.getElementById("closeBtn").style.display = "block";
    document.getElementById("closeBtn").style.animation = "show 0.3s";
    //Overlay
    document.getElementById("overlay").style.display = "block";
    document.getElementById("overlay").style.animation = "show 0.3s";

  }

  function closeNav() {
    document.getElementById("mySidenav").style.animation = "collapse 0.3s forwards";
    //closeBtn
    document.getElementById("closeBtn").style.animation = "hide 0.3s";
    //Overlay
    document.getElementById("overlay").style.animation = "hide 0.3s";

    setTimeout(() => {
      document.getElementById("closeBtn").style.display = "none";
      document.getElementById("overlay").style.display = "none";
      //Reset Menus
      document.getElementById("main-container").style.animation = "";
      document.getElementById("main-container").style.transform = "translateX(0px)";
      document.getElementById("sub-container").style.animation = "";
      document.getElementById("sub-container").style.transform = "translateX(300px)";
    }, 300)
  }


  document.querySelectorAll(".sidenavRow").forEach(row => {
    row.addEventListener("click", () => {
      document.getElementById("main-container").style.animation = "mainAway 0.3s forwards";
      document.getElementById("sub-container").style.animation = "subBack 0.3s forwards";
    });
  });

  document.getElementById("mainMenu").addEventListener("click", () => {
    document.getElementById("main-container").style.animation = "mainBack 0.3s forwards";
    document.getElementById("sub-container").style.animation = "subPush 0.3s forwards";
  })

  //subNavContent

  function openAppliances() {
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">Home Appliances</div>
    <a href="#"><div class="sidenavContent">All Small Appliances</div></a>
    <a href="#"><div class="sidenavContent">Air Fryer</div></a>
    <a href="#"><div class="sidenavContent">Choppers</div></a>
    <a href="#"><div class="sidenavContent">Built-In-Ovens</div></a>
    <a href="#"><div class="sidenavContent">Iron</div></a>
    <a href="#"><div class="sidenavContent">Water Heater</div></a>
    <a href="#"><div class="sidenavContent">Sandwich Makers</div></a>
    <a href="#"><div class="sidenavContent">Rice Cookers</div></a>
    <a href="#"><div class="sidenavContent">Sewing Machine</div></a>
    <a href="#"><div class="sidenavContent">Stand Mixer</div></a>`;
  }

  function openEntertaiment() {
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">TV & Entertaiment</div>
    <a href="#"><div class="sidenavContent">All Small Appliances</div></a>
    <a href="#"><div class="sidenavContent">Air Fryer</div></a>
    <a href="#"><div class="sidenavContent">Choppers</div></a>
    <a href="#"><div class="sidenavContent">Built-In-Ovens</div></a>
    <a href="#"><div class="sidenavContent">Iron</div></a>
    <a href="#"><div class="sidenavContent">Water Heater</div></a>
    <a href="#"><div class="sidenavContent">Sandwich Makers</div></a>
    <a href="#"><div class="sidenavContent">Rice Cookers</div></a>
    <a href="#"><div class="sidenavContent">Sewing Machine</div></a>
    <a href="#"><div class="sidenavContent">Stand Mixer</div></a>`;
  }

  function openMobile() {
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">Computing & Mobile</div>
    <a href="#"><div class="sidenavContent">All Small Appliances</div></a>
    <a href="#"><div class="sidenavContent">Air Fryer</div></a>
    <a href="#"><div class="sidenavContent">Choppers</div></a>
    <a href="#"><div class="sidenavContent">Built-In-Ovens</div></a>
    <a href="#"><div class="sidenavContent">Iron</div></a>
    <a href="#"><div class="sidenavContent">Water Heater</div></a>
    <a href="#"><div class="sidenavContent">Sandwich Makers</div></a>
    <a href="#"><div class="sidenavContent">Rice Cookers</div></a>
    <a href="#"><div class="sidenavContent">Sewing Machine</div></a>
    <a href="#"><div class="sidenavContent">Stand Mixer</div></a>`;
  }

  function openFurniture() {
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">Furniture</div>
    <a href="#"><div class="sidenavContent">All Small Appliances</div></a>
    <a href="#"><div class="sidenavContent">Air Fryer</div></a>
    <a href="#"><div class="sidenavContent">Choppers</div></a>
    <a href="#"><div class="sidenavContent">Built-In-Ovens</div></a>
    <a href="#"><div class="sidenavContent">Iron</div></a>
    <a href="#"><div class="sidenavContent">Water Heater</div></a>
    <a href="#"><div class="sidenavContent">Sandwich Makers</div></a>
    <a href="#"><div class="sidenavContent">Rice Cookers</div></a>
    <a href="#"><div class="sidenavContent">Sewing Machine</div></a>
    <a href="#"><div class="sidenavContent">Stand Mixer</div></a>`;
  }
</script>




