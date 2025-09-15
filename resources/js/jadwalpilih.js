import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';

let calendarEl = document.getElementById('calendar');
let calendar = new Calendar(calendarEl, {
  plugins: [ dayGridPlugin, timeGridPlugin],
  initialView: 'dayGridMonth',
  headerToolbar: {
    left: 'prev, next, today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay'
  },
  themeSystem: 'bootstrap',
  nowIndicator: true,
});
calendar.render();
