function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}
export default function formatDateTime(date) {
  if (date === null) return '0000-00-00 00:00';
  const datePart = [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-')
  const timePart = [
    padTo2Digits(date.getHours()),
    padTo2Digits(date.getMinutes()),
  ].join(':');
  return datePart + ' ' + timePart;
}