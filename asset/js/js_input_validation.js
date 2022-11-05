function checkpostal(){
var re5digit=/^\d{5}$/ //regular expression defining a 5 digit number
if (document.myform.myinput.value.search(re5digit)==-1) //if match failed
alert("Please enter a valid 5 digit number inside form")
}
