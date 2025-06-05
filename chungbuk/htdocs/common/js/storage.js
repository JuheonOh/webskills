// JavaScript Document

// 로컬 배열
function local(key, val){
	var local = localStorage.getItem(key) === null ? new Array() : JSON.parse(localStorage.getItem(key));
	
	// 불러오기
	if(val === undefined){
		return local;
	}
	
	// 저장하기
	localStorage.setItem(key, JSON.stringify(val));
}

// 로컬 2중 배열
function local2(key, val){
	var local = localStorage.getItem(key) === null ? new Array() : JSON.parse(localStorage.getItem(key));
	
	// 불러오기
	if(val === undefined){
		return local;
	}
	
	// 저장하기
	local.push(val)
	localStorage.setItem(key, JSON.stringify(local));
}