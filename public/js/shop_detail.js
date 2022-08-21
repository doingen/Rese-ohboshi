let inputDate = document.getElementById('reservationDate');
let outputDate = document.getElementById('outputDate');

outputDate.innerHTML = inputDate.value;

inputDate.addEventListener('change', function () {
  outputDate.innerHTML = inputDate.value;
})


function getSelectboxText(elementId) {
  const input = document.getElementById(elementId);
  const text = input.options[input.selectedIndex].text;
  return text;
}

let h = getSelectboxText('reservation_hour');
let m = getSelectboxText('reservation_minute');
let inputTime = h + '時' + m + '分';
let outputTime = document.getElementById('outputTime');

outputTime.innerHTML = inputTime;

let inputHour = document.getElementById('reservation_hour');
inputHour.addEventListener('change', function () {
  let h = getSelectboxText('reservation_hour');
  let m = getSelectboxText('reservation_minute');
  changedTime = h + '時' + m + '分';
  outputTime.innerHTML = changedTime;
})

let inputMinute = document.getElementById('reservation_minute');
inputMinute.addEventListener('change', function () {
  let h = getSelectboxText('reservation_hour');
  let m = getSelectboxText('reservation_minute');
  changedTime = h + '時' + m + '分';
  outputTime.innerHTML = changedTime;
})


let num = getSelectboxText('numberOfPeople');
let outputNumber = document.getElementById('outputNumber');
if (num != '') {
  outputNumber.innerHTML = num;
}

let inputNumber = document.getElementById('numberOfPeople');
inputNumber.addEventListener('change', function () {
  let num = getSelectboxText('numberOfPeople');
  outputNumber.innerHTML = num;
})


