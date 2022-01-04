<?php 
	//Get values from options table
	$options = get_option('manage_options');
?>
<script>
	window.onload = function() {
		const decoElemID = "<?= $options['element_class']; ?>";
		const decoElemIDArray = decoElemID.split(',');

		//Define a javascript object, based on database options
		var styles = {
			pos: 'relative',
			top: '<?= $options['adjust_position'] ? $options['adjust_position'] : '0'; ?>',
			zIdx: '<?= $options['adjust_index'] ? $options['adjust_index'] : '0'; ?>',
			bgImgURL: '<?= $options['image_selection']  ? $options['image_selection'] : ''; ?>',
			bgSize: '<?= $options['image_size_selection'] ? $options['image_size_selection'] : 'cover'; ?>',
			bgRepeat: '<?= $options['image_repeat_selection'] ? $options['image_repeat_selection'] : 'no-repeat'; ?>'
		}

		//Define a javascript object, based on database options
		function checkPositon(decoElem) {
			return window.getComputedStyle(decoElem).getPropertyValue('position');
		}

		/*
			1. Iterates through array of specified parent elements, sets their position to relative
			2. Adds the style properties of decoration element 
			3. Appends the decoration element with the background image
		*/
		function setDecoration(decoElemIDArray, styles) {
			decoElemIDArray.forEach((decoElemID, index) => {
				let decoElement = document.querySelector(decoElemID);
				let img = document.createElement('div');
				
				img.id = 'decoration';
				img.style.zIndex = styles.zIdx;
				img.style.top = styles.top;
				img.style.backgroundSize = styles.bgSize;
				img.style.backgroundImage = 'url("' + styles.bgImgURL + '")';
				img.style.backgroundRepeat = styles.bgRepeat;

				if(checkPositon(decoElement) != 'absolute' && checkPositon(decoElement) != 'fixed') {
					decoElement.style.position = styles.pos;
				}
				
				decoElement.childNodes.forEach((decoChildElem, index) => {
					if(decoChildElem.nodeType == 1) {
						if(checkPositon(decoChildElem) != 'absolute' && checkPositon(decoChildElem) != 'fixed') {
							decoChildElem.style.position = styles.pos;
							decoChildElem.style.zIndex = 2;
						}
						if(decoChildElem.tagName.toLowerCase() == 'img') {
							decoChildElem.style.zIndex = 0;
						}
					}
					if(index == 1 && decoChildElem.nodeType == 1) {
						decoElement.insertBefore(img, decoChildElem);
					}
				});
			});
		}
		setDecoration(decoElemIDArray, styles);
	}
</script>
