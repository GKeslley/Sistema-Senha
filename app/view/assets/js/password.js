import { requestDays, days, shift } from './course.js';
const btn = document.getElementById('btn');
const course = window.location.href.split('/');
const nameCourse = course[course.length - 1];

export default function requestClass() {
  const handleClick = async () => {
    console.log(days, shift);
    if (days && shift) {
      const response = await fetch(`http://localhost/Sistema-Senha/curso/${nameCourse}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ age: '10', shift: shift, days: days }),
      });
      console.log(response);
      const json = await response.json();
      console.log(json);
    } else {
      alert('n foi selecionado');
    }
  };

  btn.addEventListener('click', handleClick);
}
requestDays();