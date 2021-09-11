<div class="menu-logo">
    <div class="navbar-brand">
        <span class="navbar-logo">
            <a href="https://meddelivery.co.mz">
                <img src="url('http://meddelivery.co.mz/images/logo.png')" alt="IMOF" title="" style="height: 4.2rem;">
            </a>
        </span>

    </div>
</div>
<div class="col-lg-6">
    <h1>{{$head}}</h1>
    <p>Caro(a) <b>{{$user}}</b>, Recebemos os seus dados para cadastro! <strong style="color:limegreen">Por Favor Aguarde</strong>, a validação de seus dados...</p>
    <br>
    ================================
    <h3>Dados do Utilizador:</h3>
    <ul>
        <li>Nome: {{$user}}</li>
        <li>Apelido: {{$surname}}</li>
        <li>E-mail: {{$email}}</li>
        <li>Telefone: {{$number}}</li>
    </ul>
    =================================
    <br>
    <h3>Dados da Farmacia:</h3>
    <ul>
        <li>Nome: {{$farm}}</li>
        <li>Titular: {{$titular}}</li>
        <li>E-mail: {{$emaill}}</li>
        <li>NUIT: {{$nuit}} </li>
        <li>Telefone: {{$number2}}</li>
        <li>Cede Local: {{$local}}</li>
        <li>Descriçao: {{$desc}}</li>
    </ul>

    <p>Moçambique - Maputo/MD {{$date}}</p>

    <h4>Melhores cumprimentos, <b>MED DELIVERY</b></h4>
</div>