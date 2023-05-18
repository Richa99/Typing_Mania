const typingtext=document.querySelector(".type-text p");
inputText=document.querySelector(".input-text")
scoreTag=document.querySelector(".score span")
timeTag=document.querySelector(".time span")
startbtn=document.querySelector(".btn button")

let charIndex=0
score=0,
maxtime=60;
let timer,
timeLeft=maxtime,
istyping=0

function randomWord(){
 	let randIndex=Math.floor(Math.random()* words.length);
 	typingtext.innerHTML= ""
 	// console.log(words[randIndex].split(""));
 	words[randIndex].split("").forEach(s => {
 		let spanTag= `<span>${s}</span>`;
 		typingtext.innerHTML += spanTag;
 		// console.log(typingtext)
 	});
 	document.addEventListener("keydown",()=> inputText.focus());
 	typingtext.addEventListener("click",()=> inputText.focus());
 }

function initTyping(){
	const mainword= typingtext.querySelectorAll("span")
	console.log(mainword)

	if(charIndex < mainword.length && timeLeft>0){

		if(istyping==false){
	 		timer=setInterval(initTime,1000);
	 		istyping=true;
	 	}

		let typedElement=inputText.value.split("")
		let typed=typedElement[typedElement.length-1] //extracting last element
		console.log(" typed value = " + typed)
		if(mainword[charIndex].innerHTML === typed.toUpperCase()){
	 		console.log("correct")
	 		mainword[charIndex].classList.add("correct");
	 		charIndex++;
	 	}
	 	else{
	 		console.log("incorrect");
	 		mainword[charIndex].classList.add("incorrect");
	 	}
	 	
	}
	else if(charIndex == mainword.length){
		score++
		scoreTag.innerHTML=score;
		typingtext.classList.add("fadeout")
		document.removeEventListener("keydown", initTyping);
		reset()
	}
}

function reset(){
	typingtext.classList.remove("fadeout")
	inputText.value=""
	charIndex=0
	randomWord();
 	inputText.addEventListener("input",initTyping)
}

function initTime(){
  	if(timeLeft>0){
  		timeLeft--;
  		timeTag.innerHTML=timeLeft+"s";
  	}
  	else{
  		inputText.value="";
		alert("Times up !!");
  		clearInterval(timer)
  	}
 }

function start(){
	score=0;
	timeLeft=maxtime;
	charIndex=0
	istyping=0
	scoreTag.innerHTML=score;
	timeTag.innerHTML=timeLeft+"s";
	clearInterval(timer)
	randomWord();
 	inputText.addEventListener("input",initTyping)
}

typingtext.innerHTML=""
startbtn.addEventListener("click",start);