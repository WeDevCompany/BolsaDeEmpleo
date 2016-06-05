$(document).ready(function(){

	var bgArray = ['random-background-1','random-background-2','random-background-3', 'random-background-4', 'random-background-5', 'random-background-6', 'random-background-7', 'random-background-8', 'random-background-9', 'random-background-10', 'random-background-11'],
    selectBG = bgArray[Math.floor(Math.random() * bgArray.length)];
    if(window.location.pathname !== "/") {
		$('body').addClass(selectBG);
    }

});