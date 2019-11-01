<template>
<div>
  <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fa fa-telegram"> </i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Messages</span>
                  <span class="info-box-number">1,410</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <span class="info-box-icon bg-green">
                  <i class="fa fa-flag-o"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Bookmarks</span>
                  <span class="info-box-number">410</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <span class="info-box-icon bg-yellow">
                  <i class="fa fa-files-o"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Uploads</span>
                  <span class="info-box-number">13,648</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <span class="info-box-icon bg-red">
                  <i class="fa fa-star-o"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
  </div>
  <div class="row">
    <!-- Arquivo de acesso às câmeras -->
    <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title"><i class="fa fa-video-camera" aria-hidden="true"></i> ACESSO CÂMERAS</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <form id="arquivo-cameras" enctype="multipart/form-data">
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Selecionar:</label>
                                <input type="file" class="form-control" id="acesso_cameras" name="acesso_cameras"  required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-cameras">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Arquivo de rotinas -->
        <div class="col-md-4">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title"><i class="fa fa-calendar" aria-hidden="true"></i> ROTINA</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <form>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="nome-arquivo-agenda">Nome:</label><br/>
                                <input type="text" class="form-control" name="nome-arquivo-agenda" id="nome-arquivo-agenda">
                            </div>
                            <div class="form-group">
                                <label>Selecionar:</label>
                                <input type="file" class="form-control-file" id="programacaoSemanal"
                                       name="programacaoSemanal">
                            </div>
                            <div class="form-group">
                                <label>Turma:</label><br/>
                                <select name="turmaProgramacao" id="turmaProgramacao">
                                    <option value="Berçario">Bercário</option>
                                    <option value="Infantil">Infantil</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
  </div>
</div>  
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
