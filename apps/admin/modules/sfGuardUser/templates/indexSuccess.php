<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardUser/assets') ?>
<?php include_partial('sfGuardUser/header') ?>



<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('sfGuardUser/list_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            
            <div class="span12">
            <h1 style="display: inline"><?php echo __('Management account', array(), 'messages') ?></h1>
            </div>
            <div class="row-fluid">
                <div class="span9">
                                  <?php include_partial('sfGuardUser/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
                                </div>
                <div class="span3">
                    <div class="pull-right"><?php include_partial('sfGuardUser/list_actions', array('helper' => $helper)) ?></div>
                </div>
            </div>
            

            <?php include_partial('sfGuardUser/flashes') ?>
            
            <div id="sf_admin_header">
                <?php include_partial('sfGuardUser/list_header', array('pager' => $pager)) ?>
            </div>

            <div id="sf_admin_content">
                                    <form class="form-inline" id="list-form" action="<?php echo url_for('sf_guard_user_collection', array('action' => 'batch')) ?>" method="post">
                
                <?php include_partial('sfGuardUser/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>

                <div>
                    <?php include_partial('sfGuardUser/list_batch_actions', array('helper' => $helper)) ?>
                </div>
                                    </form>
                
                <form class="form-inline" method="get" action="<?php echo url_for('sf_guard_user') ?>">
                    <div class="well pull-right">
                      <?php echo __('Số bản ghi/trang: ')?>
                        <?php $select = new sfWidgetFormChoice(array(
                                        'multiple' => false,
                                        'expanded' => false,
                                        'choices' => array('20' => __('20', null, 'tmcTwitterBootstrapPlugin'), 25 => 25, 30 => 30, 50 => 50, 100 => 100)
                                    ),
                                    array('class' => 'input-medium')); echo $select->render('max_per_page', $sf_user->getAttribute('sfGuardUser.max_per_page', null, 'admin_module')) ?>
                        <input type="submit" class="btn btn-inverse btn-small" value="<?php echo __('Go', array(), 'tmcTwitterBootstrapPlugin') ?>" />
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>

            <?php include_partial('sfGuardUser/list_footer', array('pager' => $pager)) ?>
        </div>
    </div>
</div>

<?php include_partial('sfGuardUser/footer') ?>
<script type="text/javascript">
  $('#sf_guard_user_filters_process_updated_time').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
        'Last 7 Days': [moment().subtract('days', 6), moment()],
        'Last 30 Days': [moment().subtract('days', 29), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
       },
      format: 'DD/MM/YYYY',
      startDate: '<?php echo date('d/m/Y') ?>',
      endDate: '<?php echo date('d/m/Y') ?>'
    }
  );

   $('#sf_guard_user_filters_process_created_time').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
        'Last 7 Days': [moment().subtract('days', 6), moment()],
        'Last 30 Days': [moment().subtract('days', 29), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
       },
      format: 'DD/MM/YYYY',
      startDate: '<?php echo date('d/m/Y') ?>',
      endDate: '<?php echo date('d/m/Y') ?>'
    }
  );

</script>