/*let num = prompt("Please enter a number");

if (num % 2 === 0) {
  console.log(`The number ${num} is even`);
} else {
  console.log(`The number ${num} is not even`);
}

function checkNumber(n) {
  for (let i = 10; i <= 100; i++) {
    if (i % 2 === 0 && i % n === 0) {
      console.log(i);
    }
  }
}

checkNumber(5);*/

function checkNumbers(num1, num2, num3) {
  const numbers = [num1, num2, num3];

  const smallest = Math.min(...numbers);
  const largest = Math.max(...numbers);

  function isPrime(n) {
    if (n < 2) return false;
    for (let i = 2; i <= Math.sqrt(n); i++) {
      if (n % i === 0) return false;
    }
    return true;
  }

  console.log(`Smallest number is: ${smallest}`);
  console.log(`Largest number is: ${largest}`);

  if (isPrime(smallest)) {
    console.log(`The smallest number ${smallest} is prime.`);
  } else {
    console.log(`The smallest number ${smallest} is not prime.`);
  }

  if (isPrime(largest)) {
    console.log(`The largest number ${largest} is prime.`);
  } else {
    console.log(`The largest number ${largest} is not prime.`);
  }
}

checkNumbers(13, 15, 20);
