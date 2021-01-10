let player;

function Player(classType, health, mana, strength, agility, speed ){
    this.classType = classType;
    this.health = health;
    this.mana =  mana;
    this.strength = strength;
    this.agility = agility;
    this.speed = speed;
}

let PlayerMoves = {

    calcAttack: function(){
        //who attacks first?
        let getPlayerSpeed = player.speed;
        let getEnemySpeed = enemy.speed;
        
        //player attacks

        let playerAttack = function(){
            let calcBaseDamage;
            if(player.mana > 0){
                calcBaseDamage = player.strength * player.mana / 1000;
            }else{
                calcBaseDamage = player.strength * player.agility / 1000 ;
            }

            let ofssetDamage = Math.floor(Math.random() * Math.floor(10));
            let calcOutDamage = Math.floor(calcBaseDamage + ofssetDamage);
            //number of hits
            let numberOfHits = Math.floor(Math.random() * Math.floor (player.agility / 10) / 2) + 1;
            let attackValues = [calcOutDamage, numberOfHits];
            return attackValues;
        }

        //enemy attacks
        let enemyAttack = function(){
            let calcBaseDamage;
            if(enemy.mana > 0){
                calcBaseDamage = enemy.strength * enemy.mana / 1000;
            }else{
                calcBaseDamage = enemy.strength * enemy.agility / 1000;
            }

            let ofssetDamage = Math.floor(Math.random() * Math.floor(10));
            let calcOutDamage = Math.floor(calcBaseDamage + ofssetDamage);
            //number of hits
            let numberOfHits = Math.floor(Math.random() * Math.floor (enemy.agility/10) / 2) + 1;
            let attackValues = [calcOutDamage, numberOfHits];
            return attackValues;
        }

        //geting health of the enemy/player for changing it later
        if(player.health > 0 ){
            if(enemy.health>0){
        let getPlayerHealth = document.querySelector(".health-player");
        let getEnemyHealth = document.querySelector(".health-enemy");
        let getArena = document.querySelector(".arena");
        getArena.innerHTML = "<p class= 'player-message'> </p> <p class= 'enemy-message'> </p> <h3 class = final-message></h3>" ;
        let getPlayerMessege = document.querySelector(".player-message");
        let getEnemyMessege = document.querySelector(".enemy-message");
        let getFinalMessege = document.querySelector(".final-message");
        //initiate attacks depending on who is faster
        
        if(getPlayerSpeed >= getEnemySpeed){
                let playerAttackValues = playerAttack();
                let totalDamage = playerAttackValues [0] * playerAttackValues[1];
                enemy.health = enemy.health - totalDamage;
                getPlayerMessege.innerHTML = "<h3 class = 'attack-messages'> You hit " + playerAttackValues[1] + " times damage " + playerAttackValues[0] + "</h3>";
                if(enemy.health <= 0){
                    getFinalMessege.innerHTML = '<h3 class = "attack-messages" id = "win" >  <form action = "includes/win.inc.php" method =  "POST"> <button type = "submit" name = "win"> You won. Click here to play again!</button></form>  </h3> ';
                    if(player.health > 0){
                    getPlayerHealth.innerHTML = "Health: " + player.health;
                    } else{
                        getPlayerHealth.innerHTML = "Health: 0";
                    }
                    getEnemyHealth.innerHTML = "Health: 0";
                }else{
                    getEnemyHealth.innerHTML = "Health: "+enemy.health;
                    //enemy attcaks
                    let enemyAttackValues = enemyAttack();
                    let totalDamage = enemyAttackValues[0] * enemyAttackValues[1];
                    player.health = player.health - totalDamage;
                    getEnemyMessege.innerHTML = "<h3 class = 'attack-messages'> Enemy hit " + enemyAttackValues[1] + " times damage " + enemyAttackValues[0] + "</h3>";
                    if(player.health <= 0){
                        getFinalMessege.innerHTML = '<h3 class = "attack-messages">  <form action = "includes/win.inc.php" method =  "POST"> <button type = "submit" name = "lost"> You won. Click here to play again!</button></form> </h3>';
                        getPlayerHealth.innerHTML = "Health: 0";
                        if(enemy.health>0){
                        getEnemyHealth.innerHTML = "Health: " + enemy.health;
                        }else{
                            getEnemyHealth = "Health: 0"; 
                        }
                    } else{
                        getPlayerHealth.innerHTML = 'health : ' + player.health;
                    }
                }
            
            }else if(getPlayerSpeed <= getEnemySpeed){
                let enemyAttackValues = enemyAttack();
                let totalDamage = enemyAttackValues [0] * enemyAttackValues[1];
                player.health = player.health - totalDamage;
                getEnemyMessege.innerHTML = "<h3 class = 'attack-messages'> The enemy hit " + enemyAttackValues[1] + " times damage " + enemyAttackValues[0] + "</h3>";
                if(player.health <= 0){
                    getFinalMessege.innerHTML = '<h3 class = "attack-messages"> <form action = "includes/win.inc.php" method =  "POST"> <button type = "submit" name = "lost"> You won. Click here to play again!</button></form> </h3>';
                    if(player.health > 0){
                        getPlayerHealth.innerHTML = "Health: " + player.health;
                        } else{
                            getPlayerHealth.innerHTML = "Health: 0";
                        }
                    getPlayerHealth.innerHTML = "Health: 0";
                }else{
                    getPlayerHealth.innerHTML = "Health: "+ player.health;
                    //enemy attcaks
                    let playerAttackValues = playerAttack();
                    let totalDamage = playerAttackValues[0] * playerAttackValues[1];
                    enemy.health = enemy.health - totalDamage;
                    getPlayerMessege.innerHTML = "<h3 class = 'attack-messages'> You hit " + playerAttackValues[1] + " times damage " + playerAttackValues[0] + "</h3>";
                    if(enemy.health <= 0){
                        getFinalMessege.innerHTML = '<h3 class = "attack-messages"> <form action = "includes/win.inc.php" method =  "POST"> <button type = "submit" name = "win"> You won. Click here to play again!</button></form> </h3>';
                        getEnemyHealth.innerHTML = "Health: 0";
                        if(enemy.health>0){
                            getEnemyHealth.innerHTML = "Health: " + enemy.health;
                            }else{
                                getEnemyHealth = "Health: 0"; 
                            }
                    } else{
                        getEnemyHealth.innerHTML = 'health : ' + enemy.health;
                    }
                }
            
            }
         }else{
            alert ("Please refresh the browser to fight again!");
            }
        }else {
            alert ("Please refresh the browser to fight again!");
        }
    }

}

