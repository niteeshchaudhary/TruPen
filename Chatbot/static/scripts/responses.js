function getBotResponse(input) {
    //Add the responses here :)
    input = input.trim(" ");
    input = input.toLowerCase();
    //alert(input);
    help = `
    1. How to logout of trupen?<br>
    2. How to update my account details?<br>
    3. How do I attempt a quiz?<br>
    4. How to make a quiz? <br>
    5. How do I contact the website devs?<br>
    6. How to print some documents?<br>
    `
    if (input == "hello" || input == "hi") {
        return "Hello there!";
    } else if (input.trim(" ") == "") {
        return "Ughh, were you trying to type?<br> Please try again.";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else if (input == "you suck") {
        return "Ask your mom that!";
    } else if (input == "help" || input == "help!") {
        return "There , there , I am here now .<br>Here is a list of things you can ask me to do :<br>" + help;
    } else if (input == "how to logout of trupen?" || input == "1") {
        return "Click on your profile pic on the Dashboard page and a dropdown menu will appear where you can navigate to the log-off option .";
    } else if (input == "how do i contact the website devs?" || input == "5") {
        return `You can contact the web devs at our gmail address : <br><a href="mailto:trupenofficial@gmail.com">trupenofficial@gmail.com</a>
        <br>Phone no. : 
        <font style="display:inline-block;" class="tooltip"><a style="cursor: pointer;" class="copy-click" onclick="copytoclipboard();">+91 99290 72706</a>
        <font id = "replace"><span class="tooltiptext">Copy to clipboard</span></font>
        </font>
        `;
    } else if (input == "how to make a quiz?" || input == "4") {
        return `That's ez prof , just navigate to the Dashboard and look under the quizzes section.
        <br>There would be a list of your quizzes along with an option to add a quiz .`;
    } else if (input == "how do i attempt a quiz?" || input == "3") {
        return "";
    } else if (input == "how to update my account details?" || input == "2") {
        return "";
    } else if (input == "how to print some documents?" || input == "6") {
        return `Go to the Dashboard.
               <br>On the Appbar , there will be an option to Request/Print a file . 
               <br>Click on that option.
               <br>Now, you will be redirected to the Printing page where your print request will be sent to the admin .`;
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
    } else if (input == `<font style="font-size:xx-large;"><font style='color:red;' class='fa fa-fw fa-heart'></font></font>`) {
        return "Love you too :)";
    } else if (input == "thank you <font style='color:red;' class='fa fa-fw fa-heart'></font>" || input == "thank you<font style='color:red;' class='fa fa-fw fa-heart'></font>") {
        return "Your welcome :) <br> Have a nice day !";
    } else {
        return "Try asking something else!";
    }
}