document.addEventListener("DOMContentLoaded", function () {	//document is loaded

	
	
});
function light() {
	var img = document.querySelectorAll("img.vignette_img_min");
	console.info(img);
	img.forEach(function(element){
		console.log("query passed");
		element.addEventListener('click', function(){//add the click listener
			for (var i = 0; i < img.length; i++) {
				lightBox(img[i].src, '');//associate the function executed when the user click on it 
			}
		console.log("presque");
	});
	})
	
}
document.onkeyup = function(event){//when we release a key on keyboard
	if (event.which == 27) {close();}//if it's escape key execute close()
};

window.onresize = resizeIt;//when screen is resiziing call resizeIt()

function resizeIt() {//recalculate ce center of screen and place the pic on it
	var light = document.getElementById('lightbox');//catch the div who contain the pic and text
	var w = document.documentElement;//shortcut for after
	var img = document.getElementById('bigimg');//the picture
	if (light != null) {
		light.style.top = w.clientHeight/2-img.clientHeight/2+'px';//place ce pic on the center in height
		light.style.left = w.clientWidth/2-img.clientWidth/2+'px';//place ce pic on the center in height

	}
}

function lightBox(url, text) {//make the lightbox view
	var body = document.getElementById('main');//catch the body
	body.className = 'lightOff';//change is class (without overflow)
	var light = insert(insert(body, 'div', 'bg', 'big'), 'div', 'lightbox', 'lightbox');//create the lightbox div
	insert(light, 'img', 'bigimg', 'bigimg').src = url;//insert the big pic on it
	
	insert(light, 'label', 'textImg', null, text);//and the text
	light.addEventListener('click', close);//add a div as a button link to close()
	resizeIt();//place the pic on the center of the screen
}

function close() {//close the lightbox view
	var body = document.getElementById('main');//catch the body
	body.removeChild(document.getElementById('bg'));//delete the div who contain all the lightbox
	body.className = 'lightOn';//change is class again (whith overflow)
}

function insert(parent, balise, id, text_class = null, text = null) {//fonction for create element on an parent and return the new element
	var newObj = document.createElement(balise);
	newObj.id = id;
	newObj.textContent = text;
	newObj.className = text_class;
	parent.appendChild(newObj);
	return newObj;
}