const therapy_1 = document.querySelector("#therapy_1");
const therapy_2 = document.querySelector("#therapy_2");
const therapy_3 = document.querySelector("#therapy_3");
const therapy_4 = document.querySelector("#therapy_4");
const therapy_5 = document.querySelector("#therapy_5");
const therapy_6 = document.querySelector("#therapy_6");

const therapy_selector = document.querySelector("#fk_therapy");

function switchTherapy() {
  switch (Number(therapy_selector.value)) {
    case 1:
      therapy_1.classList.remove("hidden");
      therapy_2.classList.add("hidden");
      therapy_3.classList.add("hidden");
      therapy_4.classList.add("hidden");
      therapy_5.classList.add("hidden");
      therapy_6.classList.add("hidden");
      break;
    case 2:
      therapy_1.classList.add("hidden");
      therapy_2.classList.remove("hidden");
      therapy_3.classList.add("hidden");
      therapy_4.classList.add("hidden");
      therapy_5.classList.add("hidden");
      therapy_6.classList.add("hidden");
      break;
    case 3:
      therapy_1.classList.add("hidden");
      therapy_2.classList.add("hidden");
      therapy_3.classList.remove("hidden");
      therapy_4.classList.add("hidden");
      therapy_5.classList.add("hidden");
      therapy_6.classList.add("hidden");
      break;
    case 4:
      therapy_1.classList.add("hidden");
      therapy_2.classList.add("hidden");
      therapy_3.classList.add("hidden");
      therapy_4.classList.remove("hidden");
      therapy_5.classList.add("hidden");
      therapy_6.classList.add("hidden");
      break;
    case 5:
      therapy_1.classList.add("hidden");
      therapy_2.classList.add("hidden");
      therapy_3.classList.add("hidden");
      therapy_4.classList.add("hidden");
      therapy_5.classList.remove("hidden");
      therapy_6.classList.add("hidden");
      break;
    case 6:
      therapy_1.classList.add("hidden");
      therapy_2.classList.add("hidden");
      therapy_3.classList.add("hidden");
      therapy_4.classList.add("hidden");
      therapy_5.classList.add("hidden");
      therapy_6.classList.remove("hidden");
      break;
  }
}