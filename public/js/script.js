function confirmDelete() {
  return confirm("Are you sure you want to delete this record?");
}

function validateForm() {
  const inputs = document.querySelectorAll("input[required], select[required]");
  for (let input of inputs) {
    if (!input.value) {
      alert("Please fill all required fields.");
      return false;
    }
  }
  return true;
}
