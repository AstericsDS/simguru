import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";

let calendarEl = document.getElementById("jadwalhome");
let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, timeGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev, next, today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    themeSystem: "bootstrap",
    nowIndicator: true,
});

calendar.render();


window.matchMedia("(orientation: portrait)").addEventListener("change", (e) => {
    const potrait = e.matches;
    const jadwal = document.getElementById("jadwaleu");
    const alerta = document.getElementById("alert");

    if (potrait) {
        jadwal.classList.add("hidden");
        alerta.classList.remove("hidden");
    } else {
        jadwal.classList.remove("hidden");
        alerta.classList.add("hidden");
    }
});
// if (window.innerHeight > window.innerWidth) {
//     alert("Gunakan Landscape Untuk Melihat Jadwal Ruangan");
//     jadwal.classList.add('hidden');
//     alerta.classList.remove('hidden');
// } else {
//     jadwal.classList.remove('hidden');
//     alerta.classList.remove('hidden');
// }
// var calendar = Calendar(calendarEl, {
//     events: [
//         {
//             title: "Event 1",
//             start: "2025-08-17",
//             end: "2025-08-18",
//         },
//         {
//             title: "Event 2",
//             start: "2025-08-18",
//             end: "2025-08-19",
//         },
//     ],
// });

window.addEventListener("events-loaded", (event) => {
    const events = event.detail.Events;

    const formattedEvents = events.map((item) => {
        return {
            title: item.event_name,
            start: item.start,
            end: item.end,
        };
    });
    calendar.removeAllEvents();
    calendar.addEventSource(formattedEvents);
});

