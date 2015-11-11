"use strict"
var x = factorial(5);
alert(x);

window.onload = function () {
    var stack = [];
    var displayVal = "0";
    for (var i in $$('button')) {
        $$('button')[i].onclick = function () {
            var value = this.innerHTML;

        };
    }
    // displayVal = factorial(5);
    // document.getElementById('result').innerHTML = displayVal; 
};

function factorial (x) {
    if (x === 0)
      { return 1; }
    else
      { return x * factorial( x - 1 ); }
}

function highPriorityCalculator(s, val) {

}

function calculator(s) {
    var result = 0;
    var operator = "+";
    for (var i=0; i< s.length; i++) {
        // var x = s.pop();
        // if(x.match("/[0-9]/")) {

        // }
        // else if (x.match([\\*\\/])) {

        // }
        // else if (x.match([\\+\\-])) {
            
        // }
        // else {

        // }
    }
    return result;
}
