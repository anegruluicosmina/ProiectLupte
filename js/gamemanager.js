let GameManager = {

    setGameStart: function(ClassType){
        this.resetPlayer (ClassType);
        this.setPreFight();
    },

    resetPlayer: function(ClassType){
        
        switch(ClassType){
            case "Asami" :
                player =  new Player (ClassType, 200, 0, 200, 150, 50);
                break;
            case "Dragon":
                player = new Player (ClassType, 130, 0, 150, 150, 200);
                break;
            case "Jinora":
                player = new Player (ClassType, 150, 0, 190, 140, 100);
                break;
            case "Mako":
                 player = new Player (ClassType, 170, 10, 140, 200, 170);
                 break;
            case "Sozin":
                player = new Player (ClassType, 200, 15, 150, 180, 200);
                break;
            default: alert("aaaaa");
        }

        //creating player section
        
        let getInterface = document.querySelector(".interface");
        getInterface.innerHTML = '<div class = "choosen-player" > <img src= "image/avatar-players/' + ClassType + '.png" class= "image-avatar"><div> <h3>' + ClassType + '</h3> <p class= "health-player"> Health:'+ player.health + '</p> <p>Mana:' + player.mana + '</p> <p> Strength: '+player.strength +'</p> <p>Agility:' +player.agility +'</p> <p>Speed : ' + player.speed + '</p></div> <div>';         
    },

    setPreFight: function(){

        //modifying header section

        let getHeader = document.querySelector(".header-body");
        getHeader.innerHTML= "<h2> Find an enemy. </h2>";

        //modifying action section

        let getAction = document.querySelector(".action");
        getAction.innerHTML = "<a href= '#' class = 'btn-prefight' onclick= 'GameManager.setFight()'> Search for enemy </a> ";

        //modifying arena section

        let getArena = document.querySelector(".arena");
        getArena.innerHTML = "<h3> ARENA </h3> <p class= 'player-message'> </p> <p class= 'enemy-message'> </p> <h3 class = final-message></h3>" ;

    },


    setFight: function(){
        //modify header for fight stage

        let getHeader = document.querySelector(".header-body");
        getHeader.innerHTML = '<h2> Task: Fight!</h2>'


        //modifying action 

        let getAction =  document.querySelector(".action");
        getAction.innerHTML = '<a href= "#" class= "btn-fight" onclick= "PlayerMoves.calcAttack()"> Attack</a>'

        //creating enemy section
        let enemy00= new Enemy("Kyoshi", 200, 10, 170, 150, 200);
        let enemy01 = new Enemy ("DaiLi", 100, 0, 100, 100, 100);
        let enemy02 = new Enemy ("AgniKaiMe", 180,0,150,130,160);
        let enemy03 = new Enemy("Sokka", 150, 8, 130,170,140 );
        let enemy04 = new Enemy ("YipYips", 160,0, 130, 140, 150);
        let chooseEnemy = function () {
            let random = Math.floor(Math.random()*10);
            while(random > 4){
                random = Math.floor(Math.random()*10);
            }
            return random;
        };
        switch(chooseEnemy()){
            case 0:
                enemy = enemy00;
                break;
            case 1:
                enemy = enemy01;
                break;
            case 2:
                enemy = enemy02;
                break;
            case 3:
                enemy= enemy03;
                break;
            case 4:
                enemy = enemy04;
                break;
        }


        let getEnemy =  document.querySelector(".enemy");
        getEnemy.innerHTML= '<img src= "image/avatar-enemy/' + enemy.enemyType + '.png" class= "image-avatar"><div> <h3>' + enemy.enemyType + '</h3> <p class= "health-enemy"> Health:'+ enemy.health + '</p> <p>Mana:' + enemy.mana + '</p> <p> Strength: '+enemy.strength +'</p> <p>Agility:' +enemy.agility +'</p> <p>Speed : ' + enemy.speed + '</p></div>';   

        
    }

}