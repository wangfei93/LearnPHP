<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');

class check
{
    /**
     * @des 读取excel的数据到数组里面
     * @param $filePath
     * @return array|void
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    function getData($filePath)
    {
        include_once('./Classes/PHPExcel.php');//包含类文件
        include_once('./Classes/PHPExcel/Writer/Excel2007.php');//包含类文件

        $objPHPExcel=new PHPExcel();

//$objPHPExcel->getActiveSheet()->setCellValue('A1', 'String');
//$objPHPExcel->getActiveSheet()->setCellValue('A2', 12);
//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);//将excel数据对象实例化为excel文件对象
//$objWriter->save("aa.xlsx");

        $PHPReader = new PHPExcel_Reader_Excel2007();
        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($filePath)){
                echo 'no Excel';
                return ;
            }
        }

//建立excel对象，此时你即可以通过excel对象读取文件，也可以通过它写入文件
        $PHPExcel = $PHPReader->load($filePath);

        /**读取excel文件中的第一个工作表*/
        $currentSheet = $PHPExcel->getSheet(0);
        /**取得最大的列号*/
        $allColumn = $currentSheet->getHighestColumn();
        /**取得一共有多少行*/
        $allRow = $currentSheet->getHighestRow();

        $key = array();

        $data = array();
        //循环读取每个单元格的内容。注意行从1开始，列从A开始
        for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){
            for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
                $addr = $colIndex.$rowIndex;
                $cell = $currentSheet->getCell($addr)->getValue();
                if($cell instanceof PHPExcel_RichText)     //富文本转换字符串
                    $cell = $cell->__toString();


                if($rowIndex == 1) {
                    $key[$colIndex] = $cell;
                }else{

                    $data[$rowIndex][$key[$colIndex]] = $cell;
                }

            }

        }
        return $data;
    }


    /**
     * @des 去掉二维数组的某个键的重复值
     * @param $arr
     * @param $key
     * @return mixed
     */
    function second_array_unique_bykey($arr, $key){
        $tmp_arr = array();
        foreach($arr as $k => $v)
        {
            if(in_array($v[$key], $tmp_arr))   //搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
            {
                unset($arr[$k]); //销毁一个变量  如果$tmp_arr中已存在相同的值就删除该值
            }
            else {
                $tmp_arr[$k] = $v[$key];  //将不同的值放在该数组中保存
            }
        }
        //ksort($arr); //ksort函数对数组进行排序(保留原键值key)  sort为不保留key值

        return $arr;

    }

    /**
     * @des 数组2的数据能否全部在数组1中找到
     * @param $array1
     * @param $array2
     * @param $key 需要匹配的字段
     */
    function check_data($array1, $array2, $key)
    {
        $array = array();
        foreach ($array1 as $key1 => $value1)
        {
            $array[] = $value1[$key];
        }

        foreach ($array2 as  $key2 => $value2)
        {
            if(!in_array($value2[$key], $array)){
                echo $value2[$key];
                echo '<br>';
            }
        }
    }


        function get_diff($filePath1, $filePath2, $key)
        {
            $array1 = $this->getData($filePath1);
            $array2 = $this->getData($filePath2);
            $arr1 = $this->second_array_unique_bykey($array1, $key);
            $arr2 = $this->second_array_unique_bykey($array2, $key);
            $this->check_data($arr1, $arr2, $key);

        }

}

$filePath1 = "1.xlsx";
$filePath2 = "2.xls";
$key = 'name';
$obj = new check();

$obj->get_diff($filePath1, $filePath2, $key);


