<!--Dactyl web version 1.0.0-->
<!--This is just a Project-->
<!--Visit my web page for more info jbproyects.sytes.net-->
<?php
header('Access-Control-Allow-Origin: *'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/png" href="source/img/bomb512px.png">
    <link rel="apple-touch-icon" href="source/img/bombicon.png">
    <title>Dactyl Web</title>
    <link rel="stylesheet" href="source/css/main.min.css">
    <link rel="stylesheet" href="source/css/normalize.css">
    <link rel="stylesheet" href="source/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="source/js/bootstrap.bundle.min.js"></script>
    <script src="source/js/jquery-3.6.0.min.js"></script>
    <script src="source/js/fun.js"></script>
</head>
<body>

<!-----------------------------------Main Menu-------------------------------------->
<div id="my-card" class="text-center">
    <div class="d-inline-block">
        <h1 class="">Dactyl Web</h1>
        <p>Touch the bombs before they explode</p>
        <div class="d-flex flex-column">
            <div>
            <button id="play" class="btn btn-primary mx-1 "><i class="fas fa-play me-1"></i>Play!</button> 
            <button id="play-wm" class="btn btn-primary"><i class="fas fa-play me-1"></i>Play! (No music)</button> 
        </div>
            <button class="btn btn-info m-2 info-btn"><i class="fas fa-info me-1"></i>Info</button>
            <button class="btn btn-success mx-2 my-1 scoreboard-btn"><i class="far fa-clipboard me-1"></i>Scoreboard</button>
        </div>
    </div>
</div>

<!-----------------------------------Main Game-------------------------------------->
<div id="game" class="container-fluid pages">
    <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-success m-auto scoreboard-btn mt-1" >Score: <span id="score">0</span></button>
            <button id="back" class="btn btn-danger mt-1" >back</button>
            <button id="restart" class="btn btn-primary mt-1" >start</button>
            
        </div>
    </div>
    <div id="game-bombs"class="row">
        
        <div class="col-12 m-auto">
            <div id="bombs-grid" class="">
                <div id="bomb-1" class="bombs bckgr-img" data-number="0"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-2" class="bombs" data-number="1"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-3" class="bombs" data-number="2"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-4" class="bombs" data-number="3"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-6" class="bombs" data-number="4"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-5" class="bombs" data-number="5"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-7" class="bombs" data-number="6"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-8" class="bombs" data-number="7"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-9" class="bombs" data-number="8"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-10" class="bombs" data-number="9"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-11" class="bombs" data-number="10"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
                <div id="bomb-12" class="bombs" data-number="11"><img class="bombs-img" src="source/img/bomb512px.png" alt="bomb"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="game-footer" class="col-12 text-center mt-3  align-content-center justify-content-center display-none">
            <button id="left-arrow" class="btn btn-secondary">&lt;</button>
            <audio id="music" class="" src="source/audio/song2.mp3"controls></audio>
            <button id="right-arrow" class="btn btn-secondary">&gt;</button>
        </div>
    </div>
</div>

<!------------------------submit score form and background-------------------------->
<div id="background" class="container-fluid pages"></div>

<div id="submit-score" class="text-center">

  <div class="w-100 bg-dark p-2">

    <div class="my-1 d-flex justify-content-between">
      <p id="btn btn-success" class="btn btn-success m-0  text-center" >Score:<span class="score-in-submit"></span></p>
      <button id="exit-submit" class="btn btn-danger " >back</button>
    </div>

    <img id="scoreImg" src="source/img/kpro.jpeg" alt="Pro?">
    <p id="scoreImgText" class="m-0">Superaste 250 puntos</p>
    <h3 class="my-4">Submit Your Score</h3>
    <form class="m-4 mt-0 d-flex flex-column justify-content-center">
      <input id="name-submit" type="text" name="user" placeholder="Name">
      <button id="submit-btn" class="btn btn-success mt-3" type="button" >Submit</button>
    </form>
  </div>
</div>

<!-----------------------------------info menu-------------------------------------->
<div class="container-fluid pages pb-5" id="info">
  <div class="col-sm-10 col-md-8 m-auto">
      <div class="d-flex flex-row justify-content-between bg-info">
          <h2 class="p-1 m-0">Info</h2>
          <button class="btn btn-danger exit-page">Back</button>
      </div>
  
      <div class="accordion my-1 pb-5" id="info-accordion">

          <div class="accordion-item">
            <h3 class="accordion-header" id="info-header-1">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-item-1" aria-expanded="false" aria-controls="info-item-1">
                Instructions
              </button>
            </h3>
            <div id="info-item-1" class="accordion-collapse collapse" aria-labelledby="info-header-1" data-bs-parent="#info-accordion">
              <article class="accordion-body">

                <strong>Touch the bombs before they explode</strong><br>
                <p>The Game ends when either a bomb explodes or you touch a non active bomb.</p>

                <strong>Controls</strong><br>
                <p>You Can play in 3 different ways:</p>

                <div class="d-flex justify-content-center text-center mt-4">
                    <div ><p>Touch</p><img class="img-thumbnail" src="source/img/touch.png"></div>
                    <div><p>Mouse</p><img class="img-thumbnail" src="source/img/pointer.png"></div>
                    <div><p>Keyboard</p><img class="img-thumbnail" src="source/img/teclado.jpg"></div>
                </div>

              </article>
            </div>
          </div>
      
          <div class="accordion-item">
            <h3 class="accordion-header" id="info-header-2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-item-2" aria-expanded="false" aria-controls="info-item-2">
              Music
              </button>
            </h3>
            <article id="info-item-2" class="accordion-collapse collapse" aria-labelledby="info-header-2" data-bs-parent="#info-accordion">
              <div class="accordion-body">
                <strong>Mobile browsers can't have dynamic audio efects</strong><br>
                <p>blablabla</p>
                <strong class="mb-1">This are the songs</strong>
                <ul>
                    <li>Come Sweet death<span class="ms-3">-Evangelion Finally</span></li>
                    <li>MEGALOVANIA<span class="ms-3">-UNDERTALE soundtrack</span></li>
                    <li>One Final Effort<span class="ms-3">-Halo 3 (Original Soundtrack)</span></li>
                </ul>
              </div>
            </article>
          </div>
      
          <div class="accordion-item">
            <h3 class="accordion-header" id="info-header-3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-item-3" aria-expanded="false" aria-controls="info-item-3">
              More Info
              </button>
            </h3>
            <div id="info-item-3" class="accordion-collapse collapse" aria-labelledby="info-header-3" data-bs-parent="#info-accordion" >
              <div class="accordion-body">
                <strong>This game was made by Jatniel Carranza Bolaños. <a href="http://jbproyects.sytes.net"> Go to my Web Page</a></strong><br>Inspired by a ios mobile game called dactyl <a href="https://apps.apple.com/es/app/dactyl/id283909107">See in the App Stoe</a>
              </div>
            </div>
          </div>

      </div>
  </div>
</div>

<!----------------------------------scoreboard menu--------------------------------->
<div id="scoreboard" class="container-fluid text-center pages pb-5">
    <div class="col-12 col-sm-10 col-md-8 m-auto pb-5">

      <div class="d-flex flex-row justify-content-between bg-success">
            <h2 class="p-1 m-0 text-light">Scoreboard</h2>
            <button class="btn btn-danger exit-page">Back</button>
      </div>

      <table id="table-to-load"class="table bg-light " >
        <?php
        include("source/php_stuff/connection.php");
        $dataArray=connectAndSend("SELECT * FROM scoreboard ORDER BY points DESC");
        $numberLimit=count($dataArray);
        //This send the hieghest score and the name
        echo "<script>let highScore={ name:'";echo $dataArray[0][0]; echo"',";echo" score:";echo $dataArray[0][1]; echo"} </script>";
        if(count($dataArray)>15)$numberLimit=15;
        ?>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Score</th>
            </tr>
        </thead>

        <tbody>
          <?php for($i=0;$i<$numberLimit;$i++)
            {
          echo "<tr>
                <th scope='row'>";echo $i+1; echo "</th> 
                <td>"; echo $dataArray[$i][0]; echo "</td>
                <td>"; echo $dataArray[$i][1]; echo"</td>
                </tr>";
            }?>
        </tbody>

      </table >
      
    </div>
</div>

</body>
</html>