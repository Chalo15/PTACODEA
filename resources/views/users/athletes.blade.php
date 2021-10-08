@extends('layouts.app')

@section('content')
<!--
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" 
           aria-describedby="emailHelp" placeholder="Enter email">
  </div>
</form>

<form class="form-inline">
   <div class="form-group mx-sm-3">
       <label for="inputUser" class="sr-only">User</label>
       <input type="password" class="form-control" id="inputUser" placeholder="User">
   </div>
   <div class="form-group mx-sm-3">
       <label for="inputPass" class="sr-only">Password</label>
       <input type="password" class="form-control" id="inputPass" placeholder="Pass">
   </div>
   <button type="submit" class="btn btn-primary">Confirm</button>
</form>
<form>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Check me out
    </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
<form>
  <div class="form-group">
      <label for="validation01">First name</label>
      <input type="text" class="form-control is-valid" id="validation01" 
             placeholder="First name" value="Mark" required>
  </div>
  <div class="form-group">
      <label for="validation02">City</label>
      <input type="text" class="form-control is-invalid" id="validation02" placeholder="City" required>
  </div>
</form>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="Username">
</div>

<div class="input-group">
  <input type="text" class="form-control">
  <span class="input-group-addon">.00</span>
</div>

<div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control">
  <span class="input-group-addon">.00</span>
</div>
-->
<!-- INICIO FORMULARIO HTML -->

<form method="POST" action="/index.php" class="needs-validation" novalidate>

    <div class="form-row mt-5 d-inline" >
        <div class="col-md-4 mb-3 ">
            <label for="validarNombre">Nombre:<span class="red">*</span></label>
            <input type="text" class="form-control d-inline" id="validarNombre" name="validarNombre" required>
        </div>
    </div>

    <div class="form-row d-inline">
        <div class="col-md-4 mb-3">
            <label for="validarApellidos">Apellidos:<span class="red">*</span></label>
            <input type="text" class="form-control d-inline" id="validarApellidos" name="validarApellidos" required >


    <div class="form-row d-inline">
        <div class="col-md-4 mb-3">
            <label for="validarEmail">Email:<span class="red">*</span></label>
            <input type="email" class="form-control" id="validarEmail" name="validarEmail" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarTelefono">Teléfono:</label>
            <input type="number" class="form-control" id="validarTelefono" name="validarTelefono" max="999999999">
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarTema">Tema:<span class="red">*</span></label>
            <select class="custom-select" id="validarTema" name="validarTema" required>
                <option selected disabled value="">Selecciona...</option>
                <option value="Problema con acceso a Web">Problema con acceso a Web</option>
                <option value="Propuesta de colaboración">Propuesta de colaboración</option>
                <option value="Eliminar mi usuario de la Web">Eliminar mi usuario de la Web</option>
                <option value="Otras cuestiones">Otras cuestiones</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarAsunto">Asunto:</label>
            <input type="text" class="form-control" id="validarAsunto" name="validarAsunto" required>
        </div>
    </div>

    <div class="form-group">
        <label for="validationMensaje">Mensaje:<span class="red">*</span></label>
        <textarea class="form-control" id="validationMensaje" name="validationMensaje" rows="3" min="25" required></textarea>
    </div>

    <div class="form-group mb-10">
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
        <button class="btn btn-success" type="reset" name="reset">Limpiar</button>
    </div>

</form>

@endsection()