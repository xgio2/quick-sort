<form method="post" enctype="multipart/form-data">
    <p>Введите числа через запятую</p>
    <p><input size="50" name="num" min="1" max="50"></p>
    <input type="submit" value="Загрузить" />
</form>
<?php
function quick_sort($arraymas)
{
    $forsmall = $forbig = array(); //создаем пустой массив
    if(count($arraymas) < 2) // если осталось последнее значение, завершаем цикл
    {
        return $arraymas;
    }
    $tmp_mas = key($arraymas); // забираем все значения, которые остались без сортировки
    $first_el = array_shift($arraymas); // извлекаем первый элемент массива
    foreach($arraymas as $val) // проходимся по каждой цифре
    {
        if($val <= $first_el) // если => то помещаем его в массив
        {
            $forsmall[] = $val;
        }elseif ($val > $first_el) // если > то помещаем его в массив
        {
            $forbig[] = $val;
        }
    }
   // echo '<pre>' , var_dump(array_merge(quick_sort($forsmall),array($tmp_mas=>$first_el),quick_sort($forbig))) , '</pre>';
    return array_merge(quick_sort($forsmall),array($tmp_mas=>$first_el),quick_sort($forbig));// зацикливаем нашу функцию
}
$name = $_POST['num'];

$arraymas = explode(",", $name);


echo 'Original massiv : '.implode(',',$arraymas) . "</br>";
$arraymas = quick_sort($arraymas);
echo 'Sorted massiv : '.implode(',',$arraymas);
?>