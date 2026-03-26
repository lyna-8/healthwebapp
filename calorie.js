document.getElementById("calorie-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const gender = document.getElementById("gender").value;
  const age = Number(document.getElementById("age").value);
  const height = Number(document.getElementById("height").value);
  const weight = Number(document.getElementById("weight").value);
  const activity = Number(document.getElementById("activity").value);
  const result = document.getElementById("result");

  if (!age || !height || !weight || !activity) {
      result.textContent = "Please fill out all fields.";
      result.style.color = "red";
      return;
  }

  let bmr;
  if (gender === "male") {
      bmr = 10 * weight + 6.25 * height - 5 * age + 5;
  } else {
      bmr = 10 * weight + 6.25 * height - 5 * age - 161;
  }

  const calories = Math.round(bmr * activity);

  result.textContent = `You need about ${calories} calories/day.`;
  result.style.color = "white";
});
