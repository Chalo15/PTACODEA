@extends('layouts.app')




@section('content')

<div class="container px-5 py-10 md-auto">

<form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>
  

<!-- Tíitulo del formulario -->
<legend><center><h2><b>Formulario de registro</b></h2></center></legend><br>

<!-- Nombre-->
<div class="form-group">
<label class="col-md-4 control-label">Nombre</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="nombre" placeholder="Nombre" class="form-control"  type="text"></div>
</div>
</div> 

<!-- Apellidos -->
<div class="form-group">
<label class="col-md-4 control-label" >Apellidos</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="apellidos" placeholder="Apellidos" class="form-control"  type="text"></div>
</div>
</div>

<!-- Cedula-->
<div class="form-group">
<label class="col-md-4 control-label">Cédula</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
<input  name="cedula" placeholder="Cédula" class="form-control"  type="number" max=9 min=0></div>
</div>
</div>

<!-- Disciplina-->
<div class="form-group"> <label class="col-md-4 control-label">Disciplina</label>
<div class="col-md-4 selectContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="department" class="form-control selectpicker">
  <option value="">Seleccione su disciplina</option>
  <option >Ajedrez</option> <option >Atletismo</option>
  <option >Baloncesto Femenino</option><option>Baloncesto Masculino</option>
  <option>Balonmano Masculino</option> <option >Beisbol</option>
  <option >Boxeo</option><option >Ciclismo</option> 
  <option >Futbol Masculino</option><option >Futbol Femenino</option> 
  <option >Futsal Masculino</option><option >Futsal Femenino</option>
  <option >Gimnasia Artística</option> <option >Gimnasia Rítmica</option> 
  <option >Halterofilia</option> <option >Judo</option>
  <option >Karate Do</option> <option> Natación</option> 
  <option >Patinaje</option> <option >Taek Won Do</option> 
  <option >Tenis de campo</option> <option >Tenis de mesa</option> 
  <option >Triatlon</option> <option >Voleibol Masculino</option>
  <option >Voleibol Playa</option> <option >Tiro con arco</option>
  <option >Football Americano</option> <option >Balonmano Femenino</option>
  <option >Voleibol Femenino</option>

</select>
</div>
</div>
</div>

<!-- Edad -->
<div class="form-group"><label class="col-md-4 control-label">Edad</label>  
<div class="col-md-2 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
<input name="edad" placeholder="Edad" class="form-control" type="number" min="0" max="99"></div>
</div>
</div>

<!-- Correo-->
<div class="form-group">
<label class="col-md-4 control-label">Correo</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input name="correo" placeholder="E-mail" class="form-control"  type="email"></div>
</div>
</div>

<!-- Teléfono-->
<div class="form-group"><label class="col-md-4 control-label">Teléfono</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input name="telefono" placeholder="(+506)" class="form-control" type="number"></div>
</div>
</div> 

<!-- Dirreccion-->
<div class="form-group">
<label class="col-md-4 control-label" >Dirección</label> 
<div class="col-md-8 inputGroupContainer">
<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
<input name="direccion" placeholder="Dirección" class="form-control"  type="text"></div>
</div>
</div>

<!-- Success message-->
<div class="alert alert-success" role="alert" id="success_message">Éxito al procesar su registro! <i class="glyphicon glyphicon-thumbs-up"></i> </div> 

<!-- Enviar y PDF -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4"><button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnviar <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button></div>
<div class="form-group col-sm-4 flex-column d-flex"><input type="file" class="form-control-file" id="pdf"> <small id="pfd" class="text-muted">En esta sección introduzca los archivos .PDF que se le solicitan.</div>
</div>
</fieldset>
</form>
</div>
</div><!-- /.Final del contenedor -->


