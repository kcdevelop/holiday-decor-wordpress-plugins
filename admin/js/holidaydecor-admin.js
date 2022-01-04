window.onload = function() {
	//Dispalys a preview of the selected decoration image in the admin section
	const decoSelectImg = document.querySelector('.deco-select-field');
	const decoPreview = document.querySelector('.holidecor-preview');

	decoSelectImg.addEventListener('change', (event) => {
		setDecoPreview(event.target.value);
	});

	function setDecoPreview(selectedImg) {
		decoPreview.src = selectedImg;
		console.log(decoPreview);
	}
	setDecoPreview(decoSelectImg.value);
}