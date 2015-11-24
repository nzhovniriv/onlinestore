function onPhotoClick(){
	var lightbox = document.getElementById('lightbox');
	var photo_for_lightbox = document.getElementById('photo_for_lightbox');
	/*робимо їх блочними так як вони у нас none*/
	lightbox.style.display = 'block';
	photo_for_lightbox.style.display = 'block';
}
function hidePhoto(){
	var lightbox = document.getElementById('lightbox');
	var photo_for_lightbox = document.getElementById('photo_for_lightbox');
	/*задаємо пусті значення, при цьому використовуватимуться значення із файлу lightbox.css(none)*/
	lightbox.style.display = '';
	photo_for_lightbox.style.display = '';
}