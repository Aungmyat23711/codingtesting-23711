const { default: Axios } = require("axios");

require("./bootstrap");
const messages_el = document.getElementById("message");
const username_input = document.getElementById("username");
const message_input = document.getElementById("message_input");
const message_form = document.getElementById("message_form");
message_form.addEventListener("submit", function (e) {
    e.preventDefault();
    let has_error = false;
    if (username_input.value == "") {
        alert("Please enter a username");
        has_error = true;
    }
    if (message_input.value == "") {
        alert("Please enter a message");
        has_error = true;
    }
    if (has_error) {
        return;
    }
    const option = {
        method: "post",
        url: "/send-message",
        data: {
            username: username_input.value,
            message: message_input.value,
        },
    };
    Axios(option);
});
window.Echo.channel("chat").listen(".message", (e) => {
    messages_el.innerHTML +=
        '<div class="flex flex-row md:w-2/3 w-full drop-shadow-lg rounded-xl bg-white p-2"><h6 class="text-purple-500 whitespace-nowrap" >' +
        e.username +
        ":" +
        "</h6>" +
        '<h6 class="text-gray-500">' +
        e.message +
        " </h6></div><br/>";
});
