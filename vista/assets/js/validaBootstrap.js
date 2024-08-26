(()=> {
	const forms=document.querySelectorAll('.needs-validation')
	Array.from(forms).forEach(form =>{
		form.addEventListener('submit', event =>{
			if(!form.checkValidity())
			{
				event.preventDefault()
				event.stopPropagation()
      			/*if(pass != con)
					{ return alert("no coincide la contraseña");

			        }	*/
			}
			
			else{


				alert ("DATOS VALIDADOS");
			}

			form.classList.add('was-validated')
		},false)
	})
})()