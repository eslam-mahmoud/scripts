//Get all the buttons
var accept_buttons = document.getElementsByClassName("bt-invite-accept");
//Loop on buttons
for (var i=0; i<accept_buttons.length; i++) {
    //Accept each invitation
    accept_buttons[i].click();
}
