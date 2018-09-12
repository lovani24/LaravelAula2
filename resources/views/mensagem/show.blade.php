<h1>Mensagem {{$mensagem->id}}</h1>
<hr>
<h3><b>Titulo:</b> {{$mensagem->texto }}</h3>
<h3><b>Texto:</b> {{$mensagem->autor}}</h3>
<h3><b>Autor:</b> {{$mensagem->titulo}}</h3>
<h3><b>Criada em:</b> {{$mensagem->created_at}}</h3>
<h3><b>Atualizada em:</b> {{$mensagem->updated_at}}</h3>



<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->