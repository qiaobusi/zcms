<?php

use yii\helpers\Html;

?>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<?= Html::jsFile('@web/assets/AdminLTE/bootstrap/js/bootstrap.min.js') ?>
<!-- FastClick -->
<?= Html::jsFile('@web/assets/AdminLTE/plugins/fastclick/fastclick.js') ?>
<!-- AdminLTE App -->
<?= Html::jsFile('@web/assets/AdminLTE/dist/js/app.min.js') ?>
<!-- Sparkline -->
<?= Html::jsFile('@web/assets/AdminLTE/plugins/sparkline/jquery.sparkline.min.js') ?>
<!-- jvectormap -->
<?= Html::jsFile('@web/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>
<?= Html::jsFile('@web/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>
<!-- SlimScroll 1.3.0 -->
<?= Html::jsFile('@web/assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') ?>
<!-- ChartJS 1.0.1 -->
<?= Html::jsFile('@web/assets/AdminLTE/plugins/chartjs/Chart.min.js') ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?= Html::jsFile('@web/assets/AdminLTE/dist/js/pages/dashboard2.js') ?>
<!-- AdminLTE for demo purposes -->
<?= Html::jsFile('@web/assets/AdminLTE/dist/js/demo.js') ?>

</body>
</html>