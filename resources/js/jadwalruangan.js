import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import idLocale from "@fullcalendar/core/locales/id";
import rrulePlugin from '@fullcalendar/rrule'


function initCalendar() {
    let classEl = document.getElementById("class_calendar");
    let notClassEl = document.getElementById("not_class_calendar");

    if (classEl) {
        let classCalendar = new Calendar(classEl, {
            plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, rrulePlugin],
            locale: idLocale,
            contentHeight: "auto",
            initialView: "timeGridWeek",
            selectable: true,
            navLinks: true,
            allDaySlot: false,
            // hiddenDays: [0],
            // dayHeaderFormat: { weekday: 'long' },
            // firstDay: 1,

            events: [
                {
                  title: 'Math Class - Room 101',
                  rrule: {
                    freq: 'weekly',
                    byweekday: ['mo', 'we'], // Monday + Wednesday
                    dtstart: '2025-10-01T09:00:00', // class start date + time
                    until: '2025-12-15',            // class end date
                  },
                  duration: '01:30' // 1.5 hours
                }
              ]
            
        });

        classCalendar.render();
    }

    if (notClassEl) {
        let notClassCalendar = new Calendar(notClassEl, {
            plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
            locale: idLocale,
            contentHeight: "auto",
            initialView: "dayGridMonth",
            selectable: true,
            navLinks: true,
            dateClick: function (info) {
                notClassCalendar.changeView("timeGridDay", info);
            },
            select: function (info) {
                if (info.view.type === "timeGridDay") {
                    let startRaw = new Date(info.startStr);
                    let endRaw = new Date(info.endStr);

                    window.dispatchEvent(
                        new CustomEvent("event-modal", {
                            detail: {
                                startRaw: info.startStr,
                                endRaw: info.endStr,
                                startDate: startRaw.toLocaleDateString(
                                    "id-ID",
                                    {
                                        weekday: "long",
                                        day: "numeric",
                                        month: "long",
                                        year: "numeric",
                                    }
                                ),
                                startTime: startRaw.toLocaleTimeString(
                                    "id-ID",
                                    {
                                        hour: "2-digit",
                                        minute: "2-digit",
                                        hour12: true,
                                    }
                                ),
                                endTime: endRaw.toLocaleTimeString("id-ID", {
                                    hour: "2-digit",
                                    minute: "2-digit",
                                    hour12: true,
                                }),
                            },
                        })
                    );
                }
            },
            headerToolbar: {
                start: "title",
                center: "dayGridMonth timeGridDay",
                right: "prev next",
            },
            slotMinTime: "07:30:00",
            slotMaxTime: "19:30:00",
            slotDuration: "00:15:00",
            slotLabelFormat: {
                hour: "numeric",
                minute: "2-digit",
                hour12: true,
            },
            allDaySlot: false,
        });

        notClassCalendar.render();
    }

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

    window
        .matchMedia("(orientation: portrait)")
        .addEventListener("change", (e) => {
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
