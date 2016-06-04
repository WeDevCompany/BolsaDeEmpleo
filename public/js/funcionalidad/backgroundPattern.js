jQuery(document).ready(function($){

	var bgArray = ['random-background-1','random-background-2','random-background-3', 'random-background-4', 'random-background-5', 'random-background-6', 'random-background-7'],
    selectBG = bgArray[Math.floor(Math.random() * bgArray.length)];

	$('body').addClass(selectBG);

});