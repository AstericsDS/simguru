import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import idLocale from "@fullcalendar/core/locales/id";

function initCalendar() {
    let calendarEl2 = document.getElementById("selectable");

    let calendar2 = new Calendar(calendarEl2, {
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
        locale: idLocale,
        contentHeight: "auto",
        initialView: "dayGridMonth",
        selectable: true,
        navLinks: true,
        dateClick: function (info) {
            calendar2.changeView("timeGridDay", info);
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
    });

    calendar2.render();

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

let calendarEl = document.getElementById("jadwalhome");
const tooltip = document.getElementById("tooltip");
let calendar = new Calendar(calendarEl, {
    locale: idLocale,
    contentHeight: "auto",
    plugins: [dayGridPlugin, timeGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev, next, today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    themeSystem: "bootstrap",
    nowIndicator: true,
    slotMinTime: "07:30:00",
    slotMaxTime: "18:00:00",
    slotDuration: "00:25:00",
    slotLabelInterval: "00:50:00",
    slotLabelFormat: {
        hour: "numeric",
        minute: "2-digit",
        hour12: true,
    },
    allDaySlot: false,

    eventMouseEnter: function (info) {
        tooltip.style.left = info.jsEvent.pageX + 10 + "px";
        tooltip.style.top = info.jsEvent.pageY + 10 + "px";
        tooltip.classList.remove("tooltip-hidden");

        tooltip.innerHTML = `
                <b>${info.event.title}</b><br>
                ${info.event.extendedProps.description}
            `;
    },

    eventMouseLeave: function () {
        tooltip.classList.add("tooltip-hidden");
    },
});

// function(mouse)

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

calendar.render();
