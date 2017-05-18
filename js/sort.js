/**
 * 
 */
var order;
function generateCompareTRs(iCol, sDataType, iOrder) {
	return function compareTRs(oTR1, oTR2) {
		vValue1 = convert(oTR1.cells[iCol].getAttribute(iOrder), sDataType);
		vValue2 = convert(oTR2.cells[iCol].getAttribute(iOrder), sDataType);
		order = iOrder;
		if (vValue1 < vValue2) {
			return -1
		} else {
			if (vValue1 > vValue2) {
				return 1
			} else {
				return 0
			}
		}
	}
}
function convert(sValue, sDataType) {
	switch (sDataType) {
	case "int":
		return parseInt(sValue);
	default:
		return sValue.toString()
	}
}
function sortTable(iOrder, iCol, sDataType) {
	var oTable = document.getElementById("tblSort");
	var oTBody = oTable.tBodies[0];
	var colDataRows = oTBody.rows;
	var aTRs = new Array;
	for (var i = 0; i < colDataRows.length; i++) {
		aTRs[i] = colDataRows[i]
	}
	if (oTable.sortCol == iCol & iOrder == order) {
		aTRs.reverse()
	} else {
		aTRs.sort(generateCompareTRs(iCol, sDataType, iOrder))
	}
	var oFragment = document.createDocumentFragment();
	for (var j = 0; j < aTRs.length; j++) {
		oFragment.appendChild(aTRs[j])
	}
	oTBody.appendChild(oFragment);
	oTable.sortCol = iCol;
}