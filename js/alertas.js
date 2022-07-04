function alerta_eliminar(){ 
    Swal.fire({
      title: '¡Atencion!',
      text: "¿Esta seguro de eliminar esta entrada?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
     }).then((resultado) => {
   if (resultado.isConfirmed) {
   Swal.fire(
    <a href="delete_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger"></a>
    'Borrado con exito',
    'La entrada ha sido eliminada correctamente'
    ) 
   } 
  }) 
  }
