<section id="about" class="light-bg" style="min-height: calc(100vh - 83px);">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 text-center">
                <div class="section-title">
                    <h2>Área Restrita</h2>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-5 col-lg-2 text-center">
                <div class="form-group">
                    <a id="btn_your_user" class="btn btn-link" user_id="<?= $user_id ?>">
                        <i class="fa fa-user"></i>                    
                    </a>
                    <a href="<?= base_url('restrict/logoff') ?>" class="btn btn-link">
                        <i class="fa fa-sign-out"></i>                    
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_courses" role="tab" data-toggle="tab">Cursos</a>
            </li>
            <li>
                <a href="#tab_team" role="tab" data-toggle="tab">Equipe</a>
            </li>
            <li>
                <a href="#tab_user" role="tab" data-toggle="tab">Usuários</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab_courses" class="tab-pane active">
                <div class="container-fluid">
                    <h2 class="text-center"><strong>Gerenciar Cursos</strong></h2>
                    <a id="btn_add_course" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Curso
                    </a>
                    <table id="dt_courses" class="table table-struped table-bordered">
                        <thead>
                            <tr class="tableheader">
                                <th class="dt-center">Nome</th>
                                <th class="dt-center no-sort">Imagem</th>
                                <th class="dt-center">Duração</th>
                                <th class="dt-center no-sort">Descrição</th>
                                <th class="dt-center no-sort">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="tab_team" class="tab-pane">
                <div class="container-fluid">
                    <h2 class="text-center"><strong>Gerenciar Equipe</strong></h2>
                    <a id="btn_add_member" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Membro
                    </a>
                    <table id="dt_team" class="table table-struped table-bordered">
                        <thead>
                            <tr class="tableheader">
                                <th>Nome</th>
                                <th>Foto</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="tab_user" class="tab-pane">
                <div class="container-fluid">
                    <h2 class="text-center"><strong>Gerenciar Usuários</strong></h2>
                    <a id="btn_add_user" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Usuário
                    </a>
                    <table id="dt_users" class="table table-struped table-bordered">
                        <thead>
                            <tr class="tableheader">
                                <th>Login</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="modal fade" id="modal_course">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Cursos</h4>
            </div>
            <div class="modal-body">
                <form action="" id="form_course">
                    <input type="hidden" id="course_id" name="course_id">

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Nome</label>
                        <div class="col-lg-10">
                            <input type="text" name="course_name" id="course_name" class="form-control" max-length="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Imagem</label>
                        <div class="col-lg-10">
                            <img src="" alt="" id="course_img_path" style="max-height:400px; max-width:400px;">
                            <label class="btn btn-block btn-info">
                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar Imagem
                                <input type="file" id="btn_upload_course_img" accept="image/*" style="display:none;">
                            </label>
                            <input name="course_img" id="course_img">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Duração (h)</label>
                        <div class="col-lg-10">
                            <input type="number" step="0.1" name="course_duration" id="course_duration" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Descrição</label>
                        <div class="col-lg-10">
                            <textarea name="course_description" id="course_description" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" id="btn_save_course" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                        </button>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_member">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Membro</h4>
            </div>
            <div class="modal-body">
                <form action="" id="form_member">
                    <input type="hidden" id="member_id" name="member_id">

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Nome</label>
                        <div class="col-lg-10">
                            <input type="text" name="member_name" id="member_name" class="form-control" max-length="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Foto</label>
                        <div class="col-lg-10">
                            <img src="" alt="" id="member_photo_path" style="max-height:400px; max-width:400px;">
                            <label class="btn btn-block btn-info">
                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar Foto
                                <input type="file" id="btn_upload_member_photo" accept="image/*" style="display:none;">
                            </label>
                            <input name="member_photo" id="member_photo">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Descrição</label>
                        <div class="col-lg-10">
                            <textarea name="member_description" id="member_description" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" id="btn_save_member" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                        </button>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Usuário</h4>
            </div>
            <div class="modal-body">
                <form action="" id="form_user">
                    <input type="hidden" id="user_id" name="user_id">

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Usuário</label>
                        <div class="col-lg-10">
                            <input type="text" name="user_login" id="user_login" class="form-control" max-length="30">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Nome Completo</label>
                        <div class="col-lg-10">
                            <input type="text" name="user_full_name" id="user_full_name" class="form-control" max-length="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">E-mail</label>
                        <div class="col-lg-10">
                            <input type="email" name="user_email" id="user_email" class="form-control" max-length="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Confirmar E-mail</label>
                        <div class="col-lg-10">
                            <input type="email" name="user_email_confirm" id="user_email_confirm" class="form-control" max-length="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Senha</label>
                        <div class="col-lg-10">
                            <input type="password" name="user_password" id="user_password" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Senha</label>
                        <div class="col-lg-10">
                            <input type="password" name="user_password_confirm" id="user_password_confirm" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" id="btn_save_user" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                        </button>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>