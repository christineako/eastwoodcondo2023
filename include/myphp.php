<?php

//START
session_start();
date_default_timezone_set('Asia/Singapore');


/////////////////////////////////////////////////////////////////////////////////////////////////////
//DATABASE CLASS
class cfg {
  public static function get($param) {
    //connection string link
    
    if(file_exists('content.ini')){
      $getcontentfile = parse_ini_file('content.ini');
    }
    if(file_exists('../content.ini')){
      $getcontentfile = parse_ini_file('../content.ini');
     }
    if(file_exists('../../content.ini')){
      $getcontentfile = parse_ini_file('../../content.ini');
     }
    if(file_exists('../../../content.ini')){
      $getcontentfile = parse_ini_file('../../../content.ini');
    } 

    if(file_exists('top.ini')){
      $gettopfile = parse_ini_file('top.ini');
    }
    if(file_exists('../top.ini')){
      $gettopfile = parse_ini_file('../top.ini');
     }
    if(file_exists('../../top.ini')){
      $gettopfile = parse_ini_file('../../top.ini');
     }
    if(file_exists('../../../top.ini')){
      $gettopfile = parse_ini_file('../../../top.ini');
    } 
    
    $config = array(

//TOP NAVIGATION, CAROUSEL, and COPYRIGHT
    'navHTML' => $gettopfile['navHTML'],
    'carouselHTML' => $gettopfile['carouselHTML'],
    'linksHTML' => $gettopfile['linksHTML'],
    'metaauthor' => $gettopfile['metaauthor'],
    'copyrightHTML' => $gettopfile['copyrightHTML'],

//ALL WRITE UPS
    'indexmainHTML' => $getcontentfile['indexmainHTML'],
    'indexbottomHTML' => $getcontentfile['indexbottomHTML'],
    'studiorentHTML' => $getcontentfile['studiorentHTML'],
    '1brrentHTML' => $getcontentfile['1brrentHTML'],
    '2brrentHTML' => $getcontentfile['2brrentHTML'],
    '3brrentHTML' => $getcontentfile['3brrentHTML'],
    'studiosaleHTML' => $getcontentfile['studiosaleHTML'],
    '1brsaleHTML' => $getcontentfile['1brsaleHTML'],
    '2brsaleHTML' => $getcontentfile['2brsaleHTML'],
    '3brsaleHTML' => $getcontentfile['3brsaleHTML'],
    'leasingHTML' => $getcontentfile['leasingHTML'],
    'saleHTML' => $getcontentfile['saleHTML'],
    'shorttermHTML' => $getcontentfile['shorttermHTML'],
    'officerentHTML' => $getcontentfile['officerentHTML'],
    'officesaleHTML' => $getcontentfile['officesaleHTML'],
    'officeHTML' => $getcontentfile['officeHTML'],
    'otherrentHTML' => $getcontentfile['otherrentHTML'],
    'othersaleHTML' => $getcontentfile['othersaleHTML'],
    'otherpropHTML' => $getcontentfile['otherpropHTML'],
    'contactusHTML' => $getcontentfile['contactusHTML'],
    'propmgtHTML' => $getcontentfile['propmgtHTML'],
    'abouteastwoodHTML' => $getcontentfile['abouteastwoodHTML'],
    'aboutbrokerHTML' => $getcontentfile['aboutbrokerHTML'],
    'otherpropHTML' => $getcontentfile['otherpropHTML'],
    

    //paths
    'base_url' => 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']),
    'base_path' => getcwd().'/',
    'mainpath' => 'data/',
//  'router' => 'router.php',
//  'itempath' => 'items/',
 
    ); 
    $config['base_path'] = str_replace('\\', '/', $config['base_path']);
    return $config[$param];
  }
}
?>
