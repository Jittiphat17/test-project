const pricing = {
    non_member: { early: 500, late: 550 },
    student: { early: 350, late: 550 },
    member: { early: 400, late: 550 },
    workshop_room_1: 500,
    workshop_room_2: 250,
};

function calculateTotal() {
    const status = document.getElementById("status").value;
    const dateInput = document.getElementById("registration_date").value;
    const checkedEvents = Array.from(
        document.querySelectorAll(".event-check:checked")
    ).map((el) => el.value);
    let total = 0;

    if (!status || !dateInput) {
        document.getElementById("total-price").innerText = "$0";
        return;
    }

    const selectedDate = new Date(dateInput);
    const earlyDeadline = new Date("2023-05-31");
    const period = selectedDate <= earlyDeadline ? "early" : "late";

    if (checkedEvents.includes("lecture")) {
        total += pricing[status][period];
    }

    if (
        checkedEvents.includes("workshop_room_1") &&
        checkedEvents.includes("lecture")
    ) {
        total += pricing.workshop_room_1;
    }

    if (
        checkedEvents.includes("workshop_room_2") &&
        checkedEvents.includes("lecture")
    ) {
        total += pricing.workshop_room_2;
    }

    document.getElementById("total-price").innerText = `$${total}`;
}

document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("status")
        .addEventListener("change", calculateTotal);
    document
        .getElementById("registration_date")
        .addEventListener("change", calculateTotal);
    document.querySelectorAll(".event-check").forEach((el) => {
        el.addEventListener("change", calculateTotal);
    });
});
