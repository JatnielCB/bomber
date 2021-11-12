$(document).ready(function () {
    console.log(high[0])
/*Main Game Variables*/
let gameInterval, randomNumber, bombs=document.getElementsByClassName('bombs'), score=0;
let skip=[], noRepeat=[];
let page;
let name="";
/*Speed variables*/
let speed=500, limit=20;

/*Music variables*/
let song=2, music=document.getElementById("music");

//##########################################################//
//##################-MAIN MENU BUTTONS######################//

    //Play with music
    $('#play').click(function()
    {
        $("#game").addClass("move-visible");
        $("#game-footer").addClass("d-flex");
        music.play();
    });

    //Play without music
    $('#play-wm').click(function()
    {
        $("#game").addClass("move-visible");
        $("#game-footer").removeClass("d-flex");
        music.pause();
    });
    
    //info button
    $(".info-btn").click(function (){visiblePage(true,"#info")});

//##########################################################//
//######################-IN GAME FUNCTIONS-#################//

    //First enables the in game buttons
    enableButtons(true);
    function enableButtons(trueFalse)
    {
        if(trueFalse)
        {
        $(".settings-btn").click(function (){visiblePage(true,"#settings")});
        $(".scoreboard-btn").click(function (){$("#table-to-load").load(location.href+" #table-to-load>*","");visiblePage(true,"#scoreboard")});
        $('#back').click(()=>$("#game").removeClass("move-visible")); 
        $("#restart").click(function()
            {
            $("#restart").addClass("re");
            restartGame();
            });  
        }
        else{
        $(".scoreboard-btn").off();
        $(".settings-btn").off();
        $('#restart').off();
        $('#back').off();
        }
    }

    //Game Bombs buttons Active/desactive function
    function activeBombsControls(yes)
    {
    if(yes)
        {
        keyboardOnOff(true);
        for(let i=0;i<bombs.length;i++)
        {
        $(bombs[i]).click(function(){ 
            bombsFunction(i)
            });
        }
        }

    else if(!yes)
        {
        keyboardOnOff(false);
        for(let i=0;i<bombs.length;i++)$(bombs[i]).off();
        }
    }

    //Start Game function (game interval)
    function startGame()
    {
    gameInterval=setTimeout(() => 
        {
        randomNumber=getRandom(11);
        while(skip.includes(randomNumber)||noRepeat.includes(randomNumber))randomNumber = getRandom(11);
        skip.push(randomNumber);
        if(skip.length>3)return endGame(skip[0]);    
        $(bombs[randomNumber]).addClass("bombs-upper");
        startGame()
        },speed);
    }

    //Gets a Random Number
    const getRandom=(x)=>Math.round(Math.random()*x);

    //Update Score And game Speed
    const updateScore=(number)=>
        {
        $("#score").text(number);
        if(number==500)return speed-=30;/*Speed at 100ms*/
        if(number==250)return speed-=30;/*Speed at 150ms*/
        if(number==180)return speed-=50;/*Speed at 200ms*/
        if(number>150)return;/*Speed at 230ms*/
        if(number==105)return speed-=50;/*Speed at 230ms*/
        if(number==80)return speed-=50;/*Speed at 320ms*/
        if(number===30)return speed-=50;/*Speed at 410ms*/  
        if(number==limit)  /*This "if" sentence subtract 20ms to the speed variable every 20 points till 140 */
            {
            speed-=20;
            limit+=20;
            }
        if(number==0) return speed=500;
        }

    //End Game Function
    function endGame(i)
        {
        activeBombsControls(false)
        clearInterval(gameInterval);
        enableButtons(true);
        $(bombs[i]).children().attr("src", "source/img/explote.png");
        $(bombs[i]).attr("class","bombs explotion");
        setTimeout((score)=>
                            {
                            uploadScore(score)
                            skip=[];
                            },500);
        }

    //Restar Game
    function restartGame()
        {
        $(".bombs").attr("class","bombs");
        $(".bombs").children().attr("src","source/img/bomb512px.png");
        score=0;
        updateScore(score);
        enableButtons(false);
        activeBombsControls(true);
        return startGame();    
        }

        //#Set the keyboard Control On/Off
        function keyboardOnOff(on){
            if(on){
            $(document).keydown((event) => {        
                // Alert the key name and key code on keydown
            switch(event.code)
                {
                    case "KeyQ":
                        bombsFunction(0)
                    break;
                    case "KeyW":
                        bombsFunction(1)
                    break;
                    case "KeyE":
                        bombsFunction(2)
                    break;
                    case "KeyR":
                        bombsFunction(3)
                    break;
                    case "KeyA":
                        bombsFunction(4)
                    break;
                    case "KeyS":
                        bombsFunction(5)
                    break;
                    case "KeyD":
                        bombsFunction(6)
                    break;
                    case "KeyF":
                        bombsFunction(7)
                    break;
                    case "KeyZ":
                        bombsFunction(8)
                    break;
                    case "KeyX":
                        bombsFunction(9)
                    break;
                    case "KeyC":
                        bombsFunction(10)
                    break;
                    case "KeyV":
                        bombsFunction(11)
                    break;
                }
            });
            }
            else $(document).off();
        }

        //#Bombs events in active game
        function bombsFunction(i)
        {
        if(skip.includes(i))
        {
        $(bombs[i]).removeClass("bombs-upper");
        noRepeat.splice(0,1);
        noRepeat=skip.splice(skip.indexOf(i),1);
        score+=1;
        updateScore(score);
        }
        else endGame(i); 
        }

//##########################################################//
//########################-PAGES FUNCTIONS-#################//

    //Change Page function
    function visiblePage(visible,data)
        {
        if(visible)
            {
            page=data;
            return $(page).addClass("move-visible");
            }
        $(page).removeClass("move-visible");
        }

    //Exit from page
    $(".exit-page").click(function(){visiblePage(false)})

//###########################################################//
//################-UPLOAD SCORE FUNCTIONS-###################//

    //Submit Score buttons
    function exitScoreSendPage()
        {
        $("#submit-score").removeClass("move-visible");
        $("#background").removeClass("move-visible");
        }

    //-Submit Score buttons
    $("#exit-submit").click(()=>exitScoreSendPage());
    $("#background").dblclick(()=>exitScoreSendPage());

    //-When the game ends, show modal for submit score
    function uploadScore()
        {
        $("#submit-score").addClass("move-visible");
        return $("#background").addClass("move-visible");
        }

    //-Ajax function
    $("#submit-btn").click(function(){
        name=$("#name-submit").val();
        if(name.length==0 || name.length>17) return alert("Error the name must be between 1 and 17 characters");
        let param=
        {
        "name":name,
        "score":score
        }
        $.ajax({
            data: param,
            url: "source/php_stuff/updateScore.php",
            type: "POST",
            
            success: function () {
                visiblePage(true,"#scoreboard");
                $("#table-to-load").load(location.href+" #table-to-load>*","");
                exitScoreSendPage();
            }
        });
        
        
    })

//###############################################################//
//#######################-MUSIC FUNCTIONS-#######################//

music.onended=()=>changeSong(1);
function changeSong(x)
    {
    song+=x;
    if(song<1)song=2; 
    if(song>2)song=1;   
    music.setAttribute("src","source/audio/song"+song+".mp3");
    music.play();
    };
$("#left-arrow").click(()=>changeSong(-1));
$("#right-arrow").click(()=>changeSong(1));

});