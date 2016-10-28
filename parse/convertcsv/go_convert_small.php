<?php
$argv[1]='upload\article_all_1.csv';
$argv[2]='"'; // разделитель для csv вроде уже не нужен
$argv[3]='Велосипеды';    // -1
$argv[4]=100;    // start id
$argv[5]=100000;    // sku


header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';

require('PhpDebuger/lib/FirePHPCore/FirePHP.class.php');
$firephp = FirePHP::getInstance(true);



if (!isset($argv[1])) {
  echo "ERROR   insert path to file EXAMPLE:   upload/file_name.csv";
  die();
}

$file=$argv[1];
  $csv = array_map('str_getcsv', file($file));
    array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });
    array_shift($csv); # remove column header

/*var_dump($csv[0]);
die();*/


$delimiter=$argv[2];
$cat_delimiter='|';
$res=array();
foreach ($csv as $key => $value) {
 
// запись кат
     if ($argv[3]!=-1) {
      $cat_temp=$argv[3]; //добавить категорию
     }
               // добавить ли вторуюу кат.
      if (!empty( trim( $value['Раздел']))){
              $cat_temp=$cat_temp.$cat_delimiter.trim( $value['Раздел']); 
      }    
$temp['cat']=trim( $cat_temp);
//     id
$temp['id']=$argv[4]++;
/*$temp['name']=trim( $value['Наименование']);*/
/*$temp['model']=$value['Модель'];*/
/*$temp['sku']='sdu00'.$argv[5]++;
$temp['ups']="";
$temp['manuf']=$value['Бренд'];
$temp['ship']=1;
$temp['loc']='';*/
/*$temp['price']=$value['Цена'];*/
/*$temp['point']=0;
$temp['quantity']=100;
$temp['status']='5';
$temp['l']=0;
$temp['w']=0;
$temp['h']=0;
$temp['weigth']= trim( $value['Вес велосипеда'],' кг') ;
$temp['seokey']='';
$temp['metakey']='';
$temp['metades']='';
$temp['des']=  $value['Описание'] ;


$temp['img']=  str_replace('public://custom_files/', '', $value['Фото']);
$temp['sort']=1;
$temp['status']=1;
$temp['dis']='';
$temp['spec']='';*/
//$temp['op']='';

$colect_atrib="";
/*if (!empty(trim($value['Возраст']))) {
  $colect_atrib=create_atribute("Атрибуты", 'Возраст',$value['Возраст']);
}
if (!empty(trim($value['Тип']))) {
  $colect_atrib.=create_atribute("Атрибуты", 'Тип',$value['Тип']);
}
if (!empty(trim($value['Тип']))) {
  $colect_atrib.=create_atribute("Атрибуты", 'Тип',$value['Тип']);
}*/

/*Наименование  Фото  Раздел  Бренд URL Модель  Возраст Тип Вес велосипеда  Материал рамы Размеры рамы  Амортизация Наименование мягкой вилки Конструкция вилки Уровень мягкой вилки  Ход вилки Регулировки вилки Конструкция рулевой колонки Диаметр колес Наименование покрышек Наименование ободов Материал обода  Двойной обод  Передний тормоз Тип переднего тормоза Задний тормоз Тип заднего тормоза Возможность крепления дискового тормоза Количество скоростей  Задний переключатель  Передний переключатель  Манетки */
/* ,'Конструкция манеток'
 ,'Каретки'
 ,'Конструкция каретки' 
 ,'Тип посадочной части вала каретки' 
 ,'Кассеты' 
 ,'Количество звезд в кассете' 
 ,'Количество звезд системы' 
 ,'Конструкция педалей' 
 ,'Конструкция руля ' 
 ,'Вес беговела' 
 ,'Возраст ребенка' 
 ,'Рост ребенка' 
 ,'Шины' 
 ,'Регулировка высоты седла' 
 ,'Высота седла' 
 ,'Регулировка высоты руля' 
 ,'Особенности' 
 ,'Тип привода' 
 ,'Материал бортировочного шнура' 
 ,'Настройка положения руля' 
 ,'Материал рамки седла' 
 ,'Подножка' 
 ,'Комплектация' 
 ,'Возможность крепления боковых колес' 
 ,'Боковые колеса в комплекте' 
 ,'Звонок' 
 ,'Защитная накладка на руле' 
 ,'Защита цепи' 
 ,'Комфорт' 
 ,'Планетарная втулка' 
 ,'Размер рулевой колонки' 
 ,'Длина шатунов' 
 ,'Другие регулировки' 
 ,'Складной' 
 ,'Переднее колесо' 
 ,'Задние колеса' 
 ,'Материал колес'
 ,'Сиденье' 
 ,'Модельный год' 
 ,'Рекомендуемый возраст' 
 ,'Ручка для родителей' 
 ,'Управление рулем' 
 ,'Подставки для ног' 
 ,'Переднее крыло' 
 ,'Задние крылья' 
 ,'Ремни безопасности' 
 ,'Страховочный обод' 
 ,'Козырек' 
 ,'Регулировка сиденья' 
 ,'Задняя корзина' 
 ,'Материал шин'*/


foreach (['Возраст','Тип','Размеры рамы', 'Амортизация', 'Наименование мягкой вилки', 'Конструкция вилки', 'Уровень мягкой вилки', 'Ход вилки', 'Регулировки вилки',
'Конструкция рулевой колонки','Диаметр колес','Наименование покрышек','Наименование ободов','Двойной обод','Передний тормоз','Тип переднего тормоза','Задний тормоз','Тип заднего тормоза','Возможность крепления дискового тормоза','Количество скоростей','Задний переключатель','Передний переключатель','Манетки' ,'Конструкция манеток'
 ,'Каретки'
 ,'Конструкция каретки' 
 ,'Тип посадочной части вала каретки' 
 ,'Кассеты' 
 ,'Количество звезд в кассете' 
 ,'Количество звезд системы' 
 ,'Конструкция педалей' 
 ,'Конструкция руля ' 
 ,'Вес беговела' 
 ,'Возраст ребенка' 
 ,'Рост ребенка' 
 ,'Шины' 
 ,'Регулировка высоты седла' 
 ,'Высота седла' 
 ,'Регулировка высоты руля' 
 ,'Особенности' 
 ,'Тип привода' 
 ,'Материал бортировочного шнура' 
 ,'Настройка положения руля' 
 ,'Материал рамки седла' 
 ,'Подножка' 
 ,'Комплектация' 
 ,'Возможность крепления боковых колес' 
 ,'Боковые колеса в комплекте' 
 ,'Звонок' 
 ,'Защитная накладка на руле' 
 ,'Защита цепи' 
 ,'Комфорт' 
 ,'Планетарная втулка' 
 ,'Размер рулевой колонки' 
 ,'Длина шатунов' 
 ,'Другие регулировки' 
 ,'Складной' 
 ,'Переднее колесо' 
 ,'Задние колеса' 
 ,'Материал колес'
 ,'Сиденье' 
 ,'Модельный год' 
 ,'Рекомендуемый возраст' 
 ,'Ручка для родителей' 
 ,'Управление рулем' 
 ,'Подставки для ног' 
 ,'Переднее крыло' 
 ,'Задние крылья' 
 ,'Ремни безопасности' 
 ,'Страховочный обод' 
 ,'Козырек' 
 ,'Регулировка сиденья' 
 ,'Задняя корзина' 
 ,'Материал шин'] as $key => $v) {
     
 if (!isset($value[$v]))continue;  
if (!empty(trim($value[$v]))) {
  $colect_atrib.=create_atribute("Атрибуты", $v,$value[$v]);
}

}



// add atrib
//$temp['atrib']=$colect_atrib;
/*$temp['imgs']='';*/







$res[]=$temp; 
}
//end forech csv





