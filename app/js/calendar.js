const date = new Date();

    const renderCalendar = () => {
    date.setDate(1);

    const monthDays = document.querySelector(".days");

    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = date.getDay();

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    document.querySelector(".date h1").innerHTML = months[date.getMonth()];

    document.querySelector(".date p").innerHTML = new Date().toDateString();

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        const j = new Date(date.getFullYear(), date.getMonth(), i);
        if (
        i === new Date().getDate() &&
        date.getMonth() === new Date().getMonth()
        ) {
        days += `<div class="today" onclick="setDate('${j.toDateString()}'); showReservations('${j}')">${i}</div>`;
        } else {
        days += `<div id="${date.getMonth() + 1 + "-" + i}" onclick="setDate('${j.toDateString()}'); openModalReservations(${(date.getMonth() + 1)})">${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`;
        monthDays.innerHTML = days;
    }
    };

    document.querySelector(".prev").addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
    });

    document.querySelector(".next").addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
    });

    function setDate(j) {
        var arr1 = j.split(' ');
        monthindex = arr1[1].toLowerCase();
        var months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
        monthindex = months.indexOf(monthindex);
        console.log('day: ', arr1[0]);
        console.log('month: ', monthindex + 1);
        console.log('date: ', arr1[2]);
        console.log('year: ', arr1[3]);
        this.wholedate = j;
        this.chosendate = arr1[2];
        this.chosenmonth = "0" + (monthindex + 1);
        this.chosenyear = arr1[3];
    }
    
    function getDateChosen() {
        return this.chosendate
    }
    function getMonthChosen() {
        return this.chosenmonth
    }
    function getYearChosen() {
        return this.chosenyear
    }

    function getWholeDate() {
        return this.wholedate
    }

    function getFullDate() {
        var today = new Date();
        today =  getYearChosen() + '-' + getMonthChosen() + '-' + getDateChosen();
        return today
    }

    function openModalReservations(i) {
        datemodal = document.getElementById('headerModal');
        datemodal.innerHTML = "<h3s>Reservations for " + getWholeDate() + "</h3>";
        $('#reservationModal').modal('show');
    }

    renderCalendar();