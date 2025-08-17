// Fetches 20 questions from Open Trivia DB API
export async function fetchQuestions() {
  try {
    const response = await fetch("https://opentdb.com/api.php?amount=20");
    const data = await response.json();
    if (data.response_code !== 0) {
      throw new Error("Failed to fetch questions");
    }
    // Decode HTML entities in questions and answers
    return data.results.map((question) => ({
      question: decodeHTML(question.question),
      options: [...question.incorrect_answers, question.correct_answer]
        .map(decodeHTML)
        .sort(() => Math.random() - 0.5), // Shuffle options
      correct_answer: decodeHTML(question.correct_answer),
    }));
  } catch (error) {
    console.error("Error fetching questions:", error);
    return [];
  }
}

// Utility to decode HTML entities
function decodeHTML(html) {
  const txt = document.createElement("textarea");
  txt.innerHTML = html;
  return txt.value;
}
