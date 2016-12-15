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
        <li>借款列表</li>
        <li class="active">借款</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-sm-12">
        <div class="box box-default">
			      <div class="box-header">
              <h3 class="box-title">借款</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary" onclick="add()"><span class="glyphicon glyphicon-plus"></span>&nbsp;添加</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 50px">ID</th>
                  <th>项目名称</th>
                  <th>权限标签</th>
                  <th>添加时间</th>
                  <th style="width: 150px; text-align:right;">操作</th>
                </tr>
                <?php foreach ($deals as $deal): ?>
                <tr>
                  <td><?php echo $deal->id; ?></td>
                  <td><?php echo $deal->name; ?></td>
                  <td><?php echo $deal->label; ?></td>
                  <td><?php echo date('Y-m-d H:i', $deal->create_time); ?></td>
                  <td style="width: 150px; text-align:right;">
                  	<button type="button" class="btn btn-sm btn-info" data-url="<?php echo Url::to(['deal/edit', 'id' => $deal->id]); ?>" onclick="edit(this)">修改</button>&nbsp;
                  	<button type="button" class="btn btn-sm btn-danger" onclick="del(<?php echo $deal->id; ?>)">删除</button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="box-footer clearfix">
              <?php echo LinkPager::widget([
              		'pagination' => $pagination,
              		'options' => [
              				'class' => 'pagination pagination-sm no-margin pull-right'
              		]
              ]) ?>
            </div>
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
		
		var delId = 0;
		
		function add() {
				window.location.href = "<?php echo Url::to(['deal/add']); ?>";
		}
		
		function edit(obj) {
				var url = $(obj).data('url');
				window.location.href = url;
		}
		
		function del(id) {
				delId = id;
				showConfirm('删除', '确认删除？', deleteAuth);
		}
		
		function deleteAuth() {
				$.ajax({
						url: '<?php echo Url::to(['deal/del']); ?>',
						type: 'GET',
						data: {
								'id': delId,
						},
						dataType: 'JSON',
						success: function(data) {
								showAlert('提示', data.info, null);
								if (data.status == 1) {
										window.location.reload();
								}
						}
				});
		}
		
  </script>

  <!-- right -->
  <?php echo $this->render('@backend/views/public/right.php'); ?>
  <!-- right -->
  
  <!-- foot -->
  <?php echo $this->render('@backend/views/public/foot.php'); ?>
  <!-- foot -->
