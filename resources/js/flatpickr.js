import flatpickr from "flatpickr";
import { Japanese } from "flatpickr/dist/l10n/ja.js"

flatpickr("#event_date",{
    "locale": Japanese,
    minDate: "today",
    // maxDate: new Date().fp_incr(60)
});
flatpickr("#calendar",{
    "locale": Japanese,
    // minDate: "today",
    // maxDate: new Date().fp_incr(60)
});
flatpickr("#start_time",{
    "locale": Japanese,
    enableTime: true,
    noCalendar: true, 
    dateFormat: "H:i",
    time_24hr: true,
    minuteIncrement: 30,
});
flatpickr("#end_time",{
    "locale": Japanese,
    enableTime: true,
    noCalendar: true, 
    dateFormat: "H:i",
    time_24hr: true,
    minuteIncrement: 30,
});