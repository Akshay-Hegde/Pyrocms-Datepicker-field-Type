<?php if ($this->uri->segment(1) !== 'admin'): ?>
    <link rel="stylesheet" href="<?= base_url('streams_core/field_asset/css/bootstrap_datepicker/datepicker.css'); ?>" />	
    <script type="text/javascript" src="<?= base_url('streams_core/field_asset/js/bootstrap_datepicker/datepicker.js'); ?>"></script>
<?php endif; ?>
<div class="input-append bootstrap-timepicker">
    <input name="<?php echo $nameform ?>" type="text" style="width: 100%; display: inline-block" class="datepicker" readonly="readonly" data-date-format="<?php echo $format ?>" value="<?php echo $value ?>">
</div>
<script>
    $(function() {
        $('[name="<?php echo $nameform ?>"]').datepicker();
    })
</script>
<?php if (!empty($value)): ?>
    <script>
        $(function() {
            $('[name="<?php echo $nameform ?>"]').datepicker('setValue', '<?php echo $value ?>');
        });
    </script>
<?php endif; ?>
