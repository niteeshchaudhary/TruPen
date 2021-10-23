// Collapsible
var coll = document.getElementsByClassName("collapsible");

for (let i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");

        var content = this.nextElementSibling;

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }

    });
}

function getTime() {
    let today = new Date();
    hours = today.getHours();
    minutes = today.getMinutes();

    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    let time = hours + ":" + minutes;
    return time;
}

var time = getTime();
$("#chat-timestamp").append(time);
// Gets the first message
function firstBotMessage() {
    let firstMessage = "Hello , what can I help you with? <br>Type 'help' to see all options available.";
    document.getElementById("botStarterMessage").innerHTML = '<h5 id="chat-timestamp"></h5><p class="botText"><span>' + firstMessage + '</span></p>';

    let t = getTime();
    if (time != t) {
        document.getElementById("chatbox").innerHTML = `${t}`;
    }

    document.getElementById("userInput").scrollIntoView(false);
}

firstBotMessage();

// Retrieves the response
function getHardResponse(userText) {
    let botResponse = getBotResponse(userText);
    let botHtml = '<p class="botText"><span>' + botResponse + '</span></p>';
    $("#chatbox").append(botHtml);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}

//Gets the text from the input box and processes it
function getResponse() {
    let userText = $("#textInput").val();
    let userHtml;

    let t = getTime();
    if (time != t) {
        time = t;
        userHtml = `<h5>${time}</h5><p class="userText"><span>${userText}</span></p>`;
    } else {
        userHtml = `<p class="userText"><span>${userText}</span></p>`;
    }
    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    setTimeout(() => {
        getHardResponse(userText);
    }, 1000)

}

// Handles sending text via button clicks
function buttonSendText(sampleText) {
    let userHtml;
    let userText = $("#textInput").val();
    if (userText == "") {
        sampleText = '<font style="font-size:xx-large;">' + sampleText + '</font>';
    }
    sampleText = userText + sampleText;
    let t = getTime();
    if (time != t) {
        time = t;
        userHtml = `<h5>${time}</h5><p class="userText"><span>${sampleText}</span></p>`;
    } else {
        userHtml = `<p class="userText"><span>${sampleText}</span></p>`;
    }

    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    //Uncomment this if you want the bot to respond to this buttonSendText event
    setTimeout(() => {
        getHardResponse(sampleText);
    }, 1000)
}

function sendButton() {
    getResponse();
}

function heartButton() {
    buttonSendText("<font style='color:red;' class='fa fa-fw fa-heart'></font>")
}

function copytoclipboard() {
    navigator.clipboard.writeText("+91 99290 72706");
    var x = document.getElementById("replace");
    x.innerHTML = "<span class='tooltiptext' id='replace'>Copied !</span>";
}

// Press enter to send a message
$("#textInput").keypress(function(e) {
    if (e.which == 13) {
        getResponse();
    }
});