$fp = fopen('FIN/file.csv', 'w');
/*fputcsv($fp,['_CATEGORY_','_ID_','_NAME_','_MODEL_','_SKU_','_UPC_','_MANUFACTURER_','_SHIPPING_','_LOCATION_','_PRICE_','_POINTS_','_QUANTITY_','_STOCK_STATUS_ID_','_LENGTH_','_WIDTH_','_HEIGHT_','_WEIGHT_','_SEO_KEYWORD_','_META_KEYWORDS_','_META_DESCRIPTION_','_DESCRIPTION_','_IMAGE_','_SORT_ORDER_','_STATUS_','_DISCOUNT_','_SPECIAL_','_OPTIONS_','_ATTRIBUTES_','_IMAGES_'], ';');*/
/*fputcsv($fp,['_CATEGORY_','_ID_','_NAME_','_MODEL_','_PRICE_','_ATTRIBUTES_'], ';');
*/
/*fputcsv($fp,['_CATEGORY_','_ID_','_NAME_','_MODEL_','_PRICE_'], ';');*/
/*fputcsv($fp,['_CATEGORY_','_ID_','_MODEL_','_PRICE_'], ';');*/
fputcsv($fp,['_CATEGORY_','_ID_'], ';');
foreach ($res as $fields) {
    fputcsv($fp, $fields,';');

    //break;
}
die();
foreach ($res as $key => $v) {


     /* echo $v['cat'].PHP_EOL;*/
      /*echo $v['id'].PHP_EOL;*/
       /* echo $v['name'].PHP_EOL;*/
       /* echo $v['model'].PHP_EOL;
         echo $v['sku'].PHP_EOL;*/
/*           echo $v['manuf'].PHP_EOL; */
 /* echo $v['price'].PHP_EOL;*/
 /* echo $v['weigth'].PHP_EOL;*/
  /* echo $v['img'].PHP_EOL;
*/   
  /*echo $v['des'].PHP_EOL;*/
  echo $v['atrib'].PHP_EOL;

}







 function create_atribute($name_group='',$name_atrib='',$atrib='')
{
  $delimiter='|';
  $res=$name_group . $delimiter.$name_atrib. $delimiter.$atrib.PHP_EOL;




  return $res;
}


