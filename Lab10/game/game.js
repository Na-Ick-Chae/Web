"use strict"
var interval = 500;
var numberOfBlocks = 9;
var numberOfTarget = 3;
var targetBlocks = [];
var selectedBlocks = [];
var timer;

document.observe('dom:loaded', function(){
	$("start").observe("click", stopToStart);
	$("stop").observe("click", stopGame);
});

function stopToStart(){
	stopGame();
	startToSetTarget();
}

function stopGame(){
	document.getElementById('state').innerHTML = "Stop";
	document.getElementById('answer').innerHTML = "0/0";
	targetBlocks = [];
	selectedBlocks = [];
	clearTimeout(timer);
}

function startToSetTarget(){
	targetBlocks = [];
	selectedBlocks = [];
	clearTimeout(timer);
	document.getElementById('state').innerHTML = "Ready!";
	var arr = [0,1,2,3,4,5,6,7,8];
	shuffle(arr);
	for (var i = 0; i < 3; i++) {
		targetBlocks[i] = arr[i];
	}
	timer = setTimeout(setTargetToShow, interval);
}

function setTargetToShow(){
	document.getElementById('state').innerHTML = "Memorize!";
	for (var i = 0 ; i < 3 ; i++) {
		$$(".block")[targetBlocks[i]].addClassName("target");		
	};
	timer = setTimeout(showToSelect, interval);
}

function showToSelect(){
	document.getElementById('state').innerHTML = "Select!";
	for (var i = 0 ; i < 3 ; i++) {
		$$(".block")[targetBlocks[i]].removeClassName("target");		
	};
	for (var i = 0; i < 9; i++) {
		$$(".block")[i].observe("click", select);
	}
	timer = setTimeout(selectToResult, interval);
}

function selectToResult(){
	for (var i = 0 ; i < selectedBlocks.length ; i++) {
		selectedBlocks[i].removeClassName("selected");		
	}
	document.getElementById('state').innerHTML = "Checking";
	timer = setTimeout(startToSetTarget, interval);
}

function select() {
	if (selectedBlocks.length === 3) {
		for (var i = 0; i < 9; i++) {
			$$(".block")[i].stopObserving();
		}
		return;
	}
	var tmp = this.readAttribute("data-index");
	for(var i = 0; i < selectedBlocks.length; i++){
		if(selectedBlocks[i] == tmp){
			return;	
		}
	}
	$$(".block")[tmp].addClassName("selected");
	selectedBlocks.push($$(".block")[this.readAttribute("data-index")]);
}

function shuffle(array) {
	var currentIndex = array.length, temporaryValue, randomIndex ;

	while (0 !== currentIndex) {

		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;

		temporaryValue = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temporaryValue;
	}

	return array;
}