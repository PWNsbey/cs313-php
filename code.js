function toggleShowLeftSubDiv() {
	var leftSubState = document.getElementById("left-sub-div");

	if (leftSubState.style.visibility == "hidden" || leftSubState.style.visibility == "") {
		leftSubState.style.visibility = "visible";
	}
	else {
		leftSubState.style.visibility = "hidden";
	}
}

function toggleShowRightSubDiv() {
	var rightSubState = document.getElementById("right-sub-div");

	if (rightSubState.style.visibility == "hidden" || rightSubState.style.visibility == "") {
		rightSubState.style.visibility = "visible";
	}
	else {
		rightSubState.style.visibility = "hidden";
	}
}