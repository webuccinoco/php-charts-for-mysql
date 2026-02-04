<?php
ob_start();
/**
 * Smart Chart Maker 
 * @author		Webuccino
 * @copyright	Copyright (c) 2011 - 2023, Webuccino, Inc.
 * @link		https://mysqlreports.com
 * 
 * 
 */

require_once("lib.php");
require_once('SVGGraph/autoloader.php');


$Chart='LineGraph';
if($chartType==0 || $chartType=='') $Chart='PieGraph';
if($chartType==1) $Chart='Pie3DGraph';
if($chartType==3) $Chart='Bar3DGraph';
if($chartType==4) $Chart='StackedBarGraph';
if($chartType==5) $Chart='GroupedBarGraph';
if($chartType==6) $Chart='HorizontalBarGraph';
if($chartType==7) $Chart='HorizontalStackedBarGraph';
if($chartType==8) $Chart='HorizontalGroupedBarGraph';
if($chartType==9) $Chart='MultiScatterGraph';// new changes
if($chartType==10) $Chart='MultiLineGraph';

$values = array();  
if($chartType==0 || $chartType==1) $values = get_values(true);
else  $values = get_values();
 
if($chartType == 0 || $chartType == 1)
{
$legend_entries = array();
	foreach($values as $key => $val)
	{
		if(is_array($val))
		{
		  foreach($val as $k => $v) $legend_entries[] = $k;
		}
		else $legend_entries[] = $key;
	}
	$settings['legend_entries'] = $legend_entries; 
}	

//$graph = new SVGGraph($width, $height, $settings);
$graph = new Goat1000\SVGGraph\SVGGraph($width, $height, $settings);
if($chartType!=0 && $chartType!=1  && $chartType!=9)
{ 
	if(isset($color)&&!empty($color))
	$graph->colours($color);
}  
$graph->Values($values); 
$graph->Render($Chart);

ob_end_flush();