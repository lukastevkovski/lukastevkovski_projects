import { fetchQuestions } from "./api.js";
import { getScore, setScore, clearStorage } from "./storage.js";

// DOM Elements
const loadingScreen = document.getElementById("loading-screen");
const startScreen = document.getElementById("start-screen");
const quizScreen = document.getElementById("quiz-screen");
const resultScreen = document.getElementById("result-screen");
const startButton = document.getElementById("start-button");
const restartButton = document.getElementById("restart-button");
const questionText = document.getElementById("question-text");
const optionsContainer = document.getElementById("options");
const progressBar = document.getElementById("progress-bar");
const scoreDisplay = document.getElementById("score-display");
const finalScoreDisplay = document.getElementById("final-score");

let questions = [];
let currentQuestionIndex = 0;
let score = 0;

// Show/hide screens with animations
function showScreen(screen) {
  [loadingScreen, startScreen, quizScreen, resultScreen].forEach((s) => {
    s.classList.add("d-none");
    s.classList.remove("animate__fadeIn", "animate__fadeOut");
  });
  screen.classList.remove("d-none");
  screen.classList.add("animate__animated", "animate__fadeIn");
}

// Load and display question
function displayQuestion() {
  if (currentQuestionIndex >= questions.length) {
    showResult();
    return;
  }

  const question = questions[currentQuestionIndex];
  questionText.textContent = question.question;
  optionsContainer.innerHTML = "";
  question.options.forEach((option) => {
    const button = document.createElement("button");
    button.className =
      "btn btn-outline-primary btn-option animate__animated animate__fadeIn";
    button.textContent = option;
    button.addEventListener("click", () => checkAnswer(option));
    optionsContainer.appendChild(button);
  });

  // Update progress bar
  const progress = ((currentQuestionIndex + 1) / questions.length) * 100;
  progressBar.style.width = `${progress}%`;
  progressBar.setAttribute("aria-valuenow", progress);

  // Update score display
  scoreDisplay.textContent = score;

  // Update URL hash
  window.location.hash = `question-${currentQuestionIndex + 1}`;
}

// Check user's answer
function checkAnswer(selectedOption) {
  const correctAnswer = questions[currentQuestionIndex].correct_answer;
  if (selectedOption === correctAnswer) {
    score++;
    setScore(score);
  }
  currentQuestionIndex++;
  displayQuestion();
}

// Show result screen
function showResult() {
  showScreen(resultScreen);
  finalScoreDisplay.textContent = score;
  window.location.hash = "result";
}

// Initialize quiz
async function init() {
  showScreen(loadingScreen);
  questions = await fetchQuestions();
  if (questions.length === 0) {
    alert("Failed to load questions. Please try again later.");
    return;
  }
  showScreen(startScreen);
}

// Handle hash change for navigation
window.addEventListener("hashchange", () => {
  const hash = window.location.hash;
  if (hash.startsWith("#question-")) {
    const index = parseInt(hash.split("-")[1]) - 1;
    if (index >= 0 && index < questions.length) {
      currentQuestionIndex = index;
      showScreen(quizScreen);
      displayQuestion();
    }
  } else if (hash === "#result") {
    showResult();
  }
});

// Start quiz
startButton.addEventListener("click", () => {
  score = getScore();
  currentQuestionIndex = 0;
  showScreen(quizScreen);
  displayQuestion();
});

// Restart quiz
restartButton.addEventListener("click", () => {
  clearStorage();
  window.location.hash = "";
  window.location.reload();
});

// Initialize on page load
init();
