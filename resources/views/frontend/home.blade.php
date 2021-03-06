<?php

		if(isset($_POST['nome'])){

		
	
		$body = '<div style="display:table;">'.$_POST['InputMessage'].'</div>';	
			
		contato($_POST['InputName'],$_POST['InputEmail'],'PEACELABS',$body,'','paloma@peacelabs.co');
		
		
		$body = '<div style="display:table;">Atenciosamente,</div>';		
		$body = $body.'<div style="display:table;">'.$tit.'</div>';		
		$body = $body.'<div style="display:table;"> Tel: '.$tel_1.'</div>';		
		$body = $body.'<div style="display:table;">-</div>';		
		$body = $body.'<div style="display:table;">-</div>';		
		$body = $body.'<div style="display:table;">-</div>';					
		$body = $body.'<div style="display:table;">Acesse:</div>';		
		$body = $body.'<div style="display:table;">'.$url_w.'</div>';
		
		echo "<script language=\"JavaScript\">alert('mensagem enviada com sucesso');</script>";
		
		echo '<script> window.location="'.$url_w.'contato";</script>'; 
		
	} else {
		$msg = '';	
	}
			

			 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>PeaceLabs - Open Brazil</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet/less" type="text/css" href="/assets/less/style.less" />
    <script src="/assets/js/less.js" type="text/javascript"></script>

    <!--link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"-->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>

@include('frontend.includes.nav')

@if (Session::has('message'))
	<div class="flash alert-info">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

<div class="header alt vert">
  <div class="container">

    <h1>Peacelabs: Code For Brazil - HACKATON CURITIBA</h1>
      <p class="lead">Plataforma colaborativa dos projetos: Code For Brazil</p>
      <div>&nbsp;</div>
      <a href="{{ route('projects.create') }}" class="btn btn-default btn-lg">Criar um projeto</a>
  </div>
</div>

<hr>

