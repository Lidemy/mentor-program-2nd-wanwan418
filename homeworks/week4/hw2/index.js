
document.querySelector('#submit').addEventListener('click',function(event){
 	event.preventDefault()
 	const element = document.querySelector('input[ name = text]')
 	const value = element.value 
 	if (value === '') {
 		element.parentNode.style.background = '#ffebee'
 		// element.parentNode.element.innerHTML = "這是必填問題"; 		
	}
})