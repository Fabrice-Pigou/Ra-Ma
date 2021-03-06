window.addEventListener('scroll', function (e) {
	var nDefillement = window.pageYOffset;
	const oFond = document.querySelector('.cParallaxe1');
	oFond.style.backgroundPosition = "0 "+ -(nDefillement * 0.2) + 'px';
  });