/**
 * 
 */
function Check() {
	//获取id=check的元素
	collid = document.getElementById('check');
	coll = document.getElementsByTagName('input');
	
	confirm(coll.length);
	
	if (collid.checked) {
		for (var i = 0; i < coll.length; i++) {
			if (coll[i].type == 'checkbox') {
				coll[i].checked = true;
				coll[i].parentNode.parentNode.style.backgroundColor = '#fcdd8c';
			}
		}
	} else {
		for (var i = 0; i < coll.length; i++) {
			if (coll[i].type == 'checkbox') {
				coll[i].checked = false;
				coll[i].parentNode.parentNode.style.backgroundColor = '';
			}
		}
	}
}