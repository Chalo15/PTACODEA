@extends('layouts.app')




@section('content')

<div class="container ">
<form class="well form-horizontal" action=" " method="post"  id="formulario_registro">
<fieldset>

<!-- Tíitulo del formulario -->
<legend><center><h2><b>Formulario de registro</b></h2></center></legend><br>

<!-- Nombre -->
<div class="form-group">
<label class="col-md-4 control-label">Nombre</label>  
<div class="col-md-4 inputGroupContainer">
<input  name="nombre" placeholder="Nombre" class="form-control"  type="text"></div>
</div>

<!-- Apellidos -->
<div class="form-group">
<label class="col-md-4 control-label" >Apellidos</label> 
<div class="col-md-4 inputGroupContainer">
<input name="apellidos" placeholder="Apellidos" class="form-control"  type="text"></div>
</div>

<!-- Cedula -->
<div class="form-group">
<label class="col-md-4 control-label">N° Cédula</label>  
<div class="col-md-3 inputGroupContainer">
<input  name="cedula" placeholder="Cédula" class="form-control"  type="number" min=0 max=9></div>
</div>

<!-- Disciplina -->
<div class="form-group"> <label class="col-md-4 control-label">Disciplina</label>
<div class="col-md-3 selectContainer">
<select name="department" class="form-control selectpicker">
  <option value="">Seleccione su disciplina</option>
  <option >Ajedrez</option> <option >Atletismo</option>
  <option >Baloncesto Femenino</option><option>Baloncesto Masculino</option>
  <option >Balonmano Masculino</option> <option >Beisbol</option>
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

<!-- Edad -->
<div class="form-group"><label class="col-md-4 control-label">Edad</label>  
<div class="col-md-2 inputGroupContainer">
<input name="edad" placeholder="Edad" class="form-control" type="number" min=0 max=99></div>
</div>

<!-- Género -->
<div class="form-group"><label class="col-md-4 control-label">Género</label>
<div class="col-md-4 inputGroupContainer">
<div class="checkbox"><label><input type="checkbox" name="femenino" value="f" /> Femenino</label></div>
<div class="checkbox"><label><input type="checkbox" name="masculino" value="m" /> Masculino</label></div>
</div>
</div>

<!-- Correo -->
<div class="form-group">
<label class="col-md-4 control-label">Correo electrónico</label>  
<div class="col-md-4 inputGroupContainer">
<input name="correo" placeholder="E-mail" class="form-control"  type="email"></div>
</div>

<!-- Teléfono -->
<div class="form-group"><label class="col-md-4 control-label"> N° Teléfono</label>  
<div class="col-md-4 inputGroupContainer">
<input name="telefono" placeholder="(+506)" class="form-control" type="number" min=0 ></div>
</div>

<!-- Provincia -->
<div class="form-group"><label class="col-md-4 control-label" >Provincia</label> 
<div class="col-md-4 inputGroupContainer">
<input name="provincia" placeholder="Provincia" class="form-control"  type="text"></div>
</div>

<!-- Cantón -->
<div class="form-group"><label class="col-md-4 control-label" >Cantón</label> 
<div class="col-md-4 inputGroupContainer">
<input name="canton" placeholder="Cantón" class="form-control"  type="text"></div>
</div>

<!-- Dirrección -->
<div class="form-group"><label class="col-md-4 control-label" >Dirección exacta</label> 
<div class="col-md-8 inputGroupContainer">
<input name="direccion" placeholder="Dirección" class="form-control"  type="text"></div>
</div>
 
<!-- Mensaje de encargado -->
<div class="form-group"> <br>
<div class="col-md-10"><smal class="text-muted">***   La sieguiente sección se completa únicamente en caso de ser menor de edad.   ***</div>
<div class="form-group"></div>
</div>

<!-- Sección de datos del responsable-->
<legend><center><h3><b>Datos del responsable</b></h3></center></legend><br>

<!-- Nombre del encargad@-->
<div class="form-group">
<label class="col-md-4 control-label">Nombre del encargado(a)</label>  
<div class="col-md-4 inputGroupContainer">
<input  name="nombre_encargado" placeholder="Nombre" class="form-control"  type="text"></div>
</div>

<!-- Apellidos del encargad@ -->
<div class="form-group">
<label class="col-md-4 control-label">Apellidos del encargado(a)</label>  
<div class="col-md-4 inputGroupContainer">
<input  name="apellidos_encargado" placeholder="Apellidos" class="form-control"  type="text"></div>
</div>

<!-- Cedula del encargad@ -->
<div class="form-group">
<label class="col-md-4 control-label">N° Cédula del encargado(a)</label>  
<div class="col-md-4 inputGroupContainer">
<input  name="cedula_encargado" placeholder="Cédula" class="form-control"  type="number" min=0></div>
</div>

<!-- Teléfono del encargad@-->
<div class="form-group"><label class="col-md-4 control-label"> N° Teléfono del encargado(a)</label>  
<div class="col-md-4 inputGroupContainer">
<input name="telefono_encargado" placeholder="(+506)" class="form-control" type="number"  min=0></div>
</div>

<!-- Parentesco -->
<div class="form-group"> <label class="col-md-4 control-label">Parentesco</label>
<div class="col-md-3 selectContainer">
<select name="parentesco" class="form-control selectpicker">
  <option value="">Seleccione su parentesco</option>
  <option >Madre</option> 
  <option >Padre</option>
  <option >Abuelo(a)</option>
  <option >Tío(a)</option>
  <option >Hermano(a)</option>
  <option >Encargado(a)</option>
</select>
</div>
</div>

<!-- Proviancias -->
<div class="form-group"> <label class="col-md-4 control-label">Provincia</label>
<div class="col-md-3 selectContainer">
<select name="department" class="form-control selectpicker">
  <option value="">Seleccione su provincia</option>
  <option >San José</option> 
  <option >Alajuela </option>
  <option >Cartago </option> 
  <option >Heredia</option>
  <option >Guanacaste </option>
  <option >Puntarenas </option>
  <option >Limón </option>
</select>
</div>
</div>

<!-- Registrar alerta -->
<div class="alert alert-success" role="alert" id="registrado">Éxito al procesar su registro! <i class="glyphicon glyphicon-thumbs-up"></i> </div> 

<!-- Enviar y PDF -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4"><button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnviar <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button></div>
<div class="form-group col-sm-4 flex-column d-flex"><br><input type="file" class="form-control-file" id="pdf"> <small id="pfd" class="text-muted">En esta sección introduzca los archivos .PDF que se le solicitan.</div>
</div>
</fieldset>
</form>
</div><!-- /.Final del contenedor -->


