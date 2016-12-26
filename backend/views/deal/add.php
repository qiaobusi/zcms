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
        <li>借款</li>
        <li class="active">添加</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">借款</h3>
            </div>
            <form class="form-horizontal" id="form" action="<?php echo Url::to(['deal/insert']); ?>">
            	<input name="_csrf-backend" type="hidden" id="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="user_id" class="col-sm-2 control-label">借款人</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="user_id" name="Deal[user_id]" placeholder="借款人ID">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">借款名称</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="Deal[name]" placeholder="借款名称">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cate_id" class="col-sm-2 control-label">借款分类</label>
                  <div class="col-sm-10">
                    <select id="cate_id" class="form-control" name="Deal[cate_id]">
                        <option value="0">请选择</option>
                     	<?php foreach ($dealCates as $dealCate): ?>
	                    	<option value="<?php echo $dealCate->id; ?>"><?php echo $dealCate->name; ?></option>
	                    <?php endforeach; ?>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="type_id" class="col-sm-2 control-label">借款用途</label>
                  <div class="col-sm-10">
                    <select id="type_id" class="form-control" name="Deal[type_id]">
                        <option value="0">请选择</option>
	                    <?php foreach ($dealTypes as $dealType): ?>
	                    	<option value="<?php echo $dealType->id; ?>"><?php echo $dealType->name; ?></option>
	                    <?php endforeach; ?>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="agency_id" class="col-sm-2 control-label">担保机构</label>
                  <div class="col-sm-10">
                    <select id="agency_id" class="form-control" name="Deal[agency_id]">
	                    <option value="0">无</option>
	                    <?php foreach ($dealAgencys as $dealAgency): ?>
	                    	<option value="<?php echo $dealAgency->id; ?>"><?php echo $dealAgency->name; ?></option>
	                    <?php endforeach; ?>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="warrant" class="col-sm-2 control-label">担保范围</label>
                  <div class="col-sm-10">
                    <select id="warrant" class="form-control" name="Deal[warrant]">
	                    <option value="0" selected="selected">无</option>
	                    <option value="1">本金</option>
	                    <option value="2">本金及利息</option>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">借款简介</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="description" name="Deal[description]" placeholder="借款简介"></textarea>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="is_effect" class="col-sm-2 control-label">有效性</label>
                  <div class="col-sm-10">
                    <select id="is_effect" class="form-control" name="Deal[is_effect]">
	                    <option value="0">否</option>
	                    <option value="1" selected="selected">是</option>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="borrow_amount" class="col-sm-2 control-label">借款金额</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="borrow_amount" name="Deal[borrow_amount]" placeholder="借款金额">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="repay_time" class="col-sm-2 control-label">借款期限</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="repay_time" name="Deal[repay_time]" placeholder="借款期限">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="repay_time_type" class="col-sm-2 control-label">借款期限类型</label>
                  <div class="col-sm-10">
                    <select id="repay_time_type" class="form-control" name="Deal[repay_time_type]">
	                    <option value="0">按天还款</option>
	                    <option value="1" selected="selected">按月还款</option>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="min_loan_money" class="col-sm-2 control-label">最低投资金额</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="min_loan_money" name="Deal[min_loan_money]" placeholder="最低投资金额">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="max_loan_money" class="col-sm-2 control-label">最高投资金额</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="max_loan_money" name="Deal[max_loan_money]" placeholder="最高投资金额" value="0">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="rate" class="col-sm-2 control-label">年化利率</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="rate" name="Deal[rate]" placeholder="年化利率">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="is_recommend" class="col-sm-2 control-label">是否推荐</label>
                  <div class="col-sm-10">
                    <select id="is_recommend" class="form-control" name="Deal[is_recommend]">
	                    <option value="0" selected="selected">否</option>
	                    <option value="1">是</option>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="start_time" class="col-sm-2 control-label">开始投资时间</label>
                  <div class="col-sm-10">
                    <div class="input-group">
	                  <div class="input-group-addon">
	                    <i class="fa fa-clock-o"></i>
	                  </div>
	                  <input type="text" class="form-control" id="start_time" name="Deal[start_time]" placeholder="yyyy-mm-dd hh:ii">
                	</div>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="deal_status" class="col-sm-2 control-label">借款状态</label>
                  <div class="col-sm-10">
                    <select id="deal_status" class="form-control" name="Deal[deal_status]">
	                    <option value="0">等待材料</option>
	                    <option value="1" selected="selected">进行中</option>
	                    <option value="2">已满标</option>
	                    <option value="3">已流标</option>
	                    <option value="4">还款中</option>
	                    <option value="5">已还清</option>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="enddate" class="col-sm-2 control-label">筹款期限</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="enddate" name="Deal[enddate]" placeholder="筹款期限/7">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="services_fee" class="col-sm-2 control-label">服务费率</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="services_fee" name="Deal[services_fee]" placeholder="服务费率">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="loantype" class="col-sm-2 control-label">还款方式</label>
                  <div class="col-sm-10">
                    <select id="loantype" class="form-control" name="Deal[loantype]">
	                    <option value="0" selected="selected">等额本息</option>
	                    <option value="1">付息还本</option>
	                    <option value="2">到期本息</option>
	                </select>
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="seo_title" class="col-sm-2 control-label">SEO标题</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="seo_title" name="Deal[seo_title]" placeholder="SEO标题">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="seo_keyword" class="col-sm-2 control-label">SEO关键字</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="seo_keyword" name="Deal[seo_keyword]" placeholder="SEO关键字">
                    <span class="help-block" style="color:#f00;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="seo_description" class="col-sm-2 control-label">SEO描述</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="seo_description" name="Deal[seo_description]" placeholder="SEO描述"></textarea>
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
    
  <!-- datetimepicker -->
  <?= Html::jsFile('@web/assets/AdminLTE/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js') ?>
  <?= Html::jsFile('@web/assets/AdminLTE/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') ?>
  <?= Html::cssFile('@web/assets/AdminLTE/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') ?>
  
  <script type="text/javascript">
  		$(function(){
					$("#start_time").datetimepicker({
						language: 'zh-CN',
				        format: "yyyy-mm-dd hh:ii",
				        autoclose: true,
				        todayBtn: false,
				        minuteStep: 10,
				    });
  	  		
					$('#resetForm').click(function(){
							
					});
					
					$('#saveForm').click(function(){
							var user_id = $.trim($('#user_id').val());
							if (user_id == '') {
									$('#user_id').parents('.form-group').addClass('has-error');
									$('#user_id').parent().find('.help-block').html('请输入借款人');
									return false;
							}
							var name = $.trim($('#name').val());
							if (name == '') {
									$('#name').parents('.form-group').addClass('has-error');
									$('#name').parent().find('.help-block').html('请输入借款名称');
									return false;
							}
							
							$.ajax({
									url: $('#form').attr('action'),
									type: 'POST',
									data: $('#form').serialize(),
									dataType: 'JSON',
									success: function(data) {
											if (data.status == 1) {
													window.location.href = '<?php echo Url::to(['deal/index']); ?>';
											} else {
													console.info(data.info);
													showAlert('提示', data.info, null);
													
													var _csrf = '<?php echo Yii::$app->request->csrfToken; ?>';
													$('#_csrf').val(_csrf);
											}
									}
							});
					});

					$('#user_id').focus(function(){
							if ($('#user_id').parents('.form-group').hasClass('has-error')) {
									$('#user_id').parents('.form-group').removeClass('has-error');
									$('#user_id').parent().find('.help-block').html('');
							}
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
