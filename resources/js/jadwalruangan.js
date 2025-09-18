import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from '@fullcalendar/interaction';
import idLocale from '@fullcalendar/core/locales/id';

function initCalendar(){
    let calendarEl2 = document.getElementById("selectable");

    let calendar2 = new Calendar(calendarEl2, {
        plugins: [ interactionPlugin, dayGridPlugin, timeGridPlugin ],
        locale: idLocale,
        contentHeight: 'auto',
        initialView: "dayGridMonth",
        selectable: true,
        navLinks: true,
        dateClick: function(info) {
            calendar2.changeView('timeGridDay', info);
        },
        select: function(info) {
            if (info.view.type === 'timeGridDay') {
                let startRaw = new Date(info.startStr);
                let endRaw   = new Date(info.endStr);

                window.dispatchEvent(new CustomEvent("event-modal", {
                    detail: {
                        startRaw: info.startStr,
                        endRaw: info.endStr,
                        startDate: startRaw.toLocaleDateString('id-ID', {
                            weekday: 'long',
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        }),
                        startTime: startRaw.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true,
                        }),
                        endTime: endRaw.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        }),
                    }
                }));
            }
        },
        headerToolbar: {
            start: 'title',
            center: 'dayGridMonth timeGridDay',
            right: 'prev next'
        },
        slotMinTime: "07:30:00",
        slotMaxTime: "19:30:00",
        slotDuration: "00:15:00",
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: true,
        },
        allDaySlot: false,
      });

      calendar2.render();

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
}


document.addEventListener("livewire:navigated", () => {
    initCalendar();
});
