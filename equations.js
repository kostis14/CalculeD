let equations  =['2x+2=6','2x+2=8','6x+2=26','6x-3=15','3+4x=27','3+5x=13','26-8x=2','13-2x=3','14=2x+2','7=31-3x','9x+2=119','4x-3=9','6=18-6x','18-2x=6','2=22-10x','3x+3=21','3x-3=27','292-19x=7','9+7x=37','118=5x+3','12x+3=111','80-6x=14','3+3x=51','42-3x=3','6x-3=39','2+25x=152','6+4x=22','3x-3=27','17=2x+13','20-6x=2','13x-3=62','16x-3=173','23-3x=17','3x-3=6','7x-3=11','35-5x=10','9+34x=77','460-32x=12','42-7x=7','20x-3=57','629=20x+29','29=53-8x','7=848-29x','10x-3=257','12+7x=110','30=10x+10','27=63-12x','32+3x=77','120=8x+8','36=3x+15','10x-3=137','11x-3=41','4x-3=41','5x+3=193','43x+4=133','88=7x+4','143-28x=3','171=15x+6','9x-3=24','31x-3=431','669=23x+2','18x+27=63','10x+41=491','15x+3=333','5x+2=12','12x-3=525','5+8x=21','13x-3=205','47-2x=3','15=225-10x','6=186-4x','64=76-2x','7x-3=270'];
let usedEquations = [];
let input = document.querySelector('#prakseis-input');
let output = document.querySelector('body > div.game-container > div > div.calculator > div > h1');
let scoreoutput = document.querySelector('body > div.game-container > div > div.scoresPlayingNow > div.score-now');
let calcinarow = document.querySelector('body > div.game-container > div > div.scoresPlayingNow > div.calculations-in-a-row');
let calc_highscore = document.querySelector('body > div.game-container > div > div.scoresPlayingNow > div.calculations-highscore');
function getRandomEquation(){
    
    let random = Math.floor(Math.random() * equations.length);
    if(usedEquations.includes(random)){
        return getRandomEquation();
    }
        else{
            usedEquations.push(random);
           console.log( nerdamer.solve(equations[random],'x').symbol.elements[0].toString());
            return equations[random];
        }

    }


    function startGame(){
        document.getElementById('start-btn').style.display = 'none';
        document.getElementById('game-starting').style.display = 'block';
        output.innerText = getRandomEquation();


    }
let score = 0;
