@if (Session::has('info'))
    <div class="alert alert-success" role="info">
        {{ Session::get('info') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="danger">
        {{ Session::get('danger') }}
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning" role="warning">
        {{ Session::get('warning') }}
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Ocorreu um erro desconhecido! Porfavor verifique seus dados...
</div>
@endif