var i = 0; 
var image = [];
var time = 3000;
	 
image[0] = "images/pexels-thirdman-7257937.jpg";
image[1] = "images/pexels-vanessa-garcia-6325959.jpg";
image[2] = "images/pexels-vanessa-garcia-6325961.jpg";
image[3] = "images/pexels-vanessa-garcia-6325970.jpg";


function imagechanger(){
	document.slideshow.src = image[i];
	if(i < image.length - 1){
	  i++; 
	} else { 
		i = 0;
	}
	setTimeout("imagechanger()", time);
}
window.onload=imagechanger;