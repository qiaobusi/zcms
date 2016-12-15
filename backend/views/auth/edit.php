<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

  <!-- head -->
  <?php echo $this->render('@backend/views/public/head.php'); ?>
  <!-- head -->
  
  <!-- head -->
  <?php echo $this->render('@backend/views/public/left.php'); ?>
  <!-- head -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li>管理员</li>
        <li>权限</li>
        <li class="active">修改</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">权限</h3>
            </div>
            <form class="form-horizontal" id="form" action="<?php echo Url::to(['auth/save']); ?>">
            	<input name="_csrf-backend" type="hidden" id="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>">
            	<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" >
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">权限名称</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="Auth[name]" placeholder="权限名称" value="<?php echo $auth->name; ?>">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="label" class="col-sm-2 control-label">权限标签</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="label" name="Auth[label]" placeholder="权限标签，例如manager-index" value="<?php echo $auth->label; ?>">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="url" class="col-sm-2 control-label">权限链接</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="Auth[url]" placeholder="权限链接，例如manager/index" value="<?php echo $auth->url; ?>">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
              </div>
              <div class="box-footer" style="text-align:right;">
                <button type="button" class="btn btn-sm btn-default" id="resetForm">清空</button>&nbsp;
                <button type="button" class="btn btn-sm btn-primary" id="saveForm">保存</button>
              </div>
            </form>
          </div>
    		</div>
    	</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
  		$(function(){
					$('#resetForm').click(function(){
							$('#name').val('');
							$('#label').val('');
							$('#url').val('');
					});
					
					$('#saveForm').click(function(){
							var id = $('#id').val();
						
							var name = $.trim($('#name').val());
							if (name == '') {
									$('#name').parents('.form-group').addClass('has-error');
									$('#name').parent().find('.help-block').html('请输入权限名称');
									return false;
							}
							var label = $.trim($('#label').val());
							if (label == '') {
									$('#label').parents('.form-group').addClass('has-error');
									$('#label').parent().find('.help-block').html('请输入权限标签');
									return false;
							}
							var url = $.trim($('#url').val());
							if (url == '') {
									$('#url').parents('.form-group').addClass('has-error');
									$('#url').parent().find('.help-block').html('请输入权限链接');
									return false;
							}
							
							$.ajax({
									url: $('#form').attr('action'),
									type: 'POST',
									data: {
											'id': id,
											'Auth[name]': name,
											'Auth[label]': label,
											'Auth[url]': url,
											'_csrf-backend': $('#_csrf').val()
									},
									dataType: 'JSON',
									success: function(data) {
											if (data.status == 1) {
													window.location.href = '<?php echo Url::to(['auth/index']); ?>';
											} else {
													showAlert('提示', data.info, null);
													
													var _csrf = '<?php echo Yii::$app->request->csrfToken; ?>';
													$('#_csrf').val(_csrf);
											}
									}
							});
					});
					
					$('#name').focus(function(){
							if ($('#name').parents('.form-group').hasClass('has-error')) {
									$('#name').parents('.form-group').removeClass('has-error');
									$('#name').parent().find('.help-block').html('');
							}
					});
					$('#label').focus(function(){
							if ($('#label').parents('.form-group').hasClass('has-error')) {
									$('#label').parents('.form-group').removeClass('has-error');
									$('#label').parent().find('.help-block').html('');
							}
					});
					$('#url').focus(function(){
							if ($('#url').parents('.form-group').hasClass('has-error')) {
									$('#url').parents('.form-group').removeClass('has-error');
									$('#url').parent().find('.help-block').html('');
							}
					});
					
  		});
			
		
		
  </script>

  <!-- right -->
  <?php echo $this->render('@backend/views/public/right.php'); ?>
  <!-- right -->
  
  <!-- foot -->
  <?php echo $this->render('@backend/views/public/foot.php'); ?>
  <!-- foot -->