<div id="projetos" class="blurb">
  <div class="container">
    <div class="row">

    @if ( !$projects->count() )
        Ainda não tem projetos
    @else
		<ul class="teasers">
            @foreach( $projects as $project )
		        <li class="col-sm-4">
		          <article class="teaser">
		            {!! Form::open(array('class' => 'form-inline menu', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
								{!! link_to_route('projects.edit', 'Editar', array($project->slug), array('class' => 'btn btn-info btn-xs')) !!}&nbsp;
								{!! Form::submit('Deletar', array('class' => 'btn btn-danger btn-xs')) !!}
					{!! Form::close() !!}
		            <header>
		              <img class="capa" src="{{ $project->cover_url(['height' => 160,'width' => 720, 'crop' => 'fill' ]) }}"/>
		              <img src="{{ $project->profile_url(['height' => 50,'width' => 50, 'crop' => 'fill']) }}" class="profile img-responsive"/>
		              <h2>
		              	<a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
		              </h2>
		            </header>
		            <div class="teaser-body">
		              <p>
		                {{ $project->description }}
		              </p>
		            </div>
		            <footer>
		              <a href="{{ route('projects.show', $project->slug) }}">Saber mais sobre este projeto</a>
		            </footer>
		          </article>
		        </li>
            @endforeach
        </ul>
    @endif 

    </div>
  </div>
</div>

<div class="callout" id="peacelabs">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <h1>O que é PeaceLabs</h1>
        <p>Peace Enterprises, uma plataforma para empresas criarem de forma colaborativa
          seus projetos de sustentabilidade e responsabilidade social, engajando seus funcionários,
          clientes e comunidade no processo<br><br></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 text-center">
        <div class="featurette-item">
          <i class="fa fa-lightbulb-o"></i>
          <h4>Ideias</h4>
          <p>Up-up-and-away with this starter template.</p>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="featurette-item">
          <i class="fa fa-paw"></i>
          <h4>Habilidades</h4>
          <p>For you are a magnet and I am steel.</p>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="featurette-item">
          <i class="fa fa-dollar"></i>
          <h4>Dinheiro</h4>
          <p>Protect yourself. Don't design like it's 1999.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="blurb" id="contato">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Contato</h3>
    <!--div class="alert alert-success"><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent. (If form ok!)</strong></div>
      <div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs. (If form error!)</strong></div -->
    </div>
    <form role="form" action="" method="post" >
      <div class="col-lg-6">
        <div class="form-group">
          <label for="InputName">Seu nome</label>
          <div class="input-group">
            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
            <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
        </div>
        <div class="form-group">
          <label for="InputEmail">Seu email</label>
          <div class="input-group">
            <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
            <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
        </div>
        <div class="form-group">
          <label for="InputMessage">Mensagem</label>
          <div class="input-group"
  >
            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
            <span class="input-group-addon"><i class="fa fa-check"></i></span></div>
        </div>
        <?php

								require_once('recaptchalib.php');
								
								// Get a key from https://www.google.com/recaptcha/admin/create
								$publickey = "6LeDZhETAAAAADkdBRL60a8dP4kvvb6ilvUKWb51";
								$privatekey = "";
								
								# the response from reCAPTCHA
								$resp = null;
								# the error code from reCAPTCHA, if any
								$error = null;
								
								# was there a reCAPTCHA response?
								if ($_POST["recaptcha_response_field"]) {
										$resp = recaptcha_check_answer ($privatekey,
																		$_SERVER["REMOTE_ADDR"],
																		$_POST["recaptcha_challenge_field"],
																		$_POST["recaptcha_response_field"]);
								
										if ($resp->is_valid) {
												echo "You got it!";
										} else {
												# set the error code so that we can display it
												$error = $resp->error;
										}
								}
								echo recaptcha_get_html($publickey, $error);
								?>
                    </div>
        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info center">
      </div>
    </form>
  </div>

  </div>
</div>


<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <ul class="list-inline">
          <li><i class="icon-facebook icon-2x"></i></li>
          <li><i class="icon-twitter icon-2x"></i></li>
          <li><i class="icon-google-plus icon-2x"></i></li>
        </ul>
        <hr>
      Code For Brazil - Peace Interprises ©<?php echo date('Y'); ?></p>
      </div>
    </div>
  </div>
</footer>

<ul class="nav pull-right scroll-down">
  <li><a href="#" title="Scroll down"><i class="icon-chevron-down icon-3x"></i></a></li>
</ul>
<ul class="nav pull-right scroll-top">
  <li><a href="#" title="Scroll to top"><i class="icon-chevron-up icon-3x"></i></a></li>
</ul>

  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/scripts.js"></script>
  </body>
</html>
<script type="text/javascript">

function valida() {
	// Validation functions obtained from:
	// http://www.devshed.com/c/a/JavaScript/Form-Validation-with-JavaScript/7/
	
	// check to see if input is numeric
	function isNumeric(val)
	{
		if (val.match(/^[0-9]+$/))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	// check to see if input is alphanumeric
	function isAlphaNumeric(val)
	{
		if (val.match(/^[a-zA-Z0-9]+$/))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	// check to see if input is a valid email address
	function isEmailAddress(val)
	{
		if (val.match(/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	nome = document.formular.nome.value;
	emailpa = document.formular.email.value;
	tel = document.formular.telefone.value;
	msg = document.formular.msg.value


	if (nome == "Digite seu nome"  || nome == "") {
	alert("Digite seu nome");
	document.formular.nome.focus();
	return false;
	}
	if (emailpa == 'Digite seu e-mail' || emailpa.length < 6 || emailpa.length > 60) {
	alert("Digite seu e-mail");
	document.formular.email.focus();
	return false;
	}
	if (tel == "Digite seu telefone" || tel == "") {
	alert("Digite seu telefone");
	document.formular.telefone.focus();
	return false;
	}
	
	if (msg == "Digite sua mensagem" || msg == "") {
	alert("Digite sua mensagem");
	document.formular.msg.focus();
	return false;
	}
	return true;
}


</script>
