var items=[];
var pages=["dashboard.php", "teacher.php", "student.php", "notices.php", "forms.php", "nn.php", "course_view.php", "course_create_page.php", "course_manage_page.php", "viwe_lc_material.php", "lcnote_add_page.php", "lcnote_manage_page.php", "none", "admin_viwe_result.php", "add_result.php", "manage_result.php", "activitylog.php", "userlog.php"];
var wide=false;
var close;
var cont;
var panel;
window.addEventListener("load", init, false);



function init(){
	cont=document.getElementById("cont");
	close=document.getElementById("close");
	panel=document.getElementById("panel");
    items[0]=document.getElementById("item1");
    items[1]=document.getElementById("item2");
    items[2]=document.getElementById("item3");
    items[3]=document.getElementById("item4");
    items[4]=document.getElementById("item5");
    items[5]=document.getElementById("item6");
    items[6]=document.getElementById("item7");
	items[7]=document.getElementById("item8");
    items[8]=document.getElementById("item9");
	items[9]=document.getElementById("item10");
	items[10]=document.getElementById("item11");
	items[11]=document.getElementById("item12");
	items[12]=document.getElementById("item13");
	items[13]=document.getElementById("item14");
	items[14]=document.getElementById("item15");
}
function closePanel(){
	panel.style.visibility="hidden";
}
function openPanel(){
	if(!wide){
		if(panel.style.visibility=="visible"){
			panel.style.visibility="hidden";
		}
		else{
			panel.style.visibility="visible";
		}
	}
	
}
function setPage(pagenum){
	if(pagenum==5){
		if(items[6].style.display == "none"){
			items[6].style.display="block";
			items[7].style.display="block";
			items[8].style.display="block";
		}
		else{
			items[6].style.display="none";
			items[7].style.display="none";
			items[8].style.display="none";
		}
	}
	else if(pagenum==12){
		if(items[10].style.display == "none"){
			items[10].style.display="block";
			items[11].style.display="block";
			items[12].style.display="block";
		}
		else{
			items[10].style.display="none";
			items[11].style.display="none";
			items[12].style.display="none";
		}
	}
	else{
		window.location.href=pages[pagenum];
	}
	
}
function setActive(item){
	element(item).classList.add("sd-active");
}

function logout(){
	window.location.href="logout.php";
}
function getValue(id){
	return document.getElementById(id).value;
}
function isSet(id){
	return document.getElementById(id).checked;
}
function element(id){
	return document.getElementById(id);
}
function msg(message){
var notification=element("notification");
notification.innerHTML=message;
notification.style.display="block";
notification.style.animation="4s cubic-bezier(0.55, 0.06, 0.68, 0.19) 0s 1 normal none running fadeout";
setTimeout(function(){
	notification.style.display="none";
}, 3000);
}