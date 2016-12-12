<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

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
        <li>角色</li>
        <li class="active">权限</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-sm-12">
        <div class="box box-default">
			      <div class="box-header">
              <h3 class="box-title">角色 [<?php echo $role->name; ?>]</h3>
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" id="form" action="<?php echo Url::to(["role/save-auth"]); ?>">
            	<input name="_csrf-backend" type="hidden" id="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>">
            	<input name="role_id" type="hidden" id="role_id" value="<?php echo $role->id; ?>">
            <div class="box-body no-padding">
              <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 50px"><input type="checkbox" class="checkAll"></th>
                  <th style="width: 50px">ID</th>
                  <th>权限名称</th>
                  <th>权限标签</th>
                  <th>添加时间</th>
                </tr>
                <?php foreach ($auths as $auth): ?>
                <tr>
                  <td><input <?php if (in_array($auth->id, $role_auths)): ?>checked="checked"<?php endif;?> class="checkOne" name="auth_id[]" type="checkbox" value="<?php echo $auth->id; ?>"></td>
                  <td><?php echo $auth->id; ?></td>
                  <td><?php echo $auth->name; ?></td>
                  <td><?php echo $auth->label; ?></td>
                  <td><?php echo date('Y-m-d H:i', $auth->time); ?></td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            
            <div class="box-footer" style="text-align:right;">
                <button type="button" class="btn btn-sm btn-default" id="resetForm">清空</button>&nbsp;
                <button type="button" class="btn btn-sm btn-primary" id="saveForm">保存</button>
              </div>
            </form>

            <!-- /.box-body -->
          </div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script type="text/javascript">

		$(function(){
			var checkLen = $('.checkOne').length;
			var checkedLen = $('.checkOne:checked').length;
			if (checkLen == checkedLen) {
				$('.checkAll').prop('checked', 'checked');
			}
			
			$('#resetForm').click(function(){
				$('.checkAll').prop('checked', '');
				$('.checkOne').each(function(){
					$(this).prop('checked', '');
				});
			});
			
			$('#saveForm').click(function(){
				var role_id = $('#role_id').val();
				var auth_id = new Array();
				var checkLen = $('.checkOne').length;
				for (var i = 0; i < checkLen; i++) {
					if ($('.checkOne:eq(' + i + ')').is(':checked')) {
						var val = $('.checkOne:eq(' + i + ')').val();
						auth_id.push(val);
					}
				}
				if (auth_id.length == 0) {
					showAlert('提示', '没有选择数据', null);
				}
				
				$.ajax({
					url: $('#form').attr('action'),
					type: 'POST',
					data: {
						'role_id': role_id,
						'auth_id[]': auth_id,
						'_csrf-backend': $('#_csrf').val()
					},
					dataType: 'JSON',
					success: function(data) {
						console.info(data);
						if (data.status == 1) {
							window.location.href = '<?php echo Url::to(['role/index']); ?>';
						} else {
							showAlert('提示', data.info, null);
						}
					}
				});
			});
			
			$('.checkAll').click(function(){
				if ($(this).is(':checked')) {
					$('.checkOne').prop('checked', 'checked');
				} else {
					$('.checkOne').prop('checked', '');
				}
			});
			$('.checkOne').each(function(){
				$(this).click(function(){
					var checkLen = $('.checkOne').length;
					var checkedLen = $('.checkOne:checked').length;
					if (checkLen == checkedLen) {
						$('.checkAll').prop('checked', 'checked');
					} else {
						$('.checkAll').prop('checked', '');
					}
				});
			});
			
		});
		
  </script>

  <!-- right -->
  <?php echo $this->render('@backend/views/public/right.php'); ?>
  <!-- right -->
  
  <!-- foot -->
  <?php echo $this->render('@backend/views/public/foot.php'); ?>
  <!-- foot -->
