//cliente
function librofrm()
{  let tk=`
   <section class="container p-4 bg-secondary bg-opacity-50 bg-gradient mt-2 rouded rounded-4">
   <main class="row" >
   <div  class="col-lg-6">
      <form id='F1' >  
         <div class="col-md-12">
					<label class="form-label  fw-bold">TITULO</label>
					<input type="text" class="form-control"  name="titu"  >									
		   </div>       
         <div class="col-md-12">
					<label class="form-label  fw-bold">AUTOR</label>
					<input type="text" class="form-control"  name="autor"  >										
		   </div> 
         <br>
         <div class="col-md-12">
					<label class="form-label  fw-bold">TIPO</label>															
               <select name="tipo">
                  <option>literario</option>
                  <option>ficcion</option>
                  <option>biografia</option>
                  <option>texto</option>
                  <option>otro</option>
               </select>
         </div> 
         <div class="col-md-12">
					<label class="form-label  fw-bold">PRECIO</label>
					<input type="text" class="form-control"  name="prec"  >              									
		   </div> 
             <br>
         <button> guardar </button>
      </form>
    </div>
    <div  class="col-lg-6">
       <img src="vista/assets/img/galeria/libros.jpg" class="img-fluid" alt="...">
    </div>
    </main> 
    </section>    `;
   document.getElementById('c1').innerHTML=tk;
   document.getElementById('F1').addEventListener('submit',e=>
   { e.preventDefault();
      FD=new FormData(document.getElementById("F1"));
      fetch(`api/librosave`,{method:"POST",body:FD})
      .then(resp=>resp.json())
      .then(data=>
      {  console.log(data);
         alert('Se registró el libro correctamente.');
      })
      .catch(err=>{alert('Error al registrar el libro: ' +err);})
   })
}

function librolist(busq)
{  if(busq==undefined){busq='';}
   fetch(`api/librolist/${busq}`)
   .then(resp=>resp.json())
   .then(data=>
    { console.log(data);
      let tk=` 
      <section class="container p-4 bg-secondary bg-opacity-50 bg-gradient mt-2 rouded rounded-4">
      <main class="row" >
      <div  class="col-lg-12">       
       <center><h3>LISTA DE LIBROS</h3></center>
       <form> 
          <input id="busq" values='${busq}' >
          <button type='button' onclick="librolist(busq.value)">Buscar </button>
       </form><br>
       <table  class="table table-success table-striped">
          <thead>
              <tr class="table-info"> 
                 <th>N </th>
                 <th>TITULO </th>
                 <th>AUTOR </th>
                 <th>PRECIO </th>
                 <th>ACCION </th>

              </tr>
          </thead>
      <tbody>`;
       for(p=0;p < data.list.length;p++)
         {
            tk+=`
          <tr id="libro${data.list[p].numl}">
            <th>${p+1} </th>
            <th>${data.list[p].titu} </th>
            <th> ${data.list[p].autor}</th>  
            <th> ${data.list[p].prec}</th>                      
            <th>
               <button class="btn btn-white text-dark" onclick="librodel(${data.list[p].numl})">Eliminar </button>
               <button class="btn btn-white text-dark" onclick="libroedit(${data.list[p].numl})">Editar </button>
            </th>
         </tr> `;
         }
          tk+=` 
      </tbody>
      </table>
      </div>
    </main> 
    </section>`
         document.getElementById('c1').innerHTML=tk;
   })  
}
//eliminar 
function librodel(numl)
{
   if(confirm("esta seguro de eliminar??"))
      {
         fetch(`api/librodel/${numl}`)
         .then(resp=>resp.json())
         .then(data=>
          { console.log(data);
            document.getElementById(`libro${numl}`).style.display='none'; 
          }  )
      }
}

function libroedit(numl) {
   fetch(`api/libroinfo/${numl}`)
   .then(resp=>resp.json())
   .then(data=>{
       console.log(data);
   let Tk=`
   <section class="container p-4 bg-secondary bg-opacity-50 bg-gradient mt-2 rouded rounded-4">
   <main class="row" >
   <div  class="col-lg-6">
   <form id='F1'>
        <input name='numl' value='${numl}'>
         <div class="col-md-12">
					<label class="form-label  fw-bold">TITULO</label>
               <input name="titu" type="text" class="form-control" placeholder="Nombre autor" value="${data.titu}" aria-label="Username" aria-describedby="basic-addon1">
         </div>
   
         <div class="col-md-12">
					<label class="form-label  fw-bold">AUTOR</label>
               <input name="autor" type="text" class="form-control" placeholder="Nombre autor"value="${data.autor}" aria-label="Username" aria-describedby="basic-addon1">
         </div>   <br>
       <div class="col-md-12">
					<label class="form-label  fw-bold">TIPO</label>
       <select name='tipo'>
           <option ${data.tipo=='literario'?'selected':''}>literario</option>
           <option ${data.tipo=='ficcion'?'selected':''}>ficcion</option>
           <option ${data.tipo=='biografia'?'selected':''}>biografia</option>
           <option ${data.tipo=='texto'?'selected':''}>texto</option>
           <option ${data.tipo=='otro'?'selected':''}>otro</option>
       </select>
        </div> 
       <div class="col-md-12">
				<label class="form-label  fw-bold">PRECIO</label>
            <input name="prec" type="number" value="${data.prec}" class="form-control" aria-label="Amount (to the nearest dollar)">          
         </div><br>
       <button>ACTUALIZAR</button>
   </form>
    </div>
     <div  class="col-lg-6">
       <img src="vista/assets/img/galeria/libros.jpg" class="img-fluid" alt="...">
    </div>
    </main> 
    </section>`;
   document.getElementById('c1').innerHTML=Tk;

   document.getElementById('F1').addEventListener('submit',e=>{
       e.preventDefault();
       FD=new FormData(document.getElementById('F1'));
       fetch(`api/libroup`,{method:"POST",body:FD})
       .then(resp=>resp.json())
       .then(data=>{
           console.log(data);
           alert('Se actualizo correctamente.');
       })
       .catch(err=>{alert('Error al editar el registro: ' +err);})
   })
   })    
}













