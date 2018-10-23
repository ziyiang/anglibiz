<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"D:\xampp\htdocs\anglibiz\public/../application/admin\view\procurement\edit.html";i:1540169342;s:67:"D:\xampp\htdocs\anglibiz\application\admin\view\layout\default.html";i:1536636086;s:64:"D:\xampp\htdocs\anglibiz\application\admin\view\common\meta.html";i:1536636086;s:66:"D:\xampp\htdocs\anglibiz\application\admin\view\common\script.html";i:1536636086;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Purchase_date'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-purchase_date" class="form-control datetimepicker form-control" data-date-format="YYYY-MM-DD" data-use-current="true" name="row[purchase_date]" type="text" value="<?php echo $row['purchase_date']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Sales_person'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-sales_person" class="form-control form-control" name="row[sales_person]" type="text" value="<?php echo $row['sales_person']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Factory_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-factory_name" class="form-control form-control" name="row[factory_name]" type="text" value="<?php echo $row['factory_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Sales_mobile'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-sales_mobile" class="form-control form-control" name="row[sales_mobile]" type="text" value="<?php echo $row['sales_mobile']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Factory_mobile'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-factory_mobile" class="form-control form-control" name="row[factory_mobile]" type="text" value="<?php echo $row['factory_mobile']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Product_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-product_name" class="form-control form-control" name="row[product_name]" type="text" value="<?php echo $row['product_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Product_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-product_number" class="form-control form-control" name="row[product_number]" type="number" value="<?php echo $row['product_number']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Cost_unit_price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-cost_unit_price" class="form-control form-control" step="0.01" name="row[cost_unit_price]" type="number" value="<?php echo $row['cost_unit_price']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Cost_mount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-cost_mount" class="form-control form-control" step="0.01" name="row[cost_mount]" type="number" value="<?php echo $row['cost_mount']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Advance_payment'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-advance_payment" class="form-control form-control" step="0.01" name="row[advance_payment]" type="number" value="<?php echo $row['advance_payment']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Balance_mount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-balance_mount" class="form-control form-control" step="0.01" name="row[balance_mount]" type="number" value="<?php echo $row['balance_mount']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Delivery_date'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-delivery_date" class="form-control datetimepicker form-control" data-date-format="YYYY-MM-DD" data-use-current="true" name="row[delivery_date]" type="text" value="<?php echo $row['delivery_date']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Customer_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-customer_name" class="form-control form-control" name="row[customer_name]" type="text" value="<?php echo $row['customer_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Sales_unit_price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-sales_unit_price" class="form-control form-control" step="0.01" name="row[sales_unit_price]" type="number" value="<?php echo $row['sales_unit_price']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Sales_amount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-sales_amount" class="form-control form-control" step="0.01" name="row[sales_amount]" type="number" value="<?php echo $row['sales_amount']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Rebate_amount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rebate_amount" class="form-control form-control" step="0.01" name="row[rebate_amount]" type="number" value="<?php echo $row['rebate_amount']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Order_person'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-order_person" class="form-control form-control" name="row[order_person]" type="text" value="<?php echo $row['order_person']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-remark" class="form-control form-control" name="row[remark]" type="text" value="<?php echo $row['remark']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Link'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-link" class="form-control form-control" name="row[link]" type="text" value="<?php echo $row['link']; ?>">
        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>