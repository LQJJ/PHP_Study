<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>温馨提醒</title>
    <script type="text/javascript">
        function deleteStudentById( id){
            return  window.confirm("是否要删除id为"+id+"的用户");
        }
    </script>

</head>

<body>

<?php
require_once 'StudentTbaleClass.php';
/**
 * Created by PhpStorm.
 * User: caozhi
 * Date: 2016/10/16
 * Time: 16:24
 */
class StudentListClass
{
    private $pageSize = 10;
    public $pageNow = 1;
    private $pageCount;

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        $this ->pageCount = StudentTbaleClass::getPageCount($this->pageSize);
        return $this->pageCount;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }
    public  function navgationTitle(){
        $studentTbale = new StudentTbaleClass();
        $navTilte = '';
        $pageNow = $this->pageNow;

        if($this->pageNow>1){
            $lastPageNow=$pageNow-1;
            $navTilte .= "<br/><a href='StudentListView.php?pageNow=$lastPageNow'>上一页<a/>&nbsp";
        }
        $nextPageNow=$pageNow + 1;
        $navTilte .= "<a href='StudentListView.php?pageNow=$nextPageNow'>下一页<a/>&nbsp";
        $lastPageIndex = (($this->pageNow -10 )>0) ? ($this->pageNow -10 ):1;
        $navTilte .= "<a href='StudentListView.php?pageNow=$lastPageIndex'><<&nbsp<a/>";

        $i = floor(($this->pageNow - 1) /10)*10+1;
        $maxI = ($i-1) + 10;
        for(;$i <= $maxI;$i ++){
            $navTilte .= "<a href='StudentListView.php?pageNow=$i'>$i&nbsp<a/>";
        }
        $nextPageIndex = $this->pageNow+10;
        $navTilte .= "<a href='StudentListView.php?pageNow=$nextPageIndex'>>>&nbsp<a/>";



        $navTilte .= "&nbsp 当前第{$pageNow},一共有{$this->getPageCount()}页<br/>";
        $navTilte .= "<br/>
                        <form>
                        快速跳转：<input type='text' name='pageNow'/> <input type='submit' value='Go'/>
                        <form/>
                      <br/>";
        return $navTilte;
    }

    public function printStudentList($pageNum){
        $this ->pageNow = $pageNum;
        $studentTbale = new StudentTbaleClass();
        $headers = $studentTbale->getTbaleHeader();
        $rows = $studentTbale ->getPageStudent($pageNum,$this->pageSize);
        $col = count($headers);
        $lists = '<table border="5" width="100%"><tr>';
        for($i=0; $i < $col; $i++){
            $lists .= '<th>'.$headers[$i].'</th>';
        }
        $lists .= '</tr>';


        $col = count($rows[0]);

        for($i=0; $i < $this ->pageSize; $i++)
        {
            $lists .= '<tr>';

            for($j=0; $j < $col+2; $j++){
                if($j<$col){
                    $name = $rows[$i][$headers[$j]];
                    $lists .="<td> $name </td>";
                }else
                {
                    $s_id = $rows[$i]['s_id'];
                    if($headers[$j] == '修改用户'){
                        $url = "<a href='UpDateView.php?s_id=$s_id&pageNow=$pageNum'>$headers[$j]<a/>";
                    }else if($headers[$j] == '删除用户'){
                        $url = "<a  onclick='return deleteStudentById($s_id)' href='UpDateManger.php?s_id=$s_id&flag=delete&pageNow=$pageNum'>$headers[$j]<a/>";
                    }
                    $lists .="<td> $url </td>";
                }

            }
            $lists .= '</tr>';
        }
        $lists .= '</table>';
        return $lists;
    }

}

?>

<body/>

<html/>