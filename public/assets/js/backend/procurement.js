define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'procurement/index',
                    add_url: 'procurement/add',
                    edit_url: 'procurement/edit',
                    del_url: 'procurement/del',
                    multi_url: 'procurement/multi',
                    import_url: 'procurement/import',
                    table: 'procurement',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'procurement_id',
                sortName: 'procurement_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'procurement_id', title: __('Procurement_id')},
                        {field: 'author_id', title: __('Author_id')},
                        {field: 'nickname', title: __('Nickname')},
                        {field: 'purchase_date', title: __('Purchase_date'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'sales_person', title: __('Sales_person')},
                        {field: 'factory_name', title: __('Factory_name')},
                        {field: 'sales_mobile', title: __('Sales_mobile')},
                        {field: 'factory_mobile', title: __('Factory_mobile')},
                        {field: 'product_name', title: __('Product_name')},
                        {field: 'product_number', title: __('Product_number')},
                        {field: 'cost_unit_price', title: __('Cost_unit_price'), operate:'BETWEEN'},
                        {field: 'cost_mount', title: __('Cost_mount'), operate:'BETWEEN'},
                        {field: 'advance_payment', title: __('Advance_payment'), operate:'BETWEEN'},
                        {field: 'balance_mount', title: __('Balance_mount'), operate:'BETWEEN'},
                        {field: 'delivery_date', title: __('Delivery_date'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'customer_name', title: __('Customer_name')},
                        {field: 'sales_unit_price', title: __('Sales_unit_price'), operate:'BETWEEN'},
                        {field: 'sales_amount', title: __('Sales_amount'), operate:'BETWEEN'},
                        {field: 'rebate_amount', title: __('Rebate_amount'), operate:'BETWEEN'},
                        {field: 'order_person', title: __('Order_person')},
                        {field: 'remark', title: __('Remark')},
                        {field: 'link', title: __('Link')},
                        {field: 'create_time', title: __('Create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});