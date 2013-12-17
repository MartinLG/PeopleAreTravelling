function ChangeNavSel(page_name){
	var home = document.querySelector('.active');
	home.className = "";
	var page_link = document.getElementById(page_name);
	page_link.className = "active";
}