function foo() {
	var target = document.getElementById("page-header-id");
	var color = target.style.color;

	if (color == "blue") {
		target = "red";
	}
	else {
		target = "blue";
	}
}