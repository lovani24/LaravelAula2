<h1>Formulário de Cadastro de Mensagens</h1>
<hr>

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
	<div class="container">
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	      <li>{{ $error }}</li>
	      @endforeach
	    </ul>
	  </div>
	</div>
  @endif

<form action="/mensagens" method="POST">
	{{ csrf_field() }}
	Título: 		<input type="text" name="titulo"> 	    <br>
	Descrição:		<input type="text" name="texto">   <br>
	Agendado para:  <input type="text" name="autor">   <br>
	<input type="submit" value="Salvar">
</form>