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
    7. How to login to truPen?<br>
    8. How to set quiz time limit?<br>
    9. How do I change my password?<br>
    10. How to change my profile info?<br>
    `;
  if (input == "hello" || input == "hi") {
    return "Hello there!<br>Try asking:<br>" + help;
  } else if (input.trim(" ") == "") {
    return "Ughh, were you trying to type?<br> Please try again.";
  } else if (input == "goodbye") {
    return "Talk to you later!";
  } else if (input == "help" || input == "help!") {
    return (
      "There , there , I am here now .<br>Here is a list of things you can ask me to do :<br>" +
      help
    );
  } else if (
    input == "how to logout of trupen?" ||
    input == "how to logout of trupen" ||
    input == "1"
  ) {
    return "Click on logout button on the Side Bar.";
  } else if (
    input == "how do i contact the website devs?" ||
    input == "how do i contact the website devs" ||
    input == "5"
  ) {
    return `You can contact the web devs at our gmail address : <br><a href="mailto:trupenofficial@gmail.com">trupenofficial@gmail.com</a>
        <br>Phone no. : 
        <font style="display:inline-block;" class="tooltip"><a style="cursor: pointer;" class="copy-click" onclick="copytoclipboard();">+91 99290 72706</a>
        <font id = "replace"><span class="tooltiptext">Copy to clipboard</span></font>
        </font>
        `;
  } else if (
    input == "how to make a quiz?" ||
    input == "how to make a quiz" ||
    input == "4"
  ) {
    return `That's ez prof , just navigate to the Dashboard and look under the quizzes section.
        <br>There would be a list of your quizzes along with an option to add a quiz .`;
  } else if (
    input == "how do i attempt a quiz?" ||
    input == "how do i attempt a quiz" ||
    input == "3"
  ) {
    return "Click on quiz and atttempt it";
  } else if (
    input == "how to update my account details?" ||
    input == "how to update my account details" ||
    input == "2"
  ) {
    return "go to your profile by clicking on profile button present on side bar";
  } else if (
    input == "how to print some documents?" ||
    input == "how to print some documents" ||
    input == "6"
  ) {
    return `Go to the Dashboard.
               <br>On the Side bar , there will be an option to Request/Print a file . 
               <br>Click on that option.
               <br>Now, you will be redirected to the Printing page where your print request will be sent to the admin .`;
  } else if (
    input == "7" ||
    input == "how to login to trupen?" ||
    input == "how to login to trupen"
  ) {
    return `Simple, just go to :
                    <font style = "display:inline-block;"class = "tooltip" > 
                    <a style = "cursor: pointer;" class = "copy-click" onclick = "copytoclipboard();">IITdh_portal.php</a> 
                    <font id = "replace" > <span class = "tooltiptext" > Copy to clipboard </span></font>
                    </font>
                    <br>There you will have options to select your mode of login according to your occupation / access level .
                    <br>
                    {Student , Professor , Print Staff}
                `;
  } else if (input == "how to set quiz time limit?" || input == "8") {
    return `As easy as it is , in truPen , you can easily set the quiz time limit when you make a quiz.
                The time limit must be specified in seconds. 
                <br>{Note: Once a quiz is created , you cannot change/update it.}`;
  } else if (input == "how do i change my password?" || input == "9") {
    return `
        Security Breach ?<br>Forgot password? <br>No worries , we got you covered .
        <br>With truPen , we have a password reset security system that sends OTP to your registered gmail account.
        <br>After verification , you can change your password :) .
        <br>You can change your password by going to your Occupation's Login page and click on "Forgot password?" option.
        `;
  } else if (input == "how to change my profile info?" || input == "10") {
    return `
        That's easy , just navigate to the profile info page after you sign-in .
        <br>From there you can change the details and click on the 'update' button to update your profile information.
        `;
  } else if (input == "what is trupen") {
    return "Its an online examination portal";
  } else if (input == "") {
    return "";
  } else if (input == "") {
    return "";
  } else if (input == "") {
    return "";
  } else if (input == "") {
    return "";
  } else if (
    input ==
    `<font style="font-size:xx-large;"><font style='color:red;' class='fa fa-fw fa-heart'></font></font>`
  ) {
    return "Love you too :)";
  } else if (
    input ==
      "thank you <font style='color:red;' class='fa fa-fw fa-heart'></font>" ||
    input ==
      "thank you<font style='color:red;' class='fa fa-fw fa-heart'></font>"
  ) {
    return "Your welcome :) <br> Have a nice day !";
  } else {
    return "Try asking something else!";
  }
}
