<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Session;
/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Procurement extends Backend
{
    
    /**
     * Procurement模型对象
     * @var \app\admin\model\Procurement
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Procurement;

    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */

    /**
     * 导入
     */
    public function import()
    {
        $admin_user=Session::get('admin');
        $file = $this->request->request('file');
        if (!$file) {
            $this->error(__('Parameter %s can not be empty', 'file'));
        }
        $filePath = ROOT_PATH . DS . 'public' . DS . $file;
        if (!is_file($filePath)) {
            $this->error(__('No results were found'));
        }
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        if (!$PHPReader->canRead($filePath)) {
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                $PHPReader = new \PHPExcel_Reader_CSV();
                if (!$PHPReader->canRead($filePath)) {
                    $this->error(__('Unknown data format'));
                }
            }
        }

        //导入文件首行类型,默认是注释,如果需要使用字段名称请使用name
        $importHeadType = isset($this->importHeadType) ? $this->importHeadType : 'comment';

        $table = $this->model->getQuery()->getTable();
        $database = \think\Config::get('database.database');
        $fieldArr = [];
        $list = db()->query("SELECT COLUMN_NAME,COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? AND TABLE_SCHEMA = ?", [$table, $database]);
        foreach ($list as $k => $v) {
            if ($importHeadType == 'comment') {
                $fieldArr[$v['COLUMN_COMMENT']] = $v['COLUMN_NAME'];
            } else {
                $fieldArr[$v['COLUMN_NAME']] = $v['COLUMN_NAME'];
            }
        }

        $PHPExcel = $PHPReader->load($filePath); //加载文件
        $currentSheet = $PHPExcel->getSheet(0);  //读取文件中的第一个工作表
        $allColumn = $currentSheet->getHighestDataColumn(); //取得最大的列号
        $allRow = $currentSheet->getHighestRow(); //取得一共有多少行
        $maxColumnNumber = \PHPExcel_Cell::columnIndexFromString($allColumn);
        for ($currentRow = 1; $currentRow <= 1; $currentRow++) {
            for ($currentColumn = 0; $currentColumn < $maxColumnNumber; $currentColumn++) {
                $val = $currentSheet->getCellByColumnAndRow($currentColumn, $currentRow)->getValue();
                $fields[] = $val;
            }
        }
        $insert = [];
        for ($currentRow = 2; $currentRow <= $allRow; $currentRow++) {
            $values = [];
            for ($currentColumn = 0; $currentColumn < $maxColumnNumber; $currentColumn++) {
                $val = $currentSheet->getCellByColumnAndRow($currentColumn, $currentRow)->getValue();

                $myColumnForDate=\PHPExcel_Cell::stringFromColumnIndex($currentColumn);
                if($myColumnForDate=='A'||$myColumnForDate=='L'){
                    $values[]=$ttt=date("Y-m-d",\PHPExcel_Shared_Date::ExcelToPHP($val));
                }else{
                    $values[] = is_null($val) ? '' : $val;
                }

            }
            $row = [];
            $temp = array_combine($fields, $values);
            foreach ($temp as $k => $v) {
                if (isset($fieldArr[$k]) && $k !== '') {
                    $row[$fieldArr[$k]] = $v;
                }
            }
            if ($row) {
                $row['author_id']=$admin_user['id'];
                $insert[] = $row;
            }
        }
        if (!$insert) {
            $this->error(__('No rows were updated'));
        }
        try {
            $this->model->saveAll($insert);
        } catch (\think\exception\PDOException $exception) {
            $this->error($exception->getMessage());
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        $this->success();
    }


    /**
     * 查看
     */
    public function index()
    {
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }


            $admin_user=Session::get('admin');
            $show_type=$this->model->getListLevel($admin_user['id']);
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();

            $list=$this->model->getList($where,$sort,$order,$offset, $limit);

            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
