// TODO: Your code here.
let products = [];
class Products {
  constructor(productName, productPrice, productImg, productReviews = []) {
    this.name = productName;
    this.price = productPrice;
    this.img = productImg;
    this.reviews = productReviews;
  }
  getAverageRating() {
    if (this.reviews.length === 0) {
      return 0;
    } else {
      let sum = 0;
      for (let review of this.reviews) {
        sum += review.rating;
      }
      let average = sum / this.reviews.length;
      return Math.round(average);
    }
  }
}

products.push(
  new Products("Laptop", 999.99, "https://placehold.jp/150x150.png", [
    { rating: 4, comment: "Great laptop!", timestamp: new Date() },
    { rating: 2, comment: "Okay, but heavy", timestamp: new Date() },
  ])
);
products.push(
  new Products("Headphones", 99.99, "https://placehold.jp/150x150.png", [])
);

function renderProducts() {
  const container = document.getElementById("product-container");
  container.innerHTML = "";
  products.forEach((product, index) => {
    const card = document.createElement("div");
    card.className = "product-card";
    card.innerHTML = `
      <img src="${product.img}" alt="${product.name}">
      <h3>${product.name}</h3>
      <p>Price: $${product.price.toFixed(2)}</p>
      <p>Average Rating: ${product.getAverageRating()}</p>
      <button onclick="displayReviews(${index})">View Reviews</button>
    `;
    container.appendChild(card);
  });
}

function displayReviews(productIndex) {
  const product = products[productIndex];
  document.getElementById("modal-title").textContent = product.name;
  document.getElementById("modal-rating").textContent = `Average Rating: ${
    product.getAverageRating() || "No reviews yet"
  }`;
  const reviewsContainer = document.getElementById("reviews-container");
  reviewsContainer.innerHTML = "";
  if (product.reviews.length === 0) {
    reviewsContainer.innerHTML = "<p>No reviews yet</p>";
  } else {
    product.reviews.forEach((review) => {
      const reviewDiv = document.createElement("div");
      reviewDiv.className = "review";
      reviewDiv.innerHTML = `
        <p><strong>Rating:</strong> ${review.rating}</p>
        <p><strong>Comment:</strong> ${review.comment}</p>
        <p><strong>Date:</strong> ${new Date(
          review.timestamp
        ).toLocaleString()}</p>
      `;
      reviewsContainer.appendChild(reviewDiv);
    });
  }
  document.getElementById("modal").style.display = "block";
}

function submitReview(productIndex) {
  const comment = document.getElementById("review-comment").value;
  const rating = parseInt(document.getElementById("review-rating").value);
  if (!comment || isNaN(rating)) {
    alert("Please enter a comment and select a rating.");
    return;
  }
  products[productIndex].reviews.push({
    rating: rating,
    comment: comment,
    timestamp: new Date(),
  });
  document.getElementById("review-form").reset();
  displayReviews(productIndex);
}

function closeModal() {
  document.getElementById("modal").style.display = "none";
}

document.getElementById("review-form").addEventListener("submit", (e) => {
  e.preventDefault();
  const productIndex = products.findIndex(
    (p) => p.name === document.getElementById("modal-title").textContent
  );
  submitReview(productIndex);
});
document.getElementById("close-modal").addEventListener("click", closeModal);

renderProducts();
