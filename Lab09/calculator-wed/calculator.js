"use strict"
// var x = factorial(5);
// alert(x);
var stack = [];

window.onload = function () {
    // var stack = [];
    var displayVal = "0";
    for (var i in $$('button')) {
        $$('button')[i].onclick = function () {
            var value = this.innerHTML;
            if (/\=$/.test(document.getElementById('expression').innerHTML)) {
                displayVal = "0";
                document.getElementById('expression').innerHTML = "0";
            }
            if (/^[0-9]$/.test(value)) {
                if (displayVal === "0") {
                    displayVal = value;
                }
                else {
                    displayVal += value;
                }
            }
            else if (value === "AC") {
                displayVal = "0";
                stack = [];
                document.getElementById('expression').innerHTML = "0"; 
            }
            else if (value === ".") {
                if (/^[0-9]+$/.test(displayVal)) {
                    displayVal += ".";
                }
            } 
            else {
                if(stack.last() === "!"){
                    stack.pop();
                    displayVal = value;
                } else {
                    displayVal += value;                    
                }
                if (document.getElementById('expression').innerHTML === "0") {
                    document.getElementById('expression').innerHTML = displayVal;
                }
                else {
                    document.getElementById('expression').innerHTML += displayVal; 
                }
                if (value === "!") {
                    displayVal = factorial(parseFloat(displayVal));
                }
                if (/^[\*\/\^]$/.test(stack.last())) {
                    highPriorityCalculator(stack, displayVal);
                }
                else {
                    if(!isNaN(parseFloat(displayVal))) {
                        stack.push(parseFloat(displayVal));
                    }
                }
                
                if(value === "=") {
                    displayVal = calculator(stack);
                    stack = [];
                } 
                else {
                    stack.push(value);
                    displayVal = "0";
                }
                
            }

            document.getElementById('result').innerHTML = displayVal; 
        };
    }
    // displayVal = factorial(5);
};

function factorial (x) {
    if (x === 0)
      { return 1; }
  else
      { return x * factorial( x - 1 ); }
}

function highPriorityCalculator(s, val) {
    var tmp = s.pop();
    if (tmp === "*") {
        s.push(s.pop() * parseFloat(val));
    }
    else if (tmp === "/") {
        s.push(s.pop() / parseFloat(val));
    }
    else if (tmp === "^") {
        s.push(Math.pow(s.pop(), parseFloat(val)));
    }
}

function calculator(s) {
    var result = 0;
    var operator = "+";
    for (var i=0; i< s.length; i++) {
        var tmp = s[i];
        if(!isNaN(tmp)){
            if(operator === "+") result += tmp;
            else if(operator === "-") result -= tmp;
        } 
        else {
            operator = tmp;
        }
    }
    return result;
}
