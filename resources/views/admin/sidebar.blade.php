<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" role="search" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="Procurar Conteudo...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="#"> Lista de Desejos</a></li>
            <li ><a href="#"> Meu Perfil</a></li>
            <li><a href="#"> Editar Minha Conta</a></li>
            <li><a href="#"> Minhas Finanças</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ url('/produtos/create') }}">
            <i class="fa fa-laptop"></i> <span>Adicionar Produtos</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ url('admin/produtos') }}">
            <i class="fa fa-table"></i> <span>Lista de Produtos</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ url('categorias/index') }}">
            <i class="fa fa-files-o"></i>
            <span>Categorias</span>
          </a>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Parametros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Java</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> C#</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Ingles</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Economia</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Estatistica</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Redes</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('home') }}">
            <i class="fa fa-edit"></i> <span>FAQ</span>
            <span class="pull-right-container">
              <i class=""></i>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>