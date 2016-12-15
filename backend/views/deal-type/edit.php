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
        <li>借款列表</li>
        <li>借款用途</li>
        <li class="active">修改</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">借款用途</h3>
            </div>
            <form class="form-horizontal" id="form" action="<?php echo Url::to(['deal-type/save']); ?>">
            	<input name="_csrf-backend" type="hidden" id="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>">
            	<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" >
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">借款用途</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="DealType[name]" placeholder="借款用途" value="<?php echo $dealType->name; ?>">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="is_effect" class="col-sm-2 control-label">有效性</label>
                  <div class="col-sm-10">
                  	<select id="is_effect" class="form-control" name="DealType[is_effect]">
	                    <option value="0" <?php if ($dealType->is_effect == 0) { ?>selected<?php } ?>>否</option>
	                    <option value="1" <?php if ($dealType->is_effect == 1) { ?>selected<?php } ?>>是</option>
	                </select>
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
						$('#is_effect').find('option[value=1]').attr('selected', 'selected');
					});
					
					$('#saveForm').click(function(){
							var id = $('#id').val();
						
							var name = $.trim($('#name').val());
							if (name == '') {
									$('#name').parents('.form-group').addClass('has-error');
									$('#name').parent().find('.help-block').html('请输入权限名称');
									return false;
							}
							var is_effect = $('#is_effect').val();
							$.ajax({
									url: $('#form').attr('action'),
									type: 'POST',
									data: {
											'id': id,
											'DealType[name]': name,
											'DealType[is_effect]': is_effect,
											'_csrf-backend': $('#_csrf').val()
									},
									dataType: 'JSON',
									success: function(data) {
											if (data.status == 1) {
													window.location.href = '<?php echo Url::to(['deal-type/index']); ?>';
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
					
					
  		});
			
		
		
  </script>

  <!-- right -->
  <?php echo $this->render('@backend/views/public/right.php'); ?>
  <!-- right -->
  
  <!-- foot -->
  <?php echo $this->render('@backend/views/public/foot.php'); ?>
  <!-- foot -->
