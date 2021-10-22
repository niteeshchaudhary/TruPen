function getBotResponse(input) {
    //Add the responses here :)
    input1 = input;
    input = input.trim(" ");
    input = input.toLowerCase();
    help = `
    1. How to logout of trupen?<br>
    2. How to update my account details?<br>
    3. How do I attempt a quiz?<br>
    4. How to make a quiz? <br>
    5. How do I contact the website devs?<br>
    6. How to print some documents?<br>
    `
    if (input == "hello") {
        return "Hello there!";
    } else if (input.trim(" ") == "") {
        return "Ughh, were you trying to type?<br> Please try again.";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else if (input == "you suck") {
        return "Ask your mom that!";
    } else if (input == "help" || input == "help!") {
        return "There , there , I am here now .<br>Here is a list of things you can ask me to do :<br>" + help;
    } else if (input == "how to logout of trupen?") {
        return "Click on your profile pic on the Dashboard page and a dropdown menu will appear where you can navigate to the log-off option .";
    } else if (input == "how do i contact the website devs?") {
        return "";
    } else if (input == "how to make a quiz?") {
        return "";
    } else if (input == "how do i attempt a quiz?") {
        return "";
    } else if (input == "how to update my account details?") {
        return "";
    } else if (input == "how to print some documents?") {
        return "";
    } else if (input1 == "<font style='font-size:xx-large;color:red;' class='fa fa-fw fa-heart'></font>") {
        return "Love you too :)";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else if (input == "") {
        return "";
    } else {
        return "Try asking something else!";
    }
}