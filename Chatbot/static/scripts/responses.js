function getBotResponse(input) {
    //Add the responses here :)
    input = input.toLowerCase();


    if (input == "hello") {
        return "Hello there!";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    }
    else if (input.toLowerCase() == "fuck") {
        return "Fuck Yourself!";
    } 
    else {
        return "Try asking something else!";
    }
}