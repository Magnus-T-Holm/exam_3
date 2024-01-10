function toggleDateInfo(dateId) {
  document.querySelector('#participant_container_' + dateId).classList.toggle('hidden');
  document.querySelector('#arrow_' + dateId).classList.toggle('flip');
}

const therapy_1 = document.querySelector("[data-therapy-type='Terapeutisk Yin Yoga']");
const therapy_2 = document.querySelector("[data-therapy-type='Kropsorienteret Meditation']");
const therapy_3 = document.querySelector("[data-therapy-type='Nervesystemsregulering']");
const therapy_4 = document.querySelector("[data-therapy-type='Kvindecirkler']");
const therapy_5 = document.querySelector("[data-therapy-type='Traumeinformeret Gruppeforløb']");
const therapy_6 = document.querySelector("[data-therapy-type='En ny Livsfortælling']");

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

function toggleComment(personId) {
  document.querySelector('#comment_' + personId).classList.toggle('hidden');
  document.querySelector('#arrow_' + personId).classList.toggle('flip');

}