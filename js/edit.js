/**
 * 
 */
jQuery(document).ready(function($) {
	$('#editor').markdownEditor({
		imageUpload:true,
		uploadPath:'uploadImage.php',
		preview : true,
		onPreview : function(content, callback) {
			callback(marked(content));
		}
	});
});
