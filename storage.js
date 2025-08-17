// Manages score in local storage
export function getScore() {
  return parseInt(localStorage.getItem("quizScore")) || 0;
}

export function setScore(score) {
  localStorage.setItem("quizScore", score);
}

export function clearStorage() {
  localStorage.removeItem("quizScore");
}
