import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import idLocale from "@fullcalendar/core/locales/id";
import rrulePlugin from "@fullcalendar/rrule";

// const penjadwalanEl = document.querySelector("full-calendar");

// penjadwalanEl.options = {
//     plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
//     locale: idLocale,
//     contentHeight: "auto",
//     initialView: "dayGridMonth",
//     selectable: true,
//     navLinks: true,
//     dateClick: function (info) {
//         calendar2.changeView("timeGridDay", info);
//     },
//     select: function (info) {
//         if (info.view.type === "timeGridDay") {
//             let startRaw = new Date(info.startStr);
//             let endRaw = new Date(info.endStr);

//             window.dispatchEvent(
//                 new CustomEvent("event-modal", {
//                     detail: {
//                         startRaw: info.startStr,
//                         endRaw: info.endStr,
//                         startDate: startRaw.toLocaleDateString("id-ID", {
//                             weekday: "long",
//                             day: "numeric",
//                             month: "long",
//                             year: "numeric",
//                         }),
//                         startTime: startRaw.toLocaleTimeString("id-ID", {
//                             hour: "2-digit",
//                             minute: "2-digit",
//                             hour12: true,
//                         }),
//                         endTime: endRaw.toLocaleTimeString("id-ID", {
//                             hour: "2-digit",
//                             minute: "2-digit",
//                             hour12: true,
//                         }),
//                     },
//                 })
//             );
//         }
//     },
//     headerToolbar: {
//         start: "title",
//         center: "dayGridMonth timeGridDay",
//         right: "prev next",
//     },
//     slotMinTime: "07:30:00",
//     slotMaxTime: "19:30:00",
//     slotDuration: "00:15:00",
//     slotLabelFormat: {
//         hour: "numeric",
//         minute: "2-digit",
//         hour12: true,
//     },
//     allDaySlot: false,
// };
const formattedEvents = [];

document.addEventListener("event-load", (event) => {
    const events = event.detail.Events;

    formattedEvents = events.map((item) => {
        return {
            title: item.event_name,
            start: item.start,
            end: item.end,
        };
    });
    console.log(event);
})

window.calendar2;
document.addEventListener("toggle-calendar", (event) => {
    let calendarEl2 = document.getElementById("selectable");

    window.calendar2 = new Calendar(calendarEl2, {
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
        locale: idLocale,
        contentHeight: "auto",
        initialView: "dayGridMonth",
        selectable: true,
        navLinks: true,
        dateClick: function (info) {
            window.calendar2.changeView("timeGridDay", info);
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
                            startDate: startRaw.toLocaleDateString("id-ID", {
                                weekday: "long",
                                day: "numeric",
                                month: "long",
                                year: "numeric",
                            }),
                            startTime: startRaw.toLocaleTimeString("id-ID", {
                                hour: "2-digit",
                                minute: "2-digit",
                                hour12: true,
                            }),
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
        events: formattedEvents,
    });
});

// calendar2.render();

// document.addEventListener("toggle-calendar", () => {
//     calendar2.render();
// });
