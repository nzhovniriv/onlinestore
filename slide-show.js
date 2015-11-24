$(function(){
	var viewUL = $('div#img').children('ul');
	var imgs = viewUL.find('img');//колекція картинок
	var imgW = imgs[0].width;//imgs.first().width() - ширина картинки(або можна задати числом)
	var imgLen = imgs.length;//к-ть картинок
	var current = 1;//номер картинки
	setInterval(function(){
		var position = imgW;//ширина в px наскільки прокручувати
		current++;//наступна картинка
		if(current-1 === imgLen){
			current = 1;//прокручуємо на початок, щоб було по колу
			position = 0;//коли перша картинка, то обнуляємо position
		}
		doIt(viewUL, position);
	}, 5000);
	function doIt(container, position){
		var sign;
		if(position !== 0){
			sign = '-=';//знак для того, щоб прокручувати ліворуч 
		}
		container.animate({'margin-left': sign ? sign+position : position}, 2000);
	}
});