die();

//------------------------------------------


/*Велосипеды
Велосипеды|Горные велосипеды*/

$cat_delimiter='|';

$row = 0;
$res=array();
if (($handle = fopen($path_to_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 10000, $delimiter)) !== FALSE) {
      echo count($data).PHP_EOL;
       if ($row++ ==0) {
        continue;
      }
/*      $cat_temp='**';*/
  
        # code...

      
// первая категория. велосипед или фарі что там 

     if ($argv[3]!=-1) {
      $cat_temp=$argv[3]; //добавить категорию
     }
               // добавить ли вторуюу кат.
      if (!empty( trim( $data[2]))){
              $cat_temp=$cat_temp.$cat_delimiter.$data[2]; 

      }    


/*      if (isset($data[2])) {
      if (empty( trim( $data[2]))){
        $cat_temp=$argv[3];}
        else{
                          $cat_temp=$cat_t.$cat_delimiter.$data[2]; 
                        }
            }*/
        
$temp['cat']=$cat_temp;
$temp['name']=$data[0];
 

      /*  $num = count($data);
        echo "<p> $num полей в строке $row: <br /></p>\n";
        $row++;*/
      /*   echo $data[0].PHP_EOL;*/
        /*for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }*/
 $res[]=$temp;       
    }
    fclose($handle);
}



foreach ($res as $key => $v) {
     // echo $v['cat'].PHP_EOL;

}





/*$fname="upload/anfloors_paths.txt";
if (($handle = fopen($fname, "r")) !== FALSE) {
  $id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$t=$id+1;

if(true)                {
        $arr[]= array($id, $data[0]);
      }
    
    $id++;
    }
    fclose($handle);
}




echo json_encode(  $arr);








echo "string";*/

die();


$count_folder=200;
$url='http://anfloors.ru';
$f=["res1/s1_ready.csv","res2/s2_ready.csv","res3/s3_ready.csv","res4/s4_ready.csv","res5/s5_ready.csv","res6/s6_ready.csv"];

$res="FIN/glue_fin.csv";


$main_arr=array();


foreach ($f as $key => $fname) {

if (($handle = fopen($fname, "r")) !== FALSE) {
  $id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
         

         if (!empty($data[0])) {

         	            if (!isset($data[1]))$data[1]='';
         	            if (!isset($data[2]))$data[2]='';
        $main_arr[]= array($data[0],$data[1],$data[2]);
         }
      
    

      
   
    }
    fclose($handle);
}

echo("ok".PHP_EOL);

$file = fopen($res,"ab");
foreach ($main_arr as $key => $value) {
	  
    
 fputcsv($file,$value);

}
fclose($file);



}
echo(count($main_arr));












die();
$arr= array();
if (($handle = fopen($fname, "r")) !== FALSE) {
  $id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$t=$id+1;
if(true){
    //     url name count

            
        $arr[]= $data;
    

      }
    
    $id++;
    }
    fclose($handle);
}


array_shift($arr);     //    remove firest el

            $n=18;
$resultArr=array();
foreach ($arr as $key => $value) {

        if ($value[2]<=$n) {
        $resultArr[]=$value;
        }else{

           $res= floor( $value[2]/  $n);
       
       for ($i=1; $i <=$res ; $i++) {

              if ($i===1) {
        $resultArr[]=$value;
              }else{
         $temp=$value;
           $temp[0]= $temp[0].'/'.$i;
          $resultArr[]=$temp;
      }
       }

        }

/*$firephp->fb(array( $value[2],$res)); 
die();*/


}




echo json_encode(  $resultArr);

die();


$count=10;


	# code...
$r=1;
for ($i=0; $i < count($arr) ; $i++) { 


$pt=$url.$arr[$i][1];
$dest='img/';
 if($i%count_folder==0) {$r++;}
$pref='gogi'.strval($r).'/';
$dest.=$pref;

$firephp->fb($dest); 
if (@!mkdir($dest, 0777, true)) {
    /*die('Не удалось создать директории...');*/
}
 
 $path_parts = pathinfo($arr[$i][1]);

/*echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";*/
 $n= $path_parts['filename'].'.'.$path_parts['extension']; // начиная с PHP 5.2.0

$firephp->fb($n);
/*die();*/
//   copy file 

stream_copy($pt, $dest.$n);

if ($count-- <0) {
break;
}
// write to db;
}






die();

echo json_encode(  $arr);


 function stream_copy($src, $dest)
    {
        $fsrc = fopen($src,'r');
        $fdest = fopen($dest,'w+');
        $len = stream_copy_to_stream($fsrc,$fdest);
        fclose($fsrc);
        fclose($fdest);
        return $len;
    } 
?>