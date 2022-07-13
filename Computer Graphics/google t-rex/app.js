/*
- create new project
- refractor code
- project description (readme)
- project screenshots
- upload project
*/

const GAME = document.getElementById("game");
const PLAYER = document.getElementById("trex");
const OBSTACLE = document.getElementById("obstacle");
const START = document.getElementById("start-btn");
const overlay = document.getElementById("overlay");
const displayScore = document.getElementById("score");

let isGameOver = true;
let score = 0;
let prevScore = 0;
let isAlive = "";

const addOverlay = () => {
  overlay.style.display = "block";
};

const removeOverlay = () => {
  overlay.style.display = "none";
};

const startAnimations = () => {
  OBSTACLE.setAttribute("id", "obstacle");
  GAME.setAttribute("id", "game");
};

const stopAnimations = () => {
  GAME.setAttribute("id", "stop-game");
  OBSTACLE.setAttribute("id", "stop-animation");
};
addOverlay();
stopAnimations();

const jump = () => {
  PLAYER.classList.add("jump");

  setTimeout(() => {
    PLAYER.classList.remove("jump");
  }, 500);
};

const stopGame = (dinoTop, cactusLeft) => {
  if (dinoTop >= 240 && cactusLeft > 0 && cactusLeft < 20) {
    isGameOver = true;
    stopAnimations();

    PLAYER.style.top = dinoTop + "px";
    prevScore = score;
    score = 0;
    START.innerHTML = 'Restart game'

    clearInterval(isAlive);
    addOverlay();
  }
};

const startGame = () => {
  PLAYER.style.top = "285px";
  startAnimations();
  removeOverlay();
  isGameOver = false;

  displayScore.innerHTML = `Score: ${score++}`;

  let dinoTop = parseInt(
    window.getComputedStyle(PLAYER).getPropertyValue("top")
  );

  let cactusLeft = parseInt(
    window.getComputedStyle(OBSTACLE).getPropertyValue("left")
  );

  stopGame(dinoTop, cactusLeft);
};

START.addEventListener("click", () => {
  if (isGameOver) {
    isAlive = setInterval(startGame, 20);
  }
});

document.body.onkeyup = (e) => {
  if (e.keyCode === 32) jump();
};
