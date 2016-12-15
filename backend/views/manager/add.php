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
        <li>管理员</li>
        <li class="active">添加</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">管理员</h3>
            </div>
            <form class="form-horizontal" id="form" action="<?php echo Url::to(['manager/insert']); ?>">
            	<input name="_csrf-backend" type="hidden" id="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">用户名称</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="Manager[username]" placeholder="用户名称">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">登陆密码</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="Manager[password]" placeholder="登陆密码">
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
				$('#username').val('');
				$('#password').val('');
			});
			
			$('#saveForm').click(function(){
				var username = $.trim($('#username').val());
				if (username == '') {
					$('#username').parents('.form-group').addClass('has-error');
					$('#username').parent().find('.help-block').html('请输入用户名称');
					return false;
				}
				var password = $.trim($('#password').val());
				if (password == '') {
					$('#password').parents('.form-group').addClass('has-error');
					$('#password').parent().find('.help-block').html('请输入登陆密码');
					return false;
				}
				
				$.ajax({
					url: $('#form').attr('action'),
					type: 'POST',
					data: {
							'Manager[username]': username,
							'Manager[password]': password,
							'_csrf-backend': $('#_csrf').val()
					},
					dataType: 'JSON',
					success: function(data) {
							if (data.status == 1) {
									window.location.href = '<?php echo Url::to(['manager/index']); ?>';
							} else {
									showAlert('提示', data.info, null);
									
									var _csrf = '<?php echo Yii::$app->request->csrfToken; ?>';
									$('#_csrf').val(_csrf);
							}
					}
				});
			});
			
			$('#username').focus(function(){
				if ($('#username').parents('.form-group').hasClass('has-error')) {
					$('#username').parents('.form-group').removeClass('has-error');
					$('#username').parent().find('.help-block').html('');
				}
			});
			$('#password').focus(function(){
				if ($('#password').parents('.form-group').hasClass('has-error')) {
					$('#password').parents('.form-group').removeClass('has-error');
					$('#password').parent().find('.help-block').html('');
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
