class Book {
  constructor(bookTitle, bookAuthor, maxPages, onPage) {
    this.title = bookTitle;
    this.author = bookAuthor;
    this.maxPages = maxPages;
    this.onPage = onPage;
  }
}

const bookRead = [
  new Book("The Hobbit", "J.R.R. Tolkien", 300, 300),
  new Book("The Lord of the Rings", "J.R.R. Tolkien", 1000, 500),
  new Book("1984", "George Orwell", 328, 0),
];

function renderBookList() {
  const bookList = document.querySelector("#bookList ul");
  bookList.innerHTML = "";

  bookRead.forEach((book) => {
    const li = document.createElement("li");
    if (book.onPage === book.maxPages) {
      li.textContent = `You already read ${book.title} by ${book.author}.`;
      li.classList.add("read");
    } else {
      li.textContent = `You still need to read ${book.title} by ${book.author}.`;
      li.classList.add("not-read");
    }
    bookList.appendChild(li);
  });
}

function renderTable() {
  const tbody = document.querySelector("#bookTableBody");
  tbody.innerHTML = "";

  bookRead.forEach((book) => {
    const tr = document.createElement("tr");

    const titleTd = document.createElement("td");
    titleTd.textContent = book.title;
    tr.appendChild(titleTd);

    const authorTd = document.createElement("td");
    authorTd.textContent = book.author;
    tr.appendChild(authorTd);

    const progressTd = document.createElement("td");
    const progressBar = document.createElement("div");
    progressBar.classList.add("progress-bar");
    const progressBarFill = document.createElement("div");
    progressBarFill.classList.add("progress-bar-fill");
    const percentage =
      book.maxPages === 0 ? 0 : (book.onPage / book.maxPages) * 100;
    progressBarFill.style.width = `${percentage}%`;
    progressBar.appendChild(progressBarFill);
    progressTd.appendChild(progressBar);
    tr.appendChild(progressTd);

    const statusTd = document.createElement("td");
    if (book.onPage === book.maxPages) {
      statusTd.textContent = `You already read ${book.title} by ${book.author}.`;
      statusTd.classList.add("read");
    } else {
      statusTd.textContent = `You still need to read ${book.title} by ${book.author}.`;
      statusTd.classList.add("not-read");
    }
    tr.appendChild(statusTd);

    tbody.appendChild(tr);
  });
}

function handleFormSubmit(event) {
  event.preventDefault();

  const form = event.target;
  const title = form.elements.title.value.trim();
  const author = form.elements.author.value.trim();
  const maxPages = parseInt(form.elements.maxPages.value);
  const onPage = parseInt(form.elements.onPage.value);

  if (title === "" || author === "") {
    alert("Title and author cannot be empty.");
    return;
  }
  if (maxPages <= 0) {
    alert("Total pages must be greater than 0.");
    return;
  }
  if (onPage < 0) {
    alert("Current page cannot be negative.");
    return;
  }
  if (onPage > maxPages) {
    alert("Current page cannot exceed total pages.");
    return;
  }

  bookRead.push(new Book(title, author, maxPages, onPage));

  renderBookList();
  renderTable();

  form.reset();
}

document
  .querySelector("#bookForm")
  .addEventListener("submit", handleFormSubmit);

renderBookList();
renderTable